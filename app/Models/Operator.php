<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    public function partners()
    {
        return $this->hasMany('App\Models\Partner');
    }

    public function ressources()
    {
        return $this->hasMany('App\Models\Ressource');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
