<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pok;
use App\Imports\PokImport;
use Excel;

class DipaController extends Controller
{
    //

    public function uploadPok(Request $request){
        $uploaded_file=$request->file("dipa_file");

        if($uploaded_file){
            $filename=$uploaded_file->getClientOriginalName();
            $path = $uploaded_file->storeAs('dipa',$filename,'public');

            $file_path =storage_path('app/public/'.$path);
            $import_pok = Excel::import(new PokImport,$file_path);

        }


    }
}
