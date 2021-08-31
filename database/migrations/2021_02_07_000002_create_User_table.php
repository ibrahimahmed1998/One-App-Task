<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration{
    public $tableName = 'Users';

    public function up(){
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name',100);
            $table->boolean('type'); // 0=Admin , 1=Provider
            $table->string('email')->unique();
            $table->string('user_name')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });}
     public function down(){ Schema::dropIfExists($this->tableName); }
}
