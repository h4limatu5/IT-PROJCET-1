<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF--8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Notifikasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        /* Variabel & Reset CSS */
        :root {
            --primary-blue: #0d6efd;
            --light-blue: #eef4ff;
            --background: #f8f9fa;
            --card-bg: #ffffff;
            --text-primary: #212529;
            --text-secondary: #6c757d;
            --border: #dee2e6;
            --green: #198754;
            --red: #dc3545;
            --yellow: #ffc107;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--background);
            color: var(--text-primary);
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }
        
        /* --- Header Halaman --- */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .page-header h1 {
            font-size: 28px;
            font-weight: 700;
        }
        
        .header-actions a {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 500;
            margin-left: 20px;
        }
        
        /* --- Card Notifikasi --- */
        .notifications-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            border: 1px solid var(--border);
            overflow: hidden;
        }
        
        .notifications-card h2 {
            font-size: 18px;
            padding: 15px 25px;
            background-color: var(--light-blue);
            border-bottom: 1px solid var(--border);
            font-weight: 600;
        }

        /* --- Item Notifikasi --- */
        .notification-list {
            list-style: none;
        }
        
        .notification-item {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            padding: 20px 25px;
            border-bottom: 1px solid var(--border);
            transition: background-color 0.3s;
        }
        
        .notification-item:last-child {
            border-bottom: none;
        }

        .notification-item:hover {
            background-color: var(--light-blue);
        }
        
        /* Ikon Notifikasi */
        .notification-icon {
            font-size: 20px;
            flex-shrink: 0;
            margin-top: 5px;
        }
        
        .icon-grade { color: var(--green); }
        .icon-deadline { color: var(--red); }
        .icon-payment { color: var(--yellow); }
        .icon-announcement { color: var(--primary-blue); }

        /* Konten Notifikasi */
        .notification-content p {
            margin: 0;
            font-size: 16px;
            line-height: 1.6;
        }
        
        .notification-content .meta {
            font-size: 14px;
            color: var(--text-secondary);
            margin-top: 5px;
        }
        
        /* Notifikasi Sudah Dibaca */
        .read {
            opacity: 0.7;
        }
        
        .read .notification-content p {
            font-weight: 400;
        }

        .unread {
             border-left: 4px solid var(--primary-blue);
        }

        .unread .notification-content p {
            font-weight: 500;
        }
        
        /* Spasi antar grup notifikasi */
        .group-spacer {
            height: 30px;
        }
        
    </style>
</head>
<body>

    <main class="container">
        <header class="page-header">
            <h1>Notifikasi</h1>
            <div class="header-actions">
                <a href="#">Tandai Semua Sudah Dibaca</a>
            </div>
        </header>

        <div class="notifications-card">
            <h2>Belum Dibaca</h2>
            <ul class="notification-list">
                <li class="notification-item unread">
                    <i class="fas fa-graduation-cap notification-icon icon-grade"></i>
                    <div class="notification-content">
                        <p>Nilai untuk mata kuliah <strong>Pemrograman Berorientasi Objek</strong> telah dipublikasikan.</p>
                        <div class="meta">1 jam yang lalu</div>
                    </div>
                </li>
                <li class="notification-item unread">
                    <i class="fas fa-exclamation-triangle notification-icon icon-deadline"></i>
                    <div class="notification-content">
                        <p>Tugas <strong>Proyek Akhir Basis Data</strong> akan berakhir dalam <strong>2 hari</strong>.</p>
                        <div class="meta">3 jam yang lalu</div>
                    </div>
                </li>
                <li class="notification-item unread">
                    <i class="fas fa-bullhorn notification-icon icon-announcement"></i>
                    <div class="notification-content">
                        <p><strong>Pengumuman Akademik:</strong> Jadwal Ujian Akhir Semester telah dirilis.</p>
                        <div class="meta">1 hari yang lalu</div>
                    </div>
                </li>
            </ul>
        </div>
        
        <div class="group-spacer"></div>

        <div class="notifications-card">
            <h2>Sudah Dibaca</h2>
             <ul class="notification-list">
                <li class="notification-item read">
                    <i class="fas fa-wallet notification-icon icon-payment"></i>
                    <div class="notification-content">
                        <p>Pembayaran UKT Semester Ganjil Anda telah berhasil diverifikasi.</p>
                        <div class="meta">3 hari yang lalu</div>
                    </div>
                </li>
                <li class="notification-item read">
                    <i class="fas fa-graduation-cap notification-icon icon-grade"></i>
                    <div class="notification-content">
                        <p>Nilai untuk mata kuliah <strong>Struktur Data</strong> telah dipublikasikan.</p>
                        <div class="meta">1 minggu yang lalu</div>
                    </div>
                </li>
            </ul>
        </div>
    </main>

</body>
</html>