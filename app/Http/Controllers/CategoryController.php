<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function btp()
    {
        return view('categories.btp');
    }
    
    public function informatique()
    {
        return view('categories.informatique');
    }
    
    public function securite()
    {
        return view('categories.securite');
    }
    
    public function applications()
    {
        return view('categories.applications');
    }
}
