<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    //ユーザー入力値を反映したくない属性を保護する
    //insertやcreateメソッドでテーブルのカラムに値を挿入する際（複数代入）、
    //予期せぬ代入を防ぐために、fillableがguardedを設定する
    // fillable ⇒ 複数代入時に代入を許可する属性を設定
    // guarded ⇒ 複数代入時に代入を許可しない属性を配列で設定
    protected $fillable = ['title','body'];

    // 1対多の逆向きのリレーションを定義する
    // モデル名 belongsTo(クラス名)
    // Userモデル(1) 対 Questionモデル(多)の関係性ができる
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value); //推薦
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans(); //1 Days ago表記
    }

    public function getUrlAttribute()
    {
        //Controllerのshowメソッドを呼ぶ。その際、idを引数とする。
        return '#';
    }

    public function getStatusAttribute()
    {
        if ($this->answers > 0) {
            if ($this->best_answered_id) {
                return "answered-accepted";
            }
            return "answered";
        }
        return "unanswered";
    }
}
