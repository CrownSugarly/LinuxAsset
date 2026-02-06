<?php
// Mengambil kunci pertama dari URL
$keys = array_keys($_GET);
$current_key = $keys[0] ?? 'beranda';

// Definisikan "keluarga" halaman agar menu utama tetap active
$page_aktif = $current_key;

// Jika sedang di halaman tambah/edit pegawai, anggap page_aktif adalah 'pegawai'
if (in_array($current_key, ['pegawai', 'tambah_pegawai', 'edit_pegawai'])) {
    $page_aktif = 'pegawai';
}

// Jika sedang di halaman tambah/edit pengelola aset, anggap page_aktif adalah 'pengelola'
if (in_array($current_key, ['pengelola', 'tambah_pengelolaaset', 'edit_pengelolaaset'])) {
    $page_aktif = 'pengelola';
}

$judul_tampil = isset($judul) ? $judul : "Pasundan Aset";
?>

<aside id="sidebar">
    <div class="sidebar-header">
        <div class="brand-logo">
            <img src="assets/img/pass.svg" alt="Logo" width="32" height="32">
        </div>
        <span class="brand-text fw-bold"><?php echo $judul_tampil; ?></span>
    </div>

    <div class="d-flex flex-column flex-grow-1 overflow-auto custom-scrollbar">
        
        <a href="index.php?beranda" class="nav-link-custom <?php echo ($page_aktif == 'beranda') ? 'active' : ''; ?>">
            <i data-lucide="house"></i> Beranda
        </a>

        <?php include('menu/adm_instansi.php') ?>
        <?php include('menu/adm_aset.php') ?>
        <?php include('menu/staf_aset.php') ?>
        <?php include('menu/teknisi.php') ?>
        
    </div>

    <div class="sidebar-footer border-top p-3">
        <a href="index.php?logout" class="nav-link-custom text-danger border-0">
            <i data-lucide="log-out"></i> Keluar
        </a>
    </div>
</aside>