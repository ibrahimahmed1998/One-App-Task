<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationTable extends Migration{

   public $tableName = 'Locations';

    public function up(){
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('p_id');
            $table->double('longitude');
            $table->double('latitude');
            $table->foreign('p_id')->references('id')->on('users')->onDelete('cascade');

            $table->primary(array('p_id','longitude','latitude'));

        });}

     public function down(){Schema::dropIfExists($this->tableName);}
}
