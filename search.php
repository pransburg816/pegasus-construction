<?php

/**

 * The template for displaying search results

 *

 * @package Pegasus Construction Service

 */

$current_page_id = get_the_ID(); // Get the ID of the current page

get_header(); // Include the header template

?>



<style>

/** Removes sidebar left padding **/

ul {

    padding: 0;

}

</style>



<main id="primary" class="site-main">



    <div class="container mt-5" style="padding-left: 0;">

        <!-- Multiple Columns -->

      <div class="row mb-5"><div class="col-md-6 iamCol w-100"><p></p><p><span class="fs-1">   

        <!-- Display the hero text for the search results page -->

        <p><?php echo esc_html(get_theme_mod('search_page_hero_text', '')); ?></p></span></p></div>

    </div>



        <div class="row m-1">

            <div>

                <header class="page-header">

                    <h2 class="fw-lighter">Search Results for: <?php echo esc_html(get_search_query()); ?></h2>

                    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mb-4 wp-block-search__button-outside wp-block-search__text-button wp-block-search"> 
                    <div class="wp-block-search__inside-wrapper">
                        <input class="search-bar-styles wp-block-search__input" id="wp-block-search__input-1" placeholder="Search" value="<?php echo esc_attr(get_search_query()); ?>" type="search" name="s" required="">
                        <button aria-label="Search" class="wp-block-search__button wp-element-button" type="submit"><i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>

                </header> 



                <?php

                if (have_posts()) :

                    while (have_posts()) :

                        the_post();

                        ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <header class="entry-header">

                                <h4 class="fw-lighter"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                            </header>

                            <div class="entry-content fw-lighter">

                                <?php the_excerpt(); ?>

                            </div>

                        </article>



                        <?php

                    endwhile;

                else :

                    ?>

                    <p><?php esc_html_e('No results found. Try another search.', 'Pegasus Constuction Servivces'); ?></p>

                <?php

                endif;

                ?>

            </div>

          

    </div>

</main>


<?php

get_footer(); // Include the footer template

