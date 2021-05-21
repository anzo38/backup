<?php

namespace App\Services;
use App\Model\Contact;
use App\Model\Hobby;

// use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\Config;


class  CsvDownload
{
    public function __construct()
    {
    }

    /**
     * CSVダウンロード
     * @param array $list
     * @param array $header
     * @param string $filename
     * @return \Illuminate\Http\Response
     */


    // contactsテーブルのID（$contact_id）ごとの行をCSVで取得する
    public function download($contact_id)
    { 
       
        $csv_data="id,氏名,趣味,好きな食べ物,お住まいの地域,ログインID,パスワード"."\r\n";
        $d_q='"';
        // 文字への変換（↓はフロントの確認画面の際も必要、どうしたらいいか）

        // 文字への変換

        $convert_hobby= config('const.form.hobby');
        $convert_food= config('const.form.food');
        $convert_area= config('const.form.area');
        // // DBから値を取得
        $contacts_table = Contact::find($contact_id)->toarray();
        $hobbys_table= Hobby::where('contact_id',$contact_id)->get();
        
        // $contacts=Contact::select('id')->with('hobby')->get()->toarray(); 
        // $contacts_table=Contact::with('hobbys:hobby,contact_id')->get()->toarray();
      
        // contactsテーブルの1行を取得
        foreach ($contacts_table as $k => $v) {
            // dd($k);exit;
            if($k == 'id'){
                $id=  $v;
            }
            if($k == 'name'){
                $name=  $v;
            }
            if($k == 'food'){
                $food=  $v;
            }
            if($k == 'area'){
                $area=  $v;
            }
            if($k == 'login'){
                $login=  $v;
            }
            if($k == 'password'){
                $password=  $v;
            }
       
        }
        // hobbysテーブルから値（配列）を取得
        foreach($hobbys_table as $k => $v){
            $hobbys[]= $convert_hobby[$v['hobby']];
        }
        // 文字列へ変換
        $hobbys_value=implode(',', $hobbys);

        $csv_data.= $d_q .  $id. $d_q .",";
        $csv_data.= $d_q .  $name. $d_q .",";
        $csv_data.= $d_q . $hobbys_value . $d_q .",";
        $csv_data.= $d_q .  $convert_food[$food] . $d_q .",";
        $csv_data.= $d_q .   $convert_area[$area] . $d_q .",";
        $csv_data.= $d_q .  $login . $d_q .",";
        $csv_data.= $d_q .  $password . $d_q .","."\r\n";  
       
            //CSVダウンロード
            $csv_name = date('Ymd-His') . '.csv';
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename=' . $csv_name);
            mb_convert_encoding($csv_data, 'sjis-win', 'utf-8');
            echo $csv_data;
            return $csv_data;
          
           
    }

    public function getContactTableId(){
        $contact_id = Contact::select('id')->get();
        return $contact_id;
    }
  
   

}