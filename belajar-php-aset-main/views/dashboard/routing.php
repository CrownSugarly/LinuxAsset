<?php 
// Routing berdasarkan parameter key (?halaman)
switch($page) {
    // --- ADMIN INSTANSI ---
    case 'pegawai':
        $judul = "Daftar Pegawai";
        include('views/pages/adm_instansi/kpegawai.php');
        break;
    case 'tambah_pegawai':
        $judul = "Tambah Pegawai Baru";
        include('views/pages/adm_instansi/tambah_pegawai.php');
        break;
    case 'pengelola':
        $judul = "Daftar Pengelola Aset";
        include('views/pages/adm_instansi/pengelola.php');
        break;
    case 'tambah_pengelola':
        $judul = "Tambah Pengelola Aset";
        include('views/pages/adm_instansi/tambah_pengelola.php');
        break;
    case 'edit_pengelola':
    case 'edit_pegawai':
        $judul = "Edit Data Pengelola";
        include('views/pages/adm_instansi/edit_pegawai.php');
        break;

    // --- ADMIN ASET ---
    case 'aset':
        $judul = "Kelola Aset";
        include('views/pages/adm_aset/aset.php');
        break;
    case 'serah_terima':
        $judul = "Berita Acara Serah Terima";
        include('views/pages/adm_aset/serah_terima.php');
        break;
    case 'penghapusan':
        $judul = "Penghapusan Aset";
        include('views/pages/adm_aset/penghapusan.php');
        break;

    // --- STAF ASET ---
    case 'peminjaman':
        $judul = "Peminjaman Aset";
        include('views/pages/staf_aset/peminjaman.php');
        break;
    case 'pengembalian':
        $judul = "Pengembalian Aset";
        include('views/pages/staf_aset/pengembalian.php');
        break;

    // --- TEKNISI ---
    case 'maintenance':
        $judul = "Pemeliharaan Rutin";
        include('views/pages/teknisi/maintenance.php');
        break;
    case 'perbaikan':
        $judul = "Perbaikan Aset";
        include('views/pages/teknisi/perbaikan.php');
        break;

    // --- DEFAULT / BERANDA ---
    case 'beranda':
    default:
        $judul = "Dashboard Utama";
        include('views/pages/beranda.php');
        break;
}