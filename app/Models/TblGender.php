<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TblGender extends Model
{
    use HasFactory;


    public function patient(): BelongsTo
    {
        return $this->belongsTo(TblPatient::class, 'patient_id');
    }
}
