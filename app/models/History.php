<?php
namespace App\Models;
// Implements Eloquent ORM to manage the DataBase
use Illuminate\Database\Eloquent\Model;


class History extends Model {
    protected $table = 'histories';
    protected $fillable = ['dentist_id', 'patient_id', 'questions', 'intraOral'];
    
    public function dentist(){
        return $this->belongsTo('App\Models\Dentist');
    }

    public function patient(){
        return $this->belongsTo('App\Models\Patient');
    }
}