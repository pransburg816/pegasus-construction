<div class="container-fluid highlight p-0 text-white">
    <?php
    // Check if it's the home page
    $is_home = is_front_page();
    ?>

    <!-- Inner Hero Message -->
    <?php
    // Get the current page ID
    if (is_front_page() && is_home()) { 
        $current_page_id = 0;
    } elseif (is_front_page()) {
        $current_page_id = get_option("page_on_front");
    } else {
        $current_page_id = get_queried_object_id();
    }

    // Check if the current page matches any theme options
    $da_found_match = false;

   

    if (!$da_found_match && !is_front_page()) {
        echo '<section class="p-0">
                  <div class="container-fluid p-0">
                    <div class="mc-fcs-block mc-fcs-block-image-overlay overlay-left" itemscope="" itemtype="https://schema.org/ConstructionBusiness">
                      <div class="image inside-hero">
                        <img class="img-fluid" loading="lazy" src="assets/img/hm-hero-slider-9.jpg">
                      </div>
                      <div class="text">
                        <h2 class="text-white fw-lighter">BUILDING ICONIC PROJECTS THROUGHOUT MISSOURI / KANSAS</h2>
                      </div>
                    </div>
                  </div>
                </section>';
    }
    ?>

    
    <section class="multiple-column-video-text" itemscope itemtype="http://schema.org/LocalBusiness">
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
    $current_slug = get_post_field("post_name", get_post());
    $excluded_slugs = ["featured", "contact-me"];
    ?>

</div>
