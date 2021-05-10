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

        $csv_data="id,氏名, 好きな食べ物, お住まいの地域, パスワード"."\r\n";
      
        $d_q='"';
        $contacts=Contact::all();
        foreach ($contacts as $contact) {
            // IDの配列
            $csv_data.= $d_q . $contact->id . $d_q .",";
            $csv_data.= $d_q . $contact->name . $d_q .",";
            $csv_data.= $d_q . $contact->area . $d_q .",";
            $csv_data .= $d_q . $contact->login . $d_q  .",";
            $csv_data .= $d_q . $contact->password . $d_q  .","."\r\n";
        }
     
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
}