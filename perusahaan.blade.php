<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Perusahaan - PKL</title>
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
        .btn-primary { background: var(--primary-blue); color: #fff; }
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
                <h2 class="text-3xl font-bold">Database Perusahaan</h2>
                <a href="#" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Perusahaan</a>
            </div>

            <div class="card">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Perusahaan</th>
                            <th>Alamat</th>
                            <th>Bidang Usaha</th>
                            <th>Kontak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>P001</td>
                            <td>PT. Teknologi Nusantara</td>
                            <td>Jl. Merdeka No. 10, Jakarta</td>
                            <td>Software Development</td>
                            <td>021-5551234</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>P002</td>
                            <td>CV. Kreatif Digital</td>
                            <td>Jl. Diponegoro No. 45, Bandung</td>
                            <td>Desain Grafis & Multimedia</td>
                            <td>022-8884567</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>P003</td>
                            <td>PT. Data Analytics</td>
                            <td>Jl. Gatot Subroto No. 20, Surabaya</td>
                            <td>Big Data & AI</td>
                            <td>031-7772345</td>
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
