<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    /* Styling untuk body, menambahkan latar belakang biru muda dan menempatkan form di tengah halaman */
    body {
      font-family: Arial, sans-serif;
      background-color: #eaf7ff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    /* Styling untuk card container */
    .card {
      background: #fff;
      width: 350px;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      overflow: hidden;
      text-align: center;
    }

    /* Styling untuk bagian header card (bagian atas) */
    .card-header {
      background: linear-gradient(to right, #2d7dff, #4fa3ff);
      color: #fff;
      padding: 20px 10px;
      font-size: 20px;
      font-weight: bold;
      border-bottom-left-radius: 50% 20%;
      border-bottom-right-radius: 50% 20%;
    }

    /* Styling untuk bagian body card */
    .card-body {
      padding: 20px;
    }

    .card-body h2 {
      margin-bottom: 20px;
      font-size: 22px;
      font-weight: bold;
      color: #333;
    }

    /* Styling untuk form input fields */
    .form-input {
      width: 95%;
      padding: 7px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }

    /* Styling untuk link 'forgot password' */
    .forgot {
      display: block;
      margin-bottom: 20px;
      font-size: 13px;
      color: #555;
      text-decoration: none;
      text-align: left;
    }

    .forgot:hover {
      color: #2d7dff;
    }

    /* Styling untuk tombol login */
    .btn {
      background: #2d7dff;
      color: white;
      border: none;
      padding: 12px;
      width: 100%;
      border-radius: 6px;
      font-size: 15px;
      cursor: pointer;
      font-weight: bold;
    }

    .btn:hover {
      background: #0056d6;
    }
  </style>
</head>
<body>
  <div class="card">
    <!-- Header card, menampilkan nama sekolah -->
    <div class="card-header">
      SMA ART OB
    </div>

    <!-- Body card, berisi form login -->
    <div class="card-body">
      <h2>Login</h2>

      <!-- Menampilkan pesan error jika ada validasi yang gagal -->
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      <!-- Form untuk login -->
      <form action="{{ route('login.auth') }}" method="POST">
        @csrf
        <!-- Input untuk Username -->
        <div class="mb-3 mt-3" style="text-align: left">
            <label for="username">Username</label>
            <input type="text" class="form-input" id="username" placeholder="Enter Username" name="username" required>
        </div>
        <!-- Input untuk Password -->
        <div class="mb-3" style="text-align: left">
            <label for="password">Password</label>
            <input type="password" class="form-input" id="password" placeholder="Enter Password" name="password" required>
        </div>

        <!-- Tombol Login -->
        <button type="submit" class="btn">Login</button>
      </form>
    </div>
  </div>
</body>
</html>
