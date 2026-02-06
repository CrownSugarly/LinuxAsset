<?php
// Judul otomatis ditangani oleh header.php
?>

<div class="content-wrapper p-4">
    <div class="mb-4" style="margin-top: -10px;">
        <a href="index.php?pegawai" class="btn btn-white btn-sm border rounded-3 shadow-sm px-3 d-inline-flex align-items-center gap-2 bg-white transition-all hover-up">
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
                    <form action="#" method="POST">
                        <div class="d-flex flex-column gap-4">
                            
                            <div class="form-group">
                                <label class="form-label small fw-bold text-muted text-uppercase ls-wide mb-2 d-block">Nama Lengkap</label>
                                <div class="input-group border rounded-3 overflow-hidden bg-light custom-input-group transition-all">
                                    <span class="input-group-text bg-transparent border-0 text-muted ps-3">
                                        <i data-lucide="user" size="18"></i>
                                    </span>
                                    <input type="text" name="nama" class="form-control bg-transparent border-0 shadow-none py-2" placeholder="Contoh: Ahmad Syaban" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label small fw-bold text-muted text-uppercase ls-wide mb-2 d-block">Username</label>
                                <div class="input-group border rounded-3 overflow-hidden bg-light custom-input-group transition-all">
                                    <span class="input-group-text bg-transparent border-0 text-muted ps-3">
                                        <i data-lucide="at-sign" size="18"></i>
                                    </span>
                                    <input type="text" name="username" class="form-control bg-transparent border-0 shadow-none py-2" placeholder="username123" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label small fw-bold text-muted text-uppercase ls-wide mb-2 d-block">Password</label>
                                <div class="input-group border rounded-3 overflow-hidden bg-light custom-input-group transition-all">
                                    <span class="input-group-text bg-transparent border-0 text-muted ps-3">
                                        <i data-lucide="lock" size="18"></i>
                                    </span>
                                    <input type="password" name="password" class="form-control bg-transparent border-0 shadow-none py-2" placeholder="••••••••" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label small fw-bold text-muted text-uppercase ls-wide mb-2 d-block">Role / Hak Akses</label>
                                <div class="input-group border rounded-3 overflow-hidden bg-light custom-input-group transition-all">
                                    <span class="input-group-text bg-transparent border-0 text-muted ps-3">
                                        <i data-lucide="shield-check" size="18"></i>
                                    </span>
                                    <select name="role" class="form-select bg-transparent border-0 shadow-none py-2" required>
                                        <option value="" selected disabled>Pilih Hak Akses...</option>
                                        <option value="admin">Administrator</option>
                                        <option value="staff">Staff Instansi</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mt-2 pt-4 border-top d-flex gap-2">
                                <button type="submit" class="btn btn-primary px-4 rounded-3 fw-bold d-flex align-items-center gap-2 py-2 shadow-sm btn-save transition-all" style="background-color: var(--accent); border: none;">
                                    <i data-lucide="save" size="18"></i> Simpan Data
                                </button>
                                <a href="index.php?pegawai" class="btn btn-light px-4 rounded-3 fw-bold text-muted border py-2 transition-all">
                                    Batal
                                </a>
                            </div>

                        </div>
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