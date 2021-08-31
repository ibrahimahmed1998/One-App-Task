<?php
namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Location extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    protected $fillable=['p_id','longitude','latitude'];
}
