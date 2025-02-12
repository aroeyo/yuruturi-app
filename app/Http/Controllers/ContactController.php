<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function show()
    {
        $userdata = Auth::user();
        return view('contact/show', ['userData' => $userdata]);
    }

    public function confirm(Request $request)
    {
        try{
        $contactform = $request->validate(Inquiry::rules());
        $contactform['name'] = Auth::user()->name;
        $contactform['email'] = Auth::user()->email;
        } catch (ValidationException $e) {
        // バリデーションエラーが発生した場合
        dd($e->errors()); // エラーメッセージを確認
    }
        session()->put('contactform', $contactform);
        return view('contact/confirm');
    }

    public function complete(Request $request)
    {
        $contactform = new Inquiry([
            'inquiry_name' => session()->get('contactform.name'),
            'inquiry_email' => session()->get('contactform.email'),
            'subject' => session()->get('contactform.messagetitle'),
            'message' => session()->get('contactform.message'),
            'user_id' => Auth::id(),
        ]);

        $contactform->save();

        session()->forget('contactform');

        return view('contact/complete');
    }

}
