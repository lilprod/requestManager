<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    public function complaints()
    {
        return $this->hasMany('App\Models\Complaint');
    }

    public function operator()
    {
        return $this->belongsTo('App\Models\Operator');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
