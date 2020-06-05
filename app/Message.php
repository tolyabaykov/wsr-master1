<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'message','user_id','theme_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
//получаем пользователя данного сообщения
    public function user()
    {
        return $this->belongsTo(User::class);
    }
//связь с ответом один ко многим
    public function answers()
    {
        return $this->hasMany(Answer::class, 'messages_id');
    }

//   public function addAnswer($body)
//    {
//$this->answers()->create(compact('body'));
//
//    }
}
