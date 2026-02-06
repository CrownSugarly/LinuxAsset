<?php
// Proteksi agar file tidak diakses langsung
if (!isset($page)) {
    header("Location: ../../index.php");
    exit;
}
?>

<div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark mb-1">Pemeliharaan & Servis</h3>
            <p class="text-muted small">Kelola jadwal perawatan rutin dan pengecekan teknis aset.</p>
        </div>
        <button class="btn btn-warning d-flex align-items-center gap-2 px-3 py-2 rounded-3 shadow-sm border-0 text-dark fw-bold" data-bs-toggle="modal" data-bs-target="#modalTambahMaintenance">
            <i data-lucide="calendar-plus" style="width: 18px;"></i>
            <span>Jadwalkan Servis</span>
        </button>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3 border-start border-warning border-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-warning bg-opacity-10 p-3 rounded-3 text-warning">
                        <i data-lucide="wrench"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold">12</h5>
                        <small class="text-muted">Aset Perlu Servis</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3 border-start border-primary border-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-3 text-primary">
                        <i data-lucide="refresh-cw"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold">4</h5>
                        <small class="text-muted">Sedang Dikerjakan</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3 border-start border-success border-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-success bg-opacity-10 p-3 rounded-3 text-success">
                        <i data-lucide="check-circle-2"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold">128</h5>
                        <small class="text-muted">Selesai (Tahun Ini)</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

[Image of asset maintenance lifecycle diagram]


    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
        <div class="card-header bg-white border-0 py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="fw-bold mb-0">Antrean Perawatan Aset</h6>
                </div>
                <div class="col-auto">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <span class="input-group-text bg-light border-0"><i data-lucide="search" size="14"></i></span>
                        <input type="text" class="form-control bg-light border-0 shadow-none" placeholder="Cari aset...">
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 text-muted small fw-bold border-0">ASET</th>
                        <th class="py-3 text-muted small fw-bold border-0 text-center">TIPE</th>
                        <th class="py-3 text-muted small fw-bold border-0">JADWAL</th>
                        <th class="py-3 text-muted small fw-bold border-0 text-center">STATUS</th>
                        <th class="pe-4 py-3 text-muted small fw-bold border-0 text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4">
                            <div class="d-flex align-items-center gap-3">
                                <div class="p-2 bg-light rounded text-muted">
                                    <i data-lucide="monitor" size="20"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark">iMac 24-inch M3</div>
                                    <small class="text-muted">ID: AST-ELC-08 | R. Desain</small>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-info bg-opacity-10 text-info rounded-pill px-3 py-2" style="font-size: 10px;">
                                PREVENTIF
                            </span>
                        </td>
                        <td>
                            <div class="small fw-bold">10 Feb 2026</div>
                            <small class="text-muted">Berkala 6 Bulanan</small>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-warning bg-opacity-10 text-warning border border-warning-subtle rounded-pill px-3 py-2" style="font-size: 10px;">
                                TERJADWAL
                            </span>
                        </td>
                        <td class="pe-4">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-sm btn-outline-primary border-0 bg-primary bg-opacity-10 rounded-3 p-2 hover-up" title="Mulai Kerjakan">
                                    <i data-lucide="play" size="16"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success border-0 bg-success bg-opacity-10 rounded-3 p-2 hover-up" title="Log Riwayat">
                                    <i data-lucide="clipboard-list" size="16"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambahMaintenance" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-warning text-dark border-0">
                <h5 class="modal-title fw-bold">Jadwalkan Pemeliharaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="proses/simpan_maintenance.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold small">Pilih Aset</label>
                        <select class="form-select border-0 bg-light shadow-none" name="id_aset" required>
                            <option value="">-- Pilih Barang --</option>
                            </select>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold small">Tanggal Servis</label>
                            <input type="date" class="form-control border-0 bg-light shadow-none" name="tgl_maintenance" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small">Jenis</label>
                            <select class="form-select border-0 bg-light shadow-none" name="tipe">
                                <option>Rutin (Preventif)</option>
                                <option>Perbaikan (Korektif)</option>
                                <option>Update Software</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="form-label fw-bold small">Deskripsi Pekerjaan</label>
                        <textarea class="form-control border-0 bg-light shadow-none" name="deskripsi" rows="3" placeholder="Contoh: Pembersihan debu internal dan penggantian thermal paste..."></textarea>
                    </div>
                </div>
                <div class="modal-footer bg-light border-0">
                    <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning fw-bold rounded-3 px-4">Simpan Jadwal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .hover-up:hover {
        transform: translateY(-2px);
        transition: all 0.2s ease;
    }
</style>

<script>
    lucide.createIcons();
</script>