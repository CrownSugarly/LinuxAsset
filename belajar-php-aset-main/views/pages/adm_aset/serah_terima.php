<?php
// Pastikan file ini tidak diakses langsung tanpa melalui index/dashboard
if (!isset($page)) {
    header("Location: ../../index.php");
    exit;
}
?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark"><?= $judul; ?></h3>
            <p class="text-muted">Dokumentasi perpindahan tanggung jawab aset.</p>
        </div>
        <button class="btn btn-primary d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalTambahBAST">
            <i data-lucide="plus-circle" style="width: 18px;"></i>
            Buat BAST Baru
        </button>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-3 text-primary">
                        <i data-lucide="file-text"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold">128</h5>
                        <small class="text-muted">Total Dokumen</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">No. Dokumen</th>
                            <th>Tanggal</th>
                            <th>Nama Aset</th>
                            <th>Pihak Pertama (Pemberi)</th>
                            <th>Pihak Kedua (Penerima)</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="ps-4 fw-medium">BAST/2024/001</td>
                            <td>12 Okt 2024</td>
                            <td>MacBook Pro M2</td>
                            <td>Staf Gudang</td>
                            <td>Andi (IT Support)</td>
                            <td><span class="badge bg-success-subtle text-success border border-success-subtle">Selesai</span></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-secondary me-1" title="Cetak PDF">
                                    <i data-lucide="printer" style="width: 16px;"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-primary" title="Detail">
                                    <i data-lucide="eye" style="width: 16px;"></i>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambahBAST" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Form Serah Terima Aset</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="proses/simpan_bast.php" method="POST">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nomor Dokumen</label>
                            <input type="text" class="form-control" name="no_bast" placeholder="Otomatis" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Serah Terima</label>
                            <input type="date" class="form-control" name="tgl_bast" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Pilih Aset</label>
                            <select class="form-select" name="id_aset" required>
                                <option value="">-- Pilih Aset --</option>
                                </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Pihak Pertama (Pemberi)</label>
                            <input type="text" class="form-control" name="pihak_1" placeholder="Nama Pemberi" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Pihak Kedua (Penerima)</label>
                            <input type="text" class="form-control" name="pihak_2" placeholder="Nama Penerima" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Keterangan/Kondisi Aset</label>
                            <textarea class="form-control" name="catatan" rows="3" placeholder="Contoh: Barang dalam keadaan baik dan lengkap."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan & Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Inisialisasi icon Lucide agar muncul
    lucide.createIcons();
</script>