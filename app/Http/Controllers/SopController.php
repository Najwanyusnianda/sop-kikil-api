<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SopList;
use App\Models\SopTag;
use App\Models\Tags;
use Carbon\Carbon;
use DB;

class SopController extends Controller
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

    public function getListSop(){
        $sop_list=SopList::all();
        $sop_pluck= SopList::pluck('id');
       // dd($sop_pluck);
        $sop_tags=DB::table('sop_tags')->whereIn("sop_id",$sop_pluck)
        ->join('tags','sop_tags.tag_id','=','tags.id')
        ->select('sop_tags.sop_id','sop_tags.tag_id','tags.name','tags.description','tags.type')
        ->get();

        if($sop_list->isEmpty()){
            return response()->json([
                "status"=>$this->failed_status,
                "success"=>false,
              //  "data"=>$sop_list
            ],400);
        }else{
            return response()->json([
                "status"=>$this->success_status,
                "success"=>true,
                "count"=>count($sop_list),
                "data"=>[
                    "sop_list"=>$sop_list,
                    "tags_list"=>$sop_tags
                ]
            ],200);
        }
    }

    public function getSelectedSopDetail($sop_id){
        $sop=SopList::where('id',$sop_id)->first();
        $sop_tag=SopTag::where('sop_id',$sop->id)->join('tags','sop_tags.tag_id','=','tags.id')
        ->select('sop_tags.sop_id','sop_tags.tag_id','tags.name','tags.type','tags.description')
        ->get();
        $sop_collect=$sop->setAttribute( "tags",$sop_tag);
        if(!empty($sop)){
            return response()->json([
            "status"=>$this->success_status,
                "success"=>true,
                "data"=>$sop_collect
            ],200);
        }else {
            return response()->json([
                "status"=>$this->failed_status,
                "success"=>false,
                "message" => "data tidak ditemukan"

            ],402);
        }

    }

    public function filterTypeSop($type){

        $sop_list=SopList::where('type',$type)->get();
        $sop_pluck= SopList::where('type',$type)->pluck('id');
       // dd($sop_pluck);
        $sop_tags=DB::table('sop_tags')->whereIn("sop_id",$sop_pluck)
        ->join('tags','sop_tags.tag_id','=','tags.id')
        ->select('sop_tags.sop_id','sop_tags.tag_id','tags.name','tags.description','tags.type')
        ->get();

        if($sop_list->isEmpty()){
            return response()->json([
                "status"=>$this->failed_status,
                "success"=>false,
              //  "data"=>$sop_list
            ],400);
        }else{
            return response()->json([
                "status"=>$this->success_status,
                "success"=>true,
                "count"=>count($sop_list),
                "data"=>[
                    "sop_list"=>$sop_list,
                    "tags_list"=>$sop_tags
                ]
            ],200);
        }

    }


    public function searchSop($keyword){
        $sop_filtered=SopList::where('title','like','%'.$keyword.'%')->get();
        if($sop_filtered->isEmpty()){
            return response()->json([
                "status"=>$this->failed_status,
                "success"=>false,
                "keyword"=>$keyword,
                "message" => "hasil pencarian kata : '".$keyword."' pencarian tidak ditemukan"

            ],200);
        }else{
            return response()->json([
                "status"=>$this->success_status,
                "success"=>true,
                "keyword"=>$keyword,
                "count"=>count($sop_filtered),
                "data"=>$sop_filtered
        ],200);
        }
    }

    public function filterRoleSop($role_tag){
        $sop_tag=SopTag::where('name',$roletag)->pluck('sop_id');

        $sop_filtered=DB::table('sop_lists')->whereIn('role',$sop_tag)->get();
        if($sop_filtered->isEmpty()){
            return response()->json([
                "status"=>$this->failed_status,
                "success"=>false,
                "keyword"=>$role_tag,
                "message" => "hasil pencarian untuk pengguna : '".$role_tag."' pencarian tidak ditemukan"

            ],200);
        }else{
            return response()->json([
                "status"=>$this->success_status,
                "success"=>true,
                "keyword"=>$$role_tag,
                "count"=>count($sop_filtered),
                "data"=>$sop_filtered
        ],200);
        }
    }

    public function storeSop(Request $request){
        //return response()->json($request);
        $time=Carbon::now()->timestamp;

       //return  response()->json($request->file('sop_file'), 200);
        $uploaded_file=$request->file('sop_file');
        //validate file mime


        //file valid then..
        if($uploaded_file){

            $fileName=$time.'_'.$uploaded_file->getClientOriginalName();
            $path=$uploaded_file->storeAs('daftar_sop',$fileName,'public');
            $fullpath=storage_path('app/public/'.$path);
            $sop=SopList::create([
                "title"=>$request->title,
                "file_url"=>$fullpath,
                "type"=>$request->type,
               // "word_tag"=>$request->world_tags ?? '',
                //"role_tag"=>$request->role_tags,
                "description"=>$request->description,


            ]);
           // return  response()->json($request->tags_id, 200);
            //insert pivot soptags table
            $tags_id=$request->tags_id;

            $tags = explode (",", $tags_id);

            if(count($tags) >0){
                foreach ($tags as $key=>$tag) {

                $sop_tags=SopTag::create([
                "sop_id"=>$sop->id,
                "tag_id"=>(int)$tag
                ]);
            }
            return response()->json([
                "status"=>$this->success_status,
                "success"=>true,
                "data"=>$sop
            ], 200);
            }





        }else{
            return response()->json([
                "status"=>$this->failed_status,
                "success"=>false,
                "message" => "sop tidak diberhasil ditambahkan"

            ],400);
        }
    }

    public function updateSop(Request $request)
    {
       // dd($request);
       // return response()->json($request);
        $time=Carbon::now()->timestamp;
        $sop=SopList::where('id',$request->id)->first();

        if(empty($sop)){
            return response()->json([
                "status"=>$this->failed_status,
                "success"=>false,
                "message" => "sop tidak ditemukan",


            ],400);
        }else{
            $uploaded_file=$request->file('sop_file');
            $fileName=$time.'_'.$uploaded_file->getClientOriginalName();
            $path=$uploaded_file->storeAs('daftar_sop',$fileName,'public');
            $fullpath=storage_path('app/public/'.$path);
            $sop->update([
                "title"=>$request->title,
                "file_url"=>$fullpath,
                "description"=>$request->description,
            ]);

        ///tags

            $sop_tag=SopTag::where('sop_id',$sop->id)->delete();
            //insert pivot soptags table
            $tags_id=$request->tags_id;

            $tags = explode (",", $tags_id);
            foreach($tags as $tag) {

                $sop_tags = SopTag::create([
                    "sop_id" => $sop->id,
                    "tag_id" => (int) $tag
                ]);
            }
            return response()->json([
                "status"=>$this->success_status,
                "success"=>true,
                "data"=>$sop
            ],200);
        }
    }

    public function deleteSop($sop_id){
        $is_delete_sop=SopList::where('id',$sop_id)->delete();
        return response()->json($is_delete_sop);
        if($is_delete_sop){
            return response()->json([
                "status"=>$this->success_status,
                "success"=>true,
                "message" => "sop berhasil dihapus"
            ],200);
        }else {
            return response()->json([
                "status"=>$this->failed_status,
                "success"=>false,
                "message" => "sop tidak ditemukan",


            ],400);
        }
    }




}
