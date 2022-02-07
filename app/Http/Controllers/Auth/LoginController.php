<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo()
    {

        if (Auth::user()->role_as == 1) { // admin login
            return 'dashboard'; //redirect('dashboard')->with('status', 'Welcome to Your Dashboard');
        } elseif (Auth::user()->role_as == 0) { // user login
            return '/'; //redirect('/')->with('status', 'Logged in Successfully');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {

        $role = Auth::user()->role_as;
        DB::table('session')->insert(['is_admin' => $role]);

        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        $is_admin = DB::table('session')->where(['is_admin' => $role])->first();

        return $is_admin->is_admin == 1 ? redirect('/login') : redirect('/');

        // return $request->wantsJson()
        // ? new JsonResponse([], 204)
        // : redirect('/login');
    }

}
