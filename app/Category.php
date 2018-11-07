<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function questions(){
        return $this->hasMany('App\Question');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d.m.Y H:i:s');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d.m.Y H:i:s');
    }

}
