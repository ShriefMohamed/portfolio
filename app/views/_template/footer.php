</div>

<!-- jQuery -->
<script src="<?= PUBLIC_DIR ?>js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="<?= PUBLIC_DIR ?>js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="<?= PUBLIC_DIR ?>js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="<?= PUBLIC_DIR ?>js/jquery.waypoints.min.js"></script>
<!-- Flexslider -->
<script src="<?= PUBLIC_DIR ?>js/jquery.flexslider-min.js"></script>
<!-- Sticky Kit -->
<script src="<?= PUBLIC_DIR ?>js/sticky-kit.min.js"></script>
<!-- MAIN JS -->
<script src="<?= PUBLIC_DIR ?>js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-156510049-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-156510049-1');
</script>

<script>
    // Navbar scroll to section.
    $(function() {
        $('a.page-scroll').bind('click', function(event) {
            var $anchor = $(this).attr('href');

            if (location.pathname !== '/' && location.pathname !== 'index/default') {
                location.href = "<?= HOST_NAME ?>" + $anchor;
            } else {
                console.log($anchor);
                animateScroll($anchor);
            }
            event.preventDefault();
        });
    });

    // Animate Scrolling.
    function animateScroll($anchor) {
        $('html, body').animate({
            scrollTop: $($anchor).offset().top
        }, 1000, 'swing');
    }


    // Highlight nav items on scroll.
    $(function () {
        var $navigationLinks = $('#portfolio-main-menu > ul > li');
        var $sections = $($(".section").get().reverse());

        var sectionIdTonavigationLink = {};
        $sections.each(function() {
            var id = $(this).attr('id');
            sectionIdTonavigationLink[id] = $('#portfolio-main-menu > ul > li > a[href=\\#' + id + ']');
        });

        function throttle(fn, interval) {
            var lastCall, timeoutId;
            return function () {
                var now = new Date().getTime();
                if (lastCall && now < (lastCall + interval) ) {
                    clearTimeout(timeoutId);
                    timeoutId = setTimeout(function () {
                        lastCall = now;
                        fn.call();
                    }, interval - (now - lastCall) );
                } else {
                    lastCall = now;
                    fn.call();
                }
            };
        }

        function highlightNavigation() {
            var scrollPosition = $(window).scrollTop();

            $sections.each(function() {
                var currentSection = $(this);
                var sectionTop = currentSection.offset().top - 50;

                if (scrollPosition >= sectionTop) {
                    var id = currentSection.attr('id');
                    var $navigationLink = sectionIdTonavigationLink[id];

                    if (!$navigationLink.hasClass('portfolio-active')) {
                        $navigationLinks.removeClass('portfolio-active');
                        $navigationLink.parent().addClass('portfolio-active');
                    }
                    return false;
                }
            });
        }

        $(window).scroll( throttle(highlightNavigation,100) );
    });
</script>
<style>
    .portfolioFilter {margin-top: 35px;color: #666;}
    .portfolioFilter a:hover {color: #FFA804;}
    .portfolio-heading:after {content: '';height: 10px;width: 50px;border-radius: 5px;
        margin: 20px 0;display: block;background: #FFA804;}

    .portfolio-about .why-me-item {display: inline-flex}
    .portfolio-about .why-me-item i {padding-right: 8px;color: #00c2e5;line-height: 1.8;}

    .portfolio-about .skills-panel .panel-body ul {padding-left: 20px}

    .margin-t-10{ margin-top: 10px; }
    .margin-t-30{ margin-top: 30px; }
    .margin-b-20{ margin-bottom: 20px; }
    .margin-b-30{ margin-bottom: 30px; }
    .margin-b-50{ margin-bottom: 50px; }
    .margin-tb-30{ margin-top: 30px; margin-bottom: 30px; }
    .margin-tb-50{ margin-top: 50px; margin-bottom: 50px; }
    .font-yellow{ color: #F75940; }
    .font-semi-white{ color: #ddd; }
    .font-lite-black{ color: #999; }
    .center-text{ text-align: center; }

    .education-section .portfolio-heading:after {margin: 20px auto;}
    .education-wrapper { position: relative; overflow: hidden; text-align: center; }
    .education-wrapper:after{ content:''; position: absolute; top: 8px; bottom: 0; left: 50%;
        margin-left: -1px; width: 2px; background: #ccc; }
    .education-wrapper .education{ width: 50%; clear: both; position: relative; margin-top: -30px; }
    .education-wrapper .education:first-child{ margin-top: 0; }
    .education-wrapper .education.left{ float: left; padding-right: 50px; text-align: right; }
    .education-wrapper .education.right{ float: right; padding-left: 50px; text-align: left; }
    .education-wrapper .education:after{ content:''; position: absolute; top: 8px; width: 16px;
        height: 16px; border-radius: 10px; z-index: 1;
        box-shadow: 0 0 0 8px rgba(255,171,0, .4); background: #FFAB00; }
    .education-wrapper .education.left:after{ right: -8px; }
    .education-wrapper .education.right:after{ left: -8px; }

</style>
</body>
</html>

