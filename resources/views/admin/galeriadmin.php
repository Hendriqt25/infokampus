<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?= csrf_token() ?>">
    <title>Galeri - InfoKampus</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin.css">
</head>
<body>
<div class="dashboard-layout">
    <aside class="sidebar">
        <div class="sidebar-brand">
            <span class="brand-name">InfoKampus</span>
        </div>
        <nav class="sidebar-nav">
            <a href="/dashboard" class="nav-item">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                <span>Dashboard</span>
            </a>
            <a href="/admin/beritaadmin" class="nav-item">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-4 0v-9"/><path d="M10 6h6"/><path d="M10 10h6"/><path d="M10 14h4"/></svg>
                <span>Berita</span>
            </a>
            <a href="/admin/galeriadmin" class="nav-item active">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                <span>Galeri</span>
            </a>
            <a href="/admin/profil" class="nav-item">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                <span>Profil</span>
            </a>
        </nav>
        <div class="sidebar-footer">
            <form method="POST" action="/logout" id="formLogout">
                <button type="button" class="logout-btn" onclick="openLogoutModal()">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="main-content">
        <div id="toast" class="toast toast-hidden"></div>
        <?php if (session('success')) { ?>
            <div class="alert-success"><?= session('success') ?></div>
        <?php } ?>

        <header class="page-header">
            <h1 class="page-title">Galeri</h1>
            <p class="page-subtitle">Universitas Nusantara Jaya</p>
        </header>

        <div class="content-card">
            <div class="card-header">
                <div class="search-field">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    <input type="text" id="searchGaleri" placeholder="Cari galeri..." oninput="filterTable()">
                </div>
                <button class="btn-add" onclick="openModal()">+ TAMBAH GALERI</button>
            </div>
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th class="col-aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($galeri as $g) { ?>
                        <tr data-id="<?= $g->id ?>" data-judul="<?= e($g->judul_galeri) ?>" data-deskripsi="<?= e($g->deskripsi) ?>">
                            <td class="col-foto">
                                <img src="<?= e($g->foto) ?>" alt="" class="thumb-galeri">
                            </td>
                            <td class="col-judul"><?= e($g->judul_galeri) ?></td>
                            <td><?= e($g->deskripsi) ?></td>
                            <td class="col-aksi">
                                <button class="btn-icon btn-edit" onclick="editModal(this)" title="Ubah">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                </button>
                                <button class="btn-icon btn-delete" data-id="<?= $g->id ?>" title="Hapus">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php if ($galeri->isEmpty()) { ?>
                        <tr><td colspan="4" class="empty-msg">Belum ada galeri.</td></tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php if ($galeri->hasPages()) { ?>
                <div class="pagination-wrap"><?= $galeri->links('vendor.pagination.numbers') ?></div>
                <?php } ?>
            </div>
        </div>
    </main>
</div>

<!-- Modal -->
<div class="modal-overlay" id="modalGaleri" onclick="if(event.target===this)closeModal()">
    <div class="modal">
        <div class="modal-header">
            <h2 id="modalTitle">Tambah Galeri</h2>
        </div>
        <form method="POST" action="/admin/galeriadmin" id="formGaleri" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="POST" id="methodField">
            <div class="modal-body">
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" id="fieldFoto" accept="image/*" class="input-file">
                </div>
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" name="judul_galeri" id="fieldJudul" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" id="fieldDeskripsi" rows="4" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-batal" onclick="closeModal()">Batal</button>
                <button type="submit" class="btn-simpan">Simpan</button>
            </div>
        </form>
    </div>
</div>

<form method="POST" id="deleteForm" style="display:none">
    <input type="hidden" name="_method" value="DELETE">
</form>

<!-- Delete Confirmation Modal -->
<div class="modal-overlay" id="modalHapus" onclick="if(event.target===this)closeHapusModal()">
    <div class="modal modal-sm">
        <div class="modal-header">
            <h2>Hapus Galeri</h2>
        </div>
        <div class="modal-body">
            <p style="color: #6b7280; font-size: 14px; line-height: 1.6;">Apakah yakin ingin menghapus galeri ini?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-batal" onclick="closeHapusModal()">Batal</button>
            <button type="button" class="btn-simpan btn-hapus" onclick="confirmHapus()">Hapus</button>
        </div>
    </div>
</div>

<script src="/js/admin/api.js"></script>
<script src="/js/admin/galeri.js"></script>

<div class="modal-overlay" id="modalLogout" onclick="if(event.target===this)closeLogoutModal()">
    <div class="modal modal-sm">
        <div class="modal-header">
            <h2>Logout</h2>
        </div>
        <div class="modal-body">
            <p style="color: #6b7280; font-size: 14px; line-height: 1.6;">Yakin ingin logout?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-batal" onclick="closeLogoutModal()">Batal</button>
            <button type="button" class="btn-simpan btn-hapus" onclick="confirmLogout()">Logout</button>
        </div>
    </div>
</div>

<script>
function openLogoutModal() {
    document.getElementById('modalLogout').classList.add('show');
}

function closeLogoutModal() {
    document.getElementById('modalLogout').classList.remove('show');
}

function confirmLogout() {
    document.getElementById('formLogout').submit();
}
</script>
</body>
</html>
