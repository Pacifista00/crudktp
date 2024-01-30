<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident;
use App\Http\Resources\ResidentResource;
use PDF;

class HomeController extends Controller
{
    public function getData()
    {
        $data = Resident::paginate(10);
        return ResidentResource::collection($data);
    }

    public function search(Request $request)
    {
        $query = $request->input('keyword');

        $data = Resident::where('name', 'like', '%' . $query . '%')
            ->orWhere('nik', 'like', '%' . $query . '%')
            ->paginate(10);

        return ResidentResource::collection($data);
    }

    public function index(Request $request)
    {
        if ($request->has('keyword')) {
            $data = $this->search($request);
        } else {
            $data = $this->getData();
        }

        return view('home', compact('data'), [
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
        $keyword = $request->input('keyword');

        if ($keyword) {
            $data = Resident::where('name', 'like', '%' . $keyword . '%')
                ->orWhere('nik', 'like', '%' . $keyword . '%')
                ->paginate(10, ['*'], 'page', $page);
        } else{
            $data = Resident::paginate(10, ['*'], 'page', $page);
        }

        view()->share('data', $data);
        $pdf = PDF::loadview('export');

        return $pdf->download('exported_data.pdf');
    }
}
