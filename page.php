<?php
/**
 * The template for displaying individual pages
 *
 * @package Pegasus Construction Services
 */

$current_page_id = get_the_ID(); // Get the ID of the current page
$show_carousel = get_theme_mod('carousel_nav_link_' . $current_page_id, false);

get_header();

// Schema Markup
if (is_front_page()) {
    echo '<script type="application/ld+json">';
    echo json_encode([
        "@context" => "http://schema.org",
        "@type" => "Organization",
        "name" => "Pegasus Construction Services",
        "url" => "https://www.pegasus-solves.com",
        // Add other relevant details here
    ]);
    echo '</script>';
}

?>

<main> <!-- Start of main content area -->

    <?php
    if (have_posts()) : 
        while (have_posts()) : the_post();
            // Include "Scrolling Text" only on the homepage
            if (is_front_page()):
                get_template_part('scrolling-text');
            endif;
            ?>

            <div class="container">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="fw-lighter"><?php the_title(); ?></h1>
                    </header>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>

                <?php
                // Include the carousel banner text component
                if ($show_carousel):
                    get_template_part('component-carousel-banner-text');
                endif;
                ?>
            </div>

            <!-- Image Text Block -->
            <?php get_template_part('component-flexible-content-blocks'); ?>

            <!-- Multiple Columns -->
            <?php get_template_part('component-multiple-column-video-text'); ?> 

            <?php if (is_front_page()) : ?>
                <div class="mx-3 my-3 mb-0">
                    <div class="row">
                        <?php for ($i = 1; $i <= 2; $i++) : ?>
                            <div class="col-xl-6">
                                <div class="image-container-hm">
                                    <p><img decoding="async" class="fixed-size-image img-fluid" src="<?php echo esc_url(get_theme_mod('mytheme_image_upload_' . $i)); ?>"></p>
                                    <div class="shade-hm"></div>
                                    <div class="hm-feature-heading">
                                        <p class="fw-lighter fs-4"><?php echo esc_html(get_theme_mod('mytheme_image_title_' . $i, 'Default Title')); ?></p>
                                    </div>
                                    <div class="text-button-container">
                                        <a class="btn btn-transparent" href="<?php echo esc_url(get_theme_mod('mytheme_button_url_' . $i, 'https://example.com')); ?>">
                                            <?php echo esc_html(get_theme_mod('mytheme_button_text_' . $i, 'View Project')); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endif; ?>

    <?php
        endwhile;
    endif;
    ?>

</main> <!-- End of main content area -->

<?php
get_footer(); // Include the footer template
?>
