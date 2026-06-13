<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita - InfoKampus</title>
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/berita.css">
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
        <a href="/berita" class="active">Berita</a>
        <a href="/about">Tentang</a>
        <a href="/galeri">Galeri</a>
        <a href="/call">Kontak</a>
    </nav>
    <main class="berita-page">
        <div class="berita-filter">
            <div class="filter-search">
                <input type="text" placeholder="Cari berita..." class="search-input">
                <span class="search-icon"><svg viewBox="0 0 16 16" width="14" height="14"><path d="M11.7 10.3a6.5 6.5 0 1 0-1.4 1.4l3.8 3.8 1.4-1.4-3.8-3.8zM6.5 11a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9z" fill="currentColor"/></svg></span>
            </div>
            <div class="filter-categories">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="pengumuman-akademik">Pengumuman &amp; Akademik</button>
                <button class="filter-btn" data-filter="beasiswa-karir">Beasiswa &amp; Karir</button>
                <button class="filter-btn" data-filter="events">Events</button>
                <button class="filter-btn" data-filter="prestasi">Prestasi</button>
                <button class="filter-btn" data-filter="aktivitas">Aktivitas</button>
                <button class="filter-btn" data-filter="lainnya">Lainnya</button>
            </div>
        </div>

        <div class="berita-grid">
            <?php
            $labelMap = [
                'pengumuman-akademik' => 'Pengumuman & Akademik',
                'beasiswa-karir' => 'Beasiswa & Karir',
                'events' => 'Events',
                'prestasi' => 'Prestasi',
                'aktivitas' => 'Aktivitas',
                'lainnya' => 'Lainnya',
            ];
            $labelClassMap = [
                'pengumuman-akademik' => 'pengumuman',
                'beasiswa-karir' => 'beasiswa',
                'events' => 'acara',
                'prestasi' => 'prestasi',
                'aktivitas' => 'aktivitas',
                'lainnya' => 'lainnya',
            ];
            ?>
            <?php foreach ($semuaBerita as $item) { ?>
            <?php
                $label = $labelMap[$item->jenis_berita] ?? 'Info';
                $lc = $labelClassMap[$item->jenis_berita] ?? 'lainnya';
                $imgSrc = $item->foto ?? '/image/kampus.webp';
                $dateStr = \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('l, d F Y');
            ?>
            <article class="berita-card" data-animate data-jenis="<?= e($item->jenis_berita) ?>" data-desc="<?= e($item->deskripsi) ?>" data-label="<?= e($label) ?>" data-date="<?= e($dateStr) ?>" data-img="<?= e($imgSrc) ?>" data-penulis="<?= e($item->penulis ?? '') ?>">
                <div class="berita-card-image"><img src="<?= e($imgSrc) ?>" alt=""></div>
                <div class="berita-card-body">
                    <span class="berita-label label-<?= e($lc) ?>"><?= e($label) ?></span>
                    <h3 class="berita-card-title"><?= e($item->judul_berita) ?></h3>
                    <span class="berita-date"><?= e($dateStr) ?></span>
                    <a href="#" class="berita-read">Baca Selengkapnya →</a>
                </div>
            </article>
            <?php } ?>
        </div>

        <?php if (method_exists($semuaBerita, 'hasPages') && $semuaBerita->hasPages()) { ?>
        <div class="pagination-wrap"><?= $semuaBerita->links('vendor.pagination.numbers', ['paginator' => $semuaBerita]) ?></div>
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

    <div class="detail-overlay" id="detailOverlay">
        <div class="detail-panel">
            <button class="detail-close" id="detailClose">&times;</button>
            <div class="detail-content">
                <div class="detail-image">
                    <img id="detailImg" src="" alt="">
                    <span class="detail-badge" id="detailBadge"></span>
                </div>
                <div class="detail-info">
                    <h2 id="detailTitle"></h2>
                    <span class="detail-author" id="detailAuthor"></span>
                    <span class="detail-date" id="detailDate"></span>
                    <p id="detailDesc"></p>
                </div>
            </div>
        </div>
    </div>

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
    <script src="/js/hero.js"></script>
    <script src="/js/berita.js"></script>
</body>
</html>
