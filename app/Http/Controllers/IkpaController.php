<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IkpaMonthly;
use App\Imports\IkpaMonthlyImport;
use Excel;

class IkpaController extends Controller
{
    //
    private $success_code=200;
    private $success_status="berhasil";
    private $success_message="";

    private $failed_code=500;
    private $failed_status="gagal";
    private $failed_message="";
    public function uploadIkpaMonth(Request $request){
        $uploaded_file=$request->file("ikpa_file");

        if($uploaded_file){
            $filename=$uploaded_file->getClientOriginalName();
            $path = $uploaded_file->storeAs('ikpa',$filename,'public');

            $file_path =storage_path('app/public/'.$path);
            $import_ikpa = Excel::import(new IkpaMonthlyImport($request->month_id),$file_path);
            return response()->json([
                "status"=>$this->success_status,
                "success"=>true,
                "data"=>$import_ikpa
            ], 200);
        }
    }

    public function getUniqueMonth(){
        $ikpa_monthly = IkpaMonthly::distinct()->get(['month_num']);
        return response()->json([
            "status"=>$this->success_status,
            "success"=>true,
            "data"=>$ikpa_monthly
        ], 200);
    }

    public function getIndicatorSeries($indicator_id){
        $ikpa_series=IkpaMonthly::where('ikpa_monthlies.ikpa_id',$indicator_id)
        ->join('ikpa_indicators','ikpa_monthlies.ikpa_id','=','ikpa_indicators.id')
        ->select('ikpa_monthlies.*','ikpa_indicators.name AS name','ikpa_indicators.description AS description')
        ->get();

        if($ikpa_series->isNotEmpty()){
            return response()->json([
                "status"=>$this->success_status,
                "success"=>true,
                //"count"=>count($sop_list),
                "data"=>$ikpa_series
            ],200);
        }else{
            return response()->json([
                "status"=>$this->failed_status,
                "success"=>false,
              //  "data"=>$sop_list
            ],400);

            
        }
    }

    public function getMonthlyIndicators($month_num){
        $ikpa_monthly=IkpaMonthly::where('ikpa_monthlies.month_num',$month_num)
        ->join('ikpa_indicators','ikpa_monthlies.ikpa_id','=','ikpa_indicators.id')
        ->select('ikpa_monthlies.*','ikpa_indicators.name AS name','ikpa_indicators.description AS description')
        ->get();

        if($ikpa_monthly->isNotEmpty()){
            return response()->json([
                "status"=>$this->success_status,
                "success"=>true,
                //"count"=>count($sop_list),
                "data"=>$ikpa_monthly
            ],200);
        }else{
            return response()->json([
                "status"=>$this->failed_status,
                "success"=>false,
              //  "data"=>$sop_list
            ],400);

            
        }
    }

    public function getAggregateSeries(){ //nilai rata2 seluruh indikator tiap bulan
            //nilai total akhir/konversi = total nilai akhir / konversi bobot
            //total nilai akhir = jumlah nilai akhir seluruh indikator pada bulan tertentu
            //bobot = total bobot dimana nilai akhir tidak sama dengan 0
    }
}
