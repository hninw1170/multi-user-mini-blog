<?php

namespace App\Http\Controllers;

class NameController extends Controller
{
    public function index()
    {
        $name = "Lena";
        

        return view('name',['name' => $name]);
    }
}