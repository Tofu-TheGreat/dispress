<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-transparent" id="navbar">
    <div class="container d-flex">
        <a class="navbar-brand d-lg-none position-absolute" href="/">
            <img class="logo-brand" src="{{ asset('/assets-landing-page/img/logo-nav.svg') }}" height="200"
                alt="Logo" />
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon navbar-light"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                @if ($active == 'landing-page')
                    <li class="nav-item">
                        <a class="nav-link active" data-scroll-nav="0" aria-current="page" href="/#hero"
                            data-bs-target="#hero"><i class="bi bi-house me-2"></i>Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll-nav="1" href="/#fitur"><i
                                class="bi bi-wrench-adjustable me-2"></i>Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll-nav="2" href="/#keunggulan"><i
                                class="bi bi-star-half me-2"></i>Keunggulan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/petunjuk-teknis"><i class="bi bi-book-half me-2"></i>Petunjuk
                            teknis</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/#hero" data-bs-target="#hero"><i
                                class="bi bi-house me-2"></i>Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#fitur"><i class="bi bi-wrench-adjustable me-2"></i>Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#keunggulan"><i class="bi bi-star-half me-2"></i>Keunggulan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/petunjuk-teknis"><i class="bi bi-book-half me-2"></i>Petunjuk
                            teknis</a>
                    </li>
                @endif
            </ul>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                @guest
                    <a href="/login" class="btn btn-1 px-4" type="button"> <span>Login</span> <i
                            class="bi bi-lock-fill icon-btn-1 ms-2"></i></a>
                @endguest
                @auth
                    <a href="/dashboard-{{ auth()->user()->level }}" class="btn btn-1 px-4" type="button">
                        <span>Dashboard</span> <i class="bi bi-unlock-fill icon-btn-1 ms-2"></i></a>
                @endauth
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->
