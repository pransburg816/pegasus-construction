<?php

/**

 * The template for displaying single blog posts

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package Pegasus Construction Services

 */



get_header(); // Include the header template

?>



<div class="container mt-3">

    <main id="primary" class="site-main">

        <div>

   



            <div class="text-center">



                  <!-- "Back to Project" link -->

                    <a href="/project-gallery/" class="back-to-project-link">

                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>

                        </svg>

                        Gallery

                    </a>

                <?php

                while (have_posts()) :

                    the_post();

                    ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <header class="entry-header">

                            <h2 class="fw-lighter pt-3 text-center"><?php the_title(); ?></h2>

             

                            

                        </header>

                        <div class="entry-content">

                            <p class="fw-lighter"><?php the_content(); ?></p>

                        </div>

                      

                    </article>

                    <?php

                endwhile;

                ?>

            </div>

    

        </div>

    </main>

</div>

<?php

get_footer(); 