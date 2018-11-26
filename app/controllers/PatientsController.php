<?php

namespace App\Controllers;

use App\Models\Consultory;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class PatientsController {

    private $user;

    public function __construct(Request $request) {
        /**
         * This function obtain token from the URL and find a user with the given token
         */
        if ($request->token) {
            $this->user = User::where('token', $request->token)->first();
        }
    }

    public function index() {
        if (!$this->user) {
            throw new \Exception('You are not allowed to perform this action.');
        }
        /**
         * This function return a patients list
         */
        $patients = Patient::all();
        return $patients->toJson();
    }

    public function show($id) {
        if (!$this->user) {
            throw new \Exception('You are not allowed to perform this action.');
        }
        /**
         * This function return a specific patient
         */
        $patient = Patient::findOrFail($id);
        return $patient->toJson();
    }

    public function show_list_patients($id) {
        if (!$this->user) {
            throw new \Exception('You are not allowed to perform this action.');
        }
        
        $patients = Patient::whereHas('consultories', function ($query) use ($id) {
            $query->where('consultories.id', $id);
        })->get();
        return $patients;
    }

    public function store(Request $request) {
        if (!$this->user) {
            throw new \Exception('You are not allowed to perform this action.');
        }
        /**
         * This function create a new patient
         * and return a Json with the information
         * about new patient
         */
        $consultory = Consultory::findOrFail($request->consultory_id);
        $patient = new Patient();
        $patient->name = $request->name;
        $patient->lastname = $request->lastname;
        $patient->age = $request->age;
        $patient->gender = $request->gender;
        $patient->identification = $request->identification;
        $patient->placeofbirth = $request->placeofbirth;
        $patient->birthdate = $request->birthdate;
        $patient->telephone = $request->telephone;
        $patient->mobile = $request->mobile;
        if ($patient->save()) {
            $patient->consultories()->attach($consultory->id);
        }
        return $patient->toJson();
    }

    public function update(Request $request, $id) {
        if (!$this->user) {
            throw new \Exception('You are not allowed to perform this action.');
        }
        /**
         * This function update a specific patient
         * and return a Json with the new information
         */
        $patient = Patient::findOrFail($id);
        $patient->name = $request->name ?? $patient->name;
        $patient->lastname = $request->lastname ?? $patient->lastname;
        $patient->age = $request->age ?? $patient->age;
        $patient->gender = $request->gender ?? $patient->gender;
        $patient->identification = $request->identification ?? $patient->identification;
        $patient->placeofbirth = $request->placeofbirth ?? $patient->placeofbirth;
        $patient->birthdate = $request->birthdate ?? $patient->birthdate;
        $patient->telephone = $request->telephone ?? $patient->telephone;
        $patient->mobile = $request->mobile ?? $patient->mobile;
        $patient->save();
        return $patient->toJson();
    }

    public function delete($id) {
        if (!$this->user) {
            throw new \Exception('You are not allowed to perform this action.');
        }
        /**
         * This funtion delete a specific patient
         */
        $patient = Patient::findOrFail($id);
        return "{\"msg\": ".$patient->delete()."}";
    }

}
