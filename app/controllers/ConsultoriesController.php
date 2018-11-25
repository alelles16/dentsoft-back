<?php

namespace App\Controllers;
use App\Models\Consultory;
use App\Models\User;
use App\Models\Patient;
use App\Models\History;
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
        if (!$this->user) {
            throw new \Exception('You are not allowed to perform this action.');
        }

        /**
         * This function return a consultories list
         */
        $consultories = Consultory::all();
        return $consultories->toJson();
    }

    public function show($id) {
        if (!$this->user) {
            throw new \Exception('You are not allowed to perform this action.');
        }

        /**
         * This function return a specific consultory
         */
        $consultory = Consultory::findOrFail($id);
        return $consultory->toJson();
    }

    public function show_consultory_user($id) {
        if (!$this->user) {
            throw new \Exception('You are not allowed to perform this action.');
        }

        try {
            $consultory = Consultory::where('users_id', $id)->first();
            return $consultory->toJson();
        } catch (Exception $error) {
            header('HTTP/1.0 403 Forbidden');
            return "{\"error\": \"Consultory not allowed.\"}";
        }
    }

    public function store(Request $request) {
        if (!$this->user) {
            throw new \Exception('You are not allowed to perform this action.');
        }
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
        if (!$this->user) {
            throw new \Exception('You are not allowed to perform this action.');
        }
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
        if (!$this->user) {
            throw new \Exception('You are not allowed to perform this action.');
        }
        /**
         * This funtion delete a specific consultory
         */
        $consultory = Consultory::findOrFail($id);
        return $consultory->delete();
    }

    public function statistics($id){
        $consultory = Consultory::find($id);
        $histories = History::whereHas('patient.consultories', function ($query) use ($id) {
            $query->where('consultories.id', $id);
        })->get();

        return [
            'patients' => $consultory->patients->count(),
            'dentists' => $consultory->dentists->count(),
            'histories' => $histories->count()
        ];
    }

}

?>