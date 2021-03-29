<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Ressource;
use App\Models\Operator;
use App\Models\Partner;
use App\Models\Complaint;

class User extends Authenticatable
{
    use HasFactory, HasRoles, Notifiable, HasApiTokens;

    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google2fa_secret',
        'google2fa_enable',
        'firstname',
        'phone_number',
        'username', 
        'address', 
        'profile_picture',
        'role_id',
        'firebase_token',
        'lang', 
        'is_activated',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::needsRehash($password) ? Hash::make($password) : $password;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function partnerPendingComplaints()
    {
        return Complaint::where('user_id', $this->id)
                          ->where('status', 0)
                          ->get();
    }

    public function partnerArchivedComplaints()
    {
        return Complaint::where('user_id', $this->id)
                          ->where('status', 1)
                          ->get();
    }

    public function myprocessedComplaints()
    {
        return Complaint::where('approuved_by', $this->id)
                          ->where('status', 1)
                          ->get();
    }
}
