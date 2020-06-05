<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'name','status','events_id','owner_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
//связь с сообщением один ко многим
    public function messages() {
        return $this->hasMany(Message::class);
    }
//получаем id event этой темы
    public function event()
    {
        return $this->belongsTo(Events::class);
    }

}
