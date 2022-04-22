<?php

namespace App\Http\Controllers;


class PersonController extends Controller
{
    public function index()
    {
        return view('people-index');
    }
}
