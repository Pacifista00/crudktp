@extends('./layouts/main')
@section('view')
    @include('./partials/navbar')
    <div class="container py-4">
        <div class="card my-card rounded-4 p-3">
            <div class="card-body">
                <div class="my-card-header d-flex">
                  <h3>DATA KTP</h3>
                  <div class="search-bar mb-3 ms-auto">
                      <form class="d-flex" role="search">
                          <input class="form-control me-2 rounded-start-pill" type="search" placeholder="Search" aria-label="Search">
                          <button class="btn my-btn rounded-end-pill" type="submit" style="width: auto;">Search</button>
                      </form>
                  </div>
                </div>
                <div class="export-section d-flex">
                    <a href="" class="btn my-btn me-3"><i class="fa-solid fa-file-csv me-1"></i>Import CSV</a>
                    <a href="" class="btn my-btn me-3"><i class="fa-solid fa-file-pdf me-1"></i>Export PDF</a>
                    <a href="" class="btn my-btn"><i class="fa-solid fa-file-csv me-1"></i>Export CSV</a>
                </div>
                <div class="table-responsive">
                    <table class="table mt-3 table-transparent">
                        <thead>
                            <tr>
                                <th scope="col">Foto</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Umur</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Tanggal lahir</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Pekerjaan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>
                                        <img src="http://127.0.0.1:8000/storage/{{ $item->image_path }}" alt="foto" class="resident-picture">
                                    </td>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->birthdate)->age }}</td>
                                    <td>{{ $item->gender }}</td>
                                    <td>{{ $item->birthdate }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->religion }}</td>
                                    <td>{{ $item->profession }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn my-btn2 mb-1" data-bs-toggle="modal" data-bs-target="#modalDelete" style="width: 100%;">
                                            Hapus
                                        </button>
                                        <button type="button" class="btn my-btn2" data-bs-toggle="modal" data-bs-target="#modalEdit" style="width: 100%;">
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="my-custom-pagination-style">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>


      
    <!-- Modal Delete -->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan !</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Yakin untuk menghapus?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-danger">Hapus</button>
        </div>
        </div>
    </div>
    </div>
    
    {{-- Modal Edit --}}
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="photo" class="col-form-label">Foto:</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="col-form-label">NIK:</label>
                        <input type="text" class="form-control" id="nik" name="nik">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Nama:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="col-form-label">Jenis Kelamin:</label>
                        <select class="form-select" aria-label="Default select example">
                            <option value="1">Pria</option>
                            <option value="2">Wanita</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="datepicker" class="col-form-label">Pilih Tanggal:</label>
                        <input class="form-control" type="text" id="datepicker" name="datepicker">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="col-form-label">Alamat:</label>
                        <textarea class="form-control" type="text" id="address" name="address"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="religion" class="col-form-label">Agama:</label>
                        <select class="form-select" aria-label="Default select example" name="religion">
                            <option value="1">Islam</option>
                            <option value="2">Kristen</option>
                            <option value="3">Hindu</option>
                            <option value="4">Buddha</option>
                            <option value="5">Kristen</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="profession" class="col-form-label">Pekerjaan:</label>
                        <input type="text" class="form-control" id="profession" name="profession">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success">Edit</button>
            </div>
            </div>
        </div>
    </div>
    @include('./partials/footer')
@endsection
