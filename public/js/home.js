(function(){
    var csrf = document.querySelector('meta[name="csrf-token"]');
    var token = csrf ? csrf.getAttribute('content') : '';

    fetch('/api/berita?per_page=50', {
        headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': token }
    }).then(function(r) { return r.json(); }).then(function(data) {
        var items = data.data || [];
        if (!items.length) return;

        var grid = document.getElementById('berita-terbaru');
        if (!grid) return;

        var pengumuman = null, aktivitas = null;
        items.forEach(function(item) {
            if (item.jenis_berita === 'pengumuman-akademik' && !pengumuman) pengumuman = item;
            if (item.jenis_berita === 'aktivitas' && !aktivitas) aktivitas = item;
        });

        [pengumuman, aktivitas].forEach(function(item) {
            if (!item) return;
            var imgSrc = item.foto || '/image/kampus.webp';
            var card = document.createElement('article');
            card.className = 'news-card';
            card.setAttribute('data-animate', '');
            card.innerHTML =
                '<div class="news-card-image"><img src="' + imgSrc + '" alt="Berita"></div>' +
                '<h3>' + escapeHtml(item.judul_berita) + '</h3>' +
                '<p>' + escapeHtml((item.deskripsi || '').substring(0, 150)) + '</p>' +
                '<a href="/berita" class="news-read">Baca →</a>';
            grid.appendChild(card);
        });

        document.querySelectorAll('.info-carousel').forEach(function(carousel) {
            var category = carousel.dataset.category;
            if (!category) return;

            var track = carousel.querySelector('.carousel-track');
            var dotsContainer = carousel.querySelector('.carousel-dots');
            if (!track || !dotsContainer) return;

            var catItems = [];
            items.forEach(function(item) {
                if (catItems.length >= 3) return;
                if (category === 'event-prestasi') {
                    if (item.jenis_berita === 'events' || item.jenis_berita === 'prestasi') catItems.push(item);
                } else if (item.jenis_berita === category) {
                    catItems.push(item);
                }
            });

            if (!catItems.length) return;

            catItems.forEach(function(item, i) {
                var imgSrc = item.foto || '/image/kampus.webp';
                var date = new Date(item.tanggal);
                var bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                var hari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
                var dateStr = hari[date.getDay()] + ', ' + date.getDate() + ' ' + bulan[date.getMonth()] + ' ' + date.getFullYear();

                var slide = document.createElement('div');
                slide.className = 'carousel-slide' + (i === 0 ? ' active' : '');
                slide.innerHTML = '<img src="' + imgSrc + '" alt="Berita">' +
                    '<div class="carousel-overlay"><h3>' + escapeHtml(item.judul_berita) + '</h3>' +
                    '<span class="carousel-date">' + dateStr + '</span></div>';
                track.appendChild(slide);

                var dot = document.createElement('span');
                dot.className = 'dot' + (i === 0 ? ' active' : '');
                dot.dataset.slide = i;
                dotsContainer.appendChild(dot);
            });

            var dots = dotsContainer.querySelectorAll('.dot');
            dots.forEach(function(dot) {
                dot.addEventListener('click', function() {
                    var slide = parseInt(this.dataset.slide);
                    track.style.transform = 'translateX(-' + (slide * 100) + '%)';
                    dots.forEach(function(d) { d.classList.remove('active'); });
                    this.classList.add('active');
                });
            });
        });

        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(e) {
                if (e.isIntersecting) e.target.classList.add('visible');
            });
        }, { threshold: 0.15 });
        document.querySelectorAll('[data-animate]').forEach(function(el) { observer.observe(el); });
    }).catch(function() {});

    fetch('/api/galeri?per_page=3', {
        headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': token }
    }).then(function(r) { return r.json(); }).then(function(data) {
        var items = data.data || [];
        var grid = document.querySelector('.gallery-grid');
        if (!grid || !items.length) return;
        items.forEach(function(item) {
            var div = document.createElement('div');
            div.className = 'gallery-item';
            div.setAttribute('data-animate', '');
            div.innerHTML = '<div class="gallery-image"><img src="' + (item.foto || '/image/kampus.webp') + '" alt="Galeri"></div>';
            grid.appendChild(div);
        });
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(e) {
                if (e.isIntersecting) e.target.classList.add('visible');
            });
        }, { threshold: 0.15 });
        document.querySelectorAll('.gallery-item[data-animate]').forEach(function(el) { observer.observe(el); });
    }).catch(function() {});

    function escapeHtml(s) {
        var d = document.createElement('div');
        d.textContent = s;
        return d.innerHTML;
    }
})();
