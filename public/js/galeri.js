(function(){
    initLightbox();
    initAnimate();

    function initLightbox() {
        var overlay = document.getElementById('galeriOverlay');
        var closeBtn = document.getElementById('galeriClose');
        if (!overlay || !closeBtn) return;

        var img = document.getElementById('galeriImg');
        var title = document.getElementById('galeriTitle');
        var desc = document.getElementById('galeriDesc');

        document.querySelectorAll('.galeri-card').forEach(function(card) {
            card.addEventListener('click', function() {
                img.src = this.dataset.img || '/image/kampus.webp';
                title.textContent = this.dataset.title || '';
                desc.textContent = this.dataset.desc || '';
                overlay.classList.add('open');
                document.body.style.overflow = 'hidden';
            });
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
