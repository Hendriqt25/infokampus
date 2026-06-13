function getCsrfToken() {
    const meta = document.querySelector('meta[name="csrf-token"]');
    return meta ? meta.getAttribute('content') : '';
}

function showToast(message, type) {
    var toast = document.getElementById('toast');
    if (!toast) return;
    toast.textContent = message;
    toast.className = 'toast toast-' + type;
    setTimeout(function () { toast.classList.add('toast-hidden'); }, 4000);
}

function translateErrors(errors) {
    var labels = {
        foto: 'Foto', judul_galeri: 'Judul Galeri', judul_berita: 'Judul Berita',
        deskripsi: 'Deskripsi', penulis: 'Penulis', tanggal: 'Tanggal',
        jenis_berita: 'Jenis Berita',
    };
    var list = [];
    Object.keys(errors).forEach(function (field) {
        errors[field].forEach(function (msg) {
            var label = labels[field] || field;
            if (msg.includes('required')) list.push(label + ' wajib diisi.');
            else if (msg.includes('max')) list.push(label + ' terlalu panjang.');
            else if (msg.includes('image')) list.push(label + ' harus berupa gambar.');
            else if (msg.includes('mimes')) list.push(label + ' format tidak didukung.');
            else if (msg.includes('uploaded')) list.push(label + ' gagal diupload.');
            else list.push(msg);
        });
    });
    return list.join('\n');
}

function apiFetch(url, options = {}) {
    const defaults = {
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': getCsrfToken(),
        },
    };

    if (options.body instanceof FormData) {
        delete defaults.headers['Content-Type'];
    }

    const merged = {
        ...defaults,
        ...options,
        headers: { ...defaults.headers, ...options.headers },
    };

    return fetch(url, merged).then(res => {
        if (!res.ok) {
            return res.json().then(err => { throw err; });
        }
        return res.json();
    });
}

function apiGet(url) {
    return apiFetch(url, { method: 'GET' });
}

function apiPost(url, formData) {
    return apiFetch(url, { method: 'POST', body: formData });
}

function apiPut(url, formData) {
    return apiFetch(url, { method: 'PUT', body: formData });
}

function apiDelete(url) {
    return apiFetch(url, { method: 'DELETE' });
}
