<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IkpaIndicators;
use DB;

class IkpaIndicatorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ikpa_indicators')->delete();
     $ikpa_array= [
    [
         "indicator_id" => "1001",
         "name" => "Revisi DIPA",
         "bobot" => 5,
         "tanggal_update" => "2021-10-09",
         "is_complete" => true
        ],
        [
            "indicator_id" => "1002",
            "name" => "Deviasi Halaman III DIPA",
            "bobot" => 5,
            "tanggal_update" => "2021-10-09",
            "is_complete" => false
        ],
        [
               "indicator_id" => "1003",
               "name" => "Pagu Minus",
               "bobot" => 5,
               "tanggal_update" => "2021-10-09",
               "is_complete" => false
        ],
        [
                  "indicator_id" => "2001",
                  "name" => "Penyampaian Data Kontrak",
                  "bobot" => 5,
                  "tanggal_update" => "2021-10-09",
                  "is_complete" => true
               ],
                [
                     "indicator_id" => "2002",
                     "name" => "Pengelolaan UP dan TUP",
                     "bobot" => 5,
                     "tanggal_update" => "2021-10-09",
                     "is_complete" => false
                  ],
                [
                        "indicator_id" => "2003",
                        "name" => "Penyampaian LPJ Bendahara",
                        "bobot" => 5,
                        "tanggal_update" => "2021-10-09",
                        "is_complete" => false
                     ],
                [
                           "indicator_id" => "2004",
                           "name" => "Dispensasi SPM",
                           "bobot" => 5,
                           "tanggal_update" => "2021-10-09",
                           "is_complete" => false
                        ],
                    [
                              "indicator_id" => "3001",
                              "name" => "Penyerapan Anggaran",
                              "bobot" => 5,
                              "tanggal_update" => "2021-10-09",
                              "is_complete" => false
                           ],
                            [
                                 "indicator_id" => "3002",
                                 "name" => "Penyelesaian Tagihan",
                                 "bobot" => 5,
                                 "tanggal_update" => "2021-10-09",
                                 "is_complete" => false
                              ],
                            [
                                    "indicator_id" => "3003",
                                    "name" => "Capaian Output",
                                    "bobot" => 5,
                                    "tanggal_update" => "2021-10-09",
                                    "is_complete" => false
                                 ],
                                [
                                       "indicator_id" => "3004",
                                       "name" => "Retur SP2D",
                                       "bobot" => 5,
                                       "tanggal_update" => "2021-10-09",
                                       "is_complete" => false
                                    ],
                                        [
                                          "indicator_id" => "3005",
                                          "name" => "Pengembalian SPM",
                                          "bobot" => 5,
                                          "tanggal_update" => "2021-10-09",
                                          "is_complete" => false
                                       ],
                                        [
                                             "indicator_id" => "3006",
                                             "name" => "Perencanaan Kas",
                                             "bobot" => 5,
                                             "tanggal_update" => "2021-10-09",
                                             "is_complete" => false
                                          ]
    ];

    for ($i=0; $i < count($ikpa_array); $i++) {
        # code...
        $ikpa=$ikpa_array[$i];

        $ikpa_val=array_values($ikpa);

        DB::table('ikpa_indicators')->insert([
            "id"=>$ikpa_val[0],
            "name"=>$ikpa_val[1],
            "bobot"=>$ikpa_val[2]
        ]);
    }


    }
}
