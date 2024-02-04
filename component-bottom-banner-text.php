<section class="container-fluid section-bg mb-3" itemscope itemtype="http://schema.org/ItemList">
    <div class="container">
        <div class="col-md-8 col-sm-12 mx-auto">
            <div id="altTextCarousel" class="carousel slide" data-bs-ride="false">
                <div class="carousel-inner text-center content">
                    <h1 itemprop="name">
                        <span class="fw-lighter text-primary"><?php echo esc_html(get_theme_mod('bottom_banner_text_h1_title', 'Your Bottom Banner H1 Title')); ?></span>
                    </h1>
                    <?php 
                    $itemCount = 1;
                    for ($i = 1; $i <= 3; $i++) : 
                        $itemText = esc_html(get_theme_mod("bottom_banner_text_item_$i", "Text for Bottom Banner item $i"));
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
            </div>
        </div>
    </div>
</section>
