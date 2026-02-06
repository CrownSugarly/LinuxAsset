<?php
// 1. Hubungkan ke file koneksi (sesuaikan jumlah ../ dengan kedalaman folder)
// Jika folder adalah views/pages/adm_instansi/hapuspegawai.php
// Maka butuh 3x ../ untuk sampai ke folder utama tempat config/ berada
include "../../../config/koneksi.php";

// 2. Ambil ID dari URL
$id = $_GET['id'] ?? '';

// 3. Pastikan ID tidak kosong sebelum melakukan query
if ($id != '') {
    // Gunakan mysqli_real_escape_string untuk keamanan dasar dari SQL Injection
    $id = mysqli_real_escape_string($koneksi, $id);

    // 4. Jalankan Query Hapus
    $query = mysqli_query($koneksi, "DELETE FROM pegawai WHERE id_pegawai = '$id'");

    if ($query) {
        // Jika berhasil, kirim pesan sukses melalui URL dan kembali ke index
        echo "<script>
                alert('Data berhasil dihapus!');
                window.location.href = '../../../index.php';
              </script>";
    } else {
        // Jika gagal
        echo "<script>
                alert('Gagal menghapus data: " . mysqli_error($koneksi) . "');
                window.location.href = '../../../index.php';
              </script>";
    }
} else {
    // Jika mencoba akses file ini tanpa ID
    header("location: ../../../index.php");
}
?>