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

        $csv_data="id,氏名,好きな食べ物, お住まいの地域, ログインID,パスワード"."\r\n";
        // $contact_id=$id;
        // $item = Contact::find($contact_id);
        $contacts=Contact::select('id')->with('hobby')->get()->toarray(); 
        $d_q='"';
        $empty="空";
        // $contacts=Contact::select('id')->with('hobby')->get()->toarray(); 
        // $contacts=Contact::with('hobbys:hobby,contact_id')->get()->toarray();
        
        
    //    dd($item);exit;
    
    //    dd($contacts);exit;
    // foreach ($contacts as $r =>$e){
    //     foreach($e as $f=>$m){
    //         $m['hobbys'];
    //         dd( $m['hobbys']);exit;
    //         if( $e['hobbys'][0]['contact_id'] == $e['id']){
              
    //                return $csv_data.= $d_q .  $e['hobbys'][0]['hobby'] . $d_q .",";
    //             }
    //     }
      
    //       }
    // dd($csv_data);exit;
    // echo $b;exit;
    //    dd($m);exit;
        foreach ($contacts as $k => $v) {
      
            $csv_data.= $d_q .  $v['id'] . $d_q .",";
            $csv_data.= $d_q .  $v['name'] . $d_q .",";
            
           foreach( $v['hobbys'] as $o => $c){
          
               $csv_data.= $d_q .  $c['hobby'] . $d_q .","."\r\n";
               if(empty($c['hobby'])){
                $csv_data.= $d_q .   $empty . $d_q .",";
                break;
               }
            //    break;
           }
          
              
            
            $csv_data.= $d_q .  $v['food'] . $d_q .",";
            $csv_data.= $d_q .  $v['area'] . $d_q .",";
            $csv_data.= $d_q .  $v['login'] . $d_q .",";
            $csv_data.= $d_q .  $v['password'] . $d_q .","."\r\n";
            // $csv_data.= $d_q .  $v['hobbys']['hobby'] . $d_q .",
            
        
                // foreach($contact as $e =>$d){
                //     if($f=="hobby"){
                //         $csv_data.= $d_q . $contact . $d_q .","."\r\n";
                //     }
                

                // }
      
            
           
            // $csv_data.= $d_q . $contact->name . $d_q .",";
           
          
            // $csv_data.= $d_q . $contact->contact_id . $d_q .",";
            // $csv_data.= $d_q . $contact->food . $d_q .",";
            // $csv_data.= $d_q . $contact->area . $d_q .",";
            // $csv_data .= $d_q . $contact->login . $d_q  .",";
            // $csv_data .= $d_q . $contact->password . $d_q  .","."\r\n";
        
        }
        // $contacts=Hobby::all();
        // foreach($contacts as $contact){
        //     $csv_data .= $d_q . $contact->password . $d_q  .","."\r\n";
        // }
     
    //    dd ($csv_data);exit;
      

    // return $csv_data;

        // }

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