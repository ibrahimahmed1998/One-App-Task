<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class Add_user_r extends FormRequest
{
    public function authorize(){return true;}

    public function rules(){
        return [
            'name' => 'required|min:3|max:150|string', // Aya
            'type' => 'required|boolean', // 1 = admin , 2 = provider
            'email' => 'required|email:rfc,dns|unique:users',
            'user_name' => 'required|min:5|max:75|string|unique:users',
            'password' => 'required|min:8',
        ];}
}
