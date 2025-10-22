<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Dosen</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .profile-header {
            background: linear-gradient(135deg, #1a73e8 0%, #4285f4 100%);
            color: white;
            padding: 40px 20px;
            border-radius: 15px;
            margin-bottom: 30px;
            text-align: center;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 3em;
            overflow: hidden;
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-name {
            font-size: 2.5em;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .profile-role {
            font-size: 1.2em;
            opacity: 0.9;
        }

        .profile-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .profile-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .profile-card h3 {
            color: #333;
            margin-bottom: 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .profile-card h3 i {
            margin-right: 10px;
            color: #1a73e8;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: 600;
            color: #555;
        }

        .info-value {
            color: #333;
            text-align: right;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .stat-item {
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #1a73e8 0%, #4285f4 100%);
            color: white;
            border-radius: 10px;
        }

        .stat-number {
            font-size: 2em;
            font-weight: 700;
            display: block;
        }

        .stat-label {
            font-size: 0.9em;
            opacity: 0.9;
        }

        .back-btn {
            position: fixed;
            top: 20px;
            left: 20px;
            background: #1a73e8;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            background: #1557b0;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }

        .back-btn i {
            margin-right: 8px;
        }

        @media (max-width: 768px) {
            .profile-content {
                grid-template-columns: 1fr;
            }

            .profile-name {
                font-size: 2em;
            }

            .profile-avatar {
                width: 100px;
                height: 100px;
                font-size: 2.5em;
            }
        }
    </style>
</head>
<body>
    <a href="{{ route('dashdosen') }}" class="back-btn">
        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
    </a>

    <div class="container">
        <div class="profile-header">
            <div class="profile-avatar">
                @if($dosen->photo)
                    <img src="{{ asset('storage/' . $dosen->photo) }}" alt="Foto Profil">
                @else
                    <i class="fas fa-user"></i>
                @endif
            </div>
            <h1 class="profile-name">{{ $dosen->name }}</h1>
            <p class="profile-role">Dosen Pembimbing PKL</p>
        </div>

        <div class="profile-content">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 0.85em; padding: 6px 10px; margin-bottom: 15px;">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" style="font-size: 0.75em;"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="profile-card">
                <h3><i class="fas fa-user-circle"></i> Informasi Pribadi</h3>
                <form action="{{ route('dosen.updateProfile', $dosen) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="dosen_id" value="{{ $dosen->id }}">

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $dosen->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $dosen->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $dosen->phone) }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto Profil</label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" accept="image/*">
                        @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @if($dosen->photo)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $dosen->photo) }}" alt="Foto Profil" width="100" class="img-thumbnail">
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label">NIP</label>
                        <input type="text" class="form-control" value="{{ $dosen->nip }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Program Studi</label>
                        <input type="text" class="form-control" value="{{ $dosen->prodi->nama_prodi ?? 'N/A' }}" readonly>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>

            <div class="profile-card">
                <h3><i class="fas fa-chart-bar"></i> Statistik Aktivitas</h3>
                <div class="stats-grid">
                    <div class="stat-item">
                        <span class="stat-number">{{ $dosen->bimbingans->count() }}</span>
                        <span class="stat-label">Bimbingan</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">{{ $dosen->seminars->count() }}</span>
                        <span class="stat-label">Seminar</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">{{ $dosen->nilais->count() }}</span>
                        <span class="stat-label">Penilaian</span>
                    </div>
                </div>
            </div>

            <div class="profile-card">
                <h3><i class="fas fa-calendar-alt"></i> Aktivitas Terbaru</h3>
                <div class="info-item">
                    <span class="info-label">Bimbingan Terakhir</span>
                    <span class="info-value">{{ $dosen->bimbingans->last()->date ?? 'Belum ada' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Seminar Terakhir</span>
                    <span class="info-value">{{ $dosen->seminars->last()->date ?? 'Belum ada' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Penilaian Terakhir</span>
                    <span class="info-value">{{ $dosen->nilais->last()->created_at ?? 'Belum ada' }}</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
