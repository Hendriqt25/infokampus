<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - InfoKampus</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/profil.css">
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
            <a href="/admin/galeriadmin" class="nav-item">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                <span>Galeri</span>
            </a>
            <a href="/admin/profil" class="nav-item active">
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
        <?php if (session('success')) { ?>
            <div class="alert-success"><?= session('success') ?></div>
        <?php } ?>

        <header class="page-header">
            <h1 class="page-title">Profil</h1>
            <p class="page-subtitle">Universitas Nusantara Jaya</p>
        </header>

        <div class="profile-card">
            <div class="profile-avatar">
                <span><?= strtoupper(substr($user->nama, 0, 1)) ?></span>
            </div>

            <div class="profile-info">
                <div class="profile-row">
                    <span class="profile-label">Nama</span>
                    <span class="profile-value"><?= e($user->nama) ?></span>
                </div>
                <div class="profile-row">
                    <span class="profile-label">Email</span>
                    <span class="profile-value"><?= e($user->email) ?></span>
                </div>
                <div class="profile-row">
                    <span class="profile-label">Jabatan</span>
                    <span class="profile-value">Administrator</span>
                </div>
                <div class="profile-row">
                    <span class="profile-label">No Telepon</span>
                    <span class="profile-value"><?= e($user->no_hp ?? '-') ?></span>
                </div>
            </div>

            <button class="btn-add" onclick="openEditModal()">EDIT PROFIL</button>
        </div>
    </main>
</div>

<!-- Edit Profil Modal -->
<div class="modal-overlay" id="modalEdit" onclick="if(event.target===this)closeEditModal()">
    <div class="modal">
        <div class="modal-header">
            <h2>Edit Profil</h2>
            <button class="modal-close" onclick="closeEditModal()">&times;</button>
        </div>
        <form method="POST" action="/admin/profil" id="formProfil">
            <input type="hidden" name="_method" value="PUT">
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" id="editName" value="<?= e($user->nama) ?>" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" id="editEmail" value="<?= e($user->email) ?>" required>
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" value="Administrator" class="input-static" readonly>
                </div>
                <div class="form-group">
                    <label>No Telepon</label>
                    <input type="text" name="no_hp" id="editPhone" value="<?= e($user->no_hp ?? '') ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-batal" onclick="closeEditModal()">Batal</button>
                <button type="submit" class="btn-simpan">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
function openEditModal() {
    document.getElementById('modalEdit').classList.add('show');
}

function closeEditModal() {
    document.getElementById('modalEdit').classList.remove('show');
}
</script>

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
