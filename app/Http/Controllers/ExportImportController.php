<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident;
use PDF;
use App\Exports\ResidentsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportImportController extends Controller
{
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
