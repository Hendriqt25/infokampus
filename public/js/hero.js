(function(){
    var slides = document.querySelectorAll('.hero-slide');
    var nums = document.querySelectorAll('.hero-nav-num');
    if (slides.length < 2) return;

    var currentSlide = 0;
    var slideInterval;

    function goToSlide(index) {
        slides.forEach(function(s) { s.classList.remove('active'); });
        nums.forEach(function(n) { n.classList.remove('active'); });
        slides[index].classList.add('active');
        nums[index].classList.add('active');
        currentSlide = index;
    }

    function nextSlide() {
        goToSlide((currentSlide + 1) % slides.length);
    }

    function resetInterval() {
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, 5000);
    }

    nums.forEach(function(num) {
        num.addEventListener('click', function() {
            goToSlide(parseInt(this.dataset.target));
            resetInterval();
        });
    });

    slideInterval = setInterval(nextSlide, 5000);

    var carousel = document.getElementById('featured-news');
    if (carousel) {
        carousel.addEventListener('mouseenter', function() { clearInterval(slideInterval); });
        carousel.addEventListener('mouseleave', function() { slideInterval = setInterval(nextSlide, 5000); });
    }
})();
