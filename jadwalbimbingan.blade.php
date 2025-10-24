<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa - Sistem Informasi PKL</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        :root {
            --primary: #0d6efd;
            --success: #198754;
            --warning: #ffc107;
            --danger: #dc3545;
            --dark: #212529;
            --muted: #6c757d;
            --light: #f8f9fa;
            --card: #ffffff;
            --radius: 12px;
            --shadow: 0 8px 24px rgba(16, 24, 40, 0.06);
            --max: 1200px;
            --ff: 'Poppins', sans-serif;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: var(--ff); background-color: #f6f9ff; color: var(--dark); }
        a { color: inherit; text-decoration: none; }

        .container { max-width: var(--max); margin: 24px auto; padding: 0 24px; }

        /* Header & Navigasi */
        header { 
            background: var(--card); 
            position: sticky; 
            top: 0; 
            z-index: 99; 
            border-bottom: 1px solid #eee; 
            box-shadow: 0 2px 4px rgba(0,0,0,0.05); /* Tambahkan bayangan ringan */
        }
        .nav { display: flex; align-items: center; justify-content: space-between; padding: 14px 24px; max-width: var(--max); margin: 0 auto; }
        .brand .logo { font-weight: 700; color: var(--primary); font-size: 20px; }
        header nav a { margin-left: 18px; color: var(--dark); font-weight: 500; cursor: pointer; } 
        header nav a:hover, header nav a.active { color: var(--primary); }
        
        /* Layout Dashboard */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 24px;
        }
        /* Menghilangkan grid pada halaman yang tidak memerlukan sidebar */
        .dashboard-grid-full {
             display: block; /* Non-grid for full-width content */
        }
        .sidebar-area {
            /* Pastikan sidebar selalu berada di samping jika grid aktif */
            display: block; 
        }

        /* Kartu (Card) */
        .card { 
            background-color: var(--card); 
            border-radius: var(--radius); 
            box-shadow: var(--shadow); 
            border: 1px solid #f1f5f9; 
            padding: 24px; 
            margin-bottom: 24px; 
        }
        .card-header { 
            font-size: 18px; 
            font-weight: 600; 
            padding-bottom: 12px; 
            margin-bottom: 16px; 
            border-bottom: 1px solid #f1f5f9; 
        }
        .card-header i { color: var(--primary); margin-right: 8px; }

        /* Header Sambutan */
        .welcome-header { margin-bottom: 24px; }
        .welcome-header h1 { font-size: 28px; font-weight: 700; }
        .welcome-header h1 i { color: var(--dark); margin-right: 10px; }
        .welcome-header p { color: var(--muted); font-size: 16px; }
        
        /* --- GAYA FORMULIR UNTUK PENGAJUAN & BIMBINGAN --- */
        .form-group { margin-bottom: 20px; } /* Jarak antar group lebih besar */
        .form-group label { display: block; margin-bottom: 8px; font-weight: 500; font-size: 15px; color: var(--dark); }
        
        /* Label bintang untuk required field */
        .required-star { color: var(--danger); margin-left: 4px; }

        .form-control, .form-select {
            width: 100%;
            padding: 12px 15px; /* Padding lebih besar */
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 15px;
            font-family: var(--ff);
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        
        .form-file {
            border: 1px solid #d1d5db;
            padding: 10px;
            border-radius: 6px;
            background-color: #f1f5f9;
        }
        .form-file input[type="file"] {
            display: block;
            width: 100%;
            padding: 0;
            border: none;
            background-color: transparent;
        }
        
        /* Gaya khusus untuk input date agar ikon terlihat */
        .date-input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }
        .date-input-wrapper input[type="date"] {
            padding-right: 40px; /* Ruang untuk ikon kalender */
        }
        .date-input-wrapper .calendar-icon {
            position: absolute;
            right: 15px;
            color: var(--muted);
            pointer-events: none; /* Agar tidak mengganggu klik pada input */
        }
        
        /* Alert Info */
        .alert-info {
            padding: 15px;
            background-color: #e0eaff;
            color: #0b5ed7;
            border-radius: 6px;
            border: 1px solid #a8c8ff;
            margin-bottom: 20px;
            font-size: 15px;
            font-weight: 500;
        }
        
        /* Tombol */
        .btn { display: inline-flex; align-items: center; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; font-weight: 600; font-size: 15px; transition: background-color 0.3s; }
        .btn i { margin-right: 8px; }
        .btn-primary { background-color: var(--primary); color: white; }
        .btn-primary:hover { background-color: #0b5ed7; }

        /* --- END GAYA FORMULIR --- */

        /* Responsif */
        @media (max-width: 992px) {
            .dashboard-grid { 
                grid-template-columns: 1fr;
            }
            .welcome-header h1 { font-size: 24px; }
            /* Halaman Jadwal (defaultnya tanpa sidebar, tapi jika dipaksa ada, ini aturannya) */
            .dashboard-grid-full .sidebar-area { display: none; }
        }
    </style>
</head>
<body>

    <header>
        <div class="nav">
            <a href="#" data-page="beranda" class="brand"><div class="logo">SISTEM INFORMASI PKL</div></a>
            <nav id="mainNav" style="display: flex; align-items: center;">
                <a href="#" data-page="beranda" class="nav-link">Beranda</a>
                <a href="#" data-page="perusahaan" class="nav-link">Perusahaan</a>
                <a href="#" data-page="jadwal" class="nav-link active">Jadwal bimbingan</a>
                <a href="#" data-page="pengajuan" class="nav-link">Pengajuan PKL</a>
                <a href="#" data-page="profil" class="nav-link">Profil</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <div class="dashboard-grid-full"> 
            <div class="main-content-area" id="mainContent">
                </div>
            
            <aside class="sidebar-area" style="display: none;">
                </aside>
        </div>
    </main>

    <script>
        // Ambil elemen penting
        const mainContent = document.getElementById('mainContent');
        const dashboardGrid = document.querySelector('.dashboard-grid-full');
        const navLinks = document.querySelectorAll('#mainNav a.nav-link');
        const sidebarArea = document.querySelector('.sidebar-area');

        // Fungsi untuk mengambil konten berdasarkan nama halaman
        function getContent(pageName) {
            switch (pageName) {
                
                // --- KONTEN HALAMAN BIMBINGAN (Sesuai Gambar Terbaru) ---
                case 'jadwal':
                    return `
                        <div class="welcome-header">
                            <h1><i class="fa-solid fa-calendar-alt"></i> Pengajuan Jadwal Bimbingan</h1>
                            <p>Ajukan permintaan bimbingan kepada Dosen Pembimbing Anda di sini.</p>
                        </div>

                        <div class="alert-info">
                            Dosen Pembimbing Anda: **Dr. Anisa P.** | Jadwal default: Setiap Senin, 10:00 WIB.
                        </div>

                        <div class="card">
                            <div class="card-header" style="border: none; padding-bottom: 0; margin-bottom: 20px;">Formulir Permintaan Bimbingan</div>
                            <form id="formJadwalBimbingan">
                                <div class="form-group">
                                    <label for="tanggalBimbingan">Tanggal Bimbingan yang Diajukan <span class="required-star">*</span></label>
                                    <div class="date-input-wrapper">
                                        <input type="text" 
                                               onfocus="(this.type='date')" 
                                               onblur="if(!this.value){this.type='text'}"
                                               id="tanggalBimbingan" 
                                               class="form-control" 
                                               placeholder="dd/mm/yyyy" 
                                               required>
                                        <i class="fa-regular fa-calendar-alt calendar-icon"></i>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="topikBimbingan">Topik Bimbingan <span class="required-star">*</span></label>
                                    <input type="text" id="topikBimbingan" class="form-control" placeholder="Cth: Review Bab 1 Laporan & Kendala Teknis" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="metodeBimbingan">Metode Bimbingan <span class="required-star">*</span></label>
                                    <select id="metodeBimbingan" class="form-select" required>
                                        <option value="">Pilih Metode</option>
                                        <option value="Online">Online (Video Call/Chat)</option>
                                        <option value="Offline">Offline (Bertemu Langsung)</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="lampiranDokumen">Unggah Dokumen (Draft Laporan/Logbook) (Opsional)</label>
                                    <div class="form-file">
                                        <input type="file" id="lampiranDokumen" accept=".pdf,.doc,.docx">
                                    </div>
                                </div>
                                
                                <div style="text-align: right; margin-top: 30px;">
                                    <button type="submit" class="btn btn-primary" style="min-width: 250px;"><i class="fa-solid fa-paper-plane"></i> Ajukan Jadwal Bimbingan</button>
                                </div>
                            </form>
                        </div>
                        
                        <div class="card" style="display: none;">
                            <div class="card-header"><i class="fa-solid fa-clock-rotate-left"></i> Riwayat Bimbingan Terakhir</div>
                            <p>Tidak ada riwayat bimbingan yang tercatat.</p>
                        </div>
                    `;
                // --- END KONTEN BIMBINGAN ---


                // --- KONTEN HALAMAN LAIN (Disesuaikan dari kode sebelumnya, agar navigasi tetap utuh) ---
                case 'beranda':
                    return `
                        <div class="welcome-header">
                            <h1>Selamat Datang di Beranda, Ahmad Fikri!</h1>
                            <p>Halaman ini berisi ringkasan semua informasi dan kemajuan PKL Anda.</p>
                        </div>
                        
                        <div class="card">
                            <div class="card-header"><i class="fa-solid fa-bars-progress"></i> Kemajuan PKL Anda</div>
                            <ul class="progress-tracker">
                                <li class="step completed">
                                    <div class="step-icon" style="background-color: var(--success);"><i class="fa-solid fa-check"></i></div>
                                    <div class="step-label">Pendaftaran</div>
                                </li>
                                <li class="step active">
                                    <div class="step-icon" style="background-color: var(--primary);"><i class="fa-solid fa-person-running"></i></div>
                                    <div class="step-label">Pelaksanaan</div>
                                </li>
                                <li class="step">
                                    <div class="step-icon" style="background-color: #e5e7eb;"><i class="fa-solid fa-file-lines"></i></div>
                                    <div class="step-label">Bimbingan</div>
                                </li>
                                <li class="step">
                                    <div class="step-icon" style="background-color: #e5e7eb;"><i class="fa-solid fa-flag-checkered"></i></div>
                                    <div class="step-label">Selesai</div>
                                </li>
                            </ul>
                            <div class="alert-info" style="margin-top: 20px; color: #166534; background-color: #dcfce7; border: 1px solid #166534;">
                                **Status Saat Ini:** Anda sedang dalam tahap **Pelaksanaan** PKL. Pastikan Logbook diisi!
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header"><i class="fa-solid fa-list-check"></i> Tugas & Tenggat Waktu Mendekat</div>
                            <div class="task-list">
                                <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 0; border-bottom: 1px solid #f1f5f9;">
                                    <div class="task-info">
                                        <strong>Laporan Akhir PKL</strong>
                                        <span style="display: block; font-size: 13px; color: var(--muted);">Tenggat: 30 November 2025</span>
                                    </div>
                                    <span style="padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600; background-color: #fcebeb; color: var(--danger);">Belum Diunggah</span>
                                </div>
                            </div>
                        </div>
                    `;
                case 'profil':
                     return `<div class="welcome-header"><h1><i class="fa-solid fa-user-circle"></i> Detail Profil Mahasiswa</h1><p>Periksa dan perbarui data pribadi serta akademik Anda.</p></div><div class="card"><div class="card-header">Data Pribadi</div><ul class="info-list"><li><span class="label">Nama Lengkap</span> <span class="value">Ahmad Fikri</span></li><li><span class="label">NIM</span> <span class="value">241735176598</span></li></ul></div>`;
                case 'perusahaan':
                     return `<div class="welcome-header"><h1><i class="fa-solid fa-building"></i> Informasi Perusahaan PKL</h1><p>Detail lokasi dan Pembimbing Lapangan Anda.</p></div><div class="card"><div class="card-header">Detail Perusahaan</div><ul class="info-list"><li><span class="label">Nama Perusahaan</span> <span class="value">PT. Arutmin Indonesia</span></li></ul></div>`;
                case 'pengajuan':
                    return `
                        <div class="welcome-header">
                            <h1><i class="fa-solid fa-file-export"></i> Formulir Pengajuan PKL</h1>
                            <p>Lengkapi formulir di bawah ini untuk mengajukan tempat Pelaksanaan Kerja Lapangan (PKL).</p>
                        </div>
                        <div class="alert-danger" style="padding: 15px; background-color: #fcebeb; color: var(--danger); border: 1px solid var(--danger); border-radius: 6px; margin-bottom: 20px; font-size: 14px;">
                            **PERHATIAN:** Anda sudah memiliki status **Diterima** di PT. Arutmin.
                        </div>
                        <div class="card"><div class="card-header">Data Perusahaan Tujuan</div><form id="formPengajuanPKL"><div class="form-group"><label for="namaPerusahaan">Nama Perusahaan Tujuan <span class="required-star">*</span></label><input type="text" id="namaPerusahaan" class="form-control" required></div></form></div>
                    `;

                default:
                    return `<div class="welcome-header"><h1 style="color: var(--danger);"><i class="fa-solid fa-circle-exclamation"></i> Halaman tidak ditemukan.</h1><p>Silakan kembali ke <a href="#" data-page="beranda" class="nav-link">Beranda</a>.</p></div>`;
            }
        }

        // Fungsi untuk menampilkan konten dan mengelola kelas aktif
        function loadPage(pageName) {
            // 1. Tampilkan Konten
            const contentHTML = getContent(pageName);
            mainContent.innerHTML = contentHTML;

            // 2. Kelola Kelas Aktif Navigasi
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('data-page') === pageName) {
                    link.classList.add('active');
                }
            });

            // 3. Kelola Layout Grid (Tampilkan/Sembunyikan Sidebar)
            // Halaman 'beranda' dan 'perusahaan' menggunakan sidebar (dashboard-grid)
            if (pageName === 'beranda' || pageName === 'perusahaan') { 
                dashboardGrid.classList.remove('dashboard-grid-full');
                dashboardGrid.classList.add('dashboard-grid');
                if (sidebarArea) sidebarArea.style.display = 'block';
            } else {
                // Halaman formulir ('jadwal', 'pengajuan', 'profil') full-width (dashboard-grid-full)
                dashboardGrid.classList.add('dashboard-grid-full');
                dashboardGrid.classList.remove('dashboard-grid');
                if (sidebarArea) sidebarArea.style.display = 'none';
            }

            // 4. (Opsional) Perbarui URL tanpa memuat ulang
            history.pushState({ page: pageName }, '', `?page=${pageName}`);
            
            // 5. Tambahkan event listener untuk submit formulir Jadwal Bimbingan (simulasi)
            if (pageName === 'jadwal') {
                const form = document.getElementById('formJadwalBimbingan');
                if (form) {
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        const tgl = document.getElementById('tanggalBimbingan').value;
                        alert('SIMULASI: Permintaan Jadwal Bimbingan berhasil diajukan untuk tanggal: ' + tgl);
                        // Bersihkan formulir setelah submit
                        form.reset();
                    });
                }
            }
        }

        // Event Listener untuk Navigasi
        navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const pageName = link.getAttribute('data-page');
                loadPage(pageName);
            });
        });

        // Muat halaman default saat pertama kali dibuka
        const urlParams = new URLSearchParams(window.location.search);
        const initialPage = urlParams.get('page') || 'jadwal'; // Set default ke 'jadwal'
        loadPage(initialPage);
        
    </script>

</body>
</html>