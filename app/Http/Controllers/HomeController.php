<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident;
use App\Http\Resources\ResidentResource;

class HomeController extends Controller
{
    public function index(){
        $data = Resident::paginate(10);
        return view('home', compact('data'));
    }
}
