<?php
// Judul otomatis ditangani oleh header.php
?>

<div class="content-wrapper p-4">
    <div class="mb-4 fade-in-up" style="animation-delay: 0.1s;">
        <?= btn::back("index.php?pegawai", "Kembali", "arrow-left"); ?>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 col-xl-7">
            
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden fade-in-up" style="animation-delay: 0.2s;">
                
                <div class="card-header bg-white border-bottom p-4 position-relative overflow-hidden">
                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-5"></div> <div class="d-flex align-items-center gap-3 position-relative z-1">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3 shadow-sm">
                            <i data-lucide="user-plus" class="d-block"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1 text-dark">Tambah Pegawai Baru</h5>
                            <p class="text-muted small mb-0">Lengkapi formulir di bawah ini untuk menambahkan akses pengguna.</p>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4 p-md-5">
                    <form action="views/controllers/proses_pegawai.php" method="POST" autocomplete="off">
                        
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <label class="form-label small fw-bold text-uppercase text-muted ls-wide">Nama Lengkap <span class="text-danger">*</span></label>
            <div class="input-group input-group-merge">
                <span class="input-group-text bg-white border-end-0 ps-3 text-muted"><i data-lucide="user" size="18"></i></span>
                <input type="text" name="nama" class="form-control border-start-0 ps-0 bg-white" placeholder="Cth: Budi Santoso" required>
            </div>
        </div>

        <div class="col-md-6">
            <label class="form-label small fw-bold text-uppercase text-muted ls-wide">Gender <span class="text-danger">*</span></label>
            <div class="input-group input-group-merge">
                <span class="input-group-text bg-white border-end-0 ps-3 text-muted"><i data-lucide="users" size="18"></i></span>
                
                <select name="gender" class="form-select border-start-0 ps-2 bg-white cursor-pointer" required>
                    <option value="" selected disabled> Pilih Gender </option>
                    <option value="L">Laki - Laki</option>
                    <option value="P">Perempuan</option>                                                         
                </select>

            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <label class="form-label small fw-bold text-uppercase text-muted ls-wide">Password <span class="text-danger">*</span></label>
            <div class="input-group input-group-merge">
                <span class="input-group-text bg-white border-end-0 ps-3 text-muted"><i data-lucide="lock" size="18"></i></span>
                <input type="password" name="password" id="passInput" class="form-control border-start-0 border-end-0 ps-0 bg-white" placeholder="••••••••" required>
                <button type="button" class="btn btn-outline-secondary border border-start-0 bg-white text-muted" onclick="togglePass()">
                    <i data-lucide="eye" size="18" id="eyeIcon"></i>
                </button>
            </div>
            <div class="form-text small text-muted mt-1">Username akan dibuat otomatis oleh sistem.</div>
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-end gap-3 mt-5 pt-3 border-top">
        <?= btn::save("Simpan Pegawai Baru", "simpan"); ?>
    </div>

</form>

<script>
// Script sederhana untuk show/hide password
function togglePass() {
    var x = document.getElementById("passInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
                </div>
            </div>
            
            <div class="text-center mt-4 fade-in-up" style="animation-delay: 0.3s;">
                <p class="text-muted small mb-0">
                    <i data-lucide="info" size="14" class="me-1 text-primary"></i> 
                    Pastikan data yang diinput sesuai dengan identitas pegawai.
                </p>
            </div>

        </div>
    </div>
</div>

<style>
    /* Input Group Merge (Icon nyatu sama input) */
    .input-group-merge .input-group-text {
        background-color: #fff;
        border-color: #dee2e6;
    }
    .input-group-merge .form-control, 
    .input-group-merge .form-select {
        border-color: #dee2e6;
        box-shadow: none !important; /* Hapus shadow default bootstrap */
    }
    
    /* Fokus Effect (Glow Biru Halus) */
    .input-group-merge:focus-within .input-group-text,
    .input-group-merge:focus-within .form-control,
    .input-group-merge:focus-within .form-select,
    .input-group-merge:focus-within button {
        border-color: #0d6efd;
        z-index: 2;
    }

    .ls-wide { letter-spacing: 0.5px; font-size: 0.75rem; }
    .opacity-5 { opacity: 0.05; }
    .cursor-pointer { cursor: pointer; }

    /* Animasi Masuk */
    .fade-in-up {
        animation: fadeInUp 0.5s ease-out forwards;
        opacity: 0;
        transform: translateY(20px);
    }
    @keyframes fadeInUp {
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* Hover Tombol */
    .btn-hover-scale { transition: transform 0.2s; }
    .btn-hover-scale:hover { transform: translateY(-2px); }
</style>

