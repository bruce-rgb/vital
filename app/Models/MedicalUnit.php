<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalUnit extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
    ];

    //Returns the director to whom the medical unit belongs
    public function director()
    {
        return $this->hasOne(Director::class,'id_unit','id_unit');
    }

    //Returns the doctors who belong to the medical unit
    public function doctor()
    {
        return $this->hasMany(Doctor::class, 'id_unit','id_unit');
    }

}
