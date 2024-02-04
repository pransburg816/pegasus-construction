<?php
/**
 * Template Name: Contact Page
 * @package Pegasus Construction Services
 */

// Fetch the individual address components
$street  = get_theme_mod('google_maps_street', '');
$city    = get_theme_mod('google_maps_city', '');
$state   = get_theme_mod('google_maps_state', '');
$country = get_theme_mod('google_maps_country', '');
$zip     = get_theme_mod('google_maps_zip', '');

// Construct the full address
$full_address = urlencode("$street, $city, $state, $zip, $country");

// Get the ID of the current page
$current_page_id = get_the_ID();
$show_carousel = get_theme_mod('carousel_nav_link_' . $current_page_id, false);

get_header(); 

// Schema Markup for ContactPage and Organization
echo '<script type="application/ld+json">';
echo json_encode([
    [
        "@context" => "http://schema.org",
        "@type" => "ContactPage",
        "url" => get_permalink(),
        "description" => "Contact page for Pegasus Construction Services"
    ],
    [
        "@context" => "http://schema.org",
        "@type" => "Organization",
        "name" => "Pegasus Construction Services",
        "address" => [
            "@type" => "PostalAddress",
            "streetAddress" => $street,
            "addressLocality" => $city,
            "addressRegion" => $state,
            "postalCode" => $zip,
            "addressCountry" => $country
        ],
        "contactPoint" => [
            "@type" => "ContactPoint",
            "contactType" => "customer service",
        ]
    ]
]);
echo '</script>';

if ($show_carousel):
    get_template_part('component-carousel-banner-text');
endif;
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container mt-3">
            <section>
                <div class="row">
                    <!-- Form Column -->
                    <div class="col-lg-6 order-lg-2">
                        <h2 class="fw-lighter text-primary">Send us a Message</h2>
                        <p class="fw-lighter">
                            <?php echo get_theme_mod('contact_intro_text', 'Enter your introductory text here.'); ?>
                        </p>
                        <form action="<?php echo esc_url(get_theme_mod('contact_form_action_url', '#')); ?>" method="POST">
                            <div class="row justify-content-center">
                                <div class="col-md-12 col-lg-12">
                                    <div class="contact-form">
                                        <div class="mb-3 position-relative">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                                            <label for="name" class="form-control-label">Your Name</label>
                                        </div>
                                        <div class="mb-3 position-relative">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                            <label for="email" class="form-control-label">Your Email</label>
                                        </div>
                                        <div class="mb-3 position-relative">
                                            <textarea class="form-control" id="message" name="message" placeholder="Your Message" rows="5" required></textarea>
                                            <label for="message" class="form-control-label">Your Message</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="form-control-submit">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Map Column -->
                    <div class="col-lg-6 order-lg-1 pt-2">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe id="googleMapsIframe" style="width: 100%; height: 500px" class="embed-responsive-item"
                                src="https://www.google.com/maps?q=<?php echo $full_address; ?>&output=embed"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>
