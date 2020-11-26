<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Http\Requests\MemberRequest;
use Illuminate\Support\Facades\Auth;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(MemberRequest $request)
    {
        $request->session()->put('register', $request->all());
        return redirect()->route('register.check');
    }

    public function check(Request $request)
    {
        $session_register = $request->session()->get('register');
        return view('auth.check', compact('session_register'));
    }

    public function store(Request $request)
    {
        $session_register = $request->session()->get('register');

        if ($request->has('back'))
        {
            return redirect()->route('register')->withInput($session_register);
        } else {
            event(new Registered($user = $this->create($session_register))); // DBに保存
            $request->session()->put('user', $user);

            return $this->registered($request, $user)
                            ?: redirect($this->redirectPath());
        }
    }

    public function complete()
    {
        return view('auth.complete');
    }

    public function login(Request $request)
    {
        $user = $request->session()->get('user');

        $this->guard()->login($user);

        return redirect()->route('top');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
