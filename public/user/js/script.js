document.querySelectorAll('.list-group-item').forEach(item => {
    item.addEventListener('click', function() {
        // Hapus kelas aktif dari semua div
        document.querySelectorAll('.content-div').forEach(div => {
            div.classList.remove('active-div');
            div.classList.add('hidden-div');
        });

        // Tambahkan kelas aktif ke div yang sesuai
        const targetDiv = document.getElementById(this.getAttribute('data-target'));
        targetDiv.classList.remove('hidden-div');
        targetDiv.classList.add('active-div');
    });
});

 // Tambahkan event listener ke tombol "Lengkapi Data"
 document.getElementById('btn-lengkapi-data').addEventListener('click', function() {
    // Hapus kelas aktif dari semua div
    document.querySelectorAll('.content-div').forEach(div => {
        div.classList.remove('active-div');
        div.classList.add('hidden-div');
    });

    // Tambahkan kelas aktif ke div "Lengkapi Data"
    const lengkapiDataDiv = document.getElementById('lengkapi_data');
    const infoPribadiDiv = document.getElementById('info_pribadi');
    lengkapiDataDiv.classList.remove('hidden-div');
    lengkapiDataDiv.classList.add('active-div');
    infoPribadiDiv.classList.remove('active-div');
    infoPribadiDiv.classList.add('hidden-div');
});

 