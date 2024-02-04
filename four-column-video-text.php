<?php
// Check if we're on the assigned page
$assigned4_page_id = get_theme_mod('assigned4_page', '');
if (is_page($assigned4_page_id)) :
    for ($i = 1; $i <= 8; $i++) {
        $video_url = get_theme_mod("youtube{$i}_video_url", '');
        $image = get_theme_mod("custom{$i}_image", '');
        $text = get_theme_mod("descriptive{$i}_text", '');
        $button_text = get_theme_mod("button{$i}_text", 'Learn More');
        $external_link = get_theme_mod("external{$i}_link", '');
        $layout_choice = get_theme_mod("layout{$i}_choice", 'video-left');
        $overlay_toggle = get_theme_mod("overlay{$i}_toggle", 'yes');
        $additional_text = get_theme_mod("additional{$i}_text", '');
        $button_text_custom = get_theme_mod('button_text_custom', 'Our Projects');
        $overlay_class = $overlay_toggle === 'yes' ? 'overlay-enabled' : '';

        // Schema Markup for each service/project section
        $schema_data = [
            "@context" => "http://schema.org",
            "@type" => "Service",
            "serviceType" => $text,
            "provider" => [
                "@type" => "LocalBusiness",
                "name" => "Pegasus Construction Services",
                "image" => $image,
                "url" => $external_link,
            ],
            "description" => $additional_text,
        ];
        ?>

        <section class="multiple-column-video-text" itemscope itemtype="http://schema.org/Service">
            <script type="application/ld+json">
                <?php echo json_encode($schema_data); ?>
            </script>
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <!-- Video/Image Column -->
                    <div class="col-lg-6 <?php if ($layout_choice != 'video-left') echo 'order-lg-2'; ?>">
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
                    <div class="col-lg-6 <?php if ($layout_choice != 'video-left') echo 'order-lg-1'; ?>">
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
endif;
?>
