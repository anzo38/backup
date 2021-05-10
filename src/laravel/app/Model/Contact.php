<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
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

    //モデルのQuestion群が保存されている配列
    private $hobby = [];





    protected $table = 'contacts';
    // protected $primaryKey = 'contacts_id';
    public function __construct(array $attributes = []) {



        $this->attributes = [
            'name' =>"",
            'food' =>"",
            // 'hobby' =>"",
            'area' =>"",
            'login' => "",
            'password' => "",
        ];

        $this->fillable = [
            'name',
            'food',
            // 'hobby',
            'area',
            'login',
            'password',
        ];
        parent::__construct($attributes);
    }

    public function hobbys()
    {
        return $this->hasMany('App\Model\Hobby','contact_id');
    }

    public function setHobbys(Array $hobbys){
        $this->hobbys = $hobbys;
    }

    public function getHobbys():Array{
        return $this->hobbys;
    }

}
