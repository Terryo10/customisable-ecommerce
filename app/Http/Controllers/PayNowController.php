<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayNowController extends Controller
{
    public function createPayment(Request $request, $order_id)
    {
        $order = Orders::findOrFail($order_id);

        $new_trans = Transaction::create([
            'user_id' => Auth::user()->id,
            'order_id' => $order_id,
            'status' => 'pending'
        ]);
        $uuid = $this->generateRandomId();
        $payment = $this->paynow($new_trans->id, "paynow")->createPayment("$uuid", Auth::user()->email);
        $payment->add("paynow", $order->total);
        $response = $this->paynow($new_trans->id, "paynow")->send($payment);

        if ($response->success) {
            $update_tran = Transaction::find($new_trans->id);
            $update_tran->update(['poll_url' => $response->pollUrl()]);

            $link = $response->redirectUrl();
            return redirect()->to($link);
        } else {
            return redirect()->back()->WithErrors(['message' => 'Oops something went wrong while trying to proccess your transaction please try again']);
        }
    }
}
