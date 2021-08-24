<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

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
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request, $token = null)
    {
        $user = User::where('reset_password_token', $token)->first();
        if (empty($user)) {
            Session::flash('error', 'User not found or your link is expire please try again!');
            return redirect()->route('admin.login');
        }
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $user->email]
        );
    }


    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());
        $user = User::where('reset_password_token', $request->token)->first();
        if (empty($user)) {
            Session::flash('error', 'User not found or your link is expire please try again!');
            return redirect()->route('admin.login');
        }
        
        $user->password = bcrypt($request->password);
        $user->reset_password_token = '';
        $user->save();
        return redirect()->route('admin.login')->with('message', 'Password reset successfull!');

    }
}
