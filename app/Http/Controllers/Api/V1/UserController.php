<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Verfication;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //

    public function Register(Request $request){

        $request->validate([
            'name' => 'required|max:100',
             'email'=>'required|unique:users,email|email:rfc,dns',
             'phone' => 'required|numeric|unique:users,phone',
             'password'=> 'required|confirmed'
        ]);

        $user = User::create([

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => bcrypt($request->password)

        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;


        $response = [

            'Message' => 'registerd successfuly',
            'data'=> $user,
            'token' => $token,


        ];


        return response($response,201);


    }


    public function login(Request $request){
        $fields = $request->validate([
            'user' => 'required',
            'password' => 'required|string|',

        ]);

        $user = User::where('email',$fields['user'])
        ->orWhere('phone',$fields['user'])
        ->first();



        //check password
        if(!$user || !Hash::check($fields['password'], $user->password)){

            return response([
                'message' => 'wrong login information'
            ],401);

        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'message' => 'logged in successfuly',
            'user' => $user,
            'token' => $token,
        ];

        return response($response,201);
    }


    public function logout(Request $request){

            auth()->user()->tokens()->delete();
            return [
                'messege' =>'Logged out'
            ];

        }


}
