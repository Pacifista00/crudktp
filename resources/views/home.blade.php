@extends('./layouts/main')
@section('view')
    @include('./partials/navbar')
    <div class="container py-4">
        <div class="card rounded-4 p-3">
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
                    <a href="" class="btn my-btn me-3"><i class="fa-solid fa-file-pdf me-1"></i>Export PDF</a>
                    <a href="" class="btn my-btn"><i class="fa-solid fa-file-csv me-1"></i>Export CSV</a>
                </div>
                <div class="table-responsive">
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Foto</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Umur</th>
                                <th scope="col">jenis kelamin</th>
                                <th scope="col">Tanggal lahir</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Pekerjaan</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $item)
                              <tr>
                                  <td>
                                    <img src="{{ $item->image_path }}" alt="foto">
                                  </td>
                                  <td>{{ $item->nik }}</td>
                                  <td>{{ $item->name }}</td>
                                  <td>{{ \Carbon\Carbon::parse($item->birthdate)->age }}</td>
                                  <td>{{ $item->gender }}</td>
                                  <td>{{ $item->birthdate }}</td>
                                  <td>{{ $item->address }}</td>
                                  <td>{{ $item->religion }}</td>
                                  <td>{{ $item->profession }}</td>
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
@endsection