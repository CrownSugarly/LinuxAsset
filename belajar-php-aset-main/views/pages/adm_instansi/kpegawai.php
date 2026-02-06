<?php 
// Variabel judul halaman untuk header
$judul = "Kelola Data Pegawai"; 

// Query mengambil data pegawai
$query = mysqli_query($koneksi, "SELECT * FROM pegawai ORDER BY IdPegawai DESC");
$total_pegawai = mysqli_num_rows($query);

// Query untuk statistik ringkas (Opsional, tapi bikin keren)
$count_admin = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE role='admin'");
$total_admin = mysqli_num_rows($count_admin);
?>

<div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark mb-1">Manajemen Pegawai</h3>
            <p class="text-muted small">Daftar seluruh personil dan hak akses mereka dalam sistem.</p>
        </div>
        <a href="index.php?tambah_pegawai" class="btn btn-primary d-flex align-items-center gap-2 px-3 py-2 rounded-3 shadow-sm border-0" style="background-color: #0d6efd;">
            <i data-lucide="user-plus" style="width: 18px;"></i>
            <span class="fw-bold">Tambah Pegawai</span>
        </a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-3 text-primary">
                        <i data-lucide="users"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold"><?php echo $total_pegawai; ?></h5>
                        <small class="text-muted">Total Pegawai</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3 border-start border-danger border-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-danger bg-opacity-10 p-3 rounded-3 text-danger">
                        <i data-lucide="shield-check"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold"><?php echo $total_admin; ?></h5>
                        <small class="text-muted">Admin Sistem</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
        <div class="card-header bg-white border-0 py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="fw-bold mb-0">Daftar Pegawai Terdaftar</h6>
                </div>
                <div class="col-auto">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <span class="input-group-text bg-light border-0"><i data-lucide="search" size="14"></i></span>
                        <input type="text" class="form-control bg-light border-0 shadow-none" placeholder="Cari nama pegawai...">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 text-muted small fw-bold border-0" style="width: 80px;">ID</th>
                        <th class="py-3 text-muted small fw-bold border-0">PEGAWAI</th>
                        <th class="py-3 text-muted small fw-bold border-0 text-center">ROLE / AKSES</th>
                        <th class="pe-4 py-3 text-muted small fw-bold border-0 text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if($total_pegawai > 0) {
                        while($row = mysqli_fetch_assoc($query)) { 
                            $id = $row['IdPegawai'];
                            
                            // Logika Warna Badge Berdasarkan Role
                            $role = $row['role'];
                            $roleAttr = [
                                'admin'     => ['class' => 'bg-danger text-danger', 'icon' => 'shield-alert'],
                                'adm_aset'  => ['class' => 'bg-primary text-primary', 'icon' => 'box'],
                                'teknisi'   => ['class' => 'bg-warning text-warning', 'icon' => 'wrench'],
                                'staf_aset' => ['class' => 'bg-info text-info', 'icon' => 'user']
                            ];
                            
                            $currentAttr = $roleAttr[$role] ?? ['class' => 'bg-secondary text-secondary', 'icon' => 'circle'];
                    ?>
                    <tr>
                        <td class="ps-4">
                            <span class="badge bg-light text-muted border fw-bold">#<?php echo $id; ?></span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="d-flex align-items-center justify-content-center rounded-circle fw-bold text-white shadow-sm" 
                                     style="width: 38px; height: 38px; background: linear-gradient(45deg, #6a11cb 0%, #2575fc 100%); font-size: 14px;">
                                    <?php echo strtoupper(substr($row['Nama'], 0, 1)); ?>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0"><?php echo $row['Nama']; ?></div>
                                    <small class="text-muted" style="font-size: 11px;">NIP/ID: PGW-<?php echo $id; ?></small>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <span class="badge <?php echo $currentAttr['class']; ?> bg-opacity-10 border border-opacity-10 rounded-pill px-3 py-2" style="font-size: 10px; letter-spacing: 0.5px;">
                                <i data-lucide="<?php echo $currentAttr['icon']; ?>" size="10" class="me-1"></i>
                                <?php echo strtoupper($role); ?>
                            </span>
                        </td>
                        <td class="pe-4">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="index.php?edit_pegawai&id=<?php echo $id; ?>" 
                                   class="btn btn-sm btn-outline-primary border-0 bg-primary bg-opacity-10 rounded-3 p-2 hover-up" title="Edit Data">
                                    <i data-lucide="edit-3" size="16"></i>
                                </a>
                                <a href="views/pages/adm_instansi/hapuspegawai.php?id=<?php echo $id; ?>" 
                                   class="btn btn-sm btn-outline-danger border-0 bg-danger bg-opacity-10 rounded-3 p-2 hover-up" 
                                   onclick="return confirm('Hapus data pegawai ini?')">
                                    <i data-lucide="trash-2" size="16"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php 
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center py-5 text-muted'>Belum ada data pegawai.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
        <div class="card-footer bg-white border-top py-3 text-center">
            <small class="text-muted">Total Data Terdata: <b><?php echo $total_pegawai; ?> Pegawai</b></small>
        </div>
    </div>
</div>

<style>
    .hover-up:hover {
        transform: translateY(-2px);
        transition: all 0.2s ease;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .table thead th {
        font-size: 11px;
        letter-spacing: 1px;
    }
</style>

<script>
    lucide.createIcons();
</script>