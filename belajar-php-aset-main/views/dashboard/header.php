<?php
// Pastikan session sudah dimulai di file index.php utama
// Logika penentuan halaman aktif
$keys = array_keys($_GET);
$page_aktif = $keys[0] ?? 'beranda';

$daftar_judul = [
    'beranda'          => 'Dashboard',
    'pegawai'          => 'Kelola Pegawai',
    'tambah_pegawai'   => 'Tambah Pegawai',
    'editpegawai'      => 'Edit Data Pegawai',
    'pengelola'        => 'Pengelola Aset',
    'tambah_pengelola' => 'Tambah Pengelola Aset',
    'edit_pengelola'   => 'Edit Pengelola Aset',
    'aset'             => 'Kelola Aset',
    'serah_terima'     => 'Serah Terima Aset',
    'peminjaman'       => 'Peminjaman',
    'penghapusan'      => 'Penghapusan Aset',
    'pengembalian'     => 'Pengembalian',
    'maintenance'      => 'Pemeliharaan',
    'perbaikan'        => 'Perbaikan'
];

$judul_header = $daftar_judul[$page_aktif] ?? "Nexus Core";
?>

<header class="d-flex justify-content-between align-items-center px-4 bg-white border-bottom sticky-top">
    <div class="d-flex align-items-center gap-3">
        <button class="btn btn-light border d-lg-none shadow-sm" id="mobileToggle">
            <i data-lucide="menu" size="20"></i>
        </button>
        <div class="d-none d-md-block">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0" style="font-size: 10px; background: transparent;">
                    <li class="breadcrumb-item text-muted fw-bold text-uppercase ls-wide">Pages</li>
                    <li class="breadcrumb-item active text-primary fw-bold text-uppercase ls-wide" aria-current="page">
                        <?php echo $judul_header; ?>
                    </li>
                </ol>
            </nav>
            <div class="fw-bold text-dark fs-5 mt-n1">
                <?php echo $judul_header; ?>
            </div>
        </div>
    </div>

    <div class="d-flex align-items-center gap-3 gap-md-4">
        
        <div class="d-none d-md-block text-muted cursor-pointer hover-dark" onclick="fokusKeSearch()">
            <i data-lucide="search" size="20"></i>
        </div>
        
        <div class="dropdown">
            <div class="position-relative cursor-pointer" data-bs-toggle="dropdown" aria-expanded="false">
                <i data-lucide="bell" size="20" class="text-muted"></i>
                <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
            </div>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0 py-2 mt-3" style="width: 280px;">
                <li class="px-3 py-2 fw-bold small border-bottom mb-2">Notifikasi</li>
                <li><a class="dropdown-item small py-2" href="#"><i data-lucide="info" size="14" class="me-2 text-info"></i> Aset baru ditambahkan</a></li>
                <li><a class="dropdown-item small py-2" href="#"><i data-lucide="alert-triangle" size="14" class="me-2 text-warning"></i> Maintenance mendesak</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-center small text-primary" href="#">Lihat Semua</a></li>
            </ul>
        </div>

        <div class="dropdown">
            <div class="d-flex align-items-center gap-2 gap-md-3 cursor-pointer" data-bs-toggle="dropdown" id="userDropdown">
                <div class="text-end d-none d-sm-block">
                    <p class="mb-0 fw-bold small line-height-1"><?php echo $_SESSION['nama'] ?? 'Guest User'; ?></p>
                    <p class="mb-0 text-muted text-uppercase fw-bold" style="font-size: 0.6rem; letter-spacing: 0.5px;">
                        <?php echo $_SESSION['role'] ?? 'No Role'; ?>
                    </p>
                </div>
                <div class="profile-img-wrapper">
                    <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['nama'] ?? 'User'); ?>&background=4f46e5&color=fff&bold=true" 
                        width="38" height="38" class="rounded-circle border border-2 border-white shadow-sm">
                </div>
            </div>

            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3 animate slideIn">
                <li class="dropdown-header d-sm-none">
                    <h6 class="mb-0 text-dark"><?php echo $_SESSION['nama'] ?? 'User'; ?></h6>
                    <small><?php echo $_SESSION['role'] ?? 'Admin'; ?></small>
                </li>
                <li><a class="dropdown-item py-2" href="index.php?profil"><i data-lucide="user" size="16" class="me-2 text-muted"></i> Profil Saya</a></li>
                <li><a class="dropdown-item py-2" href="index.php?pengaturan"><i data-lucide="settings" size="16" class="me-2 text-muted"></i> Pengaturan</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item py-2 text-danger" href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?')">
                        <i data-lucide="log-out" size="16" class="me-2"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>

<script>
    // Inisialisasi Lucide Icons
    lucide.createIcons();

    // Fungsi Toggle Sidebar Mobile
    document.getElementById('mobileToggle')?.addEventListener('click', function() {
        const sidebar = document.getElementById('sidebar'); // Pastikan id di sidebar.php adalah 'sidebar'
        if(sidebar) {
            sidebar.classList.toggle('active');
        }
    });

    // Fungsi shortcut untuk fokus ke input pencarian jika ada di halaman
    function fokusKeSearch() {
        const globalSearch = document.getElementById('searchInput');
        if(globalSearch) {
            globalSearch.focus();
            globalSearch.parentElement.classList.add('ring-2', 'ring-primary');
        } else {
            alert("Gunakan fitur cari di dalam tabel halaman ini.");
        }
    }
</script>

<style>
    /* Animasi Dropdown */
    .animate { animation-duration: 0.2s; -webkit-animation-duration: 0.2s; animation-fill-mode: both; -webkit-animation-fill-mode: both; }
    @keyframes slideIn { 
        0% { transform: translateY(10px); opacity: 0; } 
        100% { transform: translateY(0); opacity: 1; } 
    }
    .slideIn { -webkit-animation-name: slideIn; animation-name: slideIn; }

    .cursor-pointer { cursor: pointer; }
    .hover-dark:hover { color: #212529 !important; transition: 0.3s; }
    .line-height-1 { line-height: 1.2; }
    
    /* Responsive Styling */
    @media (max-width: 991.98px) {
        #sidebar.active { transform: translateX(0); }
    }
</style>