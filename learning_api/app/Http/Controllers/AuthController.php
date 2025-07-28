<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $user = $request->validate([
            'name' => 'required|min:3',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:3',
        ]);
        if($user){
            $add = User::create([
                'name'=> $request->name,
                'email'=> $request->email,
                'password'=> bcrypt($request->password),
                'created_at' => Now(),
                'updated_at'=> Now(),
            ]);
        }else{
            $add = "Error";
        }
        $token = $add->createToken($request->name);
         return ['user'=> $user, 'token'=> $token];
    }

    public function login(Request $request){
        $request->validate([
            'email'=> 'required|email|exists:users',
            'password'=> 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
         return ['error'=> 'Provided Credentials are wrong'];
        }
        $token = $user->createToken($user->name);
        return ['user'=> $user,'token'=> $token];
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return ['message'=> 'logout successful'];
    }
}
