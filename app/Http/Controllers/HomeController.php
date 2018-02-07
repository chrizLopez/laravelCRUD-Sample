<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Person;

class HomeController extends Controller
{
    public function index()
    {
        $persons = Person::all();
        return view('home',['persons'=>$persons]);
    }

    public function store(Request $request){

    	$person = new Person;
        $person->name = $request->name;
        $person->gender = $request->gender;
        $person->description = $request->description;
        $person->email_address = $request->email_address;
        $person->password = bcrypt($request->password);
        $person->save();
        echo json_encode('success');

    }

    public function delete(Request $request){
        $person = Person::find($request->id);
        $person->delete();
    }

    public function fetch(Request $request){
        $person = Person::find($request->id);
        return $person;
    }

    public function update(Request $request){
    	$person = Person::find($request->id);
		$person->name = $request->name;
        $person->gender = $request->gender;
        $person->description = $request->description;
        $person->email_address = $request->email_address;
        $person->password = bcrypt($request->password);
        $person->save();
        echo json_encode('success');
    }
}
