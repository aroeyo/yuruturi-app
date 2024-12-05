<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact/show');
    }

    public function confirm()
    {
        return view('contact/confirm');
    }

    public function complete()
    {
        return view('contact/complete');
    }

}
