<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\IkpaMonthly;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;

class IkpaMonthlyImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    protected $month_id;

    function __construct($id) {
        $this->month_id = $id;
    }
    public function headingRow():int
    {
        return 4;
    }
    public function collection(Collection $collection)
    {
        //
    
       //dd($collection);
        $revisi_dipa="revisi_dipa";
        $devasi_halaman_iii="deviasi_halaman_iii_dipa";
        $pagu_minus="pagu_minus";
        $data_kontrak="data_kontrak";
        $pengelolaan_up_tup="pengelolaan_up_dan_tup";
        $lpj_bendahara="lpj_bendahara";
        $dispensasi_spm="dispensasi_spm";
        $penyerapan_anggaran="penyerapan_anggaran";
        $penyelesaian_tagihan="penyelesaian_tagihan";
        $capaian_output="capaian_output";
        $retur_sp2d="retur_sp2d";
        $renkas="renkas";
        $kesalahan_spm="kesalahan_spm";

        //dd($this->month_id);

        $val_collection= $collection[0];
        $final_val_collection =$collection[2];

        $month_temp=4;
        DB::table('ikpa_monthlies')->insert([
            ['ikpa_id' => 1001, 'month_num' => $month_temp,'value'=>$val_collection[$revisi_dipa],
            'final_value'=>$final_val_collection[$revisi_dipa]],
            ['ikpa_id' => 1002, 'month_num' => $month_temp,'value'=>$val_collection[$devasi_halaman_iii],
            'final_value'=>$final_val_collection[$devasi_halaman_iii]],
            ['ikpa_id' => 1003, 'month_num' => $month_temp,'value'=>$val_collection[$pagu_minus],
            'final_value'=>$final_val_collection[$pagu_minus]],
            ['ikpa_id' => 2001, 'month_num' => $month_temp,'value'=>$val_collection[$data_kontrak],
            'final_value'=>$final_val_collection[$data_kontrak]],
            ['ikpa_id' => 2002, 'month_num' => $month_temp,'value'=>$val_collection[$pengelolaan_up_tup],
            'final_value'=>$final_val_collection[$pengelolaan_up_tup]],
            ['ikpa_id' => 2003, 'month_num' => $month_temp,'value'=>$val_collection[$lpj_bendahara],
            'final_value'=>$final_val_collection[$lpj_bendahara]],
            ['ikpa_id' => 2004, 'month_num' => $month_temp,'value'=>$val_collection[$dispensasi_spm],
            'final_value'=>$final_val_collection[$dispensasi_spm]],
            ['ikpa_id' => 3001, 'month_num' => $month_temp,'value'=>$val_collection[$penyerapan_anggaran],
            'final_value'=>$final_val_collection[$penyerapan_anggaran]],
            ['ikpa_id' => 3002, 'month_num' => $month_temp,'value'=>$val_collection[$penyelesaian_tagihan],
            'final_value'=>$final_val_collection[$penyelesaian_tagihan]],
            ['ikpa_id' => 3003, 'month_num' => $month_temp,'value'=>$val_collection[$capaian_output],
            'final_value'=>$final_val_collection[$capaian_output]],
            ['ikpa_id' => 3004, 'month_num' => $month_temp,'value'=>$val_collection[$retur_sp2d],
            'final_value'=>$final_val_collection[$retur_sp2d]],
            ['ikpa_id' => 3005, 'month_num' => $month_temp,'value'=>$val_collection[$kesalahan_spm],
            'final_value'=>$final_val_collection[$kesalahan_spm]],
            ['ikpa_id' => 3006, 'month_num' => $month_temp,'value'=>$val_collection[$renkas],
            'final_value'=>$final_val_collection[$renkas]],
           
        ]);

        return response()->json([
            "status"=> "berhasil",
            "success"=>true
        ], 200);

    }
}
