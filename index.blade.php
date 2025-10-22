@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitra Perusahaan untuk PKL</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Variabel CSS */
        :root {
            --primary-blue: #0d6efd;
            --dark-text: #333;
            --light-bg: #f8f9fa;
            --white-bg: #fff;
            --border-color: #e0e0e0;
            --grey-text: #6c757d;
        }

        /* Reset & Base */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--light-bg);
            color: var(--dark-text);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header (Navigasi Atas) */
        header {
            background-color: var(--white-bg);
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            padding: 10px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        header .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-section img {
            height: 40px; /* Ukuran logo */
            width: auto;
        }

        .logo-section span {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-blue);
            white-space: nowrap;
        }

        header nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 25px;
        }

        header nav ul li a {
            text-decoration: none;
            color: var(--dark-text);
            font-weight: 500;
            transition: color 0.3s ease;
        }

        header nav ul li a:hover,
        header nav ul li a.active {
            color: var(--primary-blue);
        }

        header nav ul li .login-btn {
            background-color: var(--primary-blue);
            color: var(--white-bg);
            padding: 8px 18px;
            border-radius: 20px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        header nav ul li .login-btn:hover {
            background-color: #0b5ed7;
        }

        /* Hero Section */
        .hero-section {
            background-color: var(--primary-blue);
            color: var(--white-bg);
            text-align: center;
            padding: 80px 20px;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -50px;
            left: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: rotate(45deg);
        }
        .hero-section::after {
            content: '';
            position: absolute;
            bottom: -50px;
            right: -50px;
            width: 180px;
            height: 180px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            transform: rotate(-30deg);
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-content h1 {
            font-size: 2.8rem;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .hero-content p {
            font-size: 1.15rem;
            line-height: 1.5;
            opacity: 0.9;
        }

        /* Section Title & Description */
        .section-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-header h2 {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .section-header p {
            font-size: 1rem;
            color: var(--grey-text);
        }

        /* Company Initial Badge Styling */
        .company-initial-badge {
            width: 45px;
            height: 45px;
            border-radius: 50%; /* Circular shape */
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
        }

        /* Custom background colors to match the image more closely */
        .bg-A { background-color: #2ecc71 !important; }    /* Arutmin (Green) */
        .bg-J { background-color: #f1c40f !important; }    /* Jorong (Yellow) */
        .bg-D { background-color: #e74c3c !important; }    /* Dinas (Red) */
        .bg-I { background-color: #9b59b6 !important; }    /* Indofood (Purple) */
        .bg-B1 { background-color: #3498db !important; }   /* Bank Kalsel (Blue) */
        .bg-P { background-color: #1abc9c !important; }    /* PLN (Teal) */
        .bg-K { background-color: #c0392b !important; }    /* Kantor Pajak (Dark Red) */
        .bg-B2 { background-color: #f39c12 !important; }   /* Bridgestone (Orange) */
        .bg-C { background-color: #e67e22 !important; }    /* CV. XYZ (Orange) */
        .bg-P2 { background-color: #8e44ad !important; }   /* PT. ABC (Purple) */

        /* Company Card Styling */
        .company-card {
            border-radius: 8px; /* Slightly rounded corners */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid var(--border-color);
            background-color: var(--white-bg);
            box-shadow: 0 2px 10px rgba(0,0,0,0.03);
        }

        .company-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .company-card-content {
            padding: 20px;
            flex-grow: 1;
        }

        .company-card-content h3 {
            font-size: 1.25rem;
            margin-top: 0;
            margin-bottom: 10px;
            color: var(--dark-text);
        }

        .company-card-content p {
            font-size: 0.9rem;
            color: var(--grey-text);
            margin-bottom: 0;
        }

        /* Filter Card (Sticky) */
        .sticky-filter {
            /* top: 20px; /* Adjust based on desired position below navbar */
            /* We'll use the Bootstrap `sticky-top` class, but ensure padding is enough */
        }

        /* Footer */
        footer {
            background-color: #2c3e50;
            color: var(--white-bg);
            padding: 40px 0 20px 0;
            margin-top: 40px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        footer h4 {
            font-size: 1.2rem;
            margin-bottom: 15px;
            color: var(--white-bg);
        }

        footer p {
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.6);
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .hero-content h1 { font-size: 2.2rem; }
            .hero-content p { font-size: 1rem; }
        }

        @media (max-width: 768px) {
            .navbar { flex-direction: column; align-items: flex-start; gap: 15px; }
            header nav ul { flex-wrap: wrap; justify-content: center; gap: 10px 15px; width: 100%; }
            header nav ul li .login-btn { width: 100%; text-align: center; }
            .hero-section { padding: 60px 20px; }
            .hero-content h1 { font-size: 2rem; }
            .section-header h2 { font-size: 1.8rem; }
        }

        @media (max-width: 480px) {
            .logo-section span { font-size: 1rem; }
            .hero-content h1 { font-size: 1.8rem; }
            .hero-content p { font-size: 0.9rem; }
        }
    </style>
</head>
<body>

    <header>
        <div class="container">
            <div class="navbar">
                <div class="logo-section">
                    <img src="{{ asset('logo.png') }}" alt="Logo Politala">
                    <span>POLITEKNIK NEGERI TANAH LAUT</span>
                </div>
                <nav>
                    <ul>
                        <li><a href="{{route('home')}}" class="active">Beranda</a></li>
                        <li><a href="{{route('perusahaan.index')}}">Perusahaan</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <section class="hero-section">
            <div class="hero-content">
                <h1>Mitra Perusahaan untuk PKL</h1>
                <p>Temukan perusahaan yang sesuai dengan minat dan bidang studi Anda.</p>
            </div>
        </section>

        <section class="program-studi-section" style="background-color: var(--white-bg); padding: 60px 0; margin-top: 20px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
            <div class="container">
                <div class="section-header">
                    <h2>Daftar Perusahaan</h2>
                    <p>Jelajahi berbagai perusahaan mitra untuk program PKL.</p>
                </div>

                <div class="row justify-content-center mt-4">
                    <div class="col-12 col-md-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari nama perusahaan..." aria-label="Cari nama perusahaan">
                            <button class="btn btn-primary" type="button">Cari</button>
                        </div>
                    </div>
                </div>

                <div class="row px-3 mt-4">
                    <div class="col-lg-3 order-lg-2 mb-4">
                        <div class="card p-3 shadow-sm sticky-top sticky-filter" style="top: 20px;">
                            <h6 class="card-title fw-bold text-muted mb-3">Filter Pencarian</h6>

                            <label for="lokasiFilter" class="form-label small fw-bold mt-2">Lokasi</label>
                            <select class="form-select form-select-sm mb-3" id="lokasiFilter">
                                <option selected>Semua Lok</option>
                                <option>Banjarmasin</option>
                            </select>

                            <label for="industriFilter" class="form-label small fw-bold">Industri</label>
                            <select class="form-select form-select-sm mb-3" id="industriFilter">
                                <option selected>Semua Industri</option>
                                <option>Pertambangan</option>
                                <option>Pemerintahan</option>
                            </select>

                            <label class="form-label small fw-bold">Ketersediaan</label>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="hanyaBukaCheck" checked>
                                <label class="form-check-label" for="hanyaBukaCheck">
                                    Hanya yang buka
                                </label>
                            </div>

                            <button class="btn btn-outline-secondary btn-sm w-100 mt-2" id="resetFilterBtn">Reset Filter</button>
                        </div>
                    </div>

                    <div class="col-lg-9 order-lg-1">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="fw-bold mb-0">Daftar Perusahaan</h5>
                            <a href="{{ route('perusahaan.create') }}" class="btn btn-primary">Tambah Perusahaan</a>
                        </div>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
                            @forelse($mitras as $perusahaan)
                            <div class="col">
                                <div class="card h-100 company-card">
                                    <div class="card-body d-flex flex-column">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="company-initial-badge bg-{{ strtoupper(substr($perusahaan->nama_perusahaan, 0, 1)) }} text-white">{{ strtoupper(substr($perusahaan->nama_perusahaan, 0, 1)) }}</div>
                                            <h5 class="card-title fw-bold ms-3 mb-0">{{ $perusahaan->nama_perusahaan }}</h5>
                                        </div>
                                        <p class="card-subtitle mb-2 text-muted small">{{ $perusahaan->jurusan ?? 'Industri' }}</p>
                                        <p class="card-text small">{{ $perusahaan->deskripsi ?? 'Deskripsi perusahaan ini belum tersedia.' }}</p>
                                        <div class="mt-auto small">
                                            <p class="mb-1"><strong>Jumlah Mahasiswa PKL:</strong> {{ $perusahaan->mahasiswas->count() }}</p>
                                            <p class="mb-1"><strong>Alamat Lengkap:</strong> {{ $perusahaan->alamat }}</p>
                                            <p class="mb-0 text-muted"><i class="fas fa-map-marker-alt"></i> {{ $perusahaan->provinsi ?? 'Lokasi' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12">
                                <p class="text-center">Tidak ada data perusahaan</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div>
                    <h4>POLITALA</h4>
                    <p>Politeknik Negeri Tanah Laut berkomitmen untuk menyediakan pendidikan tinggi berkualitas yang relevan dengan kebutuhan industri dan masyarakat.</p>
                </div>
                <div>
                    <h4>Alamat</h4>
                    <p>Jl. Ahmad Yani No.Km.06, Pemuda, Pelaihari, Kabupaten Tanah Laut, Kalimantan Selatan</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Politeknik Negeri Tanah Laut. Semua Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple JavaScript for filter functionality (can be expanded)
        document.getElementById('resetFilterBtn').addEventListener('click', function() {
            document.getElementById('lokasiFilter').value = 'Semua Lok';
            document.getElementById('industriFilter').value = 'Semua Industri';
            document.getElementById('hanyaBukaCheck').checked = true;
            // In a real application, you would trigger the search/filter logic here
            console.log('Filter direset!');
        });

        // Search functionality
        document.querySelector('.btn-primary').addEventListener('click', function() {
            const searchTerm = document.querySelector('input[placeholder="Cari nama perusahaan..."]').value.toLowerCase();
            const cards = document.querySelectorAll('.company-card');
            cards.forEach(card => {
                const companyName = card.querySelector('.card-title').textContent.toLowerCase();
                if (companyName.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
@endsection
