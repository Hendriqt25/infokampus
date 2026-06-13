<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang - InfoKampus</title>
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/about.css">
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
        <a href="/about" class="active">Tentang</a>
        <a href="/galeri">Galeri</a>
        <a href="/call">Kontak</a>
    </nav>

    <main class="about-page">
        <section class="about-section" data-animate>
            <div class="section-inner">
                <div class="about-header">
                    <span class="about-badge">SEJARAH</span>
                    <h2>Perjalanan Universitas Nusantara Jaya</h2>
                </div>
                <div class="about-content">
                    <p>
                        <strong>InfoKampus</strong> adalah website resmi <strong>Universitas Nusantara Jaya (UNJAYA)</strong> 
                        yang didirikan pada <strong>11 Juli 2006</strong> di Kota Samarinda, Kalimantan Timur. 
                        UNJAYA berawal dari sebuah lembaga kursus komputer dan akuntansi yang dirintis oleh 
                        Yayasan Pendidikan Nusantara sejak tahun 2000.
                    </p>
                    <p>
                        Kampus ini berdiri di atas lahan seluas 12 hektar di kawasan pendidikan Samarinda. 
                        Pada awal pendiriannya, UNJAYA hanya memiliki 3 fakultas dengan 7 program studi dan 450 mahasiswa. 
                        Kini, UNJAYA telah berkembang menjadi salah satu perguruan tinggi swasta terkemuka di Kalimantan Timur
                        dengan 9 fakultas, 28 program studi, dan lebih dari 12.000 mahasiswa aktif.
                    </p>
                    <p>
                        Sebagai portal resmi UNJAYA, InfoKampus menyajikan seluruh informasi akademik, berita kampus, 
                        pengumuman resmi, dan galeri kegiatan secara terpusat dan terpercaya untuk seluruh civitas 
                        akademika UNJAYA.
                    </p>
                </div>
            </div>
        </section>

        <section class="about-milestones">
            <div class="section-inner">
                <div class="about-header">
                    <span class="about-badge">TONGGAK SEJARAH</span>
                    <h2>Perjalanan Kami</h2>
                </div>
                <div class="milestones-grid">
                    <div class="milestone-card" data-animate>
                        <div class="milestone-year">2006</div>
                        <div class="milestone-dot"></div>
                        <h3>Pendirian UNJAYA</h3>
                        <p>Universitas Nusantara Jaya resmi berdiri pada 11 Juli 2006 dengan 3 fakultas dan 450 mahasiswa pertama.</p>
                    </div>
                    <div class="milestone-card" data-animate>
                        <div class="milestone-year">2013</div>
                        <div class="milestone-dot"></div>
                        <h3>Akreditasi Institusi</h3>
                        <p>UNJAYA meraih akreditasi institusi peringkat B dari BAN-PT setelah 7 tahun penyelenggaraan.</p>
                    </div>
                    <div class="milestone-card" data-animate>
                        <div class="milestone-year">2018</div>
                        <div class="milestone-dot"></div>
                        <h3>Peluncuran InfoKampus</h3>
                        <p>UNJAYA meluncurkan InfoKampus sebagai website resmi universitas untuk informasi akademik dan berita kampus.</p>
                    </div>
                    <div class="milestone-card" data-animate>
                        <div class="milestone-year">2024</div>
                        <div class="milestone-dot"></div>
                        <h3>Akreditasi Unggul</h3>
                        <p>UNJAYA meraih akreditasi institusi peringkat A (Unggul) dan InfoKampus dikembangkan dengan fitur informasi yang lebih lengkap.</p>
                    </div>
                    <div class="milestone-card" data-animate>
                        <div class="milestone-year">2026</div>
                        <div class="milestone-dot"></div>
                        <h3>Portal Terpercaya</h3>
                        <p>InfoKampus menjadi portal resmi UNJAYA yang melayani 9 fakultas, 28 program studi, dan 12.000+ mahasiswa.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-cta" data-animate>
            <div class="section-inner">
                <div class="cta-content">
                    <h2>Ikuti Perkembangan UNJAYA</h2>
                    <p>Dapatkan berita terbaru seputar kegiatan akademik, prestasi mahasiswa, dan informasi kampus lainnya.</p>
                    <a href="/berita" class="cta-btn">Lihat Berita Terbaru</a>
                </div>
            </div>
        </section>
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
    <script>
    (function(){
        var navbar = document.querySelector('.navbar');
        if (navbar) {
            navbar.classList.toggle('scrolled', window.scrollY > 50);
            window.addEventListener('scroll', function(){
                navbar.classList.toggle('scrolled', window.scrollY > 50);
            });
        }
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(e) {
                if (e.isIntersecting) e.target.classList.add('visible');
            });
        }, { threshold: 0.15 });
        document.querySelectorAll('[data-animate]').forEach(function(el) { observer.observe(el); });
    })();
    </script>
</body>
</html>
