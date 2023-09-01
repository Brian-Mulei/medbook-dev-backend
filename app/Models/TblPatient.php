<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TblPatient extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'date_of_birth', 'visit_count'];

    public function incrementCounterIFSmiilar($name, $date_of_birth){


        $existing=$this->where('name', $name)->where('date_of_birth',$date_of_birth)->first();

        if($existing){
            $existing->increment('visit_count');
        }
    }
    public function gender(): HasOne
    {
        return $this->hasOne(TblGender::class,  'patient_id');
    }


    public function service(): HasMany
    {
        return $this->hasMany(TblService::class, 'patient_id');
    }
}
