<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Siswa - PKL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
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
        .max-w-7xl { max-width: 1280px; margin: 0 auto; padding: 0 1rem; }
        h2 { color: var(--primary-blue); }
        /* Tombol */
        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }
        .btn-primary {
            background: var(--primary-blue);
            color: #fff;
        }
        .btn-primary:hover { background: #153eaa; }
        .btn-warning { background: #facc15; color: #854d0e; }
        .btn-danger { background: #ef4444; color: #fff; }
        .btn-sm { padding: 6px 10px; font-size: 0.8rem; }
        /* Tabel */
        table { border-collapse: collapse; width: 100%; margin-top: 1rem; }
        thead { background-color: var(--primary-blue); color: #fff; }
        th, td { padding: 12px; text-align: left; }
        tbody tr:hover { background-color: var(--primary-light); color: #fff; }
        /* Card */
        .card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            padding: 1.5rem;
        }
        /* Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        /* Back link */
        .back-link {
            display: inline-flex;
            align-items: center;
            font-size: 0.9rem;
            color: var(--primary-blue);
            text-decoration: none;
            margin-bottom: 1rem;
        }
        .back-link i { margin-right: 6px; }
    </style>
</head>
<body>

    <section class="py-16">
        <div class="max-w-7xl">
            
            <a href="index.php" class="back-link"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
            
            <div class="page-header">
                <h2 class="text-3xl font-bold">Manajemen Siswa</h2>
                <a href="#" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Siswa</a>
            </div>

            <div class="card">
                <table>
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>Perusahaan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2401301001</td>
                            <td>Ahmad Rizki</td>
                            <td>Informatika</td>
                            <td>PT. Teknologi Nusantara</td>
                            <td><span class="btn btn-sm btn-primary">Aktif</span></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2401301002</td>
                            <td>Siti Aminah</td>
                            <td>Sistem Informasi</td>
                            <td>CV. Kreatif Digital</td>
                            <td><span class="btn btn-sm btn-primary">Aktif</span></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2401301003</td>
                            <td>Budi Santoso</td>
                            <td>Teknik Komputer</td>
                            <td>PT. Data Analytics</td>
                            <td><span class="btn btn-sm btn-primary">Aktif</span></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </section>

</body>
</html>
