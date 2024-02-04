<?php

/**
 * The main template file
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pegasus Construction Services
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php if (have_posts()):
                    while (have_posts()):
                        the_post(); ?>
                        <div class="col-md-6">
                            <article class="highlight-text p-xl-5 p-0 mb-3 highlight" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="row">
                                    <div class="col-md-12">
                                        <header class="entry-header">
                                            <h4 class="fw-lighter"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        </header>
                                        <div class="entry-content">
                                            <p class="fs-6 fw-lighter"><?php the_excerpt(); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <?php
                    endwhile;

                    // Pagination
                    the_posts_pagination([
                        "prev_text" => __("Previous Page", "Pegasus Construction Services"),
                        "next_text" => __("Next Page", "Pegasus Construction Services"),
                    ]);
                else:
                     ?>

                    <p><?php esc_html_e(
                        "Sorry, the post you're looking for is not avaliable",
                        "Pegasus Construction Services"
                    ); ?></p>
                <?php
                endif; ?>
            </div>
        </div>
         <!-- <div class="col-md-2">
            <div>
                <?php get_sidebar(); ?>
            </div>
        </div> -->
    </div>
</main>

<?php get_footer();

