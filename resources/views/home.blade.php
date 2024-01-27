@extends('./layouts/main')
@section('view')
    @include('./partials/navbar')
    <div class="container pt-4">
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
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection