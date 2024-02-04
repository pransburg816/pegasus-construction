<?php
/**
 * The template for displaying category archives
 *
 * @package Pegasus Construction Services
 */

get_header(); // Include the header template

$category = get_queried_object(); // Get the current category object
$category_name = $category->slug; // Get the category slug

$images = get_posts([
    'post_type' => 'attachment',
    'posts_per_page' => -1,
    'post_status' => 'inherit',
    'category_name' => $category_name,
]);
?>

<div class="container-fluid mt-3 mb-3">
    <main id="primary" class="site-main">
        <div class="row p-3">
            <div class="col-lg-2">
                <!-- "Back to Project" link -->
                <a href="/project-gallery/" class="back-to-project-link">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Gallery
                </a>
            </div>
            <div class="col-md-10">
                <header class="page-header">
                    <h3 class="page-title fw-lighter mt-5"><?php echo esc_html($category->name); ?></h3>
                    <div class="archive-description">
                        <?php echo esc_html($category->description); ?>
                    </div>
                </header>

                <?php if (!empty($images)): ?>
                    <div class="category-images row"> <!-- Flexbox container -->
                        <?php foreach ($images as $image): ?>
                            <div class="category-image col-xl-2 p-1"> <!-- Flexbox item -->
                                <?php $image_url = wp_get_attachment_url($image->ID); ?>
                                <div class="card">
                                    <div class="card-image">
                                        <a href="<?php echo esc_url($image_url); ?>" data-fancybox="gallery" data-caption="<?php echo esc_attr($image->post_title); ?>">
                                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image->post_title); ?>" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p><?php esc_html_e('No images found in this category.', 'Pegasus Constructions Services'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </main>
</div>

<?php
get_template_part('component-bottom-banner-text'); 
get_footer(); // Include the footer template
?>
