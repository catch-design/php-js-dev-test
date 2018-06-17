<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    public function company()
    {
        return $this->belongsTo(\App\Company::class,'company');
    }
    public function title()
    {
        return $this->belongsTo(\App\Title::class,'title');
    }
    public function city()
    {
        return $this->belongsTo(\App\City::class,'city');
    }
}
