<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_director';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user',
        'id_unit',
    ];

    //Returns the medical unit to which the director belongs
    public function medicalUnit()
    {
        return $this->belongsTo(MedicalUnit::class, 'id_unit','id_unit');
    }

    //Returns the user to which the director belongs
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user','id_user');
    }
}
