<?php

namespace App\Exports;

use App\Models\Resident;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Concerns\FromCollection;

class ResidentsExport implements FromCollection
{
    protected $keyword;
    protected $page;

    public function __construct($keyword = null, $page = 1)
    {
        $this->keyword = $keyword;
        $this->page = $page;
    }

    public function collection()
    {
        $query = Resident::query();

        if ($this->keyword) {
            $query->where('name', 'like', '%' . $this->keyword . '%')
                ->orWhere('nik', 'like', '%' . $this->keyword . '%');
        }

        return $query->latest()->paginate(10, ['*'], 'page', $this->page);
    }
}
