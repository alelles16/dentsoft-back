<?php

namespace App\Controllers;
use App\Models\Consultory;
use Illuminate\Http\Request;

class ConsultoriesController {

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
         * This function return a consultories list
         */
        $consultories = Consultory::all();
        return $consultories->toJson();
    }

    public function show($id) {
        /**
         * This function return a specific consultory
         */
        $consultory = Consultory::findOrFail($id);
        return $consultory->toJson();
    }

    public function store(Request $request) {
        /**
         * This function create a new consultory
         * and return a Json with the information
         * about new consultory
         */
        $consultory = new Consultory();
        $consultory->name = $request->name;
        $consultory->address = $request->address;
        $consultory->telephone = $request->telephone;
        $consultory->users_id = $request->user_id;
        $consultory->save();
        return $consultory->toJson();
    }

    public function update(Request $request, $id) {
        /**
         * This function update a specific consultory
         * and return a Json with the new information
         */
        $consultory = Consultory::findOrFail($id);
        $consultory->name = $request->name;
        $consultory->address = $request->address;
        $consultory->telephone = $request->telephone;
        $consultory->save();
        return $consultory->toJson();
    }

    public function delete($id) {
        /**
         * This funtion delete a specific consultory
         */
        $consultory = Consultory::findOrFail($id);
        return $consultory->delete();
    }

}

?>