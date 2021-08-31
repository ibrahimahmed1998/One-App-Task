<?php
namespace App\Http\Controllers\AUTH_USERS;
use App\Http\Controllers\AUTH_USERS\AuthController ;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Login extends Controller{

    public function __construct(){ $this->middleware('auth:api', ['except' => ['login']] );}

    public function login(Request $req){

        $class = new AuthController  ;

        $test_database=User::first();

        if(!$test_database){
            $root = User::create(['name' =>'Ibrahim','user_name' =>'Ibrahim98','password' => 12345678,'email' => 'hema.1998.man@gmail.com','type' => 0 , 'phone' => "01207053244" , 'created_at'=>now() ]);
            return response()->json(['Root User'=> $root  ]);}

        $req->validate(['email' => 'required|email:rfc,dns', 'password' => 'required|min:8']);
        $credentials = $req->only('email', 'password');

        if($token = auth()->attempt($credentials)){

            $class->respondWithToken($token);

            return response()->json([ $class->me() , "token"=>$token ]);}

        else{ return response()->json(['err' => "Wrong Credintials , Try a valid E-mail or password"], 401);}
}}
