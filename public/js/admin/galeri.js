let deleteId = null;

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formGaleri');
    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const method = document.getElementById('methodField').value;
            const id = document.querySelector('#formGaleri [name="id"]');
            const formData = new FormData(this);

            if (method === 'PUT') {
                apiPut('/api/admin/galeri/' + (id ? id.value : ''), formData).then(function (res) {
                    showToast(res.success || 'Galeri berhasil diubah.', 'success');
                    setTimeout(function () { window.location.reload(); }, 1500);
                }).catch(function (err) {
                    showToast(translateErrors(err.errors || {}), 'error');
                });
            } else {
                apiPost('/api/admin/galeri', formData).then(function (res) {
                    showToast(res.success || 'Galeri berhasil ditambahkan.', 'success');
                    setTimeout(function () { window.location.reload(); }, 1500);
                }).catch(function (err) {
                    showToast(translateErrors(err.errors || {}), 'error');
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
    document.getElementById('modalGaleri').classList.add('show');
    if (data) {
        document.getElementById('modalTitle').textContent = 'Ubah Galeri';
        document.getElementById('methodField').value = 'PUT';
        document.getElementById('formGaleri').action = '/admin/galeriadmin/' + data.id;
        document.getElementById('fieldFoto').required = false;
        document.getElementById('fieldJudul').value = data.judul || '';
        document.getElementById('fieldDeskripsi').value = data.deskripsi || '';
        var idInput = document.querySelector('#formGaleri [name="id"]');
        if (!idInput) {
            idInput = document.createElement('input');
            idInput.type = 'hidden';
            idInput.name = 'id';
            document.getElementById('formGaleri').appendChild(idInput);
        }
        idInput.value = data.id;
    } else {
        document.getElementById('modalTitle').textContent = 'Tambah Galeri';
        document.getElementById('methodField').value = 'POST';
        document.getElementById('formGaleri').action = '/admin/galeriadmin';
        document.getElementById('formGaleri').reset();
        document.getElementById('fieldFoto').required = true;
        var idInput = document.querySelector('#formGaleri [name="id"]');
        if (idInput) idInput.remove();
    }
}

function closeModal() {
    document.getElementById('modalGaleri').classList.remove('show');
}

function editModal(btn) {
    const row = btn.closest('tr');
    openModal({
        id: row.dataset.id,
        judul: row.dataset.judul,
        deskripsi: row.dataset.deskripsi,
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
        apiDelete('/api/admin/galeri/' + deleteId).then(function (res) {
            showToast(res.success || 'Galeri berhasil dihapus.', 'success');
            setTimeout(function () { window.location.reload(); }, 1500);
        }).catch(function (err) {
            showToast(err.message || 'Gagal menghapus galeri.', 'error');
        });
    }
}

function filterTable() {
    var q = document.getElementById('searchGaleri').value.toLowerCase();
    var rows = document.querySelectorAll('.data-table tbody tr[data-id]');
    rows.forEach(function (r) {
        var desc = (r.dataset.deskripsi || '').toLowerCase();
        r.style.display = desc.indexOf(q) > -1 ? '' : 'none';
    });
}
