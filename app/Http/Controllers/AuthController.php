<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    private $success_status=200;

    public function register(Request $request){

         //--validate form---------------

        $validator = Validator::make($request->all(),[
            "email" => "required|email",
           // "username"=>"required",
            "firstname"=>"required",
            "lastname"=>"required",
            "password"=>"required|string"

        ]);


        if($validator->fails()){
            return response()->json([
                "validation_errors"=>$validator->errors()
            ]);

        }



         //--create user--------------------

         $username = strstr($request->email, '@', true);
         $user=User::create([
            "username"=>$username,
            "email"=> $request->email,
            "firstname"=>$request->firstname,
            "lastname"=>$request->lastname,
            "password"=>bcrypt($request->password)
         ]);

         $token =$user->createToken('myapptoken')->plainTextToken;

         return response()->json([
            "status"=>201,
            "success"=>true,
            "user"=>$user,
            "token"=>$token
         ],201);


    }

    public function login(Request $request){
                 //--validate form---------------

                 $validator = Validator::make($request->all(),[
                    "username" => "required",
                    "password"=>"required|string"
                ]);


                if($validator->fails()){
                    return response()->json([
                        "validation_errors"=>$validator->errors()
                    ]);

                }



                 //--check user and Password--------------------
                 $user=User::where('username',$request->username)->first();

                 if(!$user || !Hash::check($request->password,$user->password)){
                    return response()->json([
                        "status"=>401,
                        'success'=> false,
                        'message'=> 'user tidak ditemukan'
                    ],401);
                 }

                 $token =$user->createToken('myapptoken')->plainTextToken;

                 return response()->json([
                    "status"=>200,
                    "success"=>true,
                    "user"=>$user,
                    "token"=>$token
                 ],201);



    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return response()->json([
            "message"=> "logout berhasil"
        ]);
    }
}
