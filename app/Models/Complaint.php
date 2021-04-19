<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->belongsTo('App\Models\TypeComplaint', 'type_complaint_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function partner()
    {
        return $this->belongsTo('App\Models\Partner');
    }

    public function ressource()
    {
        return $this->belongsTo('App\Models\Ressource');
    }

    public function approuved_by()
    {
        return $this->belongsTo('App\Models\ressource');
    }

}
