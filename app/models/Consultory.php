<?php
namespace App\Models;
// Implements Eloquent ORM to manage the DataBase
use Illuminate\Database\Eloquent\Model;


class Consultory extends Model {
    protected $table = 'consultories';
    protected $fillable = ['name','address', 'telephone', 'users_id'];

    /**
     * Get the user that owns the consultory.
    */
    public function user() {
        $this->belongsTo('App\Models\User');
    }

    /**
     * The dentists that belong to the consultory.
     */
    public function dentists() {
        return $this->belongsToMany(
            'App\Models\Dentist',
            'consultories_dentists',
            'dentists_id',
            'consultories_id'
        );
    }

    /**
     * The patients that belong to the consultory.
     */
    public function patients() {
        return $this->belongsToMany(
            'App\Models\Patient',
            'consultories_patients',
            'patients_id',
            'consultories_id'
        );
    }
}