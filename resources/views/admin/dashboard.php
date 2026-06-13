<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - InfoKampus</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
</head>
<body>
<div class="dashboard-layout">
    <aside class="sidebar">
        <div class="sidebar-brand">
            <span class="brand-name">InfoKampus</span>
        </div>

        <nav class="sidebar-nav">
            <a href="/dashboard" class="nav-item active">
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

        <header class="topbar">
            <h1 class="page-title">Dashboard</h1>
            <div class="topbar-right">
                <div class="admin-profile">
                    <span class="admin-name">Admin</span>
                    <div class="admin-avatar">A</div>
                </div>
            </div>
        </header>

        <section class="welcome-card">
            <div class="welcome-text">
                <h2>Selamat Datang, Admin!</h2>
                <p>Pantau informasi berita dan galeri kampus terbaru di sini.</p>
            </div>
        </section>

        <section class="stats-row">
            <div class="stat-card stat-berita">
                <div class="stat-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-4 0v-9"/><path d="M10 6h6"/><path d="M10 10h6"/><path d="M10 14h4"/></svg>
                </div>
                <div class="stat-info">
                    <span class="stat-label">Total Berita</span>
                    <span class="stat-value"><?= $beritaCount ?></span>
                </div>
            </div>
            <div class="stat-card stat-galeri">
                <div class="stat-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                </div>
                <div class="stat-info">
                    <span class="stat-label">Total Galeri</span>
                    <span class="stat-value"><?= $galeriCount ?></span>
                </div>
            </div>
        </section>

        <section class="chart-section">
            <div class="card chart-card">
                <h3 class="card-title">Statistik Konten</h3>
                <canvas id="statsChart" height="200"></canvas>
            </div>
            <div class="card chart-card">
                <h3 class="card-title">Distribusi Kategori Berita</h3>
                <canvas id="categoryChart" height="200"></canvas>
            </div>
        </section>
    </main>
</div>

<script>
const beritaCount = <?= json_encode($beritaCount) ?>;
const galeriCount = <?= json_encode($galeriCount) ?>;

new Chart(document.getElementById('statsChart'), {
    type: 'bar',
    data: {
        labels: ['Berita', 'Galeri'],
        datasets: [{
            label: 'Jumlah Konten',
            data: [beritaCount, galeriCount],
            backgroundColor: ['#6366f1', '#14b8a6'],
            borderRadius: 8,
            barThickness: 80,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: { stepSize: 1, font: { family: 'Inter' } },
                grid: { color: '#f3f4f6' }
            },
            x: {
                grid: { display: false },
                ticks: { font: { family: 'Inter', size: 13 } }
            }
        }
    }
});

const catLabels = <?= json_encode($categoryLabels) ?>;
const catData = <?= json_encode($categoryData) ?>;
const catColors = ['#6366f1', '#14b8a6', '#f59e0b', '#ef4444', '#8b5cf6', '#06b6d4'];

new Chart(document.getElementById('categoryChart'), {
    type: 'doughnut',
    data: {
        labels: catLabels,
        datasets: [{
            data: catData,
            backgroundColor: catColors.slice(0, catData.length),
            borderWidth: 0,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
                labels: { font: { family: 'Inter', size: 12 }, padding: 16 }
            }
        }
    }
});
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
