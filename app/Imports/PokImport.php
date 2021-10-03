<?php

namespace App\Imports;

use App\Models\Pok;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use Maatwebsite\Excel\Concerns\WithHeadingRow;


class PokImport implements ToCollection,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $kode_program="";
    private $kode_kegiatan="";

    public function headingRow():int
    {
        return 3;
    }

    public function collection(Collection $rows)
    {

        foreach($rows as $row) {
            # code...

            $kode = $row['kode'];
            $deskripsi = $row['deskripsi'];
            $volume = $row['volume'];
            $harga_satuan = $row['harga_satuan'];
            $jumlah_biaya = $row['jumlah_biaya'];

            $program_pattern = "/^'[0-9]{3}.[0-9]{2}.\D{2}$/";
            $kegiatan_pattern = "/^[0-9]{4}$/";
            $kro_pattern="/^[0-9]{4}.\D{3,4}$/";

            $is_program = preg_match($program_pattern, $kode);


            if (!$is_program) {

                if (!empty($this->kode_program)) {
                   // dd($is_kro);
                   $is_kegiatan=preg_match($kegiatan_pattern,$kode);
                    if(!$is_kegiatan){
                        $is_kro=preg_match($kro_pattern,$kode);
                        dd($is_kro);
                    }else{
                        //insert kode kegiatan
                        $this->kode_kegiatan =$kode;
                        $pok=Pok::create([
                            "kode_kegiatan" =>$kode
                    ]);
                    }
                }

            } else {
                $this->kode_program = $kode;
                //next--> insert to database
                continue;
            }
        }

        /*return new Pok([
            //

        ]);*/
    }
}
