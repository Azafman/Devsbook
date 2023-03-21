<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $r) {
        if(Auth::check()) {
            return redirect(route('home'));
        }
        return view('login');
    }
    public function indexAction(Request $r) {
        $dataRequest = $r->validate([
            'email' => 'email',
            'password' => 'min:6'
        ]);//I could(poderia) go(fazer) without(sem) this validation

        /* if(Auth::attempt(['email' => $email, 'password' => $password])) {} => ANATOMY*/
        if(Auth::attempt($dataRequest)) {
            return redirect()->route('home');
        }
        //dd([]);//prova doq o professor disse, caso o validate esteja errado a única coisa que funcionará será o return abaixo.

        return redirect()->route('login');
    }
    public function register() {
        if(Auth::check()) {
            return redirect(route('home'));
        }
        return view('register');
    }
    public function registerAction(Request $r) {
        $validatyOfData = $r->validate([
            'name' => 'required|min: 5',
            'email' => 'required|email|min:15|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        $dadosForCreateUser = $r->only(['email','name','password']);
        $dadosForCreateUser['password'] = Hash::make($dadosForCreateUser['password']);

        //User::create($validatyOfData);roda porém sem fazer o hash
        User::create($dadosForCreateUser);
        
        return redirect()->route('login');
    }
    public function logout() {
        Auth::logout();
        return redirect(route('login'));
    }
}
