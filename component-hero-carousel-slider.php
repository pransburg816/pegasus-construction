<div class="container-fluid highlight p-0 text-white">

    <?php

    // Check if it's the home page

    $is_home = is_front_page();

    ?>



    <!-- Homepage Carosuel -->



    <section id="hero" class="position-relative hero <?php echo $is_home ? ' bg-image' : ''; ?>">

        <?php if ($is_home) : ?>

            <div class="info align-items-center p-0 bg-overlay mt-5">

                <div class="vertical-line"></div>

                <div class="container">

                    <div class="row">

                        <div class="col-lg-12 mt-5 text-uppercase position-relative hero-carousel-message">

                            <h2>

                                <?php

                                $sliderText1 = get_theme_mod('slider_text_1', '');

                                $sliderText1 = str_replace('/', '<span style="color: #4a8cff;">/</span>', $sliderText1);

                                echo $sliderText1;

                                ?>

                            </h2>

                            <p><?php echo get_theme_mod('slider_text_2', ''); ?></p>

                        </div>

                    </div>

                </div>

            </div>

            <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

                <?php for ($i = 1; $i <= 4; $i++) : ?>

                    <?php $image_url = get_theme_mod('slider_image_' . $i); ?>

                    <?php if (!empty($image_url)) : ?>

                        <div class="carousel-item<?php echo ($i === 1) ? ' active' : ''; ?>" style="background-image: url(<?php echo esc_url($image_url); ?>); background-size: cover; background-position: center">

                            <meta itemprop="contentUrl" content="<?php echo esc_url($image_url); ?>">

                        </div>

                    <?php endif; ?>

                <?php endfor; ?>

            </div>

            <div class="blue-line"></div>

        <?php endif; ?>

    </section>



    <!-- Inner Hero with Text -->



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

        $found_match = false;



        for ($i = 1; $i <= 10; $i++) {

        if (get_theme_mod("custom_text_page_{$i}") == $current_page_id) {

        $found_match = true;

        $inner_hero_text = get_theme_mod("inner_hero_text_{$i}", "");

        $additional_hero_text = get_theme_mod("additional_hero_text_{$i}", "");

        $bg_image = get_theme_mod("hero_bg_image_{$i}", "");





        // Output hero message if a match is found

        if (!empty($bg_image)) {

        // Add a custom class to the hero message div

        echo '<section class="p-0">

                  <div class="container-fluid p-0">

                    <div class="mc-fcs-block mc-fcs-block-image-overlay overlay-left">

                      <div class="image inside-hero">

                        <img class="img-fluid" src="' . esc_url($bg_image) . '">

                      </div>

                      <div class="text">

                        <h2 class="text-white fw-lighter">' . esc_html($inner_hero_text) . '<br>' . esc_html($additional_hero_text) . '<span class="fs-1">...</span></h2>

                      </div>

                    </div>

                  </div>

                </section>';

        // Add a transparent overlay div for the effect 

        echo '<div class="overlay"></div>';

        }



        break;

        }

        }

        // If no match is found, display a default message

        if (!$found_match && !is_front_page()) {

    ?>

    <section class="p-0">

        <div class="container-fluid p-0">

            <div class="mc-fcs-block mc-fcs-block-image-overlay overlay-left">

                <div class="image inside-hero">

                    <img class="img-fluid" loading="lazy" src="/wp-content/uploads/2023/12/granite-kitchen-project-missouri-12-scaled-e1706247287412.webp">

                </div>

                <div class="text">

                    <h2 class="text-white fw-lighter">EXCEPTIONAL RESULTS WITH

                        ATTENTION TO DETAIL...</h2>

                </div>

            </div>

        </div>

    </section>

    <?php

    }

    $current_slug = get_post_field("post_name", get_post());

    $excluded_slugs = ["featured", "contact-me"];

    ?>

</div>

<div class="blue-line"></div>