<nav class="navbar navbar-expand-lg my-bg-blue">
    <div class="container">
        <a class="title navbar-brand text-light" href="#">KTP MANAGER</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                <li class="nav-item">
                    <a class="fs-6 nav-link mx-1" href="#">DATA KTP</a>
                </li>
                <li class="nav-item">
                    <a class="fs-6 nav-link mx-1" href="#">AKTIVITAS</a>
                </li>
                <li class="nav-item">
                    <a class="fs-6 nav-link mx-1" href="#">IMPORT</a>
                </li>
                <li class="nav-item">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn my-btn2 mx-1 px-3 rounded-pill" style="width: 100%;">LOGOUT</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>