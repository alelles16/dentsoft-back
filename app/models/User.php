<?php
namespace App\Models;
// Implements Eloquent ORM to manage the DataBase
use Illuminate\Database\Eloquent\Model;


class User extends Model {
    protected $table = 'users';
    protected $fillable = ['email', 'password', 'mobile', 'lastname', 'name'];

    /**
     * Get the consultory associated with the user.
    */
    public function consultory() {
        $this->hasOne('App\Models\Consultory');
    }
}