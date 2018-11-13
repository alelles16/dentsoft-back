<?php
namespace App\Models;
// Implements Eloquent ORM to manage the DataBase
use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    protected $table = 'users';

    /**
     * Get the consultory associated with the user.
    */
    public function consultory() {
        $this->hasOne('App\Models\Consultory');
    }
}