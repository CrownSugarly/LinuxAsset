
    lucide.createIcons();

    // Logic Pencarian Real-time
    document.getElementById('searchPengelola').addEventListener('keyup', function() {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll('#tablePengelola tr');

        rows.forEach(row => {
            if(row.cells.length > 1) {
                const text = row.innerText.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            }
        });
    });
