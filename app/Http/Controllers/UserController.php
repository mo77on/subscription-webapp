<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    protected function register(Request $request)
    {
        if(empty($request->password)){
            $password = 'password';
        }

        $data = request()->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        return User::create([
            'name' => $request->name ? $request->name : 'Subscriber',
            'email' => $data['email'],
            'password' => Hash::make($password),
            'role_id' => 2,
        ]);
    }
}
