<?php

namespace App\Livewire;

use App\Models\Orders;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Paynow\Payments\Paynow;

class PayUsingEcocash extends Component
{

    public $orderId;
    public $site_url;
    public $phone;

    public function mount($orderId)
    {
        $this->orderId = $orderId;
        $this->site_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    }

    public function createPayment()
    {
        $this->validate([
            'phone' => 'required|regex:/^[0-9]{10,15}$/', // Add validation for phone number
        ]);

        $order = Orders::findOrFail($this->orderId);

        $new_trans = Transaction::updateOrCreate(
            ['order_id' => $this->orderId],
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
            $response = $this->paynow($new_trans->id, "paynow")->sendMobile($payment, $this->phone, 'ecocash');

            if ($response->success) {
                $update_tran = Transaction::find($new_trans->id);
                $update_tran->update(['poll_url' => $response->pollUrl()]);

                $pollUrl = $response->pollUrl();


                // sleep(15);
                $status = $this->paynow($new_trans->id, "paynow")->pollTransaction($pollUrl);


                if ($status->paid()) {
                    return redirect()->to("/orders")->with('message', 'Your payment was successdull!!');
                } else {
                    session()->flash('error', 'Why not pay!!');
                }
            } else {
                session()->flash('error', 'Oops something went wrong while trying to process your transaction. Please try again.');
            }
        } catch (\Exception $error) {
            session()->flash('error', $error->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.pay-using-ecocash')->extends('app');
    }

    private function generateRandomId()
    {
        return uniqid('txn_', true);
    }

    public function paynow($id = "", $type = "")
    {
        $site_url = $this->site_url;
        $request_url = $_SERVER['REQUEST_URI'];
        return new Paynow(
            env('PAYNOW_INTERGRATION_ID'),
            env('PAYNOW_INTERGRATION_KEY'),
            // The return url can be set at later stages. You might want to do this if you want to pass data to the return url (like the reference of the transaction)
            "$site_url/check-payment/$id", //return url
            "$site_url/check-payment/$id", //result url
        );
    }
}
