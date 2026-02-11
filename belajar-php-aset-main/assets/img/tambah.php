<?php
    PageHeader(
        "Pegawai",
        "Tambahkan data baru pegawai",
       buttonhref("?pg=$pg&fl=list","Kembali","primary","circle-chevron-left",$attbr="")
    );

    $BtnSimpan = button("btn","Simpan","primary","save","");

    PageContentForm(
        <<<a1
            <form method="POST"> 
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-secondary" style="font-size: 0.75rem; letter-spacing: 0.5px; text-transform: uppercase;">Username</label>
                        <input type="text" name="username" class="form-control form-control-lg bg-light border-0 fs-6" placeholder="Ex: ahmad_fauzi" style="border-radius: 10px;" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold text-secondary" style="font-size: 0.75rem; letter-spacing: 0.5px; text-transform: uppercase;">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control form-control-lg bg-light border-0 fs-6" placeholder="Nama sesuai KTP" style="border-radius: 10px;" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold text-secondary mb-3" style="font-size: 0.75rem; letter-spacing: 0.5px; text-transform: uppercase;">Jenis Kelamin</label>
                    <div class="row g-3">
                        <div class="col-6">
                            <input type="radio" class="btn-check" name="gender" id="genderL" value="L" checked>
                            <label class="btn btn-outline-light bg-light border-0 text-start w-100 p-3 d-flex align-items-center justify-content-between text-dark" for="genderL" style="border-radius: 12px; transition: all 0.2s;">
                                <span class="d-flex align-items-center gap-2 fw-medium">
                                    <i data-lucide="user" class="text-primary" style="width: 18px;"></i> Laki-laki
                                </span>
                                <i data-lucide="check-circle-2" class="text-primary check-icon" style="width: 18px;"></i>
                            </label>
                        </div>
                        <div class="col-6">
                            <input type="radio" class="btn-check" name="gender" id="genderP" value="P">
                            <label class="btn btn-outline-light bg-light border-0 text-start w-100 p-3 d-flex align-items-center justify-content-between text-dark" for="genderP" style="border-radius: 12px; transition: all 0.2s;">
                                <span class="d-flex align-items-center gap-2 fw-medium">
                                    <i data-lucide="user-circle-2" class="text-danger" style="width: 18px;"></i> Perempuan
                                </span>
                                <i data-lucide="check-circle-2" class="text-danger check-icon" style="width: 18px;"></i>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-secondary" style="font-size: 0.75rem; letter-spacing: 0.5px; text-transform: uppercase;">Tempat Lahir</label>
                        <div class="position-relative">
                            <input type="text" name="tempat_lahir" class="form-control form-control-lg bg-light border-0 fs-6 ps-5" placeholder="Kota Kelahiran" style="border-radius: 10px;">
                            <div class="position-absolute top-50 start-0 translate-middle-y ps-3 text-muted">
                                <i data-lucide="map-pin" style="width: 18px;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-secondary" style="font-size: 0.75rem; letter-spacing: 0.5px; text-transform: uppercase;">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control form-control-lg bg-light border-0 fs-6 text-secondary" style="border-radius: 10px;">
                    </div>
                </div>

                <div class="mb-5">
                    <label class="form-label fw-bold text-secondary" style="font-size: 0.75rem; letter-spacing: 0.5px; text-transform: uppercase;">Alamat Domisili</label>
                    <textarea name="alamat" class="form-control bg-light border-0 p-3" rows="3" placeholder="Jalan, RT/RW, Kelurahan, Kecamatan..." style="border-radius: 12px; resize: none;"></textarea>
                </div>

                <div class="gap-2">
                    $BtnSimpan
                </div>

            </form>
        a1
    );

?>

      
<style>
    /* Membuat efek border ketika radio button dipilih */
    .btn-check:checked + .btn {
        background-color: #eef2ff !important; /* Biru sangat muda */
        border: 1px solid #4f46e5 !important;
        color: #4f46e5 !important;
    }
    .btn-check:not(:checked) + .btn .check-icon {
        display: none;
    }
</style>

