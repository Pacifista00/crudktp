<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident;
use Illuminate\Support\Facades\Validator;

class ResidentController extends Controller
{
    public function destroy($id){
        $resident = Resident::find($id);

        if ($resident) {
            $resident->delete();
            return redirect('home')->with('success', 'Data telah terhapus.');
        } else {
            return redirect('home')->with('error', 'Data tidak ditemukan.');
        }
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'nik' => 'required|numeric|digits:16',
            'name' => 'required',
            'gender' => 'required',
            'birthdate' => 'required|date_format:Y-m-d',
            'address' => 'required',
            'religion' => 'required',
            'profession' => 'required',
        ],[
            'nik.required' => 'Nik harus diisi.',
            'nik.numeric' => 'Nik harus berupa angka.',
            'nik.digits' => 'Nik harus berisi 16 digit.',
            'name.required' => 'Nama harus diisi.',
            'gender.required' => 'Jenis Kelamin harus diisi.',
            'birthdate.required' => 'Tanggal lahir harus diisi.',
            'birthdate.required' => 'Tanggal lahir harus berisi tanggal.',
            'address.required' => 'Alamat harus diisi.',
            'religion.required' => 'Agama harus diisi.',
            'profeession.required' => 'Pekerjaan harus diisi.',
        ]);
 
        if ($validator->fails()) {
            return redirect('/home')
            ->withErrors($validator);
        }

        $resident = Resident::find($id);
        $data = [
            'nik' => $request->nik,
            'name' => $request->name,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'address' => $request->address,
            'religion' => $request->religion,
            'profession' => $request->profession,
        ];
        $resident->update($data);
        return redirect('/home')
        ->with(['success' => 'Data berhasil diubah.']);
    }
}
