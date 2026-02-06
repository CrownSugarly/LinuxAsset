<?php 
// Variabel judul halaman untuk header
$judul = "Kelola Pengelola Aset"; 

// Query mengambil data
$query = mysqli_query($koneksi, "SELECT * FROM pengelola_aset ORDER BY IdPegawai DESC");
$total_pengelola = mysqli_num_rows($query);
?>

<div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark mb-1">Manajemen Pengelola</h3>
            <p class="text-muted small">Kelola hak akses dan data pengguna sistem aset.</p>
        </div>
        <a href="index.php?tambah_pengelola" class="btn btn-primary d-flex align-items-center gap-2 px-3 py-2 rounded-3 shadow-sm">
            <i data-lucide="user-plus" style="width: 18px;"></i>
            <span class="fw-semibold">Tambah Pengelola</span>
        </a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-3 text-primary">
                        <i data-lucide="users"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold"><?php echo $total_pengelola; ?></h5>
                        <small class="text-muted">Total Pengelola</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-success bg-opacity-10 p-3 rounded-3 text-success">
                        <i data-lucide="shield-check"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold">Aktif</h5>
                        <small class="text-muted">Status Akses</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white border-0 py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="fw-bold mb-0">Daftar Pengguna Sistem</h6>
                </div>
                <div class="col-auto">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <span class="input-group-text bg-light border-0"><i data-lucide="search" size="14"></i></span>
                        <input type="text" class="form-control bg-light border-0" placeholder="Cari nama atau ID...">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 text-muted small fw-bold border-0">ID</th>
                        <th class="py-3 text-muted small fw-bold border-0">NAMA LENGKAP</th>
                        <th class="py-3 text-muted small fw-bold border-0 text-center">ROLE / AKSES</th>
                        <th class="pe-4 py-3 text-muted small fw-bold border-0 text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if($total_pengelola > 0) {
                        while($row = mysqli_fetch_assoc($query)) { 
                            $id = $row['IdPegawai'];
                            $labelRole = $row['role'] ?? 'PENGELOLA';
                    ?>
                    <tr>
                        <td class="ps-4">
                            <span class="text-muted fw-medium">#<?php echo $id; ?></span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="avatar-soft bg-info text-info d-flex align-items-center justify-content-center rounded-circle fw-bold" style="width: 38px; height: 38px; font-size: 14px; background-color: rgba(13, 202, 240, 0.1);">
                                    <?php echo strtoupper(substr($row['Nama'], 0, 1)); ?>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark"><?php echo $row['Nama']; ?></div>
                                    <small class="text-muted">ID: PG-<?php echo $id; ?></small>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-primary bg-opacity-10 text-primary border border-primary-subtle rounded-pill px-3 py-2" style="font-size: 11px;">
                                <i data-lucide="shield" size="12" class="me-1"></i> <?php echo strtoupper($labelRole); ?>
                            </span>
                        </td>
                        <td class="pe-4">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="index.php?edit_pegawai&id=<?php echo $id; ?>" 
                                   class="btn btn-sm btn-outline-primary border-0 bg-primary bg-opacity-10 rounded-3 p-2" title="Edit User">
                                    <i data-lucide="edit-3" size="16"></i>
                                </a>
                                <a href="views/pages/adm_instansi/hapuspegawai.php?id=<?php echo $id; ?>" 
                                   class="btn btn-sm btn-outline-danger border-0 bg-danger bg-opacity-10 rounded-3 p-2" 
                                   onclick="return confirm('Hapus pengelola ini?')">
                                    <i data-lucide="trash-2" size="16"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php 
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center py-5'><img src='assets/img/empty.svg' width='100' class='mb-3 d-block mx-auto text-muted'>Belum ada data pengelola aset.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
        <div class="card-footer bg-white border-top py-3">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">Menampilkan <b><?php echo $total_pengelola; ?></b> pengelola aset aktif</small>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled"><a class="page-link border-0" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link border-0 shadow-sm" href="#">1</a></li>
                        <li class="page-item"><a class="page-link border-0" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<script>
    // Pastikan Lucide Icons ter-render
    lucide.createIcons();
</script>

<style>
    /* Custom Styling tambahan */
    .table thead th {
        letter-spacing: 0.05em;
        font-size: 11px;
    }
    .btn-outline-primary:hover, .btn-outline-danger:hover {
        transform: translateY(-2px);
        transition: all 0.2s;
    }
    .avatar-soft {
        transition: transform 0.2s;
    }
    tr:hover .avatar-soft {
        transform: scale(1.1);
    }
</style>