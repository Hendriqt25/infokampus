    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="<?= csrf_token() ?>">
        <title>InfoKampus - Portal Informasi Kampus</title>
        <link rel="stylesheet" href="/css/home.css">
    </head>
    <body>
        <script>if(!sessionStorage.getItem('v')){document.body.classList.add('page-animate');sessionStorage.setItem('v','1')}</script>
        <header class="navbar">
            <div class="logo">InfoKampus</div>
            <div class="auth-button">
                <a href="/login" class="btn-login">Login</a>
            </div>
        </header>

        <!-- Hero Carousel -->
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
            <a href="/" class="active">Beranda</a>
            <a href="/berita">Berita</a>
            <a href="/about">Tentang</a>
            <a href="/galeri">Galeri</a>
            <a href="/call">Kontak</a>
        </nav>

        <section class="news-section" id="informasi" data-animate>
            <div class="section-inner">
                <div class="news-header">
                    <span class="news-badge">KABAR KAMPUS</span>
                </div>

                <div class="news-grid" id="berita-terbaru">
                    <?php foreach ([$kabarPengumuman, $kabarAktivitas] as $item) { if (!$item) continue; ?>
                    <article class="news-card" data-animate>
                        <div class="news-card-image"><img src="<?= e($item->foto ?? '/image/kampus.webp') ?>" alt=""></div>
                        <h3><?= e($item->judul_berita) ?></h3>
                        <p><?= e(\Illuminate\Support\Str::limit($item->deskripsi, 150)) ?></p>
                        <a href="/berita" class="news-read">Baca →</a>
                    </article>
                    <?php } ?>
                </div>
            </div>
        </section>

    <section class="info-section" id="keunggulan">
        <div class="section-inner">
            <div class="info-news-wrapper" data-animate>
                <div class="info-header">
                    <span class="info-badge">INFO TERKINI</span>
                </div>
                <div class="info-card">
                        <div class="info-grid">
                            <div class="info-article">
                                <h2>Seminar Teknologi Kampus 2026: Inovasi Digital untuk Pendidikan Tinggi</h2>
                                <p>
                                    Seminar tahunan yang menghadirkan pembicara dari berbagai universitas terkemuka
                                    untuk membahas transformasi digital dalam dunia pendidikan tinggi.
                                    Catat tanggalnya dan jangan lewatkan kesempatan emas ini!
                                </p>
                                <a href="/berita" class="btn-baca">Baca Selengkapnya</a>
                            </div>

                            <div class="info-carousel" data-category="prestasi,beasiswa-karir">
                                <a href="/berita" class="btn-lihat-semua">Lihat Semua ↗</a>
                                <div class="carousel-track">
                                    <?php foreach ($infoPrestasiKarir as $i => $item) { ?>
                                    <div class="carousel-slide<?= $i === 0 ? ' active' : '' ?>">
                                        <img src="<?= e($item->foto ?? '/image/kampus.webp') ?>" alt="">
                                        <div class="carousel-overlay">
                                            <h3><?= e($item->judul_berita) ?></h3>
                                            <span class="carousel-date"><?= \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('l, d F Y') ?></span>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="carousel-dots">
                                    <?php foreach ($infoPrestasiKarir as $i => $item) { ?>
                                    <span class="dot<?= $i === 0 ? ' active' : '' ?>" data-slide="<?= $i ?>"></span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="info-section" id="feature">
            <div class="section-inner">
                <div class="info-news-wrapper" data-animate>
                    <div class="info-card">
                        <div class="info-grid info-grid-flip">
                            <div class="info-carousel" data-category="events">
                                <a href="/berita" class="btn-lihat-semua">Lihat Semua ↗</a>
                                <div class="carousel-track">
                                    <?php foreach ($infoEvent as $i => $item) { ?>
                                    <div class="carousel-slide<?= $i === 0 ? ' active' : '' ?>">
                                        <img src="<?= e($item->foto ?? '/image/kampus.webp') ?>" alt="">
                                        <div class="carousel-overlay">
                                            <h3><?= e($item->judul_berita) ?></h3>
                                            <span class="carousel-date"><?= \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('l, d F Y') ?></span>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="carousel-dots">
                                    <?php foreach ($infoEvent as $i => $item) { ?>
                                    <span class="dot<?= $i === 0 ? ' active' : '' ?>" data-slide="<?= $i ?>"></span>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="info-article">
                                <h2>Event & Kegiatan Mahasiswa Paling Dinantikan Tahun Ini</h2>
                                <p>
                                    Dari seminar nasional hingga kompetisi mahasiswa, InfoKampus menghadirkan informasi
                                    lengkap seputar event kampus yang wajib kamu ikuti. Jangan sampai ketinggalan
                                    kesempatan untuk mengembangkan diri dan meraih prestasi.
                                </p>
                                <a href="/berita" class="btn-baca">Lihat Semua Event</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Galeri Kampus -->
        <section class="gallery-section" id="galeri" data-animate>
            <div class="section-inner">
                <div class="gallery-header">
                    <span class="gallery-badge">GALERI KAMPUS</span>
                </div>
                <div class="gallery-grid">
                    <?php foreach ($galeriTerbaru as $item) { ?>
                    <div class="gallery-item" data-animate>
                        <div class="gallery-image"><img src="<?= e($item->foto ?? '/image/kampus.webp') ?>" alt=""></div>
                    </div>
                    <?php } ?>
                </div>
                    </div>
            </div>
        </section>

        <!-- Footer -->
        <footer id="kontak" data-animate>
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
        <script src="/js/home.js"></script>
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
