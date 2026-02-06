<?php
// Proteksi agar file tidak diakses langsung
if (!isset($page)) {
    header("Location: ../../index.php");
    exit;
}
?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark"><?= $judul; ?></h3>
            <p class="text-muted">Manajemen inventaris barang dan aset instansi.</p>
        </div>
        
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-3 text-primary">
                        <i data-lucide="box"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold">450</h5>
                        <small class="text-muted">Total Aset</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3 border-start border-success border-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-success bg-opacity-10 p-3 rounded-3 text-success">
                        <i data-lucide="check-circle"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold">412</h5>
                        <small class="text-muted">Kondisi Baik</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3 border-start border-warning border-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-warning bg-opacity-10 p-3 rounded-3 text-warning">
                        <i data-lucide="wrench"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold">28</h5>
                        <small class="text-muted">Rusak Ringan</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3 border-start border-danger border-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-danger bg-opacity-10 p-3 rounded-3 text-danger">
                        <i data-lucide="x-octagon"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold">10</h5>
                        <small class="text-muted">Rusak Berat</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <div class="row g-2">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i data-lucide="search" style="width: 16px;"></i></span>
                        <input type="text" class="form-control bg-light border-start-0" placeholder="Cari kode atau nama aset...">
                    </div>
                </div>
                <div class="col-md-2">
                    <select class="form-select bg-light">
                        <option value="">Semua Kategori</option>
                        <option>Elektronik</option>
                        <option>Mebel</option>
                        <option>Kendaraan</option>
                    </select>
                    <div class="col-md-4">
                    <button class="btn btn-primary d-flex align-items-center gap-2 justify-content-between" data-bs-toggle="modal" data-bs-target="#modalTambahAset">
            <i data-lucide="plus-circle" style="width: 18px;"></i>
            Tambah Aset Baru
        </button>
                </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">Kode Aset</th>
                            <th>Nama Aset</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Kondisi</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="ps-4 fw-bold text-primary">AST-ELEC-001</td>
                            <td>
                                <div class="fw-medium">Laptop ASUS ROG Zephyrus</div>
                                <small class="text-muted">S/N: 99281-AS-01</small>
                            </td>
                            <td>Elektronik</td>
                            <td>Ruang IT</td>
                            <td><span class="badge bg-success-subtle text-success">Baik</span></td>
                            <td><span class="badge bg-info-subtle text-info">Tersedia</span></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-secondary"><i data-lucide="edit-3" style="width: 14px;"></i></button>
                                    <button class="btn btn-sm btn-outline-secondary"><i data-lucide="qr-code" style="width: 14px;"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i data-lucide="trash-2" style="width: 14px;"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambahAset" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold">Tambah Aset Baru</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="proses/simpan_aset.php" method="POST">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Kode Aset</label>
                            <input type="text" class="form-control" name="kode_aset" placeholder="Contoh: AST-2024-001" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nama Aset</label>
                            <input type="text" class="form-control" name="nama_aset" placeholder="Nama barang lengkap" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Kategori</label>
                            <select class="form-select" name="kategori" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option>Elektronik</option>
                                <option>Mebel / Furniture</option>
                                <option>Kendaraan</option>
                                <option>Peralatan Kantor</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Lokasi Penempatan</label>
                            <input type="text" class="form-control" name="lokasi" placeholder="Contoh: Ruang Rapat Lt. 2">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Tanggal Perolehan</label>
                            <input type="date" class="form-control" name="tgl_perolehan">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Harga Perolehan</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" name="harga" placeholder="0">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Kondisi Awal</label>
                            <select class="form-select" name="kondisi">
                                <option value="Baik">Baik</option>
                                <option value="Rusak Ringan">Rusak Ringan</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Spesifikasi / Catatan</label>
                            <textarea class="form-control" name="spesifikasi" rows="3" placeholder="Contoh: Warna Hitam, RAM 16GB, SSD 512GB..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Data Aset</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    lucide.createIcons();
</script>