<?php
// Pastikan variabel koneksi tersedia (Global scope)
global $koneksi; 

$error_message = "";

// PERBAIKAN ERROR DI SINI:
// Gunakan '??' agar jika belum submit, nilainya string kosong ('')
// Ini akan menghilangkan Warning: Undefined array key
$user_input = $_POST['user'] ?? ''; 
$pwd_input  = $_POST['pwd'] ?? '';
$tombol     = $_POST['tombol'] ?? '';

// Hanya jalankan logika jika tombol ditekan
if (!empty($tombol)) {

    // 1. Amankan inputan
    $user_safe = mysqli_real_escape_string($koneksi, $user_input);

    // 2. Cari Nama di Database (Kolom 'Nama')
    $query = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE Nama = '$user_safe'");

    // 3. Cek apakah usernya ada?
    if (mysqli_num_rows($query) === 1) {
        $data = mysqli_fetch_assoc($query);
        $db_password = $data['Sandi']; // Ambil password dari DB (Kolom 'Sandi')

        // ===============================================
        // LOGIKA PENGECEKAN GANDA (HASH & PLAIN)
        // ===============================================
        $login_sukses = false;

        // Cek 1: Apakah password di DB adalah HASH (Enkripsi)?
        if (password_verify($pwd_input, $db_password, )) {
            $_SESSION['role'] = $data['role'];
            $login_sukses = true;
        } 
        // Cek 2: Apakah password di DB adalah TEXT BIASA (Data Manual)?
        elseif ($pwd_input == $db_password) {
            $login_sukses = true;
            
            // OPSIONAL: Update password jadi hash biar aman ke depannya
            // Uncomment baris bawah jika ingin auto-encrypt
            // $new_hash = password_hash($pwd_input, PASSWORD_DEFAULT);
            // $id_peg = $data['id']; 
            // mysqli_query($koneksi, "UPDATE pegawai SET Sandi = '$new_hash' WHERE id = '$id_peg'");
        }

        if ($login_sukses) {
            // SET SESSION
            $_SESSION['status'] = 'login'; // Kunci masuk
            $_SESSION['nama']   = $data['Nama'];
            $_SESSION['role']   = $data['role'] ?? 'user'; 
            $_SESSION['id']     = $data['id'];
            
            // Redirect JS (Lebih aman dari error headers sent)
            echo "<script>window.location.replace('index.php');</script>";
            exit;
        } else {
            $error_message = "Sandi salah!";
        }

    } else {
        $error_message = "Nama pengguna tidak ditemukan!";
    }
}
?>

<div class="col-lg-6 login-form-section d-flex align-items-center justify-content-center vh-100">
    <div class="form-wrapper w-100 p-4" style="max-width: 400px;">
        
        <div class="brand-icon mb-3 text-primary">
             <i data-lucide="hexagon" size="40"></i>
        </div>

        <h2 class="fw-bold mb-2">Login Pegawai</h2>
        <p class="text-muted mb-4">Masukkan Nama dan Sandi.</p>

        <?php if(!empty($error_message)): ?>
            <div class="alert alert-danger py-2 small d-flex align-items-center">
                <i data-lucide="alert-circle" size="16" class="me-2"></i>
                <?= $error_message ?>
            </div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label class="fw-bold small text-muted">NAMA</label>
                <input type="text" class="form-control" name="user" value="<?= htmlspecialchars($user_input) ?>" required>
            </div>
            
            <div class="mb-3">  
                <label class="fw-bold small text-muted">SANDI</label>
                <input type="password" class="form-control" name="pwd" required>
            </div>
            <div class="d-grid mt-4">
    <?= btn::login('tombol', 'masuk', 'Sign In'); ?>
</div>
        </form>
    </div>
</div>

<script>
    // Inisialisasi Icon Lucide (Jika dipakai)
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
</script>