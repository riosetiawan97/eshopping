<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">E-Shopping</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link {{ Request::is('category') ? 'active' : '' }}" href="/category">Category</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/login">Login</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/register">Register</a>
                </li>
                </ul>
            </ul>
        </div>
    </div>
</nav>