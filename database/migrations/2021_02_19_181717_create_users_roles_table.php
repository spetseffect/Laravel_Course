<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_roles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('role_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('role_id')->references('id')->on('roles');
        });
        //default data
        if(Schema::hasTable('users') && Schema::hasTable('roles')){
            $findRole=DB::table('roles')
                ->where('name','=','Admin')
                ->first();
            $findUser=DB::table('users')
                ->where('email','=','admin@admin.dom')
                ->first();
            if($findRole && $findUser){
                DB::table('users_roles')->insert([
                    'user_id'=>$findUser->id,
                    'role_id'=>$findRole->id
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_roles');
    }
}
