<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae</title>
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

        /* Header */
        .cv-header {
            background-color: var(--card-bg);
            padding: 30px;
            border-radius: 12px;
            border: 1px solid var(--border);
            margin-bottom: 30px;
            text-align: center;
        }

        .cv-header h1 {
            font-size: 32px;
            font-weight: 700;
            color: var(--primary-blue);
            margin-bottom: 10px;
        }

        .cv-header p {
            font-size: 18px;
            color: var(--text-secondary);
        }

        /* Section */
        .cv-section {
            background-color: var(--card-bg);
            border-radius: 12px;
            border: 1px solid var(--border);
            margin-bottom: 25px;
            overflow: hidden;
        }

        .section-header {
            padding: 20px 25px;
            background-color: var(--light-blue);
            border-bottom: 1px solid var(--border);
        }

        .section-header h2 {
            font-size: 20px;
            font-weight: 600;
            color: var(--primary-blue);
        }

        .section-content {
            padding: 25px;
        }

        .info-item {
            margin-bottom: 15px;
        }

        .info-item strong {
            display: inline-block;
            width: 150px;
            font-weight: 600;
        }

        .education-item, .experience-item, .skill-item {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border);
        }

        .education-item:last-child, .experience-item:last-child, .skill-item:last-child {
            border-bottom: none;
        }

        .education-item h3, .experience-item h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .education-item p, .experience-item p {
            color: var(--text-secondary);
            margin-bottom: 5px;
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .skill-category h3 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .skill-list {
            list-style: none;
        }

        .skill-list li {
            margin-bottom: 5px;
            color: var(--text-secondary);
        }

        /* Action Buttons */
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
    </style>
</head>
<body>

    <main class="container">
        <header class="cv-header">
            <h1>{{ $mahasiswa->name ?? 'Nama tidak tersedia' }}</h1>
            <p>Mahasiswa {{ $mahasiswa->program_studi ?? 'Program Studi tidak tersedia' }}</p>
        </header>

        <div class="action-buttons">
            <a href="#" class="btn"><i class="fas fa-print"></i> Cetak CV</a>
            <a href="#" class="btn"><i class="fas fa-download"></i> Download PDF</a>
        </div>

        <section class="cv-section">
            <div class="section-header">
                <h2><i class="fas fa-user"></i> Informasi Pribadi</h2>
            </div>
            <div class="section-content">
                <div class="info-item">
                    <strong>Nama Lengkap:</strong> {{ $mahasiswa->name ?? 'Nama tidak tersedia' }}
                </div>
                <div class="info-item">
                    <strong>NIM:</strong> {{ $mahasiswa->nim ?? 'NIM tidak tersedia' }}
                </div>
                <div class="info-item">
                    <strong>Program Studi:</strong> {{ $mahasiswa->program_studi ?? 'Program Studi tidak tersedia' }}
                </div>
                <div class="info-item">
                    <strong>Universitas:</strong> Politeknik Negeri Tanah Laut
                </div>
                <div class="info-item">
                    <strong>Alamat:</strong> Jl. Sudirman No. 123, Tanah Laut
                </div>
                <div class="info-item">
                    <strong>Email:</strong> {{ $mahasiswa->email ?? 'Email tidak tersedia' }}
                </div>
                <div class="info-item">
                    <strong>Telepon:</strong> {{ $mahasiswa->phone ?? 'Telepon tidak tersedia' }}
                </div>
                <div class="info-item">
                    <strong>Tanggal Lahir:</strong> 15 Mei 2002
                </div>
            </div>
        </section>

        <section class="cv-section">
            <div class="section-header">
                <h2><i class="fas fa-graduation-cap"></i> Pendidikan</h2>
            </div>
            <div class="section-content">
                <div class="education-item">
                    <h3>Politeknik Negeri Tanah Laut</h3>
                    <p>Sarjana Terapan Teknik Informatika</p>
                    <p>2020 - Sekarang (Semester 6)</p>
                    <p>IPK: 3.85</p>
                </div>
                <div class="education-item">
                    <h3>SMA Negeri 1 Batu Ampar</h3>
                    <p>Jurusan IPA</p>
                    <p>2017 - 2020</p>
                    <p>Nilai Rata-rata: 85.5</p>
                </div>
            </div>
        </section>

        <section class="cv-section">
            <div class="section-header">
                <h2><i class="fas fa-briefcase"></i> Pengalaman</h2>
            </div>
            <div class="section-content">
                <div class="experience-item">
                    <h3>Anggota Divisi TI</h3>
                    <p>Januari 2023 - Desember 2023</p>
                    <p>Bertanggung jawab dalam pengelolaan website organisasi dan dokumentasi kegiatan berbasis digital.</p>
                </div>
                <div class="experience-item">
                    <h3>Freelance Web Developer</h3>
                    <p>Proyek Individu</p>
                    <p>2022 - Sekarang</p>
                    <p>Mengembangkan website sederhana menggunakan HTML, CSS, dan JavaScript</p>
                </div>
            </div>
        </section>

        <section class="cv-section">
            <div class="section-header">
                <h2><i class="fas fa-tools"></i> Keterampilan</h2>
            </div>
            <div class="section-content">
                <div class="skills-grid">
                    <div class="skill-category">
                        <h3>Bahasa Pemrograman</h3>
                        <ul class="skill-list">
                            <li>PHP (Laravel)</li>
                            <li>JavaScript</li>
                            <li>Python</li>
                            <li>Java</li>
                        </ul>
                    </div>
                    <div class="skill-category">
                        <h3>Framework & Tools</h3>
                        <ul class="skill-list">
                            <li>Laravel</li>
                            <li>React.js</li>
                            <li>MySQL</li>
                            <li>Git</li>
                        </ul>
                    </div>
                    <div class="skill-category">
                        <h3>Bahasa</h3>
                        <ul class="skill-list">
                            <li>Bahasa Indonesia (Native)</li>
                            <li>Bahasa Inggris (Intermediate)</li>
                        </ul>
                    </div>
                    <div class="skill-category">
                        <h3>Lainnya</h3>
                        <ul class="skill-list">
                            <li>Microsoft Office</li>
                            <li>Adobe Photoshop</li>
                            <li>Problem Solving</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
