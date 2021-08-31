<?php
namespace App\Http\Controllers\AUTH_USERS;
use App\Http\Controllers\Controller;
use App\Http\Requests\Add_user_r;
use App\Models\User;

class Add_user extends Controller
{
    public function __construct() {  $this->middleware('auth:api', ['except' => ['']]); }

    public function add_user(Add_user_r $req){

        User::create(['name' => $req->name,
                      'user_name' => $req->user_name,
                      'password' => $req->password,
                      'email' => $req->email,
                      'type' => $req->type,
                      'created_at'=>now()        ]);

       return response()->json(['success' => 'joins...One App (^_^) '], 201); }
}
