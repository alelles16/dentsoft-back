<?php

namespace App\Controllers;
use App\Models\Dentist;
use App\Models\History;
use App\Models\Patient;
use App\Models\Consultory;
use Illuminate\Http\Request;

class HistoryController {

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
        $histories = History::all();
        return $histories->toJson();
    }

    public function show($id) {
        /**
         * This function return a specific dentist
         */
        $history = History::findOrFail($id);
        return $history->toJson();
    }

    // public function show_list_dentists($id) {
    //     $dentists = Dentist::whereHas('consultories', function ($query) use ($id) {
    //         $query->where('consultories.id', $id);
    //     })->get();
    //     return $dentists;
    // }

    public function store(Request $request) {
        /**
         * This function create a new dentist
         * and return a Json with the information
         * about new dentist
         */
        $patient = Patient::findOrFail($request->patient);
        $history = new History();
        $history->dentists_id = $request->dentist;
        $history->patients_id = $patient->id;
        $history->questions = json_encode($request->questions);
        $history->intraOral = json_encode($request->intraOral);
        $history->save();
        return $history->toJson();
    }

    // public function update(Request $request, $id) {
    //     /**
    //      * This function update a specific dentist
    //      * and return a Json with the new information
    //      */
    //     $dentist = Dentist::findOrFail($id);
    //     $dentist->name = $request->name ?? $dentist->name;
    //     $dentist->lastname = $request->lastname ?? $dentist->lastname;
    //     $dentist->mobile = $request->mobile ?? $dentist->mobile;
    //     $dentist->save();
    //     return $dentist->toJson();
    // }

    // public function delete($id) {
    //     /**
    //      * This funtion delete a specific dentist
    //      */
    //     $dentist = Dentist::findOrFail($id);
    //     return "{\"msg\": ".$dentist->delete()."}";
    // }

}

?>