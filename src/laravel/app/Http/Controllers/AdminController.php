<?php

namespace App\Http\Controllers;



use App\Services\Csvdownload;

class AdminController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth:web');
        // $this->middleware('guest')->except('logout');

    }

    

    // public function member(\App\Services\Csvdownload $csvdownload) {
    //     $contact_id =$csvdownload->getContactTableId();
       
    //     return view('admin.member',['contact_id'=> $contact_id]);
    // }
    // メソッドインジェクション?
    public function member(Csvdownload $csvdownload) {
        $contact_id =$csvdownload->getContactTableId();
       
        return view('admin.member',['contact_id'=> $contact_id]);
    }
    

    public function downloads($id,Csvdownload $csvdownload){
        // dd($id);exit;
        $conrtact_id = $id;
        $data = $csvdownload->download($conrtact_id);
        // dd($id);
        
        // return view('admin.downloads',['data'=> $data,]);

    }


        
}
