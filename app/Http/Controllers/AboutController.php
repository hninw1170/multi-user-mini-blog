<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        $about = "I am a student";
        

        return view('about',['about' => $about]);
    }
}