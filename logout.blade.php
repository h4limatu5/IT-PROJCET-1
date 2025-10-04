<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logout - Sistem Informasi PKL</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  
  <style>
    /* Menggunakan kembali styling dari halaman login untuk konsistensi */
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'Poppins', sans-serif;
      background-image: url(Gedung.jpg);
      background-size: cover;
      background-position: center;
      display: flex; justify-content: center; align-items: center;
      min-height: 100vh; padding: 20px;
      font-weight: bold;
    }
    .logout-container {
      width: 100%; max-width: 450px;
      background: #fff; border-radius: 12px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.1);
      overflow: hidden; margin-bottom: 60px;
    }
    .logout-header {
      background: #1a73e8; color: white;
      padding: 25px; text-align: center;
    }
    .logout-header h1 { font-size: 24px; margin: 0; }
    .logout-header p { font-size: 14px; margin-top: 5px; }
    
    .logout-content { padding: 30px; }

    .btn {
      display:block; width:100%;
      background:#1a73e8; color:white; border:none;
      padding:14px; border-radius:8px; font-size:16px;
      cursor:pointer; text-align:center; text-decoration:none;
      transition: background 0.3s ease;
    }
    .btn:hover { background:#155ab6; }

    footer {
      position:absolute; bottom:0; left:0; right:0;
      padding:20px; text-align:center;
      color:rgba(255,255,255,0.85); font-size:14px;
    }

    /* Styling khusus untuk halaman logout */
    .logout-message {
      text-align: center;
      font-size: 16px;
      color: #555;
      margin-bottom: 25px;
      line-height: 1.5;
    }
  </style>
</head>
<body>

  <div class="logout-container">
    <div class="logout-header">
      <h1>Logout Berhasil</h1>
      <p>Sistem Informasi PKL Politeknik Negeri Tanah Laut</p>
    </div>
    
    <div class="logout-content">
      <p class="logout-message">Terima kasih telah menggunakan layanan kami. Anda telah berhasil keluar dari sistem.</p>
      <ul>
        <li><a href="{{ route('login') }}" class="btn">Kembali ke Halaman Login</a></li>
      </ul>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 Politeknik Negeri Tanah Laut</p>
  </footer>

</body>
</html>