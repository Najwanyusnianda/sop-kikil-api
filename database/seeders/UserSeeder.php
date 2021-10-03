<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role_id => 100 =admin  //Role_id => 200 =kpa  //Role_id => 210 =ppk  //Role_id => 300 =ppspm  //Role_id => 400 = Bendahara Pengeluarah  //500= Subject Matter
        //seksi_id=> 11023 = sosial
        User::create([
            "username"=>"admin",
            "firstname"=>"administrator",
            "email"=>"ipds1102@gmail.com",
            "password"=>Hash::make("admin"),
            "role_id"=>100,
        ]);

        User::create([
            "username"=>"bnd1",
            "firstname"=>"bendahara1",
            "email"=>"bendahara@gmail.com",
            "password"=>Hash::make("password"),
            "role_id"=>400
        ]);

        User::create([
            "username"=>"sm1",
            "firstname"=>"subjectmatter1",
            "email"=>"subjectmatter@gmail.com",
            "password"=>Hash::make("password"),
            "role_id"=>500,
            "seksi_id"=>11023
        ]);
    }
}
