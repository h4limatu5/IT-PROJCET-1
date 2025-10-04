<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Sistem Informasi PKL</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <style>
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
    .login-container {
      width: 100%; max-width: 450px;
      background: #fff; border-radius: 12px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.1);
      overflow: hidden; margin-bottom: 60px;
    }
    .login-header {
      background: #1a73e8; color: white;
      padding: 25px; text-align: center;
    }
    .login-header h1 { font-size: 24px; margin: 0; }
    .login-header p { font-size: 14px; margin-top: 5px; }

    .form-content { padding: 30px; }
    .form-section { display: none; }
    .form-section.active { display: block; animation: fadeIn 0.5s ease; }
    @keyframes fadeIn { from {opacity:0;transform:translateY(10px);} to {opacity:1;transform:translateY(0);} }

    .input-group { margin-bottom: 20px; position: relative; }
    .input-group label { display: block; font-size: 14px; margin-bottom: 8px; }
    .input-group input {
      width: 100%; padding: 12px 15px 12px 40px;
      border: 1px solid #ddd; border-radius: 8px;
      font-size: 15px; transition: border-color 0.3s;
    }
    .input-group input:focus { border-color:#1a73e8; box-shadow:0 0 0 2px rgba(26,115,232,0.2); outline:none; }
    .input-icon { position:absolute; left:15px; top:42px; color:#888; }

    .btn {
      display:block; width:100%;
      background:#1a73e8; color:white; border:none;
      padding:14px; border-radius:8px; font-size:16px;
      cursor:pointer; text-align:center; text-decoration:none;
    }
    .btn:hover { background:#155ab6; }

    .extra-links { text-align:center; margin-top:20px; font-size:14px; }
    .extra-links a { color:#1a73e8; text-decoration:none; }
    .extra-links a:hover { text-decoration:underline; }

    footer {
      position:absolute; bottom:0; left:0; right:0;
      padding:20px; text-align:center;
      color:rgba(255,255,255,0.85); font-size:14px;
    }

    /* Dropdown styling */
    .select-role {
      width: 100%;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 8px;
      margin-bottom: 20px;
      font-size: 15px;
      font-family: 'Poppins', sans-serif;
    }
    /* Social login button */
    .social-login {
      text-align: center;
      margin-top: 20px;
    }
    .social-login a.btn-google {
      background: #fff;
      color: #3c4043;
      padding: 12px 24px 12px 24px;
      border-radius: 4px;
      text-decoration: none;
      font-weight: 500;
      display: inline-block;
      border: 1px solid #dadce0;
      font-size: 14px;
      transition: background-color 0.2s, box-shadow 0.2s;
    }
    .social-login a.btn-google:hover {
      background: #f8f9fa;
      box-shadow: 0 1px 3px rgba(60,64,67,.30), 0 4px 8px 3px rgba(60,64,67,.15);
    }
    .social-login a.btn-google svg {
      margin-right: 8px;
      vertical-align: middle;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-header">
      <h1>Sistem Informasi PKL</h1>
      <p>Politeknik Negeri Tanah Laut</p>
    </div>

    <div class="form-content">
      <!-- Dropdown Pilih User -->
      <select class="select-role" onchange="showForm(this.value)">
        <option value="mahasiswa">Mahasiswa</option>
        <option value="kaprodi">kaprodi</option>
        <option value="dosen">Dosen</option>
        <option value="admin">Admin</option>
        <option value="perusahaan">Perusahaan</option>
      </select>

      <!-- Form Login Mahasiswa -->
      <div id="mahasiswa-form" class="form-section active">
        <form onsubmit="event.preventDefault(); window.location.href='dashboardmhs';">
          <div class="input-group">
            <label for="nim">NIM</label>
            <i class="fas fa-user input-icon"></i>
            <input type="text" id="nim" placeholder="Masukkan NIM Anda" required>
          </div>
          <div class="input-group">
            <label for="password-mhs">Password</label>
            <i class="fas fa-lock input-icon"></i>
            <input type="password" id="password-mhs" placeholder="Masukkan Password" required>
          </div>
          <button type="submit" class="btn">Login Mahasiswa</button>
        </form>
      </div>

      <!-- Form Login Dosen -->
      <div id="dosen-form" class="form-section">
        <form onsubmit="event.preventDefault(); window.location.href='dashdosen';">
          <div class="input-group">
            <label for="nip">NIP / Email</label>
            <i class="fas fa-user-tie input-icon"></i>
            <input type="text" id="nip" placeholder="Masukkan NIP atau Email" required>
          </div>
          <div class="input-group">
            <label for="password-dosen">Password</label>
            <i class="fas fa-lock input-icon"></i>
            <input type="password" id="password-dosen" placeholder="Masukkan Password" required>
          </div>
          <button type="submit" class="btn">Login Dosen</button>
        </form>
      </div>
      
      <!--from Login Kaprodi"-->
<div id="perusahaan-form" class="form-section">
        <form onsubmit="event.preventDefault(); window.location.href='mitra';">
          <div class="input-group">
            <label for="email-perusahaan">Email Perusahaan</label>
            <i class="fas fa-building input-icon"></i>
            <input type="email" id="email-perusahaan" placeholder="Masukkan Email Perusahaan" required>
          </div>
          <div class="input-group">
            <label for="password-perusahaan">Password</label>
            <i class="fas fa-lock input-icon"></i>
            <input type="password" id="password-perusahaan" placeholder="Masukkan Password" required>
          </div>
          <button type="submit" class="btn">Login Perusahaan</button>
        </form>
      </div>

      <!-- Form Login Admin -->
      <div id="admin-form" class="form-section">
        <form onsubmit="event.preventDefault(); window.location.href='dashadmin';">
          <div class="input-group">
            <label for="username">Username</label>
            <i class="fas fa-user-shield input-icon"></i>
            <input type="text" id="username" placeholder="Masukkan Username Admin" required>
          </div>
          <div class="input-group">
            <label for="password-admin">Password</label>
            <i class="fas fa-lock input-icon"></i>
            <input type="password" id="password-admin" placeholder="Masukkan Password" required>
          </div>
          <button type="submit" class="btn">Login Admin</button>
        </form>
      </div>

      <!-- Form Login Perusahaan -->
      <div id="perusahaan-form" class="form-section">
        <form onsubmit="event.preventDefault(); window.location.href='mitra';">
          <div class="input-group">
            <label for="email-perusahaan">Email Perusahaan</label>
            <i class="fas fa-building input-icon"></i>
            <input type="email" id="email-perusahaan" placeholder="Masukkan Email Perusahaan" required>
          </div>
          <div class="input-group">
            <label for="password-perusahaan">Password</label>
            <i class="fas fa-lock input-icon"></i>
            <input type="password" id="password-perusahaan" placeholder="Masukkan Password" required>
          </div>
          <button type="submit" class="btn">Login Perusahaan</button>
        </form>
      </div>

      <div class="extra-links">
        <a href="#">Lupa Password?</a>
      </div>


    </div>
  </div>

  <footer>
    <p>&copy; 2025 Politeknik Negeri Tanah Laut</p>
  </footer>

  <script>
    function showForm(formId) {
      const sections = document.querySelectorAll('.form-section');
      sections.forEach(s => s.classList.remove('active'));
      document.getElementById(formId + '-form').classList.add('active');
    }
  </script>
</body>
</html>
