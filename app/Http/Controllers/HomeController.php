<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident;

class HomeController extends Controller
{
    public function index(){
        $data = Resident::paginate(10);
        return view('home', compact('data'));
    }
}
