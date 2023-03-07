<div id="portfolio-work" class="portfolio-work section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <span class="heading-meta">Portfolio</span>
                <h2 class="portfolio-heading animate-box" data-animate-effect="fadeInLeft">Recent Work</h2>
            </div>
            <div class="col-md-8">
                <div class="portfolioFilter animate-box" data-animate-effect="fadeInLeft">
                    <a href="<?= HOST_NAME ?>index/portfolio"><b>ALL</b></a>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if (isset($work) && $work) : ?>
                <?php foreach ($work as $item) : ?>
                    <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                        <div class="project" style="background-image: url(<?= IMAGES_DIR.'work/'.$item->subDomain.'/work-1.jpg' ?>);">
                            <div class="desc">
                                <div class="con">
                                    <h3><a href="<?= HOST_NAME.'index/work/'.$item->subDomain ?>"><?= $item->title ?></a></h3>
                                    <span><?= $item->keyworks ?></span>
                                    <p class="icon">
                                        <span><a href="#"><i class="icon-share3"></i></a></span>
                                        <span><a href="<?= HOST_NAME.'index/work/'.$item->subDomain ?>"><i class="icon-eye"></i> 0</a></span>
                                        <span><a href="#"><i class="icon-heart"></i> 49</a></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
