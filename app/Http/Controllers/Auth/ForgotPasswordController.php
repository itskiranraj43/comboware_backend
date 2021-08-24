<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
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

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $user = User::where('email', $request->get('email'))->first();
        if (empty($user)) {
            Session::flash('error', 'User not found!');
            return redirect()->back()->with('error', 'User not found!');   
        }
        if (!empty($user)) {
            if (!$user->hasRole(['administrator', 'subadmin'])) {
                Session::flash('error', 'Administrator and subadmin email required!');
                return redirect()->back();   
            }
        }
        $this->validateEmail($request);

        $token =  hash_hmac('sha256', Str::random(40), Hash::make('password'));
        $user->reset_password_token = $token;
        $user->save();
        
        $user->sendPasswordResetNotificationToAdmin($token);

        Session::flash('message', 'Reset password link send to your mail!');
        return redirect()->route('admin.login');
    }
}
