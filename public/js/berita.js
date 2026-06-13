(function(){
    var labelMap = {
        'pengumuman-akademik': 'Pengumuman & Akademik', 'beasiswa-karir': 'Beasiswa & Karir',
        'events': 'Events', 'prestasi': 'Prestasi',
        'aktivitas': 'Aktivitas', 'lainnya': 'Lainnya'
    };

    initFilter();
    initDetail();
    initAnimate();

    function initFilter() {
        var filterBtns = document.querySelectorAll('.filter-btn');
        var searchInput = document.querySelector('.search-input');
        var cards = document.querySelectorAll('.berita-card');
        var activeCategory = 'all';
        var searchQuery = '';

        filterBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                filterBtns.forEach(function(b) { b.classList.remove('active'); });
                this.classList.add('active');
                activeCategory = this.dataset.filter || 'all';
                filterCards();
            });
        });

        if (searchInput) {
            searchInput.addEventListener('input', function() {
                searchQuery = this.value.toLowerCase().trim();
                filterCards();
            });
        }

        function filterCards() {
            cards.forEach(function(card) {
                var jenis = card.dataset.jenis || '';
                var title = (card.querySelector('.berita-card-title') || {}).textContent || '';
                var matchCategory = activeCategory === 'all' || jenis === activeCategory;
                var matchSearch = !searchQuery || title.toLowerCase().includes(searchQuery);
                card.style.display = matchCategory && matchSearch ? '' : 'none';
            });
        }
    }

    function initDetail() {
        var overlay = document.getElementById('detailOverlay');
        var closeBtn = document.getElementById('detailClose');
        if (!overlay || !closeBtn) return;

        var detailImg = document.getElementById('detailImg');
        var detailBadge = document.getElementById('detailBadge');
        var detailTitle = document.getElementById('detailTitle');
        var detailAuthor = document.getElementById('detailAuthor');
        var detailDate = document.getElementById('detailDate');
        var detailDesc = document.getElementById('detailDesc');

        document.addEventListener('click', function(e) {
            var link = e.target.closest('.berita-read');
            if (!link) return;
            e.preventDefault();
            var card = link.closest('.berita-card');
            if (!card) return;
            detailImg.src = card.dataset.img || '/image/kampus.webp';
            detailBadge.textContent = card.dataset.label || '';
            var titleEl = card.querySelector('.berita-card-title');
            var dateEl = card.querySelector('.berita-date');
            detailTitle.textContent = titleEl ? titleEl.textContent : '';
            if (detailAuthor) detailAuthor.textContent = card.dataset.penulis ? 'Oleh: ' + card.dataset.penulis : '';
            detailDate.textContent = dateEl ? dateEl.textContent : '';
            detailDesc.textContent = card.dataset.desc || '';
            overlay.classList.add('open');
            document.body.style.overflow = 'hidden';
        });

        closeBtn.addEventListener('click', function() {
            overlay.classList.remove('open');
            document.body.style.overflow = '';
        });

        overlay.addEventListener('click', function(e) {
            if (e.target === this) {
                overlay.classList.remove('open');
                document.body.style.overflow = '';
            }
        });
    }

    function initAnimate() {
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(e) {
                if (e.isIntersecting) e.target.classList.add('visible');
            });
        }, { threshold: 0.15 });
        document.querySelectorAll('[data-animate]').forEach(function(el) { observer.observe(el); });
    }
})();
