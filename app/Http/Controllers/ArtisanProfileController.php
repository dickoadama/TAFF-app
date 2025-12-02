<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtisanProfileController extends Controller
{
    public function index()
    {
        return view('artisans.profile');
    }
}