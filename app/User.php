<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

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
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function questions(){
        // 1対多の関係性を定義
        // また、questionsテーブルに対する外部キーは「モデル名_id」が想定される
        // 今回はuser_idが外部キーとなる。
        return $this->hasMany(Question::class); //Userモデル(1) 対 Questionモデル(多)の関係性
    }

    // public function setTitleAttribute($value){
    //     $this->attributes['title'] = $value;
    //     /* str_slugとは
    //     * *指定された文字列から、URLフレンドリーな「スラグ」を生成する
    //     ** $slug = str_slug('Laravel 5 Framework', '-');
    //     ** ⇒ laravel-5-framework
    //     */

    //     //$this->attributes['slug'] = str_slug($value); //非推薦(laravel/helpers packageのインストールが必要)
    //     //コマンド composer require laravel/helpers

    //     $this->attributes['slug'] = Str::slug($value); //推薦
    // }
}
