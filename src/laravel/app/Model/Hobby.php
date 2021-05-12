<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Contact;

class Hobby extends Model
{
         /**
     * タイムスタンプ無効
     */
    public $timestamps = false;

    /**
     * 自動更新日付無効
     */
    const UPDATED_AT = null;

    /**
     * 自動作成日付無効
     */
    const CREATED_AT = null;


    protected $table = 'hobbys';
    // protected $primaryKey = 'contacts_id';
    public function __construct(array $attributes = []) {
        // if($data != null){

        //     $this->fill($data);
        // }
        $this->attributes = [
            'contact_id' =>"",
            'hobby' =>"",

        ];

        $this->fillable = [
            'contact_id',
            'hobby',

        ];
        parent::__construct($attributes);
    }

    public function contacts()
    {
        return $this->belongsTo('App\Model\Contact');
    }
}
