<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa PKL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* CSS Reset dan Pengaturan Dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            background-color: #f4f7fc;
            min-height: 100vh;
        }

        /* --- Sidebar (Menu Kiri) --- */
        .sidebar {
            width: 260px;
            background-color: #1a73e8;
            color: white;
            height: 100vh;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin-bottom: 15px;
        }

        .sidebar ul li a {
            color: #d4e3ff;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 12px 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .sidebar ul li a i {
            margin-right: 15px;
            width: 20px;
            text-align: center;
        }

        /* Memberi highlight pada menu yang aktif */
        .sidebar ul li.active a,
        .sidebar ul li a:hover {
            background-color: #ffffff;
            color: #1a73e8;
            transform: translateX(5px);
        }

        /* --- Konten Utama (Bagian Kanan) --- */
        .main-content {
            flex-grow: 1;
            margin-left: 260px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header {
            background-color: #ffffff;
            padding: 15px 30px;
            border-bottom: 1px solid #e0e0e0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 70px;
        }

        .header .left-section {
            display: flex;
            align-items: center;
        }

        .header .left-section h1 {
            font-size: 24px;
            color: #333;
            margin: 0;
        }

        .header .right-section {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .header .user-info .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #1a73e8;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .header .user-info .user-details {
            display: flex;
            flex-direction: column;
        }

        .header .user-info .user-name {
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }

        .header .user-info .user-role {
            color: #666;
            font-size: 12px;
        }

        .content-body {
            padding: 30px;
            flex-grow: 1;
            background-color: #f8f9fa;
        }

        .content-body h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 25px;
            font-weight: 600;
        }

        /* --- Profil Container --- */
        .profile-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            max-width: 800px;
            margin: 0 auto;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #1a73e8;
            margin: 0 auto 20px;
            display: block;
        }

        .profile-photo-placeholder {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-size: 48px;
            margin: 0 auto 20px;
            border: 5px solid #1a73e8;
        }

        .profile-name {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .profile-nim {
            font-size: 16px;
            color: #666;
        }

        /* --- Form Profil --- */
        .profile-form {
            margin-top: 30px;
        }

        .form-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .form-section h3 {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .form-section h3 i {
            margin-right: 10px;
            color: #1a73e8;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 500;
            color: #333;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #1a73e8;
            box-shadow: 0 0 0 2px rgba(26, 115, 232, 0.2);
        }

        .form-control[readonly] {
            background-color: #f8f9fa;
            cursor: not-allowed;
        }

        .file-input-wrapper {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .file-input {
            display: none;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px 15px;
            border: 2px dashed #1a73e8;
            border-radius: 8px;
            background-color: #f8f9fa;
            color: #1a73e8;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-input-label:hover {
            background-color: #e3f2fd;
        }

        .file-input-label i {
            margin-right: 10px;
        }

        .current-photo {
            margin-top: 10px;
            text-align: center;
        }

        .current-photo img {
            max-width: 150px;
            max-height: 150px;
            border-radius: 8px;
            border: 2px solid #ddd;
        }

        /* --- Tombol Aksi --- */
        .action-buttons {
            text-align: center;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            margin: 0 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #1a73e8;
            color: white;
        }

        .btn-primary:hover {
            background-color: #1557b0;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(26, 115, 232, 0.3);
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #545b62;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
        }

        /* --- Alert Messages --- */
        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        /* --- Responsivitas --- */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                margin-left: 0;
            }

            .header {
                padding: 15px 20px;
            }

            .header .left-section h1 {
                font-size: 20px;
            }

            .content-body {
                padding: 20px;
            }

            .profile-container {
                padding: 20px;
            }

            .profile-photo,
            .profile-photo-placeholder {
                width: 120px;
                height: 120px;
            }

            .action-buttons .btn {
                display: block;
                width: 100%;
                margin: 10px 0;
            }
        }

        @media (max-width: 480px) {
            .header .right-section {
                display: none;
            }

            .content-body h1 {
                font-size: 24px;
            }

            .form-section {
                padding: 15px;
            }
        }

    </style>
</head>
<body>
    <nav class="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li><a href="{{ route('dashboardmhs') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="active"><a href="{{ route('mahasiswa.profile', ['mahasiswa' => $mahasiswa->id]) }}"><i class="fas fa-user"></i> Profil</a></li>
            <li><a href="{{ route('dokumen.index') }}"><i class="fas fa-file-upload"></i>Upload Dokumen</a></li>
            <li><a href="{{ route('seminar.index') }}"><i class="fas fa-calendar-check"></i> Jadwal Seminar</a></li>
            <li><a href="{{ route('bimbingan.index') }}"><i class="fas fa-calendar-alt"></i> Jadwal Bimbingan</a></li>
            <li><a href="{{ route('nilai.index') }}"><i class="fas fa-chart-line"></i> Nilai</a></li>
            <li><a href="{{ route('kalender.index') }}"><i class="fas fa-calendar"></i> Kalender</a></li>
        </ul>
    </nav>

    <main class="main-content">
        <header class="header">
            <div class="left-section">
                <h1>Profil Mahasiswa</h1>
            </div>
            <div class="right-section">
                <div class="user-info">
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="user-details">
                        <div class="user-name">{{ $mahasiswa->name }}</div>
                        <div class="user-role">Mahasiswa PKL</div>
                    </div>
                </div>
                <a href="#" class="btn btn-outline-danger btn-sm">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </header>

        <div class="content-body">
            <div class="profile-container">
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                <div class="profile-header">
                    @if($mahasiswa->photo)
                        <img src="{{ asset('storage/' . $mahasiswa->photo) }}" alt="Foto Profil" class="profile-photo">
                    @else
                        <div class="profile-photo-placeholder">
                            <i class="fas fa-user"></i>
                        </div>
                    @endif
                    <h2 class="profile-name">{{ $mahasiswa->name }}</h2>
                    <p class="profile-nim">NIM: {{ $mahasiswa->nim }}</p>
                </div>

                <form action="{{ route('mahasiswa.updateProfile', $mahasiswa) }}" method="POST" enctype="multipart/form-data" class="profile-form">
                    @csrf
                    @method('PUT')

                    <div class="form-section">
                        <h3><i class="fas fa-info-circle"></i> Informasi Pribadi</h3>

                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $mahasiswa->name }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $mahasiswa->email }}">
                        </div>

                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim" value="{{ $mahasiswa->nim }}">
                        </div>

                        <div class="form-group">
                            <label for="prodi">Program Studi</label>
                            <select class="form-control" id="prodi" name="prodi_id">
                                @foreach(\App\Models\Prodi::all() as $prodi)
                                    <option value="{{ $prodi->id }}" {{ old('prodi_id', $mahasiswa->prodi_id) == $prodi->id ? 'selected' : '' }}>
                                        {{ $prodi->nama_prodi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3><i class="fas fa-phone"></i> Kontak & Media</h3>

                        <div class="form-group">
                            <label for="phone">Nomor Telepon</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $mahasiswa->phone }}" placeholder="Masukkan nomor telepon">
                        </div>

                        <div class="form-group">
                            <label for="photo">Foto Profil</label>
                            <div class="file-input-wrapper">
                                <input type="file" class="file-input" id="photo" name="photo" accept="image/*">
                                <label for="photo" class="file-input-label">
                                    <i class="fas fa-upload"></i> Pilih Foto Baru
                                </label>
                            </div>
                            @if($mahasiswa->photo)
                                <div class="current-photo">
                                    <p>Foto saat ini:</p>
                                    <img src="{{ asset('storage/' . $mahasiswa->photo) }}" alt="Foto Saat Ini">
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="action-buttons">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>
                        <a href="{{ route('dashboardmhs') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>
</html>
