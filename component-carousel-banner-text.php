<section class="container-fluid mt-3" itemscope itemtype="http://schema.org/ItemList">
    <div class="container p-0">
        <div class="col-md-8 col-sm-12 mx-auto">
            <div id="textCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner text-center content">
                    <h1 itemprop="name">
                        <span class="fw-lighter text-primary"><?php echo esc_html(get_theme_mod('carousel_h1_title', 'Default H1 Title')); ?></span>
                    </h1>
                    <?php 
                    $itemCount = 1;
                    for ($i = 1; $i <= 3; $i++) : 
                        $itemText = esc_html(get_theme_mod("carousel_item_$i", "Default text for carousel item $i"));
                    ?>
                        <div class="carousel-item <?php echo $i == 1 ? 'active' : ''; ?>" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <meta itemprop="position" content="<?php echo $itemCount; ?>">
                            <div class="mb-3 mt-3 fw-lighter">
                                <p class="fs-6 text-center" itemprop="item"><?php echo $itemText; ?></p>
                            </div>
                        </div>
                    <?php 
                    $itemCount++;
                    endfor; 
                    ?>
                </div>

                <ol class="carousel-indicators">
                    <?php for ($i = 0; $i < 3; $i++) : ?>
                        <li data-bs-target="#textCarousel" data-bs-slide-to="<?php echo $i; ?>" class="<?php echo $i == 0 ? 'active' : ''; ?> bg-primary"></li>
                    <?php endfor; ?>
                </ol>
            </div>
        </div>
    </div>
</section>

