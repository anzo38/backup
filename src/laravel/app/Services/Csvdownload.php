<?php

namespace App\Services;
use App\Model\Contact;
use App\Model\Hobby;

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


    
    public function download($contact_id)
    {

        $csv_data="id,氏名,趣味,好きな食べ物,お住まいの地域,ログインID,パスワード"."\r\n";
        // $contact_id=$id;
        // $item = Contact::find($contact_id);
        // $contacts=Contact::select('id')->with('hobby')->get()->toarray(); 
        $d_q='"';
        $empty="空";
        
        // $contacts=Contact::select('id')->with('hobby')->get()->toarray(); 
        $contacts=Contact::with('hobbys:hobby,contact_id')->get()->toarray();
        
//    dd($contacts);exit;
        foreach ($contacts as $k => $v) {
      
            $csv_data.= $d_q .  $v['id'] . $d_q .",";
            $csv_data.= $d_q .  $v['name'] . $d_q .",";
            
            dd($v['hobbys']);exit;
              
            foreach( $v['hobbys'] as $o => $c){
              if($c==[]){
                    $c[]=$c['hobby']['hobby'];
                    $csv_data.= $d_q .  $c . $d_q .",";
                }
             
                $csv_data.= $d_q .  $c['hobby']['hobby'] . $d_q .",";
                dd($c['hobby']);
                }
             
            $csv_data.= $d_q .  $v['food'] . $d_q .",";
            $csv_data.= $d_q .  $v['area'] . $d_q .",";
            $csv_data.= $d_q .  $v['login'] . $d_q .",";

        
            $csv_data.= $d_q .  $v['password'] . $d_q .","."\r\n";
            // $csv_data.= $d_q .  $v['hobbys']['hobby'] . $d_q .",
            
        
        
        }
      

            //CSVダウンロード
            $csv_name = date('Ymd-His') . '.csv';
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename=' . $csv_name);
            mb_convert_encoding($csv_data, 'sjis-win', 'utf-8');
            echo $csv_data;
            return $csv_data;
          
            // return $contact;
    }

    public function getContactTableId(){
        $contact_id = Contact::select('id')->get();
        return $contact_id;
    }
  
}