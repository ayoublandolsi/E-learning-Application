<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
USE Illuminate\Foundation\Bootstrap\HandleExceptions;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $new_name='';
        if ($request->hasFile('img')) {
            $new_name = $request->file('img')->hashName();
            $request->file('img')->move(public_path('uploads/apprenant'), $new_name);

         } else {
            // Handle the case where the file upload is not valid
            }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'gendre' => $request->input('gendre'),
            'phonenumber' => $request->input('phonenumber'),
            'img'=>$new_name,
            'spec' => $request->input('spec'),
            'role' =>  $request->input('role'),
            'state' =>  $request->input('state'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect($this->redirectTo);
    }
}
