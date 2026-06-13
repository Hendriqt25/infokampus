<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - InfoKampus</title>
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/call.css">
</head>
<body>
    <script>if(!sessionStorage.getItem('v')){document.body.classList.add('page-animate');sessionStorage.setItem('v','1')}</script>
    <header class="navbar">
        <div class="logo">InfoKampus</div>
        <div class="auth-button">
            <a href="/login" class="btn-login">Login</a>
        </div>
    </header>

    <?php if ($heroBerita->isNotEmpty()) { ?>
    <section class="hero-carousel" id="featured-news">
        <div class="hero-carousel-inner">
            <div class="hero-slides">
                <?php foreach ($heroBerita as $i => $item) { ?>
                <div class="hero-slide<?= $i === 0 ? ' active' : '' ?>" data-index="<?= $i ?>">
                    <div class="hero-slide-bg"><img src="<?= e($item->foto ?? '/image/kampus.webp') ?>" alt=""></div>
                    <div class="hero-slide-overlay"></div>
                    <div class="hero-slide-content">
                        <span class="hero-badge"><?= e(strtoupper(str_replace('-', ' ', $item->jenis_berita))) ?></span>
                        <h2 class="hero-slide-title"><?= e($item->judul_berita) ?></h2>
                        <span class="hero-slide-date"><?= \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('l, d F Y | H.i') ?> WITA</span>
                        <a href="/berita" class="hero-slide-cta">Baca Selengkapnya <span>→</span></a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="hero-nav-numbers">
                <?php foreach ($heroBerita as $i => $item) { ?>
                <span class="hero-nav-num<?= $i === 0 ? ' active' : '' ?>" data-target="<?= $i ?>"><?= $i + 1 ?></span>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <nav class="nav-menu">
        <a href="/">Beranda</a>
        <a href="/berita">Berita</a>
        <a href="/about">Tentang</a>
        <a href="/galeri">Galeri</a>
        <a href="/call" class="active">Kontak</a>
    </nav>

    <main class="call-page">
        <div class="section-inner">
            <div class="call-card">
                <div class="call-header">
                    <h2>Hubungi Kami</h2>
                    <p>Silakan hubungi InfoKampus UNJAYA melalui kontak di bawah ini</p>
                </div>
                <div class="call-items">
                    <div class="call-item" data-animate>
                        <span class="call-icon">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </span>
                        <span class="call-text">
                            <strong>WhatsApp</strong>
                            <span>+62 812-3456-7890</span>
                        </span>
                    </div>
                    <div class="call-item" data-animate>
                        <span class="call-icon">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        </span>
                        <span class="call-text">
                            <strong>Email</strong>
                            <span>info@unj.ac.id</span>
                        </span>
                    </div>
                    <div class="call-item" data-animate>
                        <span class="call-icon">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        </span>
                        <span class="call-text">
                            <strong>Alamat</strong>
                            <span>Jl. Pendidikan No. 123, Samarinda, Kaltim</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="footer-inner">
            <div class="footer-col footer-brand-col">
                <h2>Info<span>Kampus</span></h2>
                <p>Bersama Membangun Generasi Unggul dan Berdaya Saing</p>
            </div>
            <div class="footer-col footer-nav-col">
                <h4>Navigasi</h4>
                <a href="/">Beranda</a>
                <a href="/about">Tentang</a>
                <a href="/galeri">Galeri</a>
            </div>
            <div class="footer-col footer-about-col">
                <h4>Tentang</h4>
                <p>Website resmi Universitas Nusantara Jaya — menyajikan informasi akademik dan kegiatan kampus secara lengkap dan terpercaya.</p>
            </div>
            <div class="footer-bottom">
                <p class="copyright">&copy; 2026 InfoKampus. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script type="module" src="<?= \Illuminate\Support\Facades\Vite::asset('resources/js/app.js') ?>"></script>
    <script src="/js/hero.js"></script>
</body>
</html>
