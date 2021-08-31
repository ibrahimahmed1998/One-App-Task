<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class Location_r extends FormRequest{

    public function authorize(){return true;}

    public function rules(){

        return[
                'p_id' => 'required|integer|exists:Users,id',
                'longitude' => 'required|numeric|between:0,106744840359415.99',
                'latitude' => 'required|numeric|between:0,106744840359415.99',
        ];}
}
