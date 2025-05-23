<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayNowController extends Controller
{
    public function createCashPayment(Request $request, $order_id)
    {

        $order = Orders::findOrFail($order_id);

        $new_trans = Transaction::updateOrCreate(
            ['order_id' => $order_id],
            [
                'user_id' => Auth::user()->id,
                'type' => 'cash',
                'total' => $order->total
            ]
        );

        $new_trans->update(['isPaid' => true]);
        $order->update(['status' => 'paid', 'type' => 'cash']);
        return redirect()->back()->with(['message' => 'Your transaction have been placed successfull!!! please contact ' . env('MAIL_FROM_ADDRESS') . ' to get full information about your order']);
    }
    public function createPayment(Request $request, $order_id)
    {

        $order = Orders::findOrFail($order_id);

        $new_trans = Transaction::updateOrCreate(
            ['order_id' => $order_id],
            [
                'user_id' => Auth::user()->id,
                'type' => 'paynow',
                'total' => $order->total
            ]
        );
        try {
            $uuid = $this->generateRandomId();
            $payment = $this->paynow($new_trans->id, "paynow")->createPayment("$uuid", Auth::user()->email);
            $payment->add("Invoice Payment With id of " . $order->id, $order->total);
            $response = $this->paynow($new_trans->id, "paynow")->send($payment);

            if ($response->success) {
                $update_tran = Transaction::find($new_trans->id);
                $update_tran->update(['poll_url' => $response->pollUrl()]);

                $link = $response->redirectUrl();
                return redirect()->to($link);
            } else {
                return redirect()->back()->WithErrors(['message' => 'Oops something went wrong while trying to proccess your transaction please try again']);
            }
        } catch (Exception $error) {
            return redirect()->to('/errors')->WithErrors(['message' => $error->getMessage()]);
        }
    }
    public function createBulkPayment(Request $request)
    {
        $items = $request->items ?? [];
        $link = false;

        foreach ($items as $order_id) {
            $order = Orders::findOrFail($order_id);

            $new_trans = Transaction::updateOrCreate(
                ['order_id' => $order_id],
                [
                    'user_id' => Auth::user()->id,
                    'type' => 'paynow',
                    'total' => $order->total
                ]
            );
            try {
                $uuid = $this->generateRandomId();
                $payment = $this->paynow($new_trans->id, "paynow")->createPayment("$uuid", Auth::user()->email);

                foreach ($items as $order_id) {
                    $order = Orders::findOrFail($order_id);
                    $payment->add("Invoice Payment With id of " . $order->id, $order->total);
                }
                $response = $this->paynow($new_trans->id, "paynow")->send($payment);

                if ($response->success) {
                    $update_tran = Transaction::find($new_trans->id);
                    $update_tran->update(['poll_url' => $response->pollUrl()]);

                    $link = $response->redirectUrl();
                } else {
                    return redirect()->back()->WithErrors(['message' => 'Oops something went wrong while trying to proccess your transaction please try again']);
                }
            } catch (Exception $error) {
                return redirect()->to('/errors')->WithErrors(['message' => $error->getMessage()]);
            }
        }
        if ($link) {
            return redirect()->to($link);
        }
        return redirect()->back()->with('message', 'No items selected');
    }

    public function paymentCancel()

    {
        return redirect('/')->with("message", "Your payment has been declined. The payment cancelation page goes here!");
    }


    public function paymentSuccess(Request $request, $id = "")

    {
        $user = Auth::user();

        $transaction_top = Transaction::where('id', $id)->first();

        return redirect()->to('/');
    }

    public function checkPayment(Request $request, $id)
    {
        try {
            $transaction = Transaction::findOrFail($id);
            $order = Orders::findOrFail($transaction->order_id ?? 0);
            $status = $this->paynow($id, "paynow")->pollTransaction($transaction->poll_url);

            if ($status->paid()) {
                $transaction->update(['isPaid' => true]);
                $order->update(['status' => 'paid']);
                return redirect()->to('/orders')->with(['message' => 'Transaction paid']);
            } else {
                return redirect()->to('/orders')->withErrors(['message' => 'Why not pay??']);
            }
        } catch (Exception $error) {
            return redirect()->to('/errors')->WithErrors(['message' => $error->getMessage()]);
        }
    }
    public function checkPaymentAdmin(Request $request, $id)
    {
        try {

            $transaction = Transaction::findOrFail($id);
            $order = Orders::findOrFail($transaction->order_id ?? 0);
            $status = $this->paynow($id, "paynow")->pollTransaction($transaction->poll_url);

            if ($status->paid()) {
                $transaction->update(['isPaid' => true]);
                $order->update(['status' => 'paid']);
                admin_success('Payment successful', 'payment was successful');
                return redirect()->back();
            } else {
                admin_error('Customer did not pay', 'wait for customer to pay...');
                return redirect()->back();
            }
        } catch (Exception $error) {
            admin_error('Something went wrong!!!', $error->getMessage());
            return redirect()->back();
        }
    }
}
