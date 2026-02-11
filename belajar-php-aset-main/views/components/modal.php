<?php
class Modal {

    // Panggil fungsi ini SEKALI saja di footer.php atau index.php (sebelum </body>)
    public static function render() {
        return '
        <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold" id="confirmTitle">Konfirmasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body py-4 text-center">
                        <div class="mb-3 text-warning">
                             <i data-lucide="alert-triangle" width="48" height="48"></i>
                        </div>
                        <p class="mb-0" id="confirmMessage">Apakah Anda yakin ingin melanjutkan?</p>
                    </div>
                    <div class="modal-footer border-0 justify-content-center pt-0 pb-4">
                        <button type="button" class="btn btn-secondary px-4 rounded-pill" data-bs-dismiss="modal">Batal</button>
                        <a href="#" id="confirmBtn" class="btn btn-danger px-4 rounded-pill">Ya, Lanjutkan</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Fungsi untuk memanggil Modal Hapus
            function showConfirm(url, message = "Data yang dihapus tidak dapat dikembalikan.", title = "Hapus Data?", btnClass = "btn-danger", btnText = "Hapus") {
                // Set Link
                document.getElementById("confirmBtn").href = url;
                
                // Set Teks
                document.getElementById("confirmTitle").innerText = title;
                document.getElementById("confirmMessage").innerText = message;
                document.getElementById("confirmBtn").innerText = btnText;
                
                // Set Warna Tombol (Reset dulu, baru tambah class baru)
                document.getElementById("confirmBtn").className = "btn px-4 rounded-pill " + btnClass;

                // Tampilkan Modal
                var myModal = new bootstrap.Modal(document.getElementById("confirmModal"));
                myModal.show();
                
                // Refresh icon lucide jika perlu
                if (typeof lucide !== "undefined") { lucide.createIcons(); }
            }
        </script>
        ';
    }
}
?>