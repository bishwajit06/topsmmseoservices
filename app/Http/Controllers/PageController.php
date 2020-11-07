<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function details($slug)
    {
        $page = Page::where('slug',$slug)->first();
        return view('layouts.frontend.pages.details',compact('page'));
    }

    // public function contact()
    // {

    //     return view('layouts.frontend.pages.contact');
    // }

    // public function contactSubmit(Request $request)
    // {
    //     Mail::send('emails.view',[
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'phone' => $request->phone,
    //         'msg' => $request->msg

    //     ],function ($mail) use($request){
    //         $mail->from(env('MAIL_FROM_ADDRESS'), $request->name);
    //         $mail->to('roybishwajit06@gmail.com')->subject('Contact us Message');
    //         //$message->cc('dream66555@gmail.com', $request->name);
    //         //$message->bcc('dream66555@gmail.com', $request->name);
    //         // $message->replyTo($request->email, $request->name);
    //         // $message->subject('Contact us Message');
    //         //$message->priority(3);
    //         //$message->attach('pathToFile');
    //     });

    //     //Toastr::success('Your message has been successfully sent', 'Success');
    //     return "Message sent";
    // }

    // public function about()
    // {

    //     return view('layouts.frontend.pages.about');
    // }

    // public function termsConditions()
    // {

    //     return view('layouts.frontend.pages.terms-conditions');
    // }

    // public function faq()
    // {

    //     return view('layouts.frontend.pages.faq');
    // }
}
