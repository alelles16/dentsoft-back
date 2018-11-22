<?php

namespace App\Controllers;
use App\Models\Dentist;
use App\Models\Consultory;
use Illuminate\Http\Request;

class DentistsController {

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
         * This function return a dentists list
         */
        $dentists = Dentist::all();
        return $dentists->toJson();
    }

    public function show($id) {
        /**
         * This function return a specific dentist
         */
        $dentist = Dentist::findOrFail($id);
        return $dentist->toJson();
    }

    public function show_list_dentists($id) {
        $dentists = Dentist::whereHas('consultories', function ($query) use ($id) {
            $query->where('consultories.id', $id);
        })->get();
        return $dentists;
    }

    public function store(Request $request) {
        /**
         * This function create a new dentist
         * and return a Json with the information
         * about new dentist
         */
        $consultory = Consultory::findOrFail($request->consultory_id);
        $dentist = new Dentist();
        $dentist->name = $request->name;
        $dentist->lastname = $request->lastname;
        $dentist->mobile = $request->mobile;
        $dentist->save();
        if ($dentist->save()) {
            $dentist->consultories()->attach($consultory->id);
        }
        return $dentist->toJson();
    }

    public function update(Request $request, $id) {
        /**
         * This function update a specific dentist
         * and return a Json with the new information
         */
        $dentist = Dentist::findOrFail($id);
        $dentist->name = $request->name ?? $dentist->name;
        $dentist->lastname = $request->lastname ?? $dentist->lastname;
        $dentist->mobile = $request->mobile ?? $dentist->mobile;
        $dentist->save();
        return $dentist->toJson();
    }

    public function delete($id) {
        /**
         * This funtion delete a specific dentist
         */
        $dentist = Dentist::findOrFail($id);
        return "{\"msg\": ".$dentist->delete()."}";
    }

}

?>