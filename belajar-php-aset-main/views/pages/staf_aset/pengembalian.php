<?php
// --- 1. PROSES UPDATE PENGEMBALIAN ---
if (isset($_POST['simpan_pengembalian'])) {
    $id_detail = htmlspecialchars($_POST['id_detail']); // Mengambil IdSTADetail
    
    // Update StatusKembali menjadi 1 (Sudah Kembali)
    // Jika ada kolom TanggalKembali atau Kondisi di tabel detail, tambahkan di sini
    $queryUpdate = "UPDATE pinjam_aset_detail 
                    SET StatusKembali = '1' 
                    WHERE IdSTADetail = '$id_detail'";

    if (mysqli_query($koneksi, $queryUpdate)) {
        echo "<script>
                alert('Aset berhasil dikembalikan!'); 
                window.location.href='index.php?pengembalian';
              </script>";
    } else {
        echo "<script>alert('Gagal update: " . mysqli_error($koneksi) . "');</script>";
    }
}

// QUERY PERBAIKAN: Lengkap dengan SELECT dan perbaikan typo nama tabel
$query = "SELECT 
            d.IdSTADetail, 
            d.IdSTA, 
            p.Nama,   -- Pastikan nama kolom di tabel pegawai benar (misal: NamaPegawai atau nama)
            a.NamaAset       -- Pastikan nama kolom di tabel aset benar (misal: NamaAset atau nama_barang)
          FROM pinjam_aset_detail d
          JOIN pijam_aset h ON d.IdSTA = h.IdSTA
          JOIN pegawai p ON h.IdPegawaiTerima = p.IdPegawai
          JOIN aset a ON d.IdAset = a.IdAset
          WHERE d.StatusKembali = '0' 
          ORDER BY d.IdSTA DESC";

$result = mysqli_query($koneksi, $query);

// Cek jika query masih error di PHP
if (!$result) {
    die("Query Error: " . mysqli_error($koneksi));
}
// ... lanjut ke while loop
?>

    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active fw-bold" id="pinjam-tab" data-bs-toggle="tab" data-bs-target="#pinjam" type="button">
                <i data-lucide="clock" class="me-1" size="16"></i> Sedang Dipinjam
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-bold" id="riwayat-tab" data-bs-toggle="tab" data-bs-target="#riwayat" type="button">
                <i data-lucide="history" class="me-1" size="16"></i> Riwayat Kembali
            </button>
        </li>
    </ul>

    <div class="tab-content">
        
        <div class="tab-pane fade show active" id="pinjam">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-3">No</th>
                                    <th>ID Transaksi (STA)</th>
                                    <th>Nama Peminjam</th>
                                    <th>Nama Aset</th>
                                    <th class="text-end pe-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // JOIN 4 TABEL: Detail -> Header -> Pegawai -> Aset
                                // Asumsi StatusKembali: 0 = Belum Kembali
                                $query = "SELECT 
                                            d.IdSTADetail, 
                                            d.IdSTA, 
                                            p.Nama, 
                                            a.NamaAset 
                                          FROM pinjam_aset_detail d
                                          JOIN pijam_aset h ON d.IdSTA = h.IdSTA
                                          JOIN pegawai p ON h.IdPegawaiTerima = p.IdPegawai
                                          JOIN aset a ON d.IdAset = a.IdAset
                                          WHERE d.StatusKembali = '0' 
                                          ORDER BY d.IdSTA DESC";
                                
                                $result = mysqli_query($koneksi, $query);
                                $no = 1;

                                if (mysqli_num_rows($result) == 0) {
                                    echo '<tr><td colspan="5" class="text-center text-muted py-4">Tidak ada aset dipinjam.</td></tr>';
                                }

                                while ($row = mysqli_fetch_assoc($result)) :
                                ?>
                                <tr>
                                    <td class="ps-3"><?= $no++; ?></td>
                                    <td><span class="badge bg-light text-primary border"><?= $row['IdSTA']; ?></span></td>
                                    <td>
                                        <div class="fw-bold"><?= $row['NamaPegawai']; ?></div>
                                        <div class="small text-muted" style="font-size: 0.75rem;">Penerima Aset</div>
                                    </td>
                                    <td><?= $row['NamaAset']; ?></td>
                                    <td class="text-end pe-3">
                                        <button class="btn btn-sm btn-primary" 
                                            onclick="bukaModalKembali('<?= $row['IdSTADetail']; ?>', '<?= $row['NamaAset']; ?>', '<?= $row['NamaPegawai']; ?>')"
                                            data-bs-toggle="modal" data-bs-target="#modalKembali">
                                            <i data-lucide="check-circle" size="14" class="me-1"></i> Kembalikan
                                        </button>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="riwayat">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-3">No</th>
                                    <th>ID Transaksi</th>
                                    <th>Peminjam</th>
                                    <th>Aset</th>
                                    <th class="text-end pe-3">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Asumsi StatusKembali: 1 = Sudah Kembali
                                $query2 = "SELECT 
                                            d.IdSTA, 
                                            p.NamaPegawai, 
                                            a.NamaAset 
                                          FROM pinjam_aset_detail d
                                          JOIN pinjam_aset h ON d.IdSTA = h.IdSTA
                                          JOIN pegawai p ON h.IdPegawaiTerima = p.IdPegawai
                                          JOIN aset a ON d.IdAset = a.IdAset
                                          WHERE d.StatusKembali = '1' 
                                          ORDER BY d.IdSTA DESC LIMIT 20";
                                
                                $result2 = mysqli_query($koneksi, $query2);
                                $no2 = 1;

                                while ($row2 = mysqli_fetch_assoc($result2)) :
                                ?>
                                <tr>
                                    <td class="ps-3"><?= $no2++; ?></td>
                                    <td><?= $row2['IdSTA']; ?></td>
                                    <td><?= $row2['NamaPegawai']; ?></td>
                                    <td><?= $row2['NamaAset']; ?></td>
                                    <td class="text-end pe-3">
                                        <span class="badge bg-success-subtle text-success">Sudah Kembali</span>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modalKembali" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white">
                <h6 class="modal-title fw-bold">Konfirmasi Pengembalian</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_detail" id="modal_id_detail">
                    
                    <div class="text-center mb-4 mt-2">
                        <div class="bg-light rounded-circle d-inline-flex p-3 mb-2">
                            <i data-lucide="package-check" class="text-primary" size="32"></i>
                        </div>
                        <h5 class="fw-bold mb-1">Terima Aset Kembali?</h5>
                        <p class="text-muted small">Pastikan fisik aset sudah diterima.</p>
                    </div>

                    <div class="bg-light p-3 rounded border mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="small text-muted">Nama Aset:</span>
                            <span class="small fw-bold text-dark" id="modal_nama_aset">-</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="small text-muted">Peminjam:</span>
                            <span class="small fw-bold text-dark" id="modal_peminjam">-</span>
                        </div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" required id="checkKonfirmasi">
                        <label class="form-check-label small text-muted" for="checkKonfirmasi">
                            Saya menyatakan aset telah diterima kembali.
                        </label>
                    </div>

                </div>
                <div class="modal-footer bg-light border-top-0">
                    <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" name="simpan_pengembalian" class="btn btn-primary px-4 fw-bold">Ya, Proses</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function bukaModalKembali(idDetail, namaAset, namaPeminjam) {
        document.getElementById('modal_id_detail').value = idDetail;
        document.getElementById('modal_nama_aset').innerText = namaAset;
        document.getElementById('modal_peminjam').innerText = namaPeminjam;
    }
</script>