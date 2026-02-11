<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { background-color: #f4f6f8; }
    </style>
</head>
<body>

<?php
// 1. Cek Koneksi
if (file_exists('../../config/koneksi.php')) {
    include '../../config/koneksi.php';
} else {
    include '../../../config/koneksi.php';
}

// 2. Panggil Class Modal Kamu
// Sesuaikan path ini dengan lokasi file modal.php kamu
if (file_exists('components/modal.php')) {
    include 'components/modal.php';
} else {
    die("File components/modal.php tidak ditemukan.");
}

// Render HTML Modal (Disembunyikan dulu, nanti dipanggil JS)
echo Modal::render();

// 3. Mulai Proses
if (isset($_POST['simpan'])) {
    
    // Tangkap data
    $nama     = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $gender   = $_POST['gender']; 
    $password = md5($_POST['password']); 

    // Validasi input kosong
    if(empty($nama) || empty($gender) || empty($_POST['password'])) {
        // Tampilkan Modal ERROR
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                showConfirm(
                    'javascript:history.back()', 
                    'Semua data wajib diisi!', 
                    'Gagal!', 
                    'btn-warning', 
                    'Kembali'
                );
            });
        </script>";
        exit;
    }

    // Generate Username Otomatis
    $nama_bersih = strtolower(str_replace(' ', '', $nama));
    $username_gen = substr($nama_bersih, 0, 5) . rand(100, 999);

    // Query INSERT
    $query = "INSERT INTO pegawai (Nama, Username, Sandi, Gender) 
              VALUES ('$nama', '$username_gen', '$password', '$gender')";

    $simpan = mysqli_query($koneksi, $query);

    if ($simpan) {
        // Tampilkan Modal SUKSES
        // URL diarahkan ke halaman list pegawai
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                showConfirm(
                    '../../index.php?page=kpegawai', 
                    'Pegawai baru berhasil ditambahkan.\\nUsername: $username_gen', 
                    'Berhasil!', 
                    'btn-success', 
                    'Lanjut'
                );
            });
        </script>";
    } else {
        // Tampilkan Modal ERROR DATABASE
        $error_msg = mysqli_error($koneksi);
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                showConfirm(
                    'javascript:history.back()', 
                    'Gagal menyimpan database: $error_msg', 
                    'Terjadi Kesalahan', 
                    'btn-danger', 
                    'Coba Lagi'
                );
            });
        </script>";
    }

} else {
    // Jika akses langsung
    header("Location: ../../index.php");
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Inisialisasi icon Lucide
    lucide.createIcons();
</script>

</body>
</html>