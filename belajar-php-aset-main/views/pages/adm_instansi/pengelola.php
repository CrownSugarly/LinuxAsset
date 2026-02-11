<?php 
// Variabel judul halaman untuk header
$judul = "Kelola Pengelola Aset"; 

// Panggil View yang sudah dibuat tadi
$query = mysqli_query($koneksi, "SELECT * FROM v_login_pengelola ORDER BY IdPengelola DESC");
$total_pengelola = mysqli_num_rows($query);
?>



    <div class="row g-4">
        <div class="col-xl-4 col-lg-5">
            <div class="card border-0 shadow-sm rounded-4 sticky-top" style="top: 20px;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center gap-2 mb-4">
                        <div class="bg-primary bg-opacity-10 p-2 rounded-3">
                            <i data-lucide="user-plus" class="text-primary"></i>
                        </div>
                        <h5 class="fw-bold mb-0">Tambah Akun</h5>
                    </div>

                   <form action="views/controllers/proses_tambah.php" method="POST">
    
    <div class="mb-3">
        <label class="form-label small fw-bold text-muted">Pilih Pegawai</label>
        <div class="input-group">
            <span class="input-group-text bg-light border-0"><i data-lucide="user" size="16"></i></span>
            <select name="id_pegawai" class="form-select bg-light border-0 shadow-none" required>
                <option value="">-- Pilih Pegawai --</option>
                <?php
                // Query ini sudah bagus (mencegah data ganda)
                $q_pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE IdPegawai NOT IN (SELECT IdPegawai FROM pengelola_aset) ORDER BY Nama ASC");
                while($p = mysqli_fetch_assoc($q_pegawai)){
                    echo "<option value='".$p['IdPegawai']."'>".$p['Nama']." (ID: ".$p['IdPegawai'].")</option>";
                }
                ?>
            </select>
        </div>
        <small class="text-muted" style="font-size: 10px;">*Hanya pegawai yang belum punya akun yang muncul.</small>
    </div>

    <div class="mb-3">
    <label class="form-label small fw-bold text-muted">Hak Akses (Role)</label>
    <div class="input-group">
        <span class="input-group-text bg-light border-0"><i data-lucide="shield-check" size="16"></i></span>
        
        <select name="role" class="form-select bg-light border-0 shadow-none" required>
            <option value="">-- Pilih Akses --</option>
            <option value="Admin Aset">Admin Aset</option>
            <option value="Teknisi">Teknisi</option>
            <option value="Staf Aset">Staf Aset</option>
        </select>
    </div>
</div>

    <div class="d-flex justify-content-end align-items-center mt-4">
        <?= btn::save("Simpan Akun", "simpan"); ?>
    </div>
        
</form>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-7">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                <div class="card-header bg-white border-0 py-3 mt-2">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-0 ms-2">Daftar Pengguna Aktif</h6>
                        </div>
                        <div class="col-md-6 mt-2 mt-md-0">
                            <div class="input-group input-group-sm rounded-pill overflow-hidden border">
                                <span class="input-group-text bg-white border-0"><i data-lucide="search" size="14"></i></span>
                                <input type="text" id="searchPengelola" class="form-control border-0 shadow-none" placeholder="Cari nama atau role...">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4 py-3 text-muted small fw-bold border-0">ID</th>
                                <th class="py-3 text-muted small fw-bold border-0">PENGELOLA</th>
                                <th class="py-3 text-muted small fw-bold border-0 text-center">ROLE</th>
                                <th class="pe-4 py-3 text-muted small fw-bold border-0 text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="tablePengelola">
                            <?php 
                            if($total_pengelola > 0) {
                                while($row = mysqli_fetch_assoc($query)) { 
                                    $id = $row['IdPegawai'];
                                    $labelRole = $row['role'] ?? 'PENGELOLA';
                            ?>
                            <tr>
                                <td class="ps-4">
                                    <span class="badge bg-light text-muted border-0 fw-medium">#<?php echo $id; ?></span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">                                                                           
                                        <div>
                                            <div class="fw-bold text-dark mb-0"><?php echo $row['Nama']; ?></div>                                            
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-primary bg-opacity-10 text-primary border border-primary-subtle rounded-pill px-3 py-2" style="font-size: 10px;">
                                        <?php echo strtoupper($labelRole); ?>
                                    </span>
                                </td>
                                <td class="pe-4">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="index.php?edit_pegawai&id=<?php echo $id; ?>" class="btn btn-sm btn-icon-hover rounded-3" title="Edit">
                                            <i data-lucide="edit" size="16" class="text-primary"></i>
                                        </a>
                                        <?= btn::delete("index.php?hapus_pengelola&id=$id"); ?>
                                    </div>
                                </td>
                            </tr>
                            <?php 
                                }
                            } else {
                                echo "<tr><td colspan='4' class='text-center py-5'><img src='assets/img/empty.svg' width='80' class='mb-3 d-block mx-auto opacity-50'>Data belum tersedia.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="card-footer bg-white border-top py-3 text-center">
                    <small class="text-muted">Total terdaftar: <b><?php echo $total_pengelola; ?> Akun</b></small>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Styling agar form tetap melayang saat di-scroll (PC) */
    @media (min-width: 992px) {
        .sticky-top { top: 30px !important; z-index: 10; }
    }

    /* Efek tombol aksi */
    .btn-icon-hover {
        background-color: #f8f9fa;
        border: 1px solid #eee;
        transition: all 0.2s;
    }
    .btn-icon-hover:hover {
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        transform: translateY(-2px);
    }

    /* Input focus styling */
    .form-control:focus, .form-select:focus {
        background-color: #fff !important;
        border: 1px solid #0d6efd !important;
    }

    .avatar-soft {
        background-color: rgba(13, 110, 253, 0.1);
    }
    
    .table thead th {
        font-size: 10px;
        letter-spacing: 0.8px;
        text-transform: uppercase;
    }
</style>

