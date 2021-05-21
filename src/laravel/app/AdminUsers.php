<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AdminUsers extends Authenticatable
{
   
   
    use Notifiable;
    
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
    
    public $table = 'admin_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function getAuthPassword() // これを追記
    {
        return $this->password; // 対象のカラム名に
    }
}
