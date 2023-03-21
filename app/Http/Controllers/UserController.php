<?php

namespace App\Http\Controllers;

use App\Models\UserRelation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home() {
        //dd(Auth::user()->id);
        $user = Auth::user();
        $id = $user->id;
        $qndtAmigos = UserRelation::where('user_from', '=', $id)->count();
        
        return view('feed', [
            'quantidadeAmigos' => $qndtAmigos,
            'name' => $user->name
        ]);
    }
}
