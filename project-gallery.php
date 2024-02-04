<?php

/**

 * Template Name: Project Gallery Page

 *

 * @package Pegasus Construction Services

 */



get_header();



$current_page_id = get_the_ID();
$show_carousel = get_theme_mod('carousel_nav_link_' . $current_page_id, false);

$show_banner_text = get_theme_mod('bottom_banner_text_nav_link_' . $current_page_id, false);

$category = isset($_GET['category']) ? $_GET['category'] : null;

$sections = get_posts([

    'post_type' => 'custom_section',

    'numberposts' => -1

]);

$show_banner_text = get_theme_mod('bottom_banner_text_nav_link_' . $current_page_id, false);

// Schema Markup

echo '<script type="application/ld+json">';

echo json_encode([

    "@context" => "http://schema.org",

    "@type" => "ImageGallery",

    "about" => "Project gallery showcasing various construction projects by Pegasus Construction Services",

]);

echo '</script>';

?>



<div id="primary" class="content-area">

     <?php
                // Include the carousel banner text component
                if ($show_carousel):
                    get_template_part('component-carousel-banner-text');
                endif;
                ?>

    <main id="main" class="site-main">

        <div class="container-fluid mt-3">

            <div class="row p-0">

                <!-- Gallery Navigation -->

                <div class="col-lg-2 col-12">

                    <div class="dropdown">

                        <div class="nav flex-column nav-pills custom-nav">

                            <button class="btn btn-transparent dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="border: thin solid #ccc">

                                Select A Project

                            </button>

                            <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">

                                <?php foreach ($sections as $section): ?>

                                    <li class="project-dropdown"><a href="/project-gallery/?category=<?php echo urlencode($section->post_name); ?>"><?php echo $section->post_title; ?></a></li>

                                <?php endforeach; ?>

                            </ul>

                        </div>

                    </div>

                </div>

                <!-- Gallery Display -->

                 <div class="col-lg-8 pt-3">

                    <?php

                    // Query for the gallery sections

                    $section_args = ['post_type' => 'custom_section', 'posts_per_page' => -1];

                    $sections_query = new WP_Query($section_args);



                    if ($sections_query->have_posts()) : 

                        while ($sections_query->have_posts()) : $sections_query->the_post();

                            $section_id = get_post_field('post_name', get_post());



                            // Display the gallery section if it matches the category

                            if (is_null($category) || $category === $section_id) :

                                ?>

                                <section id="section-<?php echo esc_attr($section_id); ?>" class="section-content">

                                    <?php

                                     // Pagination Title

                                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                                    for ($group = 1; $group <= 10; $group++) {

                                        $selected_category_slug = get_theme_mod("project_gallery_group_{$group}_category");

                                        if ($section_id === $selected_category_slug) {

                                            $custom_title = get_theme_mod("project_gallery_group_{$group}_page_{$paged}_title");

                                            if (!empty($custom_title)) {

                                                echo '<h2 class="fw-lighter pt-3 text-center">' . esc_html($custom_title) . '</h2>';

                                            }

                                        }

                                    }

                                    ?>



                                    <div class="container-fluid p-0">

                                        <div class="row">

                                            <div class="post-content mb-3">

                                                <?php the_content(); ?>

                                            </div>

                                        </div>

                                    </div>

                                </section>

                                <?php

                            endif;

                        endwhile;

                    endif;

                    ?>

                </div>

            </div>

        </div>

    </main>

</div>

<?php

// Include the bottom banner text component if applicable

if ($show_banner_text):

    get_template_part('component-bottom-banner-text');

endif;

?>


<?php get_footer(); ?>



















