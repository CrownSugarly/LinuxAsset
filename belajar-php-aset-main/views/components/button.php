<?php
class btn {

    // =================================================================
    // 1. TOMBOL UTAMA (SAVE / SUBMIT)
    // =================================================================
    public static function save($text = 'Simpan Data', $name = 'simpan') {
        return "
        <button type='submit' name='$name' class='btn btn-primary shadow-sm d-inline-flex align-items-center gap-2'>
            <i class='bi bi-floppy-fill' style='font-size: 1.1rem;'></i> 
            <span>$text</span>
        </button>
        ";
    }

    // =================================================================
    // 2. TOMBOL EDIT (Icon Pencil)
    // =================================================================
    public static function edit($url) {
        return "
        <a href='$url' class='btn btn-warning btn-sm text-dark shadow-sm d-inline-flex align-items-center justify-content-center' 
           title='Edit Data' 
           style='width: 36px; height: 36px; border-radius: 8px;'>
            <i class='bi bi-pencil-square' style='font-size: 1.2rem;'></i>
        </a>
        ";
    }

    // =================================================================
    // 3. TOMBOL DELETE (DENGAN MODAL POPUP)
    // =================================================================
   public static function delete($url, $title = "Hapus Data", $msg = "Yakin hapus?") {
        // Perhatikan: href="#" agar tidak pindah halaman langsung
        // onclick="showConfirm(...)" untuk memanggil modal
        return '
        <a href="#" onclick="showConfirm(\'' . $url . '\', \'' . $msg . '\', \'' . $title . '\', \'btn-danger\', \'Ya, Hapus\'); return false;" 
           class="btn btn-sm btn-danger text-white shadow-sm d-inline-flex align-items-center justify-content-center" 
           title="Hapus"
           style="width: 36px; height: 36px; border-radius: 8px;">
            <i data-lucide="trash-2" width="14" height="14"></i>
        </a>
        ';
    }

    // =================================================================
    // 4. TOMBOL BACK (Kembali)
    // =================================================================
    public static function back($url = 'javascript:history.back()') {
        return "
        <a href='$url' class='btn btn-secondary shadow-sm d-inline-flex align-items-center gap-2'>
            <i class='bi bi-arrow-left' style='font-size: 1.1rem;'></i> 
            <span>Kembali</span>
        </a>
        ";
    }

    // =================================================================
    // 5. TOMBOL CANCEL (Batal)
    // =================================================================
    public static function cancel($url) {
        return "
        <a href='$url' class='btn btn-outline-secondary shadow-sm d-inline-flex align-items-center gap-2'>
            <i class='bi bi-x-lg' style='font-size: 1.1rem;'></i> 
            <span>Batal</span>
        </a>
        ";
    }

    // =================================================================
    // 6. TOMBOL PRINT (Cetak Halaman)
    // =================================================================
    public static function print() {
        return "
        <button onclick='window.print()' class='btn btn-info text-white shadow-sm d-inline-flex align-items-center gap-2'>
            <i class='bi bi-printer-fill' style='font-size: 1.1rem;'></i> 
            <span>Cetak</span>
        </button>
        ";
    }

    // =================================================================
    // 7. TOMBOL QR CODE
    // =================================================================
    public static function qrcode($url) {
        return "
        <a href='$url' class='btn btn-dark btn-sm shadow-sm d-inline-flex align-items-center justify-content-center' 
           title='Lihat QR Code' 
           style='width: 36px; height: 36px; border-radius: 8px;'>
            <i class='bi bi-qr-code' style='font-size: 1.2rem;'></i>
        </a>
        ";
    }

    // =================================================================
    // 8. TOMBOL TAMBAH (Fancy Gradient + Lucide Icon)
    // =================================================================
    public static function add($url, $text, $icon = 'plus') {
        // Gradient Biru Modern
        $style = "background: linear-gradient(135deg, #0d6efd 0%, #0043a8 100%); height: 48px; width: fit-content;";
        
        // Kita perbesar ukuran Lucide menjadi 20px dan tebalkan stroke-nya (stroke-width=2.5)
        return "
        <a href='$url' class='btn btn-primary d-inline-flex align-items-center gap-2 px-4 py-2 rounded-3 shadow border-0' 
           style='$style'>
            <i data-lucide='$icon' width='22' height='22' stroke-width='2.5'></i>
            <span class='fw-bold' style='font-size: 0.95rem; letter-spacing: 0.5px;'>$text</span>
        </a>
        ";
    }

    // =================================================================
    // 9. TOMBOL LOGOUT (KHUSUS SIDEBAR)
    // =================================================================
    public static function logout($url) {
        return "
        <button onclick=\"showConfirm('$url', 'Anda harus login kembali untuk masuk sistem.', 'Keluar Aplikasi?', 'btn-primary', 'Ya, Keluar')\" 
           class='nav-link-custom text-danger border-0 w-100 text-start bg-transparent d-flex align-items-center gap-3'
           style='cursor: pointer; padding: 12px 20px;'>
            <i data-lucide='log-out' width='22' height='22' stroke-width='2'></i> 
            <span class='fw-bold'>Keluar</span>
        </button>
        ";
    }
    
    // =================================================================
    // 10. TOMBOL CUSTOM
    // =================================================================
    public static function custom($text, $url, $btnClass = 'primary', $icon = '') {
        $iconHtml = $icon ? "<i class='bi bi-$icon' style='font-size: 1.1rem;'></i>" : "";
        return "
        <a href='$url' class='btn btn-$btnClass shadow-sm d-inline-flex align-items-center gap-2'>
            $iconHtml 
            <span>$text</span>
        </a>
        ";
    }

    public static function reset($url) {
        // Pesan konfirmasi yang jelas
        $title = "Reset Password?";
        $msg   = "Password pegawai ini akan dikembalikan ke default (123456). Lanjutkan?";
        
        return "
        <a href='javascript:void(0)' 
           onclick=\"showConfirm('$url', '$msg', '$title', 'btn-dark', 'Ya, Reset Password')\" 
           class='btn btn-dark btn-sm shadow-sm d-inline-flex align-items-center justify-content-center' 
           title='Reset Password' 
           style='width: 36px; height: 36px; border-radius: 8px;'>
            <i class='bi bi-key-fill' style='font-size: 1.1rem;'></i>
        </a>
        ";
    }

    // =================================================================
    // 11. TOMBOL LOGIN (Full Width + Icon)
    // =================================================================
    public static function login($name = 'tombol', $value = 'masuk', $text = 'Masuk Aplikasi') {
        return "
        <button type='submit' name='$name' value='$value' 
            class='btn btn-primary w-100 py-2 fw-bold shadow-sm d-flex align-items-center justify-content-center gap-2'
            style='letter-spacing: 0.5px;'>
            <i data-lucide='log-in' width='20' height='20'></i>
            <span>$text</span>
        </button>
        ";
    }
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    // Perintah ini mengubah tag <i data-lucide> menjadi gambar SVG
    lucide.createIcons();
</script>