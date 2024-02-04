<?php
// Loop through each section
for ($i = 1; $i <= 8; $i++) {
    // Fetch customizer settings for each section dynamically
    $youtube_url = get_theme_mod("youtube_video_url{$i}", '');
    $button_text = get_theme_mod("button_text{$i}", 'Watch Our Video');
    $image_url = get_theme_mod("custom_image{$i}", '');
    $description_text = get_theme_mod("descriptive_text{$i}", '');
    $overlay_toggle = get_theme_mod("overlay_toggle{$i}", 'yes');
    $additional_text = get_theme_mod("additional_text{$i}", '');
    $external_link = get_theme_mod("external_link{$i}", '');
    $button_text_custom = get_theme_mod("button_text_custom{$i}", 'Our Projects');
    $layout_choice = get_theme_mod("layout_choice{$i}", 'video-left');
    $assigned_page_id = get_theme_mod("assigned_page{$i}", '');

    // Check if we're on the assigned page for this section
    if (is_page($assigned_page_id)) {
        ?>

         <section itemscope itemtype="http://schema.org/LocalBusiness">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <?php if ($layout_choice == 'video-left'): ?>
                        <!-- Video on Left, Text on Right -->
                    <div class="col-lg-6">
                        <div class="video-bs-col-block-image-overlay overlay-left <?php echo $overlay_toggle === 'yes' ? 'overlay-enabled' : ''; ?>">
                            <?php if ($image_url): ?>
                                <div class="shadow image">
                                    <img src="<?php echo esc_url($image_url); ?>" alt="Video Thumbnail" class="img-fluid">
                                </div>
                                <div class="text">
                                    <div class="play-btn-text mt-3 text-white watch-video d-flex align-items-center position-relative">
                                        <a href="<?php echo esc_url($youtube_url); ?>" class="glightbox stretched-link">
                                            <h2 class="fs-6">
                                                <i class="bi bi-play-circle"></i> <?php echo esc_html($button_text); ?>
                                            </h2>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="col-lg-6">
                        <div class="container p-0">
                            <div class="col-md-12 col-sm-12 mx-auto">
                                <div class="text-center content pt-3">
                                    <?php if ($description_text): ?>
                                        <h3 class="text-primary text-uppercase"><?php echo esc_html($description_text); ?></h3>
                                    <?php endif; ?>
                                    <?php if ($additional_text): ?>
                                        <div class="mb-3 mt-3 fw-lighter" itemprop="description">
                                            <p class="fs-6"><?php echo esc_html($additional_text); ?></p>
                                            <?php if ($external_link): ?>
                                                <div class="pt-3 text-uppercase d-flex justify-content-center hm-btn-button">
                                                    <a href="<?php echo esc_url($external_link); ?>" class="btn btn-primary btn-custom" itemprop="url">
                                                        <span class="mb-3 fw-bold"><?php echo esc_html($button_text_custom); ?></span>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php
    } // End of page check
}
?>

<section itemscope itemtype="http://schema.org/LocalBusiness">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <?php if ($layout_choice == 'video-left'): ?>
                <!-- Video on Left -->
                <div class="col-lg-6">
                    <div class="video-bs-col-block-image-overlay overlay-left <?php echo $overlay_toggle === 'yes' ? 'overlay-enabled' : ''; ?>">
                        <?php if ($image_url): ?>
                            <div class="shadow image">
                                <img src="<?php echo esc_url($image_url); ?>" alt="Video Thumbnail" class="img-fluid">
                            </div>
                            <div class="text">
                                <div class="play-btn-text mt-3 text-white watch-video d-flex align-items-center position-relative">
                                    <a href="<?php echo esc_url($youtube_url); ?>" class="glightbox stretched-link">
                                        <h2 class="fs-6">
                                            <i class="bi bi-play-circle"></i> <?php echo esc_html($button_text); ?>
                                        </h2>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Text on Right -->
                <div class="col-lg-6">
                    <div class="container p-0">
                        <div class="col-md-12 col-sm-12 mx-auto">
                            <div class="text-center content pt-3">
                                <?php if ($description_text): ?>
                                    <h3 class="text-primary text-uppercase"><?php echo esc_html($description_text); ?></h3>
                                <?php endif; ?>
                                <?php if ($additional_text): ?>
                                    <div class="mb-3 mt-3 fw-lighter" itemprop="description">
                                        <p class="fs-6"><?php echo esc_html($additional_text); ?></p>
                                        <?php if ($external_link): ?>
                                            <div class="pt-3 text-uppercase d-flex justify-content-center hm-btn-button">
                                                <a href="<?php echo esc_url($external_link); ?>" class="btn btn-primary btn-custom" itemprop="url">
                                                    <span class="mb-3 fw-bold"><?php echo esc_html($button_text_custom); ?></span>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <!-- Text on Left -->
                <div class="col-lg-6">
                    <div class="container p-0">
                        <div class="col-md-12 col-sm-12 mx-auto">
                            <div class="text-center content pt-3">
                                <?php if ($description_text): ?>
                                    <h3 class="text-primary text-uppercase"><?php echo esc_html($description_text); ?></h3>
                                <?php endif; ?>
                                <?php if ($additional_text): ?>
                                    <div class="mb-3 mt-3 fw-lighter" itemprop="description">
                                        <p class="fs-6"><?php echo esc_html($additional_text); ?></p>
                                        <?php if ($external_link): ?>
                                            <div class="pt-3 text-uppercase d-flex justify-content-center hm-btn-button">
                                                <a href="<?php echo esc_url($external_link); ?>" class="btn btn-primary btn-custom" itemprop="url">
                                                    <span class="mb-3 fw-bold"><?php echo esc_html($button_text_custom); ?></span>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Video on Right -->
                 <div class="col-lg-6">
                    <div class="video-bs-col-block-image-overlay overlay-left <?php echo $overlay_toggle === 'yes' ? 'overlay-enabled' : ''; ?>">
                        <?php if ($image_url): ?>
                            <div class="shadow image">
                                <img src="<?php echo esc_url($image_url); ?>" alt="Video Thumbnail" class="img-fluid">
                            </div>
                            <div class="text">
                                <div class="play-btn-text mt-3 text-white watch-video d-flex align-items-center position-relative">
                                    <a href="<?php echo esc_url($youtube_url); ?>" class="glightbox stretched-link">
                                        <h2 class="fs-6">
                                            <i class="bi bi-play-circle"></i> <?php echo esc_html($button_text); ?>
                                        </h2>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
endif; // End of page check
?>