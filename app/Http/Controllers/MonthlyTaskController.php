<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MonthlyIndicator;
use App\Models\MonthlyProgress;
use Carbon\Carbon;

class MonthlyTaskController extends Controller
{
    //
    private $success_code=200;
    private $success_status="berhasil";
    private $success_message="";

    private $failed_code=500;
    private $failed_status="gagal";
    private $failed_message="";

        //private $user_id= auth('sanctum')->user()->id ?? 1;
        private $user_id= 1;

    public function getMonthlyTasks($month_num){
        //$now=Carbon::now();

       // $current_month=$now->month

        $data=MonthlyProgress::where('month_num',$month_num)->get();

        if($data->isEmpty()){
            $this->createMonthlyFrame($month_num);
            $data=MonthlyProgress::where('month_num',$month_num)->get();
            return response()->json([
                    "status"=>$this->success_status,
                    "success"=>true,
                    "data"=>$data
            ],200);
        }else{
            return response()->json([
                    "status"=>$this->success_status,
                    "success"=>true,
                    "data"=>$data
                ],200);
        }
    }

    //task_id == increment id in monthy progress
    public function getSelectedIndicator($task_id){
        $task=MonthlyProgress::where('id',$task_id)->first();

        if(empty($task)){
            return response()->json([
            "status"=>$this->failed_status,
            "success"=>false,
            "message"=>"data tidak dapat ditemukan"
        ],204);
        }else{
            return response()->json([
                    "status"=>$this->success_status,
                    "success"=>true,
                    "data"=>$task

                ],200);
        }

    }

    public function createMonthlyFrame($month_num){
        //ambil semua daftar indikator
        $monthly_frame=MonthlyIndicator::all();
        $now=Carbon::now();

       $current_year=$now->year;


        foreach ($monthly_frame as $key => $indicator) {

            $date_start=$current_year.'-'.$month_num.'-'.$indicator->start_day;
            $date_end=$current_year.'-'.$month_num.'-'.$indicator->end_day;

            MonthlyProgress::create([
                'indicator_id'=>$indicator->id,
                'name'=>$indicator->name,
                'month_num'=>$month_num,
                'start_date'=>$date_start,
                'end_date'=>$date_end,

        ]);
        }

    }


    public function updateMonthlyTaskProgress(Request $request){
        //var=status,completed_date,note
       // return response()->json($request, 200);
        $task_indicator = MonthlyProgress::where('id',$request->id)
        ->first();

        if(empty($task_indicator)){
            return response()->json([
            "status"=>$this->failed_status,
            "success"=>false,
            "message"=>"data tidak dapat ditemukan"

        ],204);
        }else{

            //validasi data...

            //update data pada db
            $task_indicator->update([

                "is_complete"=>$request->status,
                "completed_date"=>$request->completed_date,
                "note"=>$request->note ?? '',
                "user_id"=>$this->user_id,


            ]);

                return response()->json([
                    "status"=>$this->success_status,
                    "success"=>true,
                    "message"=>"berhasil diperbarui",
                    "data"=>$task_indicator

                ],200);

        }
    }
}
