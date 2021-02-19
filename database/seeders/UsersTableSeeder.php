<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $findUser=DB::table('users')
            ->where('login','=','admin')
            ->first();
        if(!$findUser){
            $user=new User();
            $user->name='Admin';
            $user->login='admin';
            $user->password=bcrypt('123');
            $user->created_at=date('d-m-Y H:i:s');
            $user->updated_at=date('d-m-Y H:i:s');
            $user->save();
        }

    }
}
