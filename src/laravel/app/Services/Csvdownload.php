<?php

namespace App\Services;
use App\Model\Contact;


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
    public function download()
    {
        $contacts=Contact::all();
    
        $csv_data="氏名, 好きな食べ物, お住まいの地域, パスワード\r\n";
        $d_q='"';

        foreach($contacts as $k => $v){
           
            dump($contacts[2]);exit;
            // dd($v); exit;
        }
    
        

            //CSVダウンロード
            // $csv_name = date('Ymd-His') . '.csv';
            // header('Content-Type: text/csv');
            // header('Content-Disposition: attachment; filename=' . $csv_name);
            // mb_convert_encoding($this->csv_data, 'sjis-win', 'utf-8');
            // echo $csv_data;
            return $csv_data;
          
            // return $contact;
    }
}