<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function Message()
    {
        return $this->belongsTo(Message::class);
    }
}
