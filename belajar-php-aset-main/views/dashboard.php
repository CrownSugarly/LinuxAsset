<?php 
    // Mengambil kunci pertama dari URL
    $keys = array_keys($_GET);
    $page = $keys[0] ?? 'beranda';

    // Logika Logout
    if($page == 'logout'){
        session_destroy();
        echo "<script>window.location='index.php';</script>";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linus Aset Management</title>
    
    <link rel="icon" type="image/svg+xml" href="assets/img/linuxx.png">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>

    <div class="wrapper d-flex">
        
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <?php include('dashboard/sidebar.php') ?>

        <div class="main-content w-100">
            
            <?php include('dashboard/header.php') ?>

            <div class="p-4 p-lg-5">
                <?php include('dashboard/routing.php'); ?>
            </div>
            
        </div> 
    </div> 

    <?php 
        // Cek jika class Modal belum ada, kita panggil filenya
        if (!class_exists('Modal')) {
            require_once 'views/components/Modal.php';
        }
        
        // Cetak HTML Modal & Script JavaScript-nya
        echo Modal::render(); 
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>