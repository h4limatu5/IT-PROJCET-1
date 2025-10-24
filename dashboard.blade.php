<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard PKL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* Warna dasar */
        :root {
            --primary-blue: #1d4ed8;
            --primary-light: #60a5fa;
            --primary-bg: #f0f9ff;
            --text-dark: #1e293b;
            --text-gray: #475569;
        }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--primary-bg);
            color: var(--text-dark);
        }
        .max-w-7xl {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        h2 { color: var(--primary-blue); }
        /* Kartu fitur */
        .dashboard-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 1.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(29, 78, 216, 0.15);
        }
        /* Statistik */
        .stats-number {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary-blue);
        }
        /* Tabel */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        thead { background-color: var(--primary-blue); color: #fff; }
        th, td { padding: 12px; text-align: left; }
        tbody tr:hover { background-color: var(--primary-light); color: #fff; }
        /* Badge status */
        .status { padding: 4px 8px; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; }
        .done { background: #dcfce7; color: #166534; }
        .progress { background: #dbeafe; color: #1e40af; }
        .pending { background: #fef9c3; color: #854d0e; }
        /* Notifikasi */
        .notification {
            background: #fff;
            padding: 1rem;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        /* Grid */
        .grid { display: grid; gap: 1.5rem; }
        /* Responsif */
        @media (min-width: 768px) {
            .grid-cols-2 { grid-template-columns: repeat(2, 1fr); }
            .grid-cols-4 { grid-template-columns: repeat(4, 1fr); }
            .grid-cols-3 { grid-template-columns: 2fr 1fr; }
        }
        @media (max-width: 640px) {
            h2 { font-size: 1.5rem; }
            .stats-number { font-size: 1.5rem; }
        }
        /* Hilangkan underline link */
        a { text-decoration: none; color: inherit; }
    </style>
</head>
<body>

    <!-- Features Section -->
    <section id="dashboard" class="py-16">
        <div class="max-w-7xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Fitur Unggulan Sistem</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Platform komprehensif untuk mengelola seluruh aspek Praktek Kerja Lapangan dengan efisiensi maksimal</p>
            </div>

            <div class="grid grid-cols-2 grid-cols-4">
                <a href="manajemen_siswa.php">
                    <div class="dashboard-card">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-users text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Manajemen Siswa</h3>
                        <p class="text-gray-600">Kelola data siswa, kelompok PKL, dan penempatan dengan sistem yang terorganisir.</p>
                    </div>
                </a>

                <a href="database_perusahaan.php">
                    <div class="dashboard-card">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-building text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Database Perusahaan</h3>
                        <p class="text-gray-600">Katalog lengkap perusahaan mitra dengan rating dan review sistem terintegrasi.</p>
                    </div>
                </a>

                <a href="monitoring.php">
                    <div class="dashboard-card">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Monitoring Real-time</h3>
                        <p class="text-gray-600">Pantau perkembangan siswa dan aktivitas PKL secara real-time dengan dashboard interaktif.</p>
                    </div>
                </a>

                <a href="laporan.php">
                    <div class="dashboard-card">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-file-alt text-orange-600 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Laporan Otomatis</h3>
                        <p class="text-gray-600">Generate laporan lengkap dengan template profesional dan ekspor berbagai format.</p>
                    </div>
                </a>
            </div>

            <!-- Statistics -->
            <div class="grid grid-cols-2 grid-cols-4 mt-12">
                <div class="text-center p-6 bg-white rounded-xl shadow-md">
                    <div class="stats-number">256</div>
                    <p class="text-gray-600">Siswa Aktif</p>
                </div>
                <div class="text-center p-6 bg-white rounded-xl shadow-md">
                    <div class="stats-number">48</div>
                    <p class="text-gray-600">Perusahaan Mitra</p>
                </div>
                <div class="text-center p-6 bg-white rounded-xl shadow-md">
                    <div class="stats-number">92%</div>
                    <p class="text-gray-600">Tingkat Kelulusan</p>
                </div>
                <div class="text-center p-6 bg-white rounded-xl shadow-md">
                    <div class="stats-number">1,240</div>
                    <p class="text-gray-600">Laporan Terselesaikan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Activity -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl">
            <div class="grid grid-cols-3 gap-8">
                <!-- Aktivitas -->
                <div>
                    <h2 class="text-2xl font-bold mb-6">Aktivitas Terbaru</h2>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="overflow-x-auto">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Siswa</th>
                                        <th>Perusahaan</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ahmad Rizki</td>
                                        <td>PT. Teknologi Nusantara</td>
                                        <td><span class="status done">Selesai</span></td>
                                        <td>12 Jan 2024</td>
                                    </tr>
                                    <tr>
                                        <td>Siti Aminah</td>
                                        <td>CV. Kreatif Digital</td>
                                        <td><span class="status progress">Berjalan</span></td>
                                        <td>10 Jan 2024</td>
                                    </tr>
                                    <tr>
                                        <td>Budi Santoso</td>
                                        <td>PT. Data Analytics</td>
                                        <td><span class="status pending">Pending</span></td>
                                        <td>08 Jan 2024</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Notifikasi -->
                <div>
                    <h2 class="text-2xl font-bold mb-6">Pemberitahuan</h2>
                    <div class="space-y-4">
                        <div class="notification">
                            <div class="flex items-start space-x-3">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-calendar-check text-blue-600"></i>
                                </div>
                                <div>
                                    <p class="font-semibold">Jadwal Monitoring</p>
                                    <p class="text-sm text-gray-600">Monitoring lapangan besok pukul 09.00</p>
                                    <p class="text-xs text-gray-500">2 jam yang lalu</p>
                                </div>
                            </div>
                        </div>
                        <div class="notification">
                            <div class="flex items-start space-x-3">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-file-upload text-green-600"></i>
                                </div>
                                <div>
                                    <p class="font-semibold">Laporan Baru</p>
                                    <p class="text-sm text-gray-600">3 laporan mingguan telah diupload</p>
                                    <p class="text-xs text-gray-500">5 jam yang lalu</p>
                                </div>
                            </div>
                        </div>
                        <div class="notification">
                            <div class="flex items-start space-x-3">
                                <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user-plus text-purple-600"></i>
                                </div>
                                <div>
                                    <p class="font-semibold">Siswa Baru</p>
                                    <p class="text-sm text-gray-600">1 siswa baru telah mendaftar</p>
                                    <p class="text-xs text-gray-500">10 jam yang lalu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
