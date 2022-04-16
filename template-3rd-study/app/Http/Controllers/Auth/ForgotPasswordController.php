<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    // public function showLinkRequestForm()
    // {
    //     return view('auth.passwords.email');
    // }

    
    // public function sendResetLinkEmail(Request $request)
    // {
    //     $this-&gt;validateEmail($request);
    //     $response = $this-&gt;broker()-&gt;sendResetLink(
    //         $request-&gt;only('email')
    //     );
    //     return $response == Password::RESET_LINK_SENT
    //     ? $this-&gt;sendResetLinkResponse($response)
    //     : $this-&gt;sendResetLinkFailedResponse($request, $response);
    // }

    // protected function validateEmail(Request $request)
    // {
    //     $this-&gt;validate($request, ['email' =&gt; 'required|email']);
    // }
}
