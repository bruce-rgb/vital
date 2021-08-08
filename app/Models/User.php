<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'last_name2',
        'email',
        'password',
        'role',
        'phone',
    ];

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

    //EXPERIMENTAL Returns the director to whom the user belongs
    public function director()
    {
        return $this->hasOne(Director::class,'id_user','id_user');
    }

    //EXPERIMENTAL Returns the doctor to whom the user belongs
    public function doctor()
    {
        return $this->hasOne(Doctor::class,'id_user','id_user');
    }

    //EXPERIMENTAL Returns the patient to whom the user belongs
    public function patient()
    {
        return $this->hasOne(Patient::class,'id_user','id_user');
    }
}
