<?php
// Jalankan hanya saat form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Koneksi DB
    $conn = new mysqli("localhost", "root", "", "db_bukutamu");
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Ambil data dari form
    $nama      = $_POST['nama'] ?? '';
    $nama_siswa = $_POST['nama_siswa'] ?? '';
    $kelas = $_POST['kelas'] ?? '';
    $alamat    = $_POST['alamat'] ?? '';
    $keperluan  = $_POST['keperluan'] ?? '';
    $kontak     = $_POST['kontak'] ?? '';
    $guru      = $_POST['guru'] ?? '';
    $waktu     = $_POST['waktu'] ?? '';
    $tanggal   = $_POST['tanggal'] ?? '';
    $foto_data = $_POST['foto_data'] ?? '';

    // Simpan foto base64 (jika ada)
    $foto_path = null;
    if (!empty($foto_data)) {
        $img = str_replace('data:image/png;base64,', '', $foto_data);
        $img = str_replace(' ', '+', $img);
        $imgData = base64_decode($img);

       if (preg_match('/^data:image\/(\w+);base64,/', $foto_data, $type)) {
  $img = substr($foto_data, strpos($foto_data, ',') + 1);
  $type = strtolower($type[1]); // jpg, png, gif
  if (!in_array($type, ['jpg','jpeg','png','gif'])) {
    throw new Exception('Invalid image type');
  }
}
  $imgData = base64_decode($img);

  // Nama file unik
  $filename = uniqid() . '.' . $type;
  // Path ke storage Laravel (pastikan folder sudah ada dan permission benar)
  $storagePath = dirname(__DIR__, 2) . '/admin/storage/app/public/ortu/';
  if (!is_dir($storagePath)) {
    mkdir($storagePath, 0777, true);
  }
  $fullpath = $storagePath . $filename;
  file_put_contents($fullpath, $imgData);

  // Path yang disimpan ke DB (agar bisa diakses via Laravel storage:link)
  $foto_path = 'ortu/' . $filename;
    }

    // // Insert ke orangtua (dummy karena form kamu belum punya field anak/kelas/alamat)
  $sql_ortu = "INSERT INTO orangtua (nama_orangtua, nama_siswa, kelas, alamat, kontak, guru_dituju, keperluan, waktu_kunjungan, tanggal, foto, created_at, updated_at)
             VALUES ('$nama', '$nama_siswa', '$kelas', '$alamat', '$kontak', '$guru', '$keperluan', '$waktu', '$tanggal', '$foto_path', NOW(), NOW())";

    $conn->query($sql_ortu);

    $conn->close();

    echo "<script>alert('Data berhasil disimpan ke semua tabel!'); window.location.href='ortu.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buku Tamu Instansi</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <!-- Back Button -->
  <a href="index.html" class="back-btn">
    <i class="fas fa-arrow-left"></i>
    Kembali ke Halaman Utama
  </a>

  <!-- Header -->
<header>
    <h1><i class="fas fa-building animate-pulse"></i> BUKU TAMU ORANG TUA SISWA/I<br>SMKN 13 BANDUNG</h1>
    <div class="social-icons">
      <a href="https://www.facebook.com/share/1FhqvT1T2P/"><i class="fab fa-facebook"></i></a>
     
      <a href="https://youtube.com/@smkn13bandungofficial?si=Y6pBBdaYOLR9Ls51"><i class="fab fa-youtube"></i></a>
      <a href="https://www.instagram.com/smkn13bandung?igsh=MTY3aGh3NDF0eno1dQ=="><i class="fab fa-instagram"></i></a>
    </div>
  </header>

  <!-- Form Container -->
  <div class="container">
    <h2><i class="fas fa-clipboard-list"></i> FORM KUNJUNGAN ORANG TUA SISWA/I</h2>
    
    <form action="ortu.php" method="POST" id="ortuForm">
      <div class="form-row">
        <!-- Nama -->
        <div class="form-group" style="--delay: 1">
          <label for="nama">
            <i class="fas fa-user"></i>Nama Lengkap Orang Tua Siswa/I
          </label>
          <input type="text" id="nama" name="nama" required placeholder="Masukkan nama lengkap Anda">
        </div>

        <!-- Nama Siswa/i-->
        <div class="form-group" style="--delay: 2">
          <label for="nama_siswa">
            <i class="fas fa-graduation-cap"></i>Nama Lengkap Siswa/i
          </label>
          <input type="text" id="nama_siswa" name="nama_siswa" required placeholder="Masukkan nama lengkap siswa/i">
        </div>
      </div>

      <label for="kelas">📘 Pilih Kelas</label>
<select id="kelas" name="kelas" class="form-control">
     <option value="">-- Pilih Kelas --</option>

  <!-- kelas 10 -->
  <option value="X RPL 1">X RPL 1 </option>
  <option value="X RPL 2">X RPL 2</option>
  <option value="X TKJ 1">X TKJ 1</option>
  <option value="X TKJ 2">X TKJ 2</option>
  <option value="X TKJ 3">X TKJ 3 </option>
  <option value="X KA 1">X KA 1</option>
  <option value="X KA 2">X KA 2</option>
  <option value="X KA 3">X KA 3</option>
  <option value="X KA 4">X KA 4</option>
  <option value="X KA 5">X KA 5</option>
  <option value="X KA 6">X KA 6</option>
  
  <!-- kelas 11 -->
  <option value="XI RPL 1">XI RPL 1</option>
  <option value="XI RPL 2">XI RPL 2</option>
  <option value="XI TKJ 1">XI TKJ 2</option>
  <option value="XI TKJ 2">XI TKJ 2</option>
  <option value="XI TKJ 2">XI TKJ 3</option>
  <option value="XI KA 1">XI KA 1</option>
  <option value="XI KA 2">XI KA 2</option>
  <option value="XI KA 3">XI KA 3</option>
  <option value="XI KA 4">XI KA 4</option>
  <option value="XI KA 5">XI KA 5</option>
  <option value="XI KA 6">XI KA 6</option>

 <!-- kelas 12 -->
  <option value="XII RPL 1">XII RPL 1</option>
  <option value="XII RPL 2">XII RPL 2</option>
  <option value="XII TKJ 1">XII TKJ 1</option>
  <option value="XII TKJ 2">XII TKJ 2</option>
  <option value="XII TKJ 3">XII TKJ 3</option>
  <option value="XII KA 1">XII KA 1</option>
  <option value="XII KA 2">XII KA 2</option>
  <option value="XII KA 3">XII KA 3</option>
  <option value="XII KA 4">XII KA 4</option>
  <option value="XII KA 5">XII KA 5</option>
  <option value="XII KA 6">XII KA 6</option>
 
  <!-- kelas 13 -->
  <option value="XIII KA 1">XIII KA 1</option>
  <option value="XIII KA 2">XIII KA 2</option>
  <option value="XIII KA 3">XIII KA 3</option>
  <option value="XIII KA 4">XIII KA 4</option>
  <option value="XIII KA 5">XIII KA 5</option>
  <option value="XIII KA 6">XIII KA 6</option>
    </select>

      

      <!-- Alamat -->
      <div class="form-group full-width" style="--delay: 3">
        <label for="alamat">
          <i class="fas fa-map-marker-alt"></i>Alamat
        </label>
        <textarea id="alamat" name="alamat" required rows="4" placeholder="Masukkan alamat Anda"></textarea>
      </div>

      <!-- Keperluan -->
      <div class="form-group full-width" style="--delay: 4">
        <label for="keperluan">
          <i class="fas fa-clipboard"></i>Keperluan
        </label>
        <textarea id="keperluan" name="keperluan" required rows="4" placeholder="Jelaskan tujuan kunjungan Anda secara singkat"></textarea>
      </div>

      <div class="form-row">
        <!-- Kontak -->
        <div class="form-group" style="--delay: 5">
          <label for="kontak">
            <i class="fas fa-phone"></i>Nomor Kontak
          </label>
          <input type="tel" id="kontak" name="kontak" placeholder="Contoh: 08123456789">
        </div>

        <!-- Pilih Guru -->
        <div class="form-group" style="--delay: 6">
          <label for="guru">
            <i class="fas fa-chalkboard-teacher"></i>Guru yang Dituju
          </label>
          <select id="guru" name="guru">
            <option value="">-- Pilih Guru --</option>
            <option value="A.R Fauzan, S.Ip. M.M">A.R Fauzan, S.Ip. M.M</option>
            <option value="Ade Hartono, S.Pd">Ade Hartono, S.Pd</option>
            <option value="Ade Rahmat Nugraha">Ade Rahmat Nugraha</option>
            <option value="Adiwiguna, S.Pd">Adiwiguna, S.Pd</option>
            <option value="Ahmad Saripuloh">Ahmad Saripuloh</option>
            <option value="Anggita Septiani, S.T.P, M.Pd">Anggita Septiani, S.T.P, M.Pd</option>
            <option value="Annisa Intikarusdiansari, S.Pd.">Annisa Intikarusdiansari, S.Pd.</option>
            <option value="Apriliani Hardiyanti Hariyono, S.Pd">Apriliani Hardiyanti Hariyono, S.Pd</option>
            <option value="Ariantonius Sagala, S.Kom">Ariantonius Sagala, S.Kom</option>
            <option value="Asep Saleh, S.E">Asep Saleh, S.E</option>
            <option value="Atep Aulia Rahman, S.T. M.Kom">Atep Aulia Rahman, S.T. M.Kom</option>
            <option value="Cecep Suryana, S.Si">Cecep Suryana, S.Si</option>
            <option value="Dadan Rukma">Dadan Rukma</option>
            <option value="Dian Dawan, S.Pd">Dian Dawan, S.Pd</option>
            <option value="Danty, S.Pd.">Danty, S.Pd.</option>
            <option value="Dede Saepudin, S.Pd">Dede Saepudin, S.Pd</option>
            <option value="Dedi Efendi, S.Kom">Dedi Efendi, S.Kom</option>
            <option value="Dedi Jaenudin">Dedi Jaenudin</option>
            <option value="Dena Handriana, M.Pd">Dena Handriana, M.Pd</option>
            <option value="Desta Mulyanti, S.Sn">Desta Mulyanti, S.Sn</option>
            <option value="Dicky Zulkarnaen">Dicky Zulkarnaen</option>
            <option value="Dini Karomna, S.Pd">Dini Karomna, S.Pd</option>
            <option value="Dr. Ermawati, M.Kom">Dr. Ermawati, M.Kom</option>
            <option value="Dr. Hj. Yani Heryani, M.M.Pd">Dr. Hj. Yani Heryani, M.M.Pd</option>
            <option value="Dr. Sudarmi, M.Pd">Dr. Sudarmi, M.Pd</option>
            <option value="Dra. Mimy Ardiany, M.Pd">Dra. Mimy Ardiany, M.Pd</option>
            <option value="Dra. Rahmi Dalilah Fitrianni">Dra. Rahmi Dalilah Fitrianni</option>
            <option value="Dra. Weni Asmaraeni">Dra. Weni Asmaraeni</option>
            <option value="Ela Nurlaela, S.Pd">Ela Nurlaela, S.Pd</option>
            <option value="Endah Permatasari">Endah Permatasari</option>
            <option value="Endang Misnam">Endang Misnam</option>
            <option value="Endang Sunandar, S.Pd., M.Pkim">Endang Sunandar, S.Pd., M.Pkim</option>
            <option value="Eti Ariesanti, S.Pd">Eti Ariesanti, S.Pd</option>
            <option value="Eva Zulva, S.Kom,I">Eva Zulva, S.Kom,I</option>
            <option value="Fahira Armi Ramadhani, S.T">Fahira Armi Ramadhani, S.T</option>
            <option value="Fertika, S.Pd">Fertika, S.Pd</option>
            <option value="Gina Urfah Mastur Sadili, S.Pd.">Gina Urfah Mastur Sadili, S.Pd.</option>
            <option value="Halida Farhani, S.Psi">Halida Farhani, S.Psi</option>
            <option value="Hasan As'ari, M.Kom">Hasan As'ari, M.Kom</option>
            <option value="Hazar Nurbani, M.Pd">Hazar Nurbani, M.Pd</option>
            <option value="Hendra">Hendra</option>
            <option value="Heni Juhaeni, S.Pd">Heni Juhaeni, S.Pd</option>
            <option value="Iah Robiah, S.Pd. Kim.">Iah Robiah, S.Pd. Kim.</option>
            <option value="Ina Marina, S.T">Ina Marina, S.T</option>
            <option value="Indira Sari Paputungan, M.Ed. Gr">Indira Sari Paputungan, M.Ed. Gr</option>
            <option value="Indra Adiguna, S.T">Indra Adiguna, S.T</option>
            <option value="Iwan Setiawan">Iwan Setiawan</option>
            <option value="Jaya Sumpena, M.Kom">Jaya Sumpena, M.Kom</option>
            <option value="Kania Dewi Waluya, S.S.T">Kania Dewi Waluya, S.S.T</option>
            <option value="Kiki Aima Mu'mina, S.Pd">Kiki Aima Mu'mina, S.Pd</option>
            <option value="Lia Yulianti, M.Pd">Lia Yulianti, M.Pd</option>
            <option value="Maspuri Andewi, S.Kom">Maspuri Andewi, S.Kom</option>
            <option value="Maya Kusmayanti, M.Pd">Maya Kusmayanti, M.Pd</option>
            <option value="Meli Novita, M.M.Pd">Meli Novita, M.M.Pd</option>
            <option value="Mira Apriyani">Mira Apriyani</option>
            <option value="Muchamad Harry Ismail, S.T.R.Kom, M.M">Muchamad Harry Ismail, S.T.R.Kom, M.M</option>
            <option value="Nadia Afriliani, S.Pd">Nadia Afriliani, S.Pd</option>
            <option value="Neneng Suhartini, S.Si, S.Pd. Gr">Neneng Suhartini, S.Si, S.Pd. Gr</option>
            <option value="Nina Dewi Koswara, S.Pd">Nina Dewi Koswara, S.Pd</option>
            <option value="Nofa Nirawati, S.Pd, M.T">Nofa Nirawati, S.Pd, M.T</option>
            <option value="Nogi Muharam, S.Kom.">Nogi Muharam, S.Kom.</option>
            <option value="Nur Fauziyah Rahmawati, S.Pd">Nur Fauziyah Rahmawati, S.Pd</option>
            <option value="Nurlaela, Sh">Nurlaela, Sh</option>
            <option value="Nurul Diningsih, S.Hum">Nurul Diningsih, S.Hum</option>
            <option value="Octavina Sopamena, M.Pd">Octavina Sopamena, M.Pd</option>
            <option value="Odang Supriatna, S.E.">Odang Supriatna, S.E.</option>
            <option value="Oman Somana, M.Pd">Oman Somana, M.Pd</option>
            <option value="Popong Wariati, S.Pd">Popong Wariati, S.Pd</option>
            <option value="Pratiwi, S.S.I">Pratiwi, S.S.I</option>
            <option value="Priyo Hadisuryo, S.S.T">Priyo Hadisuryo, S.S.T</option>
            <option value="Rakiman">Rakiman</option>
            <option value="Rani Rabiussani, M.Pd">Rani Rabiussani, M.Pd</option>
            <option value="Regina Fitrie, S.Pd">Regina Fitrie, S.Pd</option>
            <option value="Ricky Valentine">Ricky Valentine</option>
            <option value="Rina Daryani, M.Pd">Rina Daryani, M.Pd</option>
            <option value="Rini Dwiwahyuni, S.Pd">Rini Dwiwahyuni, S.Pd</option>
            <option value="Riska Fitriyanti, A.Md">Riska Fitriyanti, A.Md</option>
            <option value="Rita Hartati, S.Pd, M.T">Rita Hartati, S.Pd, M.T</option>
            <option value="Roby Ismail Adi Putra, S.A.P">Roby Ismail Adi Putra, S.A.P</option>
            <option value="Ruhya, S.Ag, M.M.Pd">Ruhya, S.Ag, M.M.Pd</option>
            <option value="Rukmana, S.Pd.I">Rukmana, S.Pd.I</option>
            <option value="Sabila Fauziyya, S.Kom">Sabila Fauziyya, S.Kom</option>
            <option value="Safitri Insani, S.T.P">Safitri Insani, S.T.P</option>
            <option value="Samsudin, S.Ag">Samsudin, S.Ag</option>
            <option value="Santika, M.Pd">Santika, M.Pd</option>
            <option value="Sarinah Br Ginting, M.Pd">Sarinah Br Ginting, M.Pd</option>
            <option value="Shendy Antariksa, S.Hum">Shendy Antariksa, S.Hum</option>
            <option value="Sugiyatmi, S.Si">Sugiyatmi, S.Si</option>
            <option value="Sukmawidi, S.Pd">Sukmawidi, S.Pd</option>
            <option value="Syafitri Kurniati Arief, S.Pd, M.T">Syafitri Kurniati Arief, S.Pd, M.T</option>
            <option value="Taufik Hidayat, M.Pd">Taufik Hidayat, M.Pd</option>
            <option value="Tessa Eka Yuniar, S.Pd">Tessa Eka Yuniar, S.Pd</option>
            <option value="Tini Rosmayani, S.Si">Tini Rosmayani, S.Si</option>
            <option value="Tita Heriyanti, S.Pd">Tita Heriyanti, S.Pd</option>
            <option value="Tita Lismayanti, S.Pd">Tita Lismayanti, S.Pd</option>
            <option value="Tiyas Rizkia, S.Li.">Tiyas Rizkia, S.Li.</option>
            <option value="Tubagus Saputra, M.Pd">Tubagus Saputra, M.Pd</option>
            <option value="Ujang Suhara, S.Pd">Ujang Suhara, S.Pd</option>
            <option value="Uli Solihat Kamaluddin, S.Si, Gr">Uli Solihat Kamaluddin, S.Si, Gr</option>
            <option value="Wanto Kurniawan">Wanto Kurniawan</option>
          
            <option value="Windy Novia Anggraeni, S.Si">Windy Novia Anggraeni, S.Si</option>
            <option value="Yeni Meilina, S.Pd">Yeni Meilina, S.Pd</option>
            <option value="Zaka Faishal Hadiyan S, Kom">Zaka Faishal Hadiyan S, Kom</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <!-- Waktu -->
        <div class="form-group" style="--delay: 7">
          <label for="waktu">
            <i class="fas fa-clock"></i>Waktu Kunjungan
          </label>
          <input type="time" id="waktu" name="waktu" required>
        </div>

        <!-- Tanggal -->
        <div class="form-group" style="--delay: 8">
          <label for="tanggal">
            <i class="fas fa-calendar"></i>Tanggal Kunjungan
          </label>
          <input type="date" id="tanggal" name="tanggal" required>
        </div>
      </div>

      <!-- Foto Pengunjung -->
      <div class="form-group full-width" style="--delay: 9">
        <label for="foto">
          <i class="fas fa-camera"></i>Foto Pengunjung
        </label>
        <div class="camera-container">
          <div id="camera-warning" class="camera-warning" style="display: none;">
            <i class="fas fa-exclamation-triangle"></i>
            Pastikan browser memiliki akses kamera dan Anda mengizinkan penggunaan kamera.
          </div>
          <video id="camera" autoplay playsinline style="display: none;"></video>
          <canvas id="canvas" style="display: none;"></canvas>
          <div id="photo-preview" class="photo-preview">
            <div class="camera-placeholder">
              <i class="fas fa-user-circle"></i>
              <p>Klik tombol kamera untuk mengambil foto</p>
            </div>
          </div>
            <div class="camera-controls">
            <button type="button" id="start-camera" class="camera-btn">
              <i class="fas fa-camera"></i> Buka Kamera
            </button>
            <button type="button" id="take-photo" class="camera-btn" style="display: none;">
              <i class="fas fa-camera-retro"></i> Ambil Foto
            </button>
            <button type="button" id="retake-photo" class="camera-btn" style="display: none;">
              <i class="fas fa-redo"></i> Foto Ulang
            </button>
            <button type="button" id="stop-camera" class="camera-btn" style="display: none;">
              <i class="fas fa-stop"></i> Tutup Kamera
            </button>
          </div>
        </div>
        <input type="hidden" id="foto_data" name="foto_data">
      </div>

      <!-- Submit Button -->
      <button type="submit" style="--delay: 10">
        <i class="fas fa-paper-plane"></i>
        Kirim Data Kunjungan
      </button>
    </form>
  </div>

  <!-- Footer -->
  <footer>
    <p><i class="fas fa-school"></i> <strong>SMKN 13 BANDUNG</strong></p>
    <p>Menjadi sekolah kejuruan yang menghasilkan tamatan kompeten dan berkarakter</p>
    <p style="margin-top: 10px; font-size: 12px;">Dibuat Oleh Curi | Menggunakan HTML, CSS dan JavaScript</p>
  </footer>

  <script src="js/script.js"></script>
</body>
</html>