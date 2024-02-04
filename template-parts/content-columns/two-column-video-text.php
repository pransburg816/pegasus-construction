<?php
// Fetch repeater setting for all two-column instances
$two_column_layouts = get_theme_mod('two_column_repeater', '');

if (!empty($two_column_layouts)) {
    foreach ($two_column_layouts as $layout) {
        // Extracting the individual settings from each layout
        $youtube_url = $layout['youtube_video_url'] ?? '';
        $image_url = $layout['custom_image'] ?? '';
        $description_text = $layout['descriptive_text'] ?? '';
        $overlay_toggle = $layout['overlay_toggle'] ?? 'yes';
        $additional_text = $layout['additional_text'] ?? '';
        $external_link = $layout['external_link'] ?? '';
        $button_text_custom = $layout['button_text_custom'] ?? 'Our Projects';
        $layout_choice = $layout['layout_choice'] ?? 'video-left';

        // Output the HTML for each two-column layout
        ?>
        <section itemscope itemtype="http://schema.org/LocalBusiness">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <?php if ($layout_choice == 'video-left'): ?>
                        <!-- Video/Image on Left -->
                        <div class="col-lg-6">
                            <?php if ($image_url): ?>
                                <div class="video-bs-col-block-image-overlay overlay-left <?php echo $overlay_toggle === 'yes' ? 'overlay-enabled' : ''; ?>">
                                    <img src="<?php echo esc_url($image_url); ?>" alt="Video Thumbnail" class="img-fluid">
                                    <a href="<?php echo esc_url($youtube_url); ?>" class="play-btn">Play</a>
                                </div>
                            <?php endif; ?>
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
                                            <p><?php echo esc_html($additional_text); ?></p>
                                            <?php if ($external_link): ?>
                                                <a href="<?php echo esc_url($external_link); ?>" class="btn btn-primary"><?php echo esc_html($button_text_custom); ?></a>
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
                                            <p><?php echo esc_html($additional_text); ?></p>
                                            <?php if ($external_link): ?>
                                                <a href="<?php echo esc_url($external_link); ?>" class="btn btn-primary"><?php echo esc_html($button_text_custom); ?></a>
                                            <?php endif; ?>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <!-- Video/Image on Right -->
                        <div class="col-lg-6">
                            <?php if ($image_url): ?>
                                <div class="video-bs-col-block-image-overlay overlay-left <?php echo $overlay_toggle === 'yes' ? 'overlay-enabled' : ''; ?>">
                                    <img src="<?php echo esc_url($image_url); ?>" alt="Video Thumbnail" class="img-fluid">
                                    <a href="<?php echo esc_url($youtube_url); ?>" class="play-btn">Play</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
?>
