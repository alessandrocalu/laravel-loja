<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $redirectPath = '/';
    protected $loginPath = '/auth/login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'whatsapp' => $data['whatsapp'],
            'data_nascimento' => $data['data_nascimento'],
            'password' => bcrypt($data['password']),
            'type' => 'aluno'
        ]);
    }

    private function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    private function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')]
        ]);
    }

    private function sendFailedRegisterResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'email' => [trans('Dados incompletos. Verifique preenchimento!')]
        ]);
    }

    private function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        return redirect()->intended($this->redirectPath);
    }

    private function credentials(Request $request)
    {
        return $request->only('email', 'password');
    }

    private function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->boolean('remember')
        );
    }
    
    public function login(Request $request){
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function getRegister() {
        return view('auth.register');
    }

    public function getLogin() {
        return view('auth.login');
    }

    public function getLogout(Request $request) {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function postLogin(Request $request) {
        $this->login($request);
        $request->session()->regenerate();

        return redirect()->intended($this->redirectPath);
    }

    public function postRegister(Request $request) {

        global $_POST, $_SERVER;

        $captcha = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : null;

        $secret = env('GOOGLE_CAPTCHA_SECRET', '?????');

        if(! empty($captcha) ){
            $res = json_decode(
                file_get_contents(
                    "https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']
                )
            );
            if ( $res->success === true) {
                //ok
            } else {
                return $this->sendFailedRegisterResponse($request);
            }
        } else {
            return $this->sendFailedRegisterResponse($request);
        }

        $validator = $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return redirect($this->redirectPath);
    }

    private function guard()
    {
        return Auth::guard();
    }
}
