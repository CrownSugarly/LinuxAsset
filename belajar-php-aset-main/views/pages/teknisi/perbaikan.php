<?php
// Proteksi agar file tidak diakses langsung
if (!isset($page)) {
    header("Location: ../../index.php");
    exit;
}

// Query untuk statistik (Contoh logic)
$total_perbaikan = 15; // Nanti diganti query COUNT
$pending = 3;
?>

<div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark mb-1">Perbaikan Aset</h3>
            <p class="text-muted small">Kelola laporan kerusakan dan tindak lanjut perbaikan aset.</p>
        </div>
        <button class="btn btn-danger d-flex align-items-center gap-2 px-3 py-2 rounded-3 shadow-sm border-0 fw-bold" data-bs-toggle="modal" data-bs-target="#modalLaporKerusakan">
            <i data-lucide="alert-triangle" style="width: 18px;"></i>
            <span>Laporkan Kerusakan</span>
        </button>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-danger bg-opacity-10 p-3 rounded-3 text-danger">
                        <i data-lucide="info"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold"><?= $pending; ?></h5>
                        <small class="text-muted">Menunggu Respon</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-3 text-primary">
                        <i data-lucide="tool"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold">5</h5>
                        <small class="text-muted">Sedang Diperbaiki</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-success bg-opacity-10 p-3 rounded-3 text-success">
                        <i data-lucide="check-circle"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold">7</h5>
                        <small class="text-muted">Selesai Diperbaiki</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
        <div class="card-header bg-white border-0 py-3">
            <h6 class="fw-bold mb-0">Daftar Laporan Masuk</h6>
        </div>
        
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 text-muted small fw-bold border-0">ASET</th>
                        <th class="py-3 text-muted small fw-bold border-0">PELAPOR</th>
                        <th class="py-3 text-muted small fw-bold border-0 text-center">KEPARAHAN</th>
                        <th class="py-3 text-muted small fw-bold border-0 text-center">STATUS</th>
                        <th class="pe-4 py-3 text-muted small fw-bold border-0 text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4">
                            <div class="fw-bold text-dark">Printer Epson L3110</div>
                            <small class="text-muted">Kode: AST-PRN-04 | R. Admin</small>
                        </td>
                        <td>
                            <div class="small fw-bold">Anisa Fitri</div>
                            <small class="text-muted">05 Feb 2026</small>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill" style="font-size: 10px;">
                                TINGGI (URGENT)
                            </span>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill" style="font-size: 10px;">
                                PENDING
                            </span>
                        </td>
                        <td class="pe-4">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-sm btn-outline-primary border-0 bg-primary bg-opacity-10 rounded-3 p-2 hover-up" title="Ambil Tugas">
                                    <i data-lucide="hammer" size="16"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-secondary border-0 bg-light rounded-3 p-2 hover-up" title="Detail Masalah">
                                    <i data-lucide="eye" size="16"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalLaporKerusakan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-danger text-white border-0">
                <h5 class="modal-title fw-bold">Form Laporan Kerusakan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="proses/simpan_perbaikan.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted">Aset yang Bermasalah</label>
                        <select class="form-select border-0 bg-light shadow-none" name="id_aset" required>
                            <option value="">-- Pilih Aset --</option>
                            </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted">Tingkat Keparahan</label>
                        <div class="d-flex gap-2">
                            <input type="radio" class="btn-check" name="level" id="low" value="Rendah" checked>
                            <label class="btn btn-outline-success btn-sm flex-fill" for="low">Rendah</label>
                            
                            <input type="radio" class="btn-check" name="level" id="mid" value="Sedang">
                            <label class="btn btn-outline-warning btn-sm flex-fill" for="mid">Sedang</label>
                            
                            <input type="radio" class="btn-check" name="level" id="high" value="Tinggi">
                            <label class="btn btn-outline-danger btn-sm flex-fill" for="high">Tinggi</label>
                        </div>
                    </div>
                    <div class="mb-0">
                        <label class="form-label fw-bold small text-muted">Deskripsi Kerusakan</label>
                        <textarea class="form-control border-0 bg-light shadow-none" name="masalah" rows="4" placeholder="Ceritakan detail kerusakan (misal: Bunyi kasar saat menyala)..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer bg-light border-0">
                    <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger fw-bold rounded-3 px-4">Kirim Laporan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    lucide.createIcons();
</script>

<style>
    .hover-up:hover {
        transform: translateY(-2px);
        transition: all 0.2s ease;
    }
</style>