<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function contact()
    {

        return view('layouts.frontend.pages.contact');
    }

    public function about()
    {

        return view('layouts.frontend.pages.about');
    }

    public function termsConditions()
    {

        return view('layouts.frontend.pages.terms-conditions');
    }

    public function faq()
    {

        return view('layouts.frontend.pages.faq');
    }
}
