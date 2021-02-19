<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $findRole=DB::table('roles')
            ->where('name','=','User')
            ->first();
        if(!$findRole){
            $role=new Role();
            $role->name='User';
            $role->save();
        }
        $findRole=DB::table('roles')
            ->where('name','=','Admin')
            ->first();
        if(!$findRole){
            $role=new Role;
            $role->name='Admin';
            $role->save();
        }
    }
}
