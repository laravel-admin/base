<?php

namespace LaravelAdmin\Base\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Show the login form
     *
     * @return View 'admin.login'
     */
    public function showLoginForm()
    {
        return view('admin::login');
    }
}
