<div id="portfolio-main">
    <?php if (isset($work) && $work) : ?>
    <div class="portfolio-work">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3">
                    <h2 class="portfolio-heading animate-box" data-animate-effect="fadeInLeft"><?= $work->title ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 image-content">
                    <img class="img-responsive" src="<?= IMAGES_DIR.'work/'.$work->subDomain ?>/work-1.png" alt="<?= $work->title ?>">
                    <img class="img-responsive" src="<?= IMAGES_DIR.'work/'.$work->subDomain ?>/work-2.png" alt="<?= $work->title ?>">
                    <img class="img-responsive" src="<?= IMAGES_DIR.'work/'.$work->subDomain ?>/work-3.png" alt="<?= $work->title ?>">
                    <img class="img-responsive" src="<?= IMAGES_DIR.'work/'.$work->subDomain ?>/work-4.png" alt="<?= $work->title ?>">
                    <img class="img-responsive" src="<?= IMAGES_DIR.'work/'.$work->subDomain ?>/work-5.png" alt="<?= $work->title ?>">
                </div>
                <div class="col-md-4 sticky-parent">
                    <div id="sticky_item">
                        <div class="project-desc">
                            <h2><?= $work->title ?></h2>
                            <span>
                                <a href="#">Logo</a>,
                                <a href="#">Brading</a>
                            </span>
                            <p><?= $work->description ?></p>
                            <p class="icon">
                                <span><a href="#"><i class="icon-share3"></i></a></span>
                                <span><a href="#"><i class="icon-eye"></i> 100</a></span>
                                <span><a href="#"><i class="icon-heart"></i> 49</a></span>
                            </p>
                            <p><a href="<?= 'http://www.' . $work->subDomain .'.shrief.me' ?>" class="btn btn-primary">Live Preview</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="get-in-touch" class="portfolio-bg-color" style="margin-top: 8em">
        <div class="portfolio-narrow-content">
            <div class="row">
                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                    <h2>Get in Touch!</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                    <p class="portfolio-lead">Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                    <p><a href="<?= HOST_NAME ?>#get-in-touch" class="btn btn-primary btn-learn">Contact me!</a></p>
                </div>

            </div>
        </div>
    </div>

    <?php endif; ?>
</div>