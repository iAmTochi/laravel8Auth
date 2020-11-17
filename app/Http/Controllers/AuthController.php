<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function init(){
        $user = Auth::user();
        return ["user" => $user];
    }

    public function login(Request $request){
        if(Auth::attempt(["username" => $request->username, "password" => $request->password])){
            $user = Auth::user();
            return ["user" => $user];
        } else {
            return response()->json([
                "error" => "Could not log you in"
            ], 403);
        }
    }

    public function register(Request $request){
        $rules = [
            'name'  => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
        ];
        $this->validate($request, $rules);
        $user = new User();

        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->save();

        Auth::login($user);

        return response()->json([
            "user" => $user,
            "message" => $request->name. ", you are welcome!"
        ], 200);
    }
}
