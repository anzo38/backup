<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Contact;
use Illuminate\Support\Facades\Auth;
use App\Providers\DownloadServiceProvider;


class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth:web');
        // $this->middleware('guest')->except('logout');
    }

    public function member(\App\Services\Csvdownload $csvdownload) {
       
        $data = $csvdownload->download();
        return view('admin.member',['data'=> $data,]);
    }


    // public function download(Request $request) {
      
    //     app()->bind(\App\CsvDownload::class, function() {				
    //         return new \App\CsvDownload();				
    //     });	

    // }
        
}
