<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Lockout;

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

    public $maxAttempts = 3;
    public $decayMinutes = 30;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('throttle:3,1')->only('login'); // 3(maxAttempts).  // 1(decayMinutes)
    }
    
    public function login(Request $request)
        {  
            $inputVal = $request->all();
       
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required',
            ]);
       
            if(Auth::attempt(array('email' => $inputVal['email'], 'password' => $inputVal['password']))){
                if (auth()->user()->role == 'ADMINISTRADOR') {
                    return redirect()->route('home');
                }else{
                    return redirect()->route('home');
                }
            }else{
                return redirect()->route('login')
                    ->with('error','Email & Password son icorrectos.');
            }     
        }

    
}
