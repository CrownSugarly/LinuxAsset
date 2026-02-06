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
            <p class="text-muted">Manajemen penghentian penggunaan dan pemusnahan aset.</p>
        </div>
        <button class="btn btn-danger d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalHapusAset">
            <i data-lucide="trash-2" style="width: 18px;"></i>
            Ajukan Penghapusan
        </button>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3 border-start border-danger border-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-danger bg-opacity-10 p-3 rounded-3 text-danger">
                        <i data-lucide="archive"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold">14</h5>
                        <small class="text-muted">Aset Dihapuskan Thn Ini</small>
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
                            <th class="ps-4">No. Berita Acara</th>
                            <th>Aset</th>
                            <th>Tgl Hapus</th>
                            <th>Alasan</th>
                            <th>Metode</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="ps-4 fw-medium">SKP-09221</td>
                            <td>Printer Epson L3110</td>
                            <td>01 Feb 2026</td>
                            <td>Rusak Berat</td>
                            <td>Lelang/Jual</td>
                            <td><span class="badge bg-warning-subtle text-warning border border-warning-subtle">Menunggu Persetujuan</span></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-light text-primary border" title="Detail">
                                    <i data-lucide="info" style="width: 16px;"></i>
                                </button>
                                <button class="btn btn-sm btn-light text-danger border" title="Hapus Draft">
                                    <i data-lucide="x-circle" style="width: 16px;"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalHapusAset" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title fw-bold">Form Pengajuan Penghapusan Aset</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="proses/hapus_aset_aksi.php" method="POST">
                <div class="modal-body">
                    <div class="alert alert-warning d-flex align-items-center gap-2">
                        <i data-lucide="alert-triangle" style="width: 20px;"></i>
                        <small>Pastikan data aset yang dipilih sudah benar. Tindakan ini tidak dapat dibatalkan setelah disetujui.</small>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Pilih Aset yang Akan Dihapus</label>
                            <select class="form-select" name="id_aset" required>
                                <option value="">-- Cari Nama atau Kode Aset --</option>
                                </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tanggal Penghapusan</label>
                            <input type="date" class="form-control" name="tgl_penghapusan" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Alasan Utama</label>
                            <select class="form-select" name="alasan" required>
                                <option value="Rusak Berat">Rusak Berat</option>
                                <option value="Sudah Tua">Sudah Tua/Melewati Umur Ekonomis</option>
                                <option value="Hilang">Hilang/Dicuri</option>
                                <option value="Dijual">Dijual/Dilelang</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Metode Penghapusan</label>
                            <select class="form-select" name="metode" required>
                                <option value="Pemusnahan">Pemusnahan (Dihancurkan)</option>
                                <option value="Penjualan">Penjualan/Lelang</option>
                                <option value="Hibah">Hibah/Donasi</option>
                                <option value="Tukar Tambah">Tukar Tambah</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nilai Jual Akhir (Jika dijual)</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" name="nilai_akhir" placeholder="0">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Keterangan Tambahan</label>
                            <textarea class="form-control" name="catatan" rows="3" placeholder="Jelaskan detail kondisi aset saat ini..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Simpan Pengajuan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    lucide.createIcons();
</script>