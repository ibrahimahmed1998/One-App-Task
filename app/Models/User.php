<?php
namespace App\Models;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    public $timestamps = false;

    protected $fillable=['name','email','password','type','user_name','remember_token','created_at'];

    protected $hidden = ['password'];

    public function setPasswordAttribute($password){$this->attributes['password'] = bcrypt($password);}

    public function getJWTIdentifier(){return $this->getKey();}

    public function getJWTCustomClaims(){  return []; }
}
