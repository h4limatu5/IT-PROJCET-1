<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transkrip Nilai Mahasiswa</title>
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
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
        }

        /* --- Header Halaman --- */
        .page-header {
            background-color: var(--card-bg);
            padding: 25px;
            border-radius: 12px;
            border: 1px solid var(--border);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        
        .student-info h1 {
            font-size: 24px;
            font-weight: 600;
        }

        .student-info p {
            color: var(--text-secondary);
            font-size: 15px;
        }
        
        .gpa-summary {
            text-align: right;
        }
        
        .gpa-summary h2 {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-blue);
        }
        
        .gpa-summary p {
            font-weight: 500;
            color: var(--text-secondary);
        }

        /* --- Tombol Aksi --- */
        .action-buttons {
            margin-bottom: 30px;
        }
        
        .btn {
            background-color: var(--primary-blue);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn i {
            margin-right: 8px;
        }
        
        .btn:hover {
            background-color: #0b5ed7;
        }
        
        /* --- Card Semester --- */
        .semester-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            border: 1px solid var(--border);
            margin-bottom: 25px;
            overflow: hidden;
        }
        
        .semester-header {
            padding: 15px 25px;
            background-color: var(--light-blue);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .semester-header h3 {
            font-size: 18px;
            font-weight: 600;
        }
        
        .semester-header .ips {
            font-weight: 500;
        }

        /* --- Tabel Nilai --- */
        .grades-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .grades-table th, .grades-table td {
            padding: 15px 25px;
            text-align: left;
            border-bottom: 1px solid var(--border);
        }

        .grades-table thead th {
            font-weight: 500;
            color: var(--text-secondary);
            font-size: 14px;
        }
        
        .grades-table tbody tr:last-child td {
            border-bottom: none;
        }

        .grades-table td.grade-letter {
            font-weight: 600;
            color: var(--primary-blue);
        }
        
    </style>
</head>
<body>

    <main class="container">
        <header class="page-header">
            <div class="student-info">
                <h1>Transkrip Nilai</h1>
                <p>Andi Saputra (210101001) - Teknik Informatika</p>
            </div>
            <div class="gpa-summary">
                <h2>3.85</h2>
                <p>Indeks Prestasi Kumulatif (IPK)</p>
            </div>
        </header>

        <div class="action-buttons">
            <a href="#" class="btn"><i class="fas fa-print"></i> Cetak Transkrip</a>
        </div>

        <section class="semester-card">
            <div class="semester-header">
                <h3>Semester 1</h3>
                <span class="ips">IPS: 3.90</span>
            </div>
            <table class="grades-table">
                <thead>
                    <tr>
                        <th>Kode MK</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Nilai Huruf</th>
                        <th>Nilai Angka</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>IF101</td>
                        <td>Algoritma & Pemrograman Dasar</td>
                        <td>3</td>
                        <td class="grade-letter">A</td>
                        <td>4.00</td>
                    </tr>
                    <tr>
                        <td>MA101</td>
                        <td>Kalkulus I</td>
                        <td>3</td>
                        <td class="grade-letter">A</td>
                        <td>4.00</td>
                    </tr>
                     <tr>
                        <td>SD101</td>
                        <td>Sistem Digital</td>
                        <td>3</td>
                        <td class="grade-letter">A-</td>
                        <td>3.70</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section class="semester-card">
            <div class="semester-header">
                <h3>Semester 2</h3>
                <span class="ips">IPS: 3.80</span>
            </div>
            <table class="grades-table">
                <thead>
                    <tr>
                        <th>Kode MK</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Nilai Huruf</th>
                        <th>Nilai Angka</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>IF201</td>
                        <td>Struktur Data</td>
                        <td>3</td>
                        <td class="grade-letter">A</td>
                        <td>4.00</td>
                    </tr>
                    <tr>
                        <td>IF202</td>
                        <td>Arsitektur Komputer</td>
                        <td>3</td>
                        <td class="grade-letter">B+</td>
                        <td>3.30</td>
                    </tr>
                     <tr>
                        <td>MA201</td>
                        <td>Kalkulus II</td>
                        <td>3</td>
                        <td class="grade-letter">A</td>
                        <td>4.00</td>
                    </tr>
                </tbody>
            </table>
        </section>
        
    </main>
</body>
</html>