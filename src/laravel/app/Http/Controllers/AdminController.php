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
        // $data = $this->app->make(\App\Services\CsvDownload::class);
        $data = $csvdownload->download();
       dd( $data);
        // if(Auth::guard('gust')->attempt( ['email'=>$request['email'],
        //     'password'=>$request['password']] ) )
        // {
        //     #繊維したいページを指定。
        //     return redirect()->route('admin');
        // }
 
        #繊維したいページを指定。
        // return redirect()->route('admin_login');

        // $contact = (new Contact())->fill($request->all());
        // $contacts=Contact::all();
        // $contact=Contact::all();
        // dd($contacts);exit;
        // if(Auth::check()){
        //         //    $this->redirect();
        //         return view('admin.member');
               
        
                
        //         }else{
        
        //             return view('admin.login');
        //         }
              
    
        return view('admin.member',['data'=> $data,]);
    }


    // public function download(Request $request) {
      
    //     app()->bind(\App\CsvDownload::class, function() {				
    //         return new \App\CsvDownload();				
    //     });	

    // }
        
}
