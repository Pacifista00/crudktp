<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident;
use App\Http\Resources\ResidentResource;
use PDF;

class HomeController extends Controller
{
    public function index(){
        $data = Resident::paginate(10);
        return view('home', compact('data'),[
            'active' => 'home',
        ]);
    }
    public function addForm(){
        return view('add',[
            'active' => 'tambah'
        ]);
    }
    public function exportPDF(Request $request)
    {
        $page = $request->input('page', 1); // Mengambil nomor halaman dari permintaan (default: 1)
        $data = Resident::paginate(10, ['*'], 'page', $page);

        view()->share('data', $data);
        $pdf = PDF::loadview('export');

        return $pdf->download('exported_data.pdf');
    }
}
