<?php

namespace App\Http\Controllers\Auth;
use App\Notifications\VerifyRegistration;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (Auth::check() && Auth::user()->role->id == 1)
        {
            $this->redirectTo = route('admin.dashboard');
        }else{
            $this->redirectTo = route('author.dashboard');
        }
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!is_null($user)) {
            if ($user->status == 1){
                if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
                    if (Auth::check() && Auth::user()->role->id == 1){
                        return redirect()->route('admin.dashboard');
                    }else{
                        return redirect()->route('author.dashboard');
                    }
                }else{
                    session()->flash('sticky_error', 'login invalid');
                    return redirect()->route('login');
                }
            }else{
                if (!is_null($user)){
                    $user->notify(new VerifyRegistration($user));

                    session()->flash('success', 'A new confirmation email has send to you... Please check and confirm your email');
                    return redirect()->back();
                }else{
                    session()->flash('sticky_error', 'Please login first !!');
                    return redirect()->route('login');
                }
            }
        }else{
            session()->flash('sticky_error', 'login invalid');
            return redirect()->route('login');
        }
    }

}
