<?php
// 1. Cek Koneksi (Mundur 2 folder untuk cari config)
if (file_exists('../../config/koneksi.php')) {
    include '../../config/koneksi.php';
} else {
    include '../../../config/koneksi.php'; // Jaga-jaga jika folder lebih dalam
}

// 2. Mulai Proses
if (isset($_POST['simpan'])) {
    
    // Tangkap data dari form
    $id_pegawai = $_POST['id_pegawai'];
    $level_dipilih = $_POST['role']; // Mengambil value: "Admin Aset", "Teknisi", atau "Staf Aset"

    // Validasi: Pastikan data tidak kosong
    if(empty($id_pegawai) || empty($level_dipilih)) {
        echo "<script>alert('Harap pilih Pegawai dan Hak Akses!'); window.history.back();</script>";
        exit;
    }

    // 3. Generate Username & Password Baru
    // Contoh: User ID 5 -> Username: user5
    $username_baru = "user" . $id_pegawai;
    $password_baru = md5("123456"); 

    // ---------------------------------------------------------
    // LANGKAH A: Update tabel PEGAWAI (Isi Username & Sandi)
    // ---------------------------------------------------------
    $query_update = "UPDATE pegawai 
                     SET Username = '$username_baru', Sandi = '$password_baru' 
                     WHERE IdPegawai = '$id_pegawai'";
    
    $update = mysqli_query($koneksi, $query_update);

    if (!$update) {
        echo "<script>alert('Gagal Update Data Pegawai: " . mysqli_error($koneksi) . "'); window.history.back();</script>";
        exit;
    }

    // ---------------------------------------------------------
    // LANGKAH B: Insert ke tabel PENGELOLA_ASET (Isi Level)
    // ---------------------------------------------------------
    // Kita masukkan variabel $level_dipilih langsung ke kolom Level
    $query_insert = "INSERT INTO pengelola_aset (IdPegawai, Level) 
                     VALUES ('$id_pegawai', '$level_dipilih')";

    $insert = mysqli_query($koneksi, $query_insert);

    if ($insert) {
        echo "<script>alert('Berhasil! Pegawai kini menjabat sebagai $level_dipilih.'); window.location.href='../../index.php?page=pengelola_aset';</script>";
    } else {
        // Jika gagal insert, kembalikan (rollback) update username pegawai agar data bersih (opsional tapi disarankan)
        mysqli_query($koneksi, "UPDATE pegawai SET Username=NULL, Sandi=NULL WHERE IdPegawai='$id_pegawai'");
        
        echo "<script>alert('Gagal Menambahkan Admin: " . mysqli_error($koneksi) . "'); window.history.back();</script>";
    }

} else {
    // Jika akses langsung tanpa tombol
    header("Location: ../../index.php");
}
?>