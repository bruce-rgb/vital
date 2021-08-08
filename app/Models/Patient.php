<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_usuario',
        'id_medico',
        'edad',
    ];

    //Returns the oxygen data who belong to the patient
    public function oxygen()
    {
        return $this->hasMany(Oxygen::class, 'id_patient','id_patient');
    }

    //Returns the calories data who belong to the patient
    public function calories()
    {
        return $this->hasMany(Calories::class, 'id_patient','id_patient');
    }

    //Returns the distance data who belong to the patient
    public function distance()
    {
        return $this->hasMany(Distance::class, 'id_patient','id_patient');
    }

    //Returns the temperature data who belong to the patient
    public function temperature()
    {
        return $this->hasMany(Temperature::class, 'id_patient','id_patient');
    }

    //Returns the step data who belong to the patient
     public function step()
     {
         return $this->hasMany(Step::class, 'id_patient','id_patient');
     }

    //Returns the heartRate data who belong to the patient
    public function heartRate()
    {
        return $this->hasMany(HeartRate::class, 'id_patient','id_patient');
    }

    //Returns the user to which the patient belongs
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user','id_user');
    }

    //Returns the doctor to which the patient belongs
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'id_doctor','id_doctor');
    }
}
