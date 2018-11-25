<?php
namespace App\Models;
// Implements Eloquent ORM to manage the DataBase
use Illuminate\Database\Eloquent\Model;


class Dentist extends Model
{
    protected $table = 'dentists';
    /**
     * The consultories that belong to the dentist.
     */
    public function consultories()
    {
        return $this->belongsToMany(
            'App\Models\Consultory',
            'consultories_dentists',
            'dentists_id',
            'consultories_id'
        );
    }

    public function histories(){
        return $this->hasMany('App\Models\History');
    }
}