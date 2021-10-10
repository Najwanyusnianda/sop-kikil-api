<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SopList;

class DownloadFileController extends Controller
{
    //
    public function download($id)
{
    $sop = SopList::find($id);
    $temp_url='G:\APP_DEVELOPMENT\web\sop-kikil-api\storage\app\public\daftar_sop\1632279993_file-sample_150kB.pdf';
     //return response()->json($sop, 200);
    $pathToFile = $sop->file_url;

    //$pathToFile = storage_path('app/public/' . $url);

    return response()->download($pathToFile);
}
}
