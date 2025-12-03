<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorksController extends Controller
{
    public function index()
    {
        return view('works.index');
    }

    public function gallery()
    {
        return view('works.gallery');
    }
}