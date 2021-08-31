<?php

namespace App\Http\Controllers;

use App\Http\Requests\Location_r;
use App\Models\Location as ModelsLocation;
use App\Models\User;
use Illuminate\Http\Request;

class Location extends Controller{

   public function __construct(){ $this->middleware('auth:api', ['except' => ['get_location']] );}

  public function add_location(Location_r $req){

        $user = User::where('id',$req->p_id)->first();

        $loc = ModelsLocation::where('p_id',$req->p_id);

        $count=$loc->count();

        $primary = $loc->where('p_id',$req->p_id)->where('longitude',$req->longitude)
                    ->where('latitude',$req->latitude)->exists();

        if($primary){ return response()->json(["err" => " can not repeat same location "], 201); }

        if($user->type != 1 ) { return response()->json(["err" => " this User not providor "], 401); }

        if($count > 4){ return response()->json(["err"=>"can not add more than 5 locations " ], 401); }

        $location = ModelsLocation::create([ "p_id"=>$req->p_id, "longitude"=>$req-> longitude, "latitude"=>$req->latitude ]);

        return response()->json([$location , "num of locations: "=>$count+1 ], 201);
  }


  public function get_location($user_name){

        $user = User::where('user_name',$user_name)->first();

        if(!$user){ return response()->json(["err"=>"this user name does not exist" ], 401); }

        $location = ModelsLocation::where('p_id',$user->id)->get();

        if($location->count() == 0 ){ return response()->json(["have not location yet ... "], 200); }

        return response()->json([ $location ], 200);
 }
}
