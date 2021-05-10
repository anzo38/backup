<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\InputRequest;
use App\Http\Requests\SignUpRequest;
use App\Model\Contact;
use App\Model\Hobby;
// use App\Question as AppQuestion;
use App\Mail\CotactMail;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Question\Question as QuestionQuestion;

class ContactController extends Controller
{


    public function input(Request $request)
    {
        $inquiry = new Contact();
        // $hobbys = new Hobby();
        // $hobbys->fill([
        //     'hobby' => $request->hobby,
        //     ]);

        $inquiry->fill([
        'name' => $request->name,
        // 'hobby'=> $request->hobby,
        'food'=> $request->food,
        'area' => $request->area,
        'login' => $request->login,
        'password' => $request->password,

        ]);

        // questionの要素数モデルQuestionを要素数分newしてsabveManyする
        $inquiry->setHobbys($this->initHobby($request));
    //    if($request){
    //     $hobbys = array_fill(0,4, new Hobby);
    //     $inquiry->hobby = $hobbys;
    //     $data['inquiry'] = $inquiry;

    //    }

        // $hobbys = new Hobby();
        // $hobbys->fill([
        //     'hobby' => $request->hobby,
        //     ]);

// questionの要素数モデルQuestionを要素数分newしてsabveManyする
        // foreach($request->hobby as $i =>$v){
        //     $hobbys = new Hobby(['hobby' => $v]);
        //     $hobbys[] = $hobbys;
        // }


        // $questions = $question->fill($request->all());
        // Configはパラメーターに渡さなくていいs
        // $test = config('form.question');

        return view('contact.input',['inquiry'=> $inquiry,]);
    }

    public function confirm(InputRequest $request){
        $inquiry = new Contact();

        $inquiry->fill([
        'name' => $request->name,
        // 'hobby'=> $request->hobby,
        'food'=> $request->food,
        'area' => $request->area,
        'login' => $request->login,
        'password' => $request->password,
        ]);

        $hobbys = new Hobby();
        $hobbys->fill(['hobby' => $request->hobby,]);
//  questionの要素数モデルQuestionを要素数分newしてsabveManyする
        // foreach($request->hobby as $i =>$v){
        //     $question = new Hobby(['question' => $v]);
        //     $questions[] = $question;
        // }
        // $inquiry->setHobbys($this->initHobby($request));
    //    if($request){
    //     $hobbys = array_fill(0,4, new Hobby);
    //     $inquiry->hobby = $hobbys;
    //     $data['inquiry'] = $inquiry;

    //    }



        // $inquiry->setQuestions($this->initQuestion($request));
            // $question = new Question();
            // $question->fill(['question'=>$request->question]);
            // $questions = [];
            // $ary_questions = Request::only('questions');
            // foreach($ary_questions as $i => $ary_question) {
            //     $question = new Paragraph;
            //     $question->fill($ary_question);
            //     $questions[] = $question;
            // }
            // $inquiry->questions()->saveMany($paragraphs);
        // $question =fill(['question' => $request->question]);
        // $b = new Question(["question"=>"チキショー"]);
        // $a->fill(["question"=>"バーロ"]);
        // $b->fill(["question"=>"チキショー"]);
        // $question->fill(['contact_id'=>3,'question'=>'てやんでい']);
        // $inquiry->questions()->saveMany([
        //     // new App\Model\Question(['contact_id' => '4']),
        //     $a,
        //     $b,
        // ]);



        return view('contact.confirm',['inquiry'=> $inquiry,'hobbys'=>$hobbys]);
    }
    public function complete(Request $request){
        $inquiry = new Contact();

        $inquiry->fill([
        'name' => $request->name,
        // 'hobby'=> $request->hobby,
        'food'=> $request->food,
        'area' => $request->area,
        'login' => $request->login,
        'password' => $request->password,
        ]);
        $inquiry->save(); 
        $hobbys=[];
        // var_dump($request->hobby);exit;
        foreach($request->hobby as $i =>$v){
            $hobbys[] = array_push($hobbys,new Hobby(['hobby' => $v]));
        }
        dd($hobbys);exit;
        $inquiry->hobbys()->saveMany($hobbys);
        // $hobbys = new Hobby();
        // $hobbys->fill([
        //     'contact' => $
        //     'hobby' => $request->hobby,]);

        return view('contact.confirm',['inquiry'=> $inquiry]);

    }




    private function initHobby($request){
        $hobbys=[];
        if ($request->hobby  != null && is_array($request->hobby )){
            foreach($request->hobby as $k => $v){
                array_push($hobbys,new Hobby(['form_id'=>$k ,'hobby' => $v]));
            }
        }

        return $hobbys;
    }


}