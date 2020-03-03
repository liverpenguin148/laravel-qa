<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = ['title','body'];

    // 1対多の逆向きのリレーションを定義する
    // モデル名 belongsTo(クラス名)
    // Userモデル(1) 対 Questionモデル(多)の関係性ができる
    public function user(){
        return $this->belongsTo(User::class);
    }
}
