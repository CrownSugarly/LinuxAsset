<?php
// Judul otomatis ditangani oleh header.php
?>

<div class="content-wrapper p-4">
    <div class="mb-4" style="margin-top: -10px;">
        <a href="index.php?pengelola" class="btn btn-white btn-sm border rounded-3 shadow-sm px-3 d-inline-flex align-items-center gap-2 bg-white transition-all hover-up">
            <i data-lucide="arrow-left" size="14" class="text-primary"></i> 
            <span style="font-size: 13px;" class="fw-bold text-dark">Kembali ke Daftar</span>
        </a>
    </div>

    <div class="row">
        <div class="col-12 col-lg-7 col-xl-6">
            <div class="card-premium overflow-hidden shadow-sm border-0 rounded-4 bg-white">
                
                <div class="p-4 border-bottom bg-light bg-opacity-25">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon-shape bg-primary bg-opacity-10 text-primary rounded-3 p-2 d-flex align-items-center justify-content-center">
                            <i data-lucide="user-plus" size="20"></i>
                        </div>
                        <div>
                            <h5 class="fw-800 mb-0 text-dark">Form Tambah Pegawai</h5>
                            <p class="text-muted small mb-0">Input data pengelola aset baru ke dalam sistem.</p>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4 p-md-4">
                   <form action="views/pages/adm_instansi/proses_tambah.php" method="POST">
    
    <div class="mb-3">
        <label class="form-label small fw-bold text-muted">Pilih Pegawai</label>
        <div class="input-group">
            <span class="input-group-text bg-light border-0"><i data-lucide="user" size="16"></i></span>
            <select name="id_pegawai" class="form-select bg-light border-0 shadow-none" required>
                <option value="">-- Pilih Pegawai --</option>
                <?php
                // Ambil data pegawai yang BELUM jadi pengelola aset (biar tidak dobel)
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
            <select name="role" class="form-select bg-light border-0 shadow-none">
                <option value="staf_aset">Staf Aset</option>
                <option value="adm_aset">Admin Aset</option>
                <option value="teknisi">Teknisi</option>
            </select>
        </div>
    </div>

    <button type="submit" name="simpan" class="btn btn-primary w-100 py-2 fw-bold rounded-3">
        Simpan Akun Baru
    </button>
</form>
                </div>
            </div>
            
            <div class="mt-3 ps-2">
                <p class="text-muted" style="font-size: 12px;">
                    <i data-lucide="info" size="12" class="me-1"></i> Pastikan semua data sudah benar sesuai dengan Use Case <strong>Kelola Pegawai</strong>.
                </p>
            </div>
        </div>
    </div>
</div>

<style>
    :root { --accent: #0d6efd; }
    .transition-all { transition: all 0.2s ease-in-out; }
    .hover-up:hover { transform: translateY(-1px); }
    .ls-wide { letter-spacing: 0.03em; }
    .fw-800 { font-weight: 800; }
    .custom-input-group { border: 1px solid #dee2e6 !important; }
    .custom-input-group:focus-within { 
        border-color: var(--accent) !important; 
        background-color: #fff !important; 
        box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.1); 
    }
    .btn-save:active { transform: scale(0.98); }
</style>

<script>
    lucide.createIcons();
</script>