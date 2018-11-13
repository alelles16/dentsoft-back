<?php

namespace App\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController {

    public function login(Request $request) {
        /**
         * This function validate if the user exists and his password is correct
         * If two fields are correct then generate a Token to validate the user
         * in others pages.
        */
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (password_verify($request->password, $user->password)) {
                $user->token = $this->generateToken();
                $user->save();
                return "{'token': '$user->token'}";
            }
            return "{'message': 'User password is incorrect.'}";
        }
        return "{'message': 'User dont exist.'}";
    }

    public function generateToken() {
        $length = 50;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}