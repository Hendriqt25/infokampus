(function(){
    document.querySelectorAll('.info-carousel').forEach(function(carousel) {
        var track = carousel.querySelector('.carousel-track');
        var dotsContainer = carousel.querySelector('.carousel-dots');
        if (!track || !dotsContainer) return;

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
})();
