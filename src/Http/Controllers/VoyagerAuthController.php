<?php

namespace Lisandrop05\Voyager\Http\Controllers;

use Exception;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Lisandrop05\Voyager\Facades\Voyager;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 */
class VoyagerAuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * @return RedirectResponse
     */
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

    /**
     * @return array|mixed
     */
    public function loadOperators(){
        try {
            $className = env("CONTROLLER_CLASS_NAME",'App\Http\Controllers\BaseController');
            $object = new $className;
            $method = env("CONTROLLER_METHOD_NAME",'ListLoginItems');
            return $object->{$method}();
        } catch (Exception $e) {
            return [];
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse|RedirectResponse|Response
     * @throws ValidationException
     */
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
        // to log in and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /*
     * Preempts $redirectTo member variable (from RedirectsUsers trait)
     */
    /**
     * @return Repository|Application|mixed
     */
    public function redirectTo()
    {
        return config('voyager.user.redirect', route('voyager.dashboard'));
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return StatefulGuard
     */
    protected function guard(): StatefulGuard
    {
        return Auth::guard(app('VoyagerGuard'));
    }
}
