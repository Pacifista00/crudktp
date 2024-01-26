<nav class="navbar navbar-expand-lg my-bg-yellow">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link p-3" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-3" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-3" href="#">Pricing</a>
                </li>
            </ul>
            <div class="d-flex">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="btn p-3">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>