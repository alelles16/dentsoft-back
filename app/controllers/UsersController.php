<?php

namespace App\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController {

    private $user;

    public function __construct(Request $request) {
        /**
         * This function obtain token from the URL and find a user with the given token
         */
        if($request->token) {
            $this->user = User::where('token', $request->token)->first();
        }
    }

    public function index() {
        /**
         * This function return a users list
         */
        $users = User::all();
        return $users->toJson();
    }

    public function show($id) {
        /**
         * This function return a specific user
         */
        $user = User::findOrFail($id);
        return $user->toJson();
    }

    public function store(Request $request) {
        /**
         * This function create a new user
         * and return a Json with the information
         * about new user
         */
        $user = new User();
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = password_hash($request->password, PASSWORD_DEFAULT);
        $user->mobile = $request->mobile;
        $user->save();
        return $user->toJson();
    }

    public function update(Request $request, $id) {
        /**
         * This function update a specific user
         * and return a Json with the new information
         */
        if(!$this->user || $this->user->id !== $id){
            return "{'message': 'You are not allowed to perform this action.'}";
        }
        $user = User::findOrFail($id);
        $user->name = $request->name ?? $user->name;
        $user->lastname = $request->lastname ?? $user->lastname;
        $user->mobile = $request->mobile ?? $user->mobile;
        $user->save();
        return $user->toJson();
    }

    public function delete($id) {
        /**
         * This funtion delete a specific user
         */
        $user = User::findOrFail($id);
        return $user->delete();
    }
}

?>