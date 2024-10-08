<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(request $request){
        $validator = validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {

            if(Auth::attempt(['email' => $request->email,'password' => $request-> password])) {
                return redirect()->route('account.home');
            } else {
                return redirect()->route('account.login')->with('error','Either email or password is incorrect.');
            }

        } else {
            return redirect()->route('account.login')
            ->withInput()
            ->withErrors($validator);
        }
    }

    public function register() {
        return view('register');
    }

    public function processRegister(request $request) {
        $validator = validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'name' => 'required',
            'password_confirmation' => 'required',
        ]);

        if ($validator->passes()) {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = "member" ;
            $user->save();

            return redirect()->route('account.login')->with('succes', 'you have succesfully registered.');

        } else {
            return redirect()->route('account.register')
            ->withInput()
            ->withErrors($validator);
        }

    }

    public function logout() {
        Auth::logout();
        return redirect()->route('account.login');
    }
}
