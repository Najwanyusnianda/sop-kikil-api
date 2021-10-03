<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tags;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $code=[10,11,12,13,20];
        $role=["KPA","PPK","PPSPM","Bendahara","SM"];
        $desc=["Kuasa Pengguna Anggaran (KPA)","Pejabat Pembuat Komitmen (PPK)","Pejabat Penandatangan SPM (PPSPM)","Bendahara Pengeluaran","Subject Matter (Fungsi)"];


        for ($i=0; $i <count($role) ; $i++) {
            Tags::create([
                'id'=>$code[$i],
                'code'=>$code[$i],
                'type'=>"role",
                'name'=>$role[$i],
                'description'=>$desc[$i]
        ]);
        }
    }
}
