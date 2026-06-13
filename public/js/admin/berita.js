let deleteId = null;

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formBerita');
    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const method = document.getElementById('methodField').value;
            const id = document.getElementById('fieldId').value;
            const formData = new FormData(this);

            if (method === 'PUT') {
                apiPut('/admin/beritaadmin/' + id, formData).then(function (res) {
                    showToast(res.success || 'Berita berhasil diubah.', 'success');
                    setTimeout(function () { window.location.reload(); }, 1500);
                }).catch(function (err) {
                    showToast(err.message || translateErrors(err.errors || {}), 'error');
                });
            } else {
                apiPost('/admin/beritaadmin', formData).then(function (res) {
                    showToast(res.success || 'Berita berhasil ditambahkan.', 'success');
                    setTimeout(function () { window.location.reload(); }, 1500);
                }).catch(function (err) {
                    showToast(err.message || translateErrors(err.errors || {}), 'error');
                });
            }
        });
    }

    document.querySelectorAll('.btn-edit').forEach(function (btn) {
        btn.addEventListener('click', function () {
            editModal(this);
        });
    });

    document.querySelectorAll('.btn-delete').forEach(function (btn) {
        btn.addEventListener('click', function () {
            hapusData(parseInt(this.dataset.id));
        });
    });
});

function openModal(data) {
    document.getElementById('modalBerita').classList.add('show');
    if (data) {
        document.getElementById('modalTitle').textContent = 'Ubah Berita';
        document.getElementById('methodField').value = 'PUT';
        document.getElementById('formBerita').action = '/admin/beritaadmin/' + data.id;
        document.getElementById('fieldId').value = data.id;
        document.getElementById('fieldJudul').value = data.judul_berita;
        document.getElementById('fieldDeskripsi').value = data.deskripsi;
        document.getElementById('fieldTanggal').value = data.tanggal;
        document.getElementById('fieldPenulis').value = data.penulis || '';
        document.getElementById('fieldJenis').value = data.jenis_berita || 'berita';
    } else {
        document.getElementById('modalTitle').textContent = 'Tambah Berita';
        document.getElementById('methodField').value = 'POST';
        document.getElementById('formBerita').action = '/admin/beritaadmin';
        document.getElementById('formBerita').reset();
        document.getElementById('fieldId').value = '';
    }
}

function closeModal() {
    document.getElementById('modalBerita').classList.remove('show');
}

function editModal(btn) {
    const row = btn.closest('tr');
    openModal({
        id: row.dataset.id,
        judul_berita: row.dataset.judul_berita,
        deskripsi: row.dataset.deskripsi,
        penulis: row.dataset.penulis,
        tanggal: row.dataset.tanggal,
        jenis_berita: row.dataset.jenis_berita,
    });
}

function hapusData(id) {
    deleteId = id;
    document.getElementById('modalHapus').classList.add('show');
}

function closeHapusModal() {
    document.getElementById('modalHapus').classList.remove('show');
    deleteId = null;
}

function confirmHapus() {
    if (deleteId) {
        apiDelete('/admin/beritaadmin/' + deleteId).then(function (res) {
            showToast(res.success || 'Berita berhasil dihapus.', 'success');
            setTimeout(function () { window.location.reload(); }, 1500);
        }).catch(function (err) {
            showToast(err.message || 'Gagal menghapus berita.', 'error');
        });
    }
}

function filterTab(el, filter) {
    document.querySelectorAll('.tab-btn').forEach(function (t) { t.classList.remove('active'); });
    el.classList.add('active');
    const rows = document.querySelectorAll('.data-table tbody tr[data-id]');
    rows.forEach(function (r) { r.style.display = ''; });
    if (filter !== 'all') {
        rows.forEach(function (r) {
            var jb = r.dataset.judul_berita.toLowerCase();
            if (jb.indexOf(filter) === -1) r.style.display = 'none';
        });
    }
}

function filterTable() {
    var q = document.getElementById('searchBerita').value.toLowerCase();
    var rows = document.querySelectorAll('.data-table tbody tr[data-id]');
    rows.forEach(function (r) {
        var jb = r.dataset.judul_berita.toLowerCase();
        r.style.display = jb.indexOf(q) > -1 ? '' : 'none';
    });
}
