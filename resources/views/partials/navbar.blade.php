<nav class="navbar navbar-expand-lg navbar-light bg-pink">
    <div class="container">
        <a class="navbar-brand" href="/">BuildIT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                @auth
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <strong>Hi, {{ Auth::user()->nama }}</strong>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if ($title === 'Riwayat Pesanan')
                                    <li><a class="dropdown-item" href="/">Beranda</a></li>
                                @else
                                    <li><a class="dropdown-item" href="/riwayat/{{ Auth::user()->nama }}">Riwayat</a></li>
                                @endif
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button class="dropdown-item" type="submit" name="logout">Keluar</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @else
                    <a class="nav-link" href="/login">Login</a>
                    <a class="nav-link" href="/register">Daftar</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
