<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident;
use App\Http\Resources\ResidentResource;
use PDF;
use App\Exports\ResidentsExport;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function getData()
    {
        $data = Resident::latest()->paginate(10);
        return ResidentResource::collection($data);
    }

    public function search(Request $request)
    {
        $query = $request->input('keyword');

        $data = Resident::latest()->where('name', 'like', '%' . $query . '%')
            ->orWhere('nik', 'like', '%' . $query . '%')
            ->latest()->paginate(10)->withQueryString();

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
        $page = $request->input('page', 1);
        $keyword = $request->input('keyword');

        if ($keyword) {
            $data = Resident::latest()->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('nik', 'like', '%' . $keyword . '%')
                ->paginate(10, ['*'], 'page', $page);
        } else{
            $data = Resident::latest()->paginate(10, ['*'], 'page', $page);
        }

        view()->share('data', $data);
        $pdf = PDF::loadview('export');

        return $pdf->download('exported_data.pdf');
    }
    public function exportCSV(Request $request)
    {
        $keyword = $request->input('keyword');
        $page = $request->input('page', 1);

        return Excel::download(new ResidentsExport($keyword, $page), 'residents.csv');
    }
}
