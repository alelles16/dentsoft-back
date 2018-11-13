<?php
namespace App\Models;
// Implements Eloquent ORM to manage the DataBase
use Illuminate\Database\Eloquent\Model;


class Patient extends Model
{
    protected $table = 'patients';

    /**
     * The consultories that belong to the patient.
     */
    public function consultories()
    {
        return $this->belongsToMany(
            'App\Models\Consultory',
            'consultories_patients',
            'patients_id',
            'consultories_id'
        );
    }
}