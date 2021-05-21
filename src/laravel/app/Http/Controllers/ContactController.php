<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\InputRequest;
use App\Model\Contact;
use App\Model\Hobby;


class ContactController extends Controller
{

    // 入力画面
    public function input(Request $request)
    {
        $inquiry = new Contact();
        $inquiry->fill([
        'name' => $request->name,
        'hobby'=> $request->hobby,
        'food'=> $request->food,
        'area' => $request->area,
        'login' => $request->login,
        'password' => $request->password,
        ]);

        $inquiry->setHobbys($this->initHobby($request));

        return view('contact.input',['inquiry'=> $inquiry,]);
    }

    public function confirm(InputRequest $request){
        $inquiry = new Contact();

        $inquiry->fill([
        'name' => $request->name,
        'hobby'=> $request->hobby,
        'food'=> $request->food,
        'area' => $request->area,
        'login' => $request->login,
        'password' => $request->password,
        ]);


        $inquiry->setHobbys($this->initHobby($request));
        
        return view('contact.confirm',['inquiry'=> $inquiry,]);
    }

    
    public function complete(Request $request){
        $inquiry = new Contact();
        $inquiry->fill([
        'name' => $request->name,
        'hobby'=> $request->hobby,
        'food'=> $request->food,
        'area' => $request->area,
        'login' => $request->login,
        'password' => $request->password,
        ]);
        // hobbyは別テーブルで管理するのでunsetしDBへ保存
        unset($inquiry->hobby);
        $inquiry->save(); 

        $hobbys=[];
        foreach($request->hobby as $i =>$v){
            // $hobbys[] = array_push($hobbys,new Hobby(['hobby' => $v]));
            $hobbys[] =new Hobby(['hobby' => $v]);
        }
      
        $inquiry->hobbys()->saveMany($hobbys);

        return view('contact.complete',['inquiry'=> $inquiry]);

    }




    private function initHobby(Request $request){
        $hobbys=[];
        if ($request->hobby != null && is_array($request->hobby)){
            foreach($request->hobby as $k => $v){
                array_push($hobbys,new Hobby(['form_id'=>$k ,'hobby' => $v]));
                // $hobbys=new Hobby(['hobby' => $v]);
            }
        }

        return $hobbys;
    }

   


}