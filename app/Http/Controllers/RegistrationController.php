<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(){
        return view('form');
    }

    public function store(Request $req){
        echo "<pre>";
        print_r($request->all());
    }
}
