// assets/js/kpegawai.js

document.addEventListener("DOMContentLoaded", function() {
    
    // 1. Inisialisasi Icon Lucide
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // 2. Fitur Pencarian Tabel
    const searchInput = document.getElementById('searchInput');
    const tableBody = document.getElementById('pegawaiTable');
    
    if(searchInput && tableBody) {
        searchInput.addEventListener('keyup', function() {
            const filter = searchInput.value.toLowerCase();
            const rows = tableBody.getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                // Lewati baris jika itu pesan "Belum ada data"
                if (rows[i].cells.length < 2) continue;

                // Ambil teks dari kolom Nama (index 1) dan Role (index 2)
                const namaCol = rows[i].getElementsByTagName('td')[1];
                const roleCol = rows[i].getElementsByTagName('td')[2];

                if (namaCol || roleCol) {
                    const namaValue = namaCol.textContent || namaCol.innerText;
                    const roleValue = roleCol.textContent || roleCol.innerText;

                    // Cek apakah input cocok dengan nama atau role
                    if (namaValue.toLowerCase().indexOf(filter) > -1 || roleValue.toLowerCase().indexOf(filter) > -1) {
                        rows[i].style.display = "";
                    } else {
                        rows[i].style.display = "none";
                    }
                }
            }
        });
    }
});