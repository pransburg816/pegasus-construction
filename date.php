<?php



/**

 * The template for displaying date-based archives

 *

 * @package Pegasus Construction Services

 */

get_header(); // Include the header template



?>





<div class="container mt-5">

<main id="primary" class="site-main">

         <div class="row mb-5"><div class="col-md-6 iamCol w-100"><p></p><p><span class="fs-1">   

        <!-- Display the hero text for the search results page --> 



        <h2><?php echo esc_html(get_theme_mod('search_page_hero_text', 'Archives')); ?></h2></span></p></div>



    </div>



        <?php



        if (have_posts()) :



            the_post();



            ?>



            <header class="page-header">



                <h3 class="page-title fw-lighter mt-5">



                    <?php



                    if (is_day()) {



                        printf(__('Daily Archives: %s', 'Pegasus Construction Services'), get_the_date());



                    } elseif (is_month()) {



                        printf(__('Monthly Archives: %s', 'Pegasus Construction Services'), get_the_date('F Y'));



                    } elseif (is_year()) {



                        printf(__('Yearly Archives: %s', 'Pegasus Construction Services'), get_the_date('Y'));



                    }



                    ?>



                </h3>



            </header>







            <?php



            // Rewind the loop to display date-based posts



            rewind_posts();







            while (have_posts()) :



                the_post();



                ?>



                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



                    <hr />



                    <header class="entry-header fw-lighter">



                        <h3 class="entry-title fw-lighter"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>



                    </header>



                    <div class="entry-content fw-lighter">



                        <?php the_excerpt(); ?>



                    </div>



                </article>



                <?php



            endwhile;







            the_posts_pagination();







        else :



            ?>



            <p><?php esc_html_e('No posts found for this date.', 'Pegasus Construction Services'); ?></p>



        <?php



        endif;



        ?>



</main>



</div>



<?php



get_footer(); // Include the footer template



