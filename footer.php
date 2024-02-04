<?php

// Get the ID of the current page

$current_page_id = get_the_ID();

$show_banner_text = get_theme_mod('bottom_banner_text_nav_link_' . $current_page_id, false);



// Include the header template

get_header(); 



// Include the bottom banner text component if applicable

if ($show_banner_text):

    get_template_part('component-bottom-banner-text');

endif;



// Fetching custom options

$company_name = get_theme_mod('company_name', 'Default Company Name');

$company_address = get_theme_mod('company_address', 'Default Address');

$company_phone = get_theme_mod('company_phone', 'Default Phone');

$company_email = get_theme_mod('company_email', 'Default Email');

$company_info = get_theme_mod('company_info', 'Company Info');

$twitter_link = get_theme_mod('twitter_link', '#');

$facebook_link = get_theme_mod('facebook_link', '#');

$instagram_link = get_theme_mod('instagram_link', '#');

$linkedin_link = get_theme_mod('linkedin_link', '#');

?>



<div id="footer" class="bg-dark site-footer footer p-0">

    <div class="footer-content position-relative">

        <div id="footer" class="bg-dark site-footer footer p-0">

            <div class="footer-content position-relative">

                <div class="container">

                    <div class="row align-items-start">

                        <!-- Footer Info Column -->

                        <div class="col-lg-4 col-md-6 col-sm-12 text-center text-md-start mt-3">

                            <div class="footer-info">

                                <h2 class="mb-0 footer-heading text-white fw-lighter fs-4" itemprop="name">

                                    <?php echo esc_html($company_name); ?>

                                </h2>

                                <p itemprop="address"><?php echo esc_html($company_address); ?></p>

                            </div>

                        </div>



                        <!-- Featured and Contact Links Column -->

                        <div class="col-lg-4 col-md-3 col-sm-6 footer-links mt-3">

                            <div class="mb-0 footer-heading text-center fs-4 <?php if (is_page('Contact me')) echo 'active'; ?>">

                                <a id="menuButtonContact" class="nav-link text-white fw-lighter" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOneContact" aria-expanded="true" aria-controls="collapseOne">Need an Estimate?</a>

                            </div>

                            <div class="text-center">

                                <?php wp_nav_menu([

                                    "theme_location" => "",

                                    "container" => "",

                                    "menu_class" => "footer-nav",

                                    "before" => '<span class="nav-link text-white text-uppercase">',

                                    "after" => "</span>",

                                ]); ?>

                            </div>

                        </div>



                        <!-- Contact Information Column -->

                       <div class="col-lg-4 col-md-12 col-sm-12 footer-links text-center mt-3">

                            <span class="footer-heading text-white fw-lighter fs-4">Connect With Us</span>

                            <p>

                                <strong>Phone:</strong> <span id="protected-phone" itemprop="telephone"><?php echo esc_html(get_theme_mod('company_phone')); ?></span><br>

                                <strong>Email:</strong> <span id="protected-email" itemprop="email"><a href="mailto:<?php echo esc_attr(get_theme_mod('company_email')); ?>"><?php echo esc_html(get_theme_mod('company_email')); ?></a></span><br>

                            </p>

                            <div class="social-links mt-3">

                                <div class="row footer-social-icons">

                                    <?php if (get_theme_mod('twitter_link') && get_theme_mod('twitter_link') != '#'): ?>

                                    <div class="col-3">

                                        <a href="<?php echo esc_url(get_theme_mod('twitter_link')); ?>" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>

                                    </div>

                                    <?php endif; ?>

                                    <?php if (get_theme_mod('facebook_link') && get_theme_mod('facebook_link') != '#'): ?>

                                    <div class="col-3">

                                        <a href="<?php echo esc_url(get_theme_mod('facebook_link')); ?>" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>

                                    </div>

                                    <?php endif; ?>

                                    <?php if (get_theme_mod('instagram_link') && get_theme_mod('instagram_link') != '#'): ?>

                                    <div class="col-3">

                                        <a href="<?php echo esc_url(get_theme_mod('instagram_link')); ?>" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>

                                    </div>

                                    <?php endif; ?>

                                    <?php if (get_theme_mod('linkedin_link') && get_theme_mod('linkedin_link') != '#'): ?>

                                    <div class="col-3">

                                        <a href="<?php echo esc_url(get_theme_mod('linkedin_link')); ?>" class="d-flex align-items-center justify-content-center"><i class="bi bi-linkedin"></i></a>

                                    </div>

                                    <?php endif; ?>

                                </div>

                            </div>

                        </div>



                    </div>

                </div>

            </div>

            <div class="footer-legal text-center position-relative">

                <div class="container">

                    <div>

                        <p class="footer-bottom">&copy; <?php echo date('Y'); ?> <?php echo esc_html($company_info); ?></p>

                    </div>

                </div>

            </div>

        </div>

<?php wp_footer(); ?>

</body>

</html>