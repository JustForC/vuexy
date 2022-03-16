<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CategoryController extends Controller
{
    public function index(){
        return view('dashboard.category.index');
    }
}
