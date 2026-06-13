function getApiToken() {
    var token = sessionStorage.getItem('api_token');
    if (token) return Promise.resolve(token);
    return fetch('/api/token', { method: 'POST', headers: { 'Accept': 'application/json' } })
        .then(function (r) {
            if (!r.ok) throw new Error('Gagal mendapatkan token');
            return r.json();
        })
        .then(function (data) {
            sessionStorage.setItem('api_token', data.token);
            return data.token;
        });
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

function apiFetch(url, options) {
    return getApiToken().then(function (token) {
        var defaults = {
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token,
            },
        };

        if (options && options.body instanceof FormData) {
            delete defaults.headers['Content-Type'];
        }

        var merged = {
            ...defaults,
            ...options,
            headers: { ...defaults.headers, ...(options ? options.headers : {}) },
        };

        return fetch(url, merged).then(function (res) {
            if (!res.ok) {
                return res.json().then(function (err) { throw err; });
            }
            return res.json();
        });
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
