<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?= csrf_token() ?>">
    <title>Galeri - InfoKampus</title>
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/galeri.css">
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
            <a href="/galeri" class="active">Galeri</a>
            <a href="/call">Kontak</a>
        </nav>
        <main class="galeri-page">
            <div class="galeri-grid">
                <?php if (method_exists($galeri, 'isEmpty') && $galeri->isEmpty()) { ?>
                <p style="grid-column: 1 / -1; text-align: center; color: #999; padding: 60px 0;">Belum ada galeri.</p>
                <?php } else { ?>
                <?php foreach ($galeri as $item) { ?>
                <article class="galeri-card" data-animate data-img="<?= e($item->foto ?? '/image/kampus.webp') ?>" data-title="<?= e($item->judul_galeri) ?>" data-desc="<?= e($item->deskripsi) ?>">
                    <div class="galeri-card-image"><img src="<?= e($item->foto ?? '/image/kampus.webp') ?>" alt=""></div>
                </article>
                <?php } ?>
                <?php } ?>
            </div>

            <?php if (method_exists($galeri, 'hasPages') && $galeri->hasPages()) { ?>
            <div class="pagination-wrap"><?= $galeri->links('vendor.pagination.numbers', ['paginator' => $galeri]) ?></div>
            <?php } ?>
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

    <div class="detail-overlay" id="galeriOverlay">
        <div class="detail-panel">
            <button class="detail-close" id="galeriClose">&times;</button>
            <div class="detail-content">
                <div class="detail-image">
                    <img id="galeriImg" src="" alt="">
                </div>
                <div class="detail-info">
                    <h2 id="galeriTitle"></h2>
                    <p id="galeriDesc"></p>
                </div>
            </div>
        </div>
    </div>

    <script type="module" src="<?= \Illuminate\Support\Facades\Vite::asset('resources/js/app.js') ?>"></script>
    <script src="/js/galeri.js"></script>
    <script src="/js/hero.js"></script>
    <script>
    (function(){
        var navbar = document.querySelector('.navbar');
        if (navbar) {
            navbar.classList.toggle('scrolled', window.scrollY > 50);
            window.addEventListener('scroll', function(){
                navbar.classList.toggle('scrolled', window.scrollY > 50);
            });
        }
    })();
    </script>
</body>
</html>