<?php 
// Variabel judul halaman untuk header
$judul = "Kelola Data Pegawai"; 

// QUERY JOIN (LEFT JOIN)
// Penjelasan: 
// 1. Ambil semua data dari 'pegawai'.
// 2. Ambil kolom 'Level' dari 'pengelola_aset'.
// 3. Gabungkan berdasarkan IdPegawai.
$query_sql = "SELECT pegawai.*, pengelola_aset.Level 
              FROM pegawai 
              LEFT JOIN pengelola_aset ON pegawai.IdPegawai = pengelola_aset.IdPegawai 
              ORDER BY pegawai.IdPegawai DESC";

$query = mysqli_query($koneksi, $query_sql);
$total_pegawai = mysqli_num_rows($query);

// Query untuk statistik ringkas (Tetap sama)
$count_admin = mysqli_query($koneksi, "SELECT * FROM pengelola_aset WHERE Level='Super Admin'");
$total_admin = mysqli_num_rows($count_admin);
?>
<link rel="stylesheet" href="assets/css/kpegawai.css">

<div class="row g-3 mb-4 align-items-center">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm p-3 bg-white" style="border-radius: 12px;">
            <div class="d-flex align-items-center gap-3">
                <div class="bg-primary bg-opacity-10 p-2 rounded-3 text-primary">
                    <i data-lucide="users" size="22"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold"><?php echo $total_pegawai; ?></h5>
                    <small class="text-muted" style="font-size: 11px;">Total Pegawai</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm p-3 border-start border-danger border-4 bg-white" style="border-radius: 12px;">
            <div class="d-flex align-items-center gap-3">
                <div class="bg-danger bg-opacity-10 p-2 rounded-3 text-danger">
                    <i data-lucide="shield-check" size="22"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold"><?php echo $total_admin; ?></h5>
                    <small class="text-muted" style="font-size: 11px;">Admin Sistem</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 d-flex justify-content-end align-items-center">
        <?= btn::add("index.php?tambah_pegawai", "Tambah Pegawai", ""); ?>
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
                    <input type="text" id="searchInput" class="form-control bg-light border-0 shadow-none" placeholder="Cari nama atau Level...">
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
                    <th class="py-3 text-muted small fw-bold border-0 text-center">Level / AKSES</th>
                    <th class="pe-4 py-3 text-muted small fw-bold border-0 text-center">AKSI</th>
                </tr>
            </thead>
            <tbody id="pegawaiTable">
                <?php 
                if($total_pegawai > 0) {
                    while($row = mysqli_fetch_assoc($query)) { 
                        $id = $row['IdPegawai'];
                        
                        // Logika Warna Badge Berdasarkan Level
                        $Level = $row['Level'];
                        $LevelAttr = [
                            'Super Admin'     => ['class' => 'bg-danger text-danger', 'icon' => 'shield-alert'],
                            'Admin Aset'  => ['class' => 'bg-primary text-primary', 'icon' => 'box'],
                            'Teknisi'   => ['class' => 'bg-warning text-warning', 'icon' => 'wrench'],
                            'Staf Aset' => ['class' => 'bg-info text-info', 'icon' => 'user']
                        ];
                        
                        $currentAttr = $LevelAttr[$Level] ?? ['class' => 'bg-secondary text-secondary', 'icon' => 'circle'];
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
                            <?php echo strtoupper($Level); ?>
                        </span>
                    </td>
                    <td class="pe-4">
                        <div class="d-flex justify-content-center gap-2">
                            <?= btn::edit("index.php?edit_pegawai&id=$id"); ?>
                            <?= btn::reset("index.php?reset_password&id=$id"); ?>
                            <?= btn::delete("index.php?hapus_pegawai&id=$id", "Hapus Pegawai", "Apakah Anda yakin ingin menghapus pegawai ini?"); ?>
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

<script src="assets/js/kpegawai.js"></script>