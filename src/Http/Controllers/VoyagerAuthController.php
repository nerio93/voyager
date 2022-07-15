<?php

namespace Lisandrop05\Voyager\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Lisandrop05\Voyager\Facades\Voyager;

class VoyagerAuthController extends Controller
{
    use AuthenticatesUsers;

    public function login()
    {
        if ($this->guard()->user()) {
            return redirect()->route('voyager.dashboard');
        }

        if(env("LIST_OPERATORS",false)){
            $operators = $this->loadOperators();
            return Voyager::view('voyager::login')->with(["operators"=>$operators]);
        }
        else{
            return Voyager::view('voyager::login');
        }
    }

    public function loadOperators(){
        try {
            $client = new Client();
            $response = $client->get(env("APP_URL") . "/api/login-items", [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
            ]);
            $res = json_decode($response->getBody(), true);
            if ($response->getStatusCode() === 200) {
                return $res;
            }
        } catch (\Exception $e) {
            return false;
        }
    }

    public function postLogin(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->credentials($request);

        if ($this->guard()->attempt($credentials, $request->has('remember'))) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /*
     * Preempts $redirectTo member variable (from RedirectsUsers trait)
     */
    public function redirectTo()
    {
        return config('voyager.user.redirect', route('voyager.dashboard'));
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard(app('VoyagerGuard'));
    }
}
