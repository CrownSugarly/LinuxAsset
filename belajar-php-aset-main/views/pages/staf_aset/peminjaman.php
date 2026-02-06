<?php
// Proteksi agar file tidak diakses langsung
if (!isset($page)) {
    header("Location: ../../index.php");
    exit;
}

// Query mengambil data peminjaman (Diasumsikan ada tabel peminjaman yang berelasi dengan aset dan pegawai)
// Jika database belum siap, tabel akan menampilkan data contoh di bawah
?>

<div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark mb-1">Peminjaman Aset</h3>
            <p class="text-muted small">Kelola dan pantau distribusi aset yang dipinjam oleh pegawai.</p>
        </div>
        <button class="btn btn-primary d-flex align-items-center gap-2 px-3 py-2 rounded-3 shadow-sm border-0" data-bs-toggle="modal" data-bs-target="#modalTambahPinjam">
            <i data-lucide="plus-circle" style="width: 18px;"></i>
            <span class="fw-bold">Input Peminjaman</span>
        </button>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3 border-start border-primary border-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-3 text-primary">
                        <i data-lucide="external-link"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold">24</h5>
                        <small class="text-muted">Aset Sedang Dipinjam</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3 border-start border-warning border-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-warning bg-opacity-10 p-3 rounded-3 text-warning">
                        <i data-lucide="clock"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold">5</h5>
                        <small class="text-muted">Menunggu Pengembalian</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3 border-start border-danger border-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-danger bg-opacity-10 p-3 rounded-3 text-danger">
                        <i data-lucide="alert-circle"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold">2</h5>
                        <small class="text-muted">Terlambat (Overdue)</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white border-0 py-3">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h6 class="fw-bold mb-0">Daftar Transaksi Peminjaman</h6>
                </div>
                <div class="col-auto">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <span class="input-group-text bg-light border-0"><i data-lucide="search" size="14"></i></span>
                        <input type="text" class="form-control bg-light border-0 shadow-none" placeholder="Cari nama peminjam...">
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 text-muted small fw-bold border-0">KODE</th>
                        <th class="py-3 text-muted small fw-bold border-0">PEMINJAM</th>
                        <th class="py-3 text-muted small fw-bold border-0">ASET</th>
                        <th class="py-3 text-muted small fw-bold border-0">TGL PINJAM</th>
                        <th class="py-3 text-muted small fw-bold border-0 text-center">STATUS</th>
                        <th class="pe-4 py-3 text-muted small fw-bold border-0 text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4 fw-bold text-muted small">#TRX-9901</td>
                        <td>
                            <div class="fw-bold text-dark">Budi Santoso</div>
                            <small class="text-muted">Divisi Pemasaran</small>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <i data-lucide="monitor" size="14" class="text-primary"></i>
                                <span>Proyektor Epson EB-X400</span>
                            </div>
                        </td>
                        <td>
                            <div class="small fw-medium">05 Feb 2026</div>
                            <small class="text-danger" style="font-size: 10px;">Kembali: 07 Feb 2026</small>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-primary bg-opacity-10 text-primary border border-primary-subtle rounded-pill px-3 py-2" style="font-size: 10px;">
                                DIPINJAM
                            </span>
                        </td>
                        <td class="pe-4">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-sm btn-light border rounded-3 p-2" title="Cetak Bukti">
                                    <i data-lucide="printer" size="16"></i>
                                </button>
                                <button class="btn btn-sm btn-success bg-opacity-10 text-success border-0 rounded-3 p-2" title="Proses Kembali">
                                    <i data-lucide="check-square" size="16"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4 fw-bold text-muted small">#TRX-9895</td>
                        <td>
                            <div class="fw-bold text-dark">Siti Aminah</div>
                            <small class="text-muted">Divisi Keuangan</small>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <i data-lucide="laptop" size="14" class="text-primary"></i>
                                <span>MacBook Air M1</span>
                            </div>
                        </td>
                        <td>
                            <div class="small fw-medium">01 Feb 2026</div>
                            <small class="text-danger fw-bold" style="font-size: 10px;">TERLAMBAT 3 HARI</small>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-danger bg-opacity-10 text-danger border border-danger-subtle rounded-pill px-3 py-2" style="font-size: 10px;">
                                OVERDUE
                            </span>
                        </td>
                        <td class="pe-4">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-sm btn-light border rounded-3 p-2"><i data-lucide="mail" size="16"></i></button>
                                <button class="btn btn-sm btn-success bg-opacity-10 text-success border-0 rounded-3 p-2"><i data-lucide="check-square" size="16"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambahPinjam" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold">Input Peminjaman Aset Baru</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="proses/simpan_pinjam.php" method="POST">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Pilih Pegawai (Peminjam)</label>
                            <select class="form-select" name="id_pegawai" required>
                                <option value="">-- Cari Nama Pegawai --</option>
                                </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Pilih Aset yang Tersedia</label>
                            <select class="form-select" name="id_aset" required>
                                <option value="">-- Pilih Barang --</option>
                                </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Tanggal Pinjam</label>
                            <input type="date" class="form-control" name="tgl_pinjam" value="<?= date('Y-m-d'); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Estimasi Tgl Kembali</label>
                            <input type="date" class="form-control" name="tgl_kembali_rencana" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Keperluan Peminjaman</label>
                            <textarea class="form-control" name="keperluan" rows="2" placeholder="Contoh: Meeting Proyek di Luar Kantor"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4">Konfirmasi Pinjam</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    lucide.createIcons();
</script>