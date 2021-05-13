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
        $contact_id =$csvdownload->getContactTableId();
       
        return view('admin.member',['contact_id'=> $contact_id]);
    }
    

    public function downloads($id, \App\Services\Csvdownload $csvdownload){
        // dd($id);exit;
        $conrtact_id = $id;
        $data = $csvdownload->download($conrtact_id);
        dd($id);
        
        // return view('admin.downloads',['data'=> $data,]);

    }

    // public function download(Request $request) {
      
    //     app()->bind(\App\CsvDownload::class, function() {				
    //         return new \App\CsvDownload();				
    //     });	

    // }
        
}
