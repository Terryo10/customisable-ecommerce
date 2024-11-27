<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'subject' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'message' => 'required|string|max:255',
        ]);

        $email = (string) ($request->email ?? '');
        $subject = (string) ($request->subject ?? '');
        $message = (string) ($request->message ?? '');
        $phone = (string) ($request->phone ?? '');
        $name = (string) ($request->email ?? '');

        $body = "New Email From: <h3>$email</h3> <br> <h4>Message: </h4><p>$message</p> <br> <h4>Phone: </h4><p>$phone</p>";

        try {
            Mail::send('emails.contact', ['body' => $body], function ($message) use ($email, $subject) {
                $message->to(env('MAIL_FROM_ADDRESS', 'contact@slimriff.com'));
                $message->subject($subject);
            });
        } catch (\Exception $e) {
            return redirect()->to('/contact')->with('message', 'Failed to send message!!!');
        }

        // $this->sendEmail($request->subject, $request->message, $request->phone, $request->email);
        ContactForm::create([
            'subject' => $subject,
            'phone' => $phone,
            'message' => $message,
            'email' => $email,
        ]);

        return redirect()->to('/contact')->with('message', 'Message send successfully!!!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
