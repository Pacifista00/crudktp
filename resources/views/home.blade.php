@extends('./layouts/main')
@section('view')
    @include('./partials/navbar')
    <div class="container py-4">
        <div class="card rounded-4 p-3">
            @if ($errors->any())
                <div class="alert my-alert p-2" role="alert">
                    @foreach ($errors->all() as $error)
                        <small>{{ $error }}</small><br>
                    @endforeach
                </div>
            @endif
            <div class="card-body">
                <div class="my-card-header d-flex">
                    <h3 class="text-link">DATA</h3>
                    <div class="search-bar mb-3 ms-auto">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2 rounded-start-pill" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn my-btn rounded-end-pill" type="submit" style="width: auto;">Search</button>
                        </form>
                    </div>
                </div>
                <h5>Login sebagai : <span class="text-link">{{ Auth::user()->role->name }}</span></h5>
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
                                        <button type="button" class="btn my-btn2 mb-1" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $item->id }}" style="width: 100%;">
                                            Hapus
                                        </button>
                                        <button type="button" class="btn my-btn2" data-bs-toggle="modal" data-bs-target="#modalEdit{{$item->id}}" style="width: 100%;">
                                            Edit
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <form action="/resident/{{$item->id}}/delete" method="POST">
                                                @csrf
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn my-btn-red">Hapus</button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modal Edit --}}
                                <div class="modal fade" id="modalEdit{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="/resident/{{$item->id}}/update" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-1">
                                                    <label for="photo" class="col-form-label">Foto:</label>
                                                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                                                </div>
                                                <div class="mb-1">
                                                    <label for="nik" class="col-form-label">NIK:</label>
                                                    <input type="text" class="form-control" id="nik" name="nik" value="{{ $item->nik }}">
                                                </div>
                                                <div class="mb-1">
                                                    <label for="name" class="col-form-label">Nama:</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
                                                </div>
                                                <div class="mb-1">
                                                    <label for="gender" class="col-form-label">Jenis Kelamin:</label>
                                                    <select class="form-select" aria-label="Default select example" name="gender">
                                                        <option value="{{ $item->gender }}" >{{ $item->gender }}</option>
                                                        <option value="Pria">Pria</option>
                                                        <option value="Wanita">Wanita</option>
                                                    </select>
                                                </div>
                                                <div class="mb-1">
                                                    <label for="datepicker" class="col-form-label">Tanggal Lahir:</label>
                                                    <input class="form-control" type="text" id="datepicker" name="birthdate" value="{{ $item->birthdate }}">
                                                </div>
                                                <div class="mb-1">
                                                    <label for="address" class="col-form-label">Alamat:</label>
                                                    <textarea class="form-control" type="text" id="address" name="address">{{ $item->address }}</textarea>
                                                </div>
                                                <div class="mb-1">
                                                    <label for="religion" class="col-form-label">Agama:</label>
                                                    <select class="form-select" aria-label="Default select example" name="religion">
                                                        <option value="{{ $item->religion }}">{{ $item->religion }}</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen">Kristen</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Buddha">Buddha</option>
                                                    </select>
                                                </div>
                                                <div class="mb-1">
                                                    <label for="profession" class="col-form-label">Pekerjaan:</label>
                                                    <input type="text" class="form-control" id="profession" name="profession" value="{{ $item->profession }}">
                                                </div>
                                            </div>
        
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn my-btn">Edit</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
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
    
    @include('./partials/footer')
    @endsection
