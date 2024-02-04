<?php

$num_sections = 10;
$current_page_id = get_the_ID(); // Get the ID of the current page

// Custom Sections Logic
for ($i = 1; $i <= $num_sections; $i++) {
    $page_setting = get_theme_mod("select_page_setting_$i", '');
    $layout_choice = get_theme_mod("layout_choice_$i", 'image-left');
    $text_content = get_theme_mod("text_setting_$i", "Default text for Set $i");
    $image_url = get_theme_mod('image_upload_setting_' . $i);
    $blockquote_text = get_theme_mod("blockquote_text_setting_$i", "Additional text for Set $i");
    $main_title = get_theme_mod("main_title_$i", '');
    $subtitle = get_theme_mod("subtitle_$i", '');
    $main_content = get_theme_mod("main_content_$i", '');
    $additional_main_content = get_theme_mod("additional_main_content_$i", '');
    $background_color = get_theme_mod("background_color_setting_$i", '#ffffff');

    // Check if this section should be displayed on the current page
    if ($current_page_id == $page_setting) {
        ?>

        <section itemscope itemtype="http://schema.org/CreativeWork">
            <div class="container-xl">
                <div class="row">
                    <?php if ($layout_choice == 'image-left'): ?>
                        <!-- Image Left Layout -->
                        <div class="col-lg-4 mt-3">
                            <div class="card fw-lighter">
                                <div class="card-body" style="background-color: <?php echo esc_attr($background_color); ?>;">
                                    <div class="p-3 text-white" itemprop="text">
                                        <?php echo esc_html($text_content); ?>
                                        <span class="d-block blue-line-small mt-3 mb-3"></span>
                                    </div>
                                </div>
                            </div>
                            <?php if ($image_url): ?>
                                <div class="mt-3">
                                    <img src="<?php echo esc_url($image_url); ?>" class="img-fluid" style="object-fit: cover;" alt="Image for section <?php echo $i; ?>" itemprop="image">
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-8">
                            <!-- Text Block -->
                            <article id="post-<?php echo $i; ?>" class="post-<?php echo $i; ?> page type-page status-publish hentry" itemprop="articleBody">
                                <div class="entry-content">
                                    <h1 class="mt-3" itemprop="headline">
                                        <span style="color: rgb(74, 140, 255);"><?php echo esc_html($subtitle); ?></span>
                                    </h1>
                                    <p class="fs-6 mt-3 fw-lighter"><?php echo esc_html($main_content); ?></p>
                                    <blockquote>
                                        <p class="blockquote-message fs-4 p-3 m-3" style="filter: brightness(1);"><?php echo wp_kses_post($blockquote_text); ?>
                                        </p>
                                    </blockquote>
                                    <p class="fs-6 mt-3 fw-lighter"><?php echo esc_html($additional_main_content); ?></p>
                                </div>
                            </article>
                        </div>
                    <?php elseif ($layout_choice == 'text-left'): ?>
                         <div class="col-lg-8">
                            <!-- Text Block -->

                            <article id="post-<?php echo $i; ?>" class="post-<?php echo $i; ?> page type-page status-publish hentry">
                                <div class="entry-content">
                                    <h1 class="mt-3">
                                        <span style="color: rgb(74, 140, 255);"><?php echo esc_html($subtitle); ?></span>
                                    </h1>
                                    <p class="fs-6 mt-3 fw-lighter"><?php echo esc_html($main_content); ?></p>

                                    <blockquote>
                                        <p class="blockquote-message fs-4 p-3 m-3" style="filter: brightness(1);"><?php echo wp_kses_post($blockquote_text); ?>
                                        </p>
                                    </blockquote>
                                    <p class="fs-6 mt-3 fw-lighter"><?php echo esc_html($additional_main_content); ?></p>
                                </div>
                            </article>
                        </div>

                        <div class="col-lg-4 mt-3">
                            <div class="card-body" style="background-color: <?php echo esc_attr($background_color); ?>;">
                                <div class="p-3 text-white">
                                    <?php echo esc_html($text_content); ?>
                                    <span class="d-block blue-line-small mt-3 mb-3"></span>
                                </div>
                            </div>

                            <?php if ($image_url): ?>
                                <div class="mt-3">
                                    <img src="<?php echo esc_url($image_url); ?>" class="img-fluid" style="object-fit: cover;" alt="Image description here">
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
