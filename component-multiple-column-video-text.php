<?php
for ($i = 1; $i <= 8; $i++) {
    // Retrieve the assigned page ID for the current section
    $assigned_page_id = get_theme_mod("assigned_page_section{$i}", '');

    // Continue to the next iteration if not on the assigned page
    if (!is_page($assigned_page_id)) {
        continue;
    }

    // Retrieve other theme modifications for the current section
    $video_url = get_theme_mod("youtube{$i}_video_url", '');
    $image = get_theme_mod("custom{$i}_image", '');
    $text = get_theme_mod("descriptive{$i}_text", '');
    $additional_text = get_theme_mod("additional{$i}_text", '');
    $button_text_custom = get_theme_mod("button{$i}_text_custom", 'Our Projects');
    $external_link = get_theme_mod("external{$i}_link", '');
    $layout_choice = get_theme_mod("layout{$i}_choice", 'video-left');
    $overlay_toggle = get_theme_mod("overlay{$i}_toggle", 'yes');
    $button_text = get_theme_mod("button{$i}_text", 'Watch Our Video');

    $overlay_class = $overlay_toggle === 'yes' ? 'overlay-enabled' : '';

    // Check if the section has content
    if ($video_url || $image || $text || $additional_text) {
        ?>
        <section class="multiple-column-video-text" itemscope itemtype="http://schema.org/LocalBusiness">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <!-- Video/Image Column -->
                    <div class="col-lg-6 <?php echo ($layout_choice != 'video-left') ? 'order-lg-2' : ''; ?>">
                        <div class="video-bs-col-block-image-overlay overlay-left <?php echo $overlay_class; ?>">
                            <?php if ($image): ?>
                                <div class="shadow image">
                                    <img src="<?php echo esc_url($image); ?>" alt="Column <?php echo $i; ?> Image" class="img-fluid">
                                </div>
                            <?php endif; ?>
                            <div class="text">
                                <?php if ($video_url): ?>
                                    <div class="play-btn-text mt-3 text-white watch-video d-flex align-items-center position-relative">
                                        <a href="<?php echo esc_url($video_url); ?>" class="glightbox stretched-link">
                                            <h2 class="fs-6">
                                                <i class="bi bi-play-circle"></i> <?php echo esc_html($button_text); ?>
                                            </h2>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Text Column -->
                    <div class="col-lg-6 <?php echo ($layout_choice != 'video-left') ? 'order-lg-1' : ''; ?>">
                        <div class="text-center content pt-3">
                            <?php if ($text): ?>
                                <h3 class="text-primary text-uppercase"><?php echo esc_html($text); ?></h3>
                            <?php endif; ?>
                            <?php if ($additional_text): ?>
                                <div class="mb-3 mt-3 fw-lighter" itemprop="description">
                                    <p class="fs-6"><?php echo esc_html($additional_text); ?></p>
                                </div>
                            <?php endif; ?>
                            <?php if ($external_link): ?>
                                <div class="pt-3 text-uppercase d-flex justify-content-center hm-btn-button">
                                    <a href="<?php echo esc_url($external_link); ?>" class="btn btn-primary btn-custom" itemprop="url">
                                        <span class="mb-3 fw-bold"><?php echo esc_html($button_text_custom); ?></span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
?>
