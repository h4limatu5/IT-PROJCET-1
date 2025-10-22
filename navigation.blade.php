<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'PKL') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dashboardDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dashboard
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dashboardDropdown">
                        <li><a class="dropdown-item" href="{{ route('dashadmin') }}">Admin</a></li>
                        <li><a class="dropdown-item" href="{{ route('dashkaprodi') }}">Kaprodi</a></li>
                        <li><a class="dropdown-item" href="{{ route('dashdosen') }}">Dosen</a></li>
                        <li><a class="dropdown-item" href="{{ route('dashmitra') }}">Mitra</a></li>
                        <li><a class="dropdown-item" href="{{ route('dashmhs') }}">Mahasiswa</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dataDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Data
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dataDropdown">
                        <li><a class="dropdown-item" href="{{ route('perusahaan.index') }}">Perusahaan</a></li>
                        <li><a class="dropdown-item" href="{{ route('prodi.index') }}">Program Studi</a></li>
                        <li><a class="dropdown-item" href="{{ route('dosen.index') }}">Dosen</a></li>
                        <li><a class="dropdown-item" href="{{ route('mahasiswa.index') }}">Mahasiswa</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('mitra') }}">Mitra</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
