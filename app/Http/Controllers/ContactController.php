<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    public function contact() {

        return view('layouts.frontend.pages.contact');
    }

    public function contactSubmit(Request $request) {

         $contact = new Contact();

         $contact->name = $request->name;
         $contact->email = $request->email;
         //$contact->subject = $request->subject;
         $contact->phone = $request->phone;
         $contact->read = 1;
         $contact->message = $request->message;

         $contact->save();

         Mail::send('emails.view',
             array(
                 'name' => $request->name,
                 'email' => $request->email,
                 'phone' => $request->phone,
                 'msg' => $request->message,
             ), function($message) use ($request)
               {
                  $message->from(env('MAIL_FROM_ADDRESS'), 'Top SMM SEO services');
                  $message->to('support@topsmmseoservices.com');
                  $message->subject('Contact Form Message');
                  $message->replyTo($request->email, $request->name);
               });

            Toastr::success('Your message has been successfully sent', 'Success');
            return redirect()->back();

    }

    public function contactRead($id)
    {
        $contact = Contact::find($id);
        $contact->read = 0;
        $contact->save();
        return view('admin.contact.show', compact('contact'));
    }

    public function contactUnread($id)
    {
        $contact = Contact::find($id);
        $contact->read = 1;
        $contact->save();
        return view('admin.contact.show', compact('contact'));
    }
}
