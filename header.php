<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo("charset"); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pegasus Construction Services is a trusted and experienced construction company in the Greater Kansas City area. We offer high-quality residential and commercial construction and renovation services. Contact us today to transform your dream home or business.">
    <meta name="keywords" content="Commercial Construction, Residential Construction, Project Management, Estimating, Repair, Plumber">
    <title><?php wp_title("|", true, "right"); ?></title>
    <link rel="preconnect" href="https://rsms.me/">
    <?php wp_head(); ?>
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "LocalBusiness",
            "name": "Pegasus Construction Services",
            "description": "Pegasus Construction Services is a trusted and experienced construction company in the Greater Kansas City area. We offer high-quality residential and commercial construction and renovation services.",
            "url": "https://pegasus-solves.com",
            "telephone": "+1-913-963-4841",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "11880 W 95th St #1120", 
                "addressLocality": "Overland Park",
                "addressRegion": "KS",
                "postalCode": "66214",
                "addressCountry": "US"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": 39.0997,
                "longitude": -94.5786
            },
            "openingHours": "Mo,Tu,We,Th,Fr 09:00-17:00",
            "sameAs": [
                "https://www.facebook.com/people/Pegasus-Construction/61555314126304/",
                "https://www.instagram.com/pegasusconstructionkc"
            ]
        }
    </script>
    <style>
        .header-logo-mobile-center {
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .wp-block-search__button {
            margin-left: 10px;
            border: none;
            background: none;
        }
    </style>
</head>
<body <?php body_class(); ?>>

    <?php wp_body_open();?>
    <div id="content" class="sticky-navbar bg-white"> 
        <div class="container">
            <!-- Sticky Navbar Row -->
            <div class="row">
                <!-- Logo and Search Icon -->
                <div class="col-lg-6 header-logo-mobile-center d-flex align-items-center pt-1">
                    <div>
                        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <?php
                    if (function_exists('the_custom_logo')) {
                        the_custom_logo();
                    }
                    ?>
                     <a href="/?s=" class="search-bi-header">
                        <i class="bi bi-search search-bi-style"></i>  
                    </a>
                    <h4 class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <?php bloginfo('name'); ?>
                        </a>
                    </h4>
                </div>
                <!-- Navigation Menu -->
                <div class="col-lg-6 pb-0">
                    <nav class="navbar p-0 navbar-expand-lg navbar-light">
                        <div class="collapse justify-content-end navbar-collapse pt-2" id="navbarNav">
                            <ul class="main-menu list-unstyled navbar-nav ml-auto p-1" role="navigation">
                                <?php wp_nav_menu([
                                    "theme_location" => "primary-menu",
                                    "container" => "",
                                    "items_wrap" => '%3$s',
                                    "walker" => new Bootstrap_Dropdown_Walker_Nav_Menu(),
                                    "link_before" => '<div class="nav-link nav-adjust text-uppercase">',
                                    "link_after" => "</div>",
                                ]); ?>
                                <?php if (get_theme_mod('slide_out_contact_form_toggle', 'no') == 'yes'): ?>
                                <li class="<?php if (is_page('Contact me')) echo ' active'; ?>">
                                    <a id="menuButtonContact" class="nav-link text-uppercase" href="<?php echo esc_url(get_option('optional_nav_link')); ?>" data-bs-toggle="collapse" data-bs-target="#collapseOneContact" aria-expanded="true" aria-controls="collapseOneContact">
                                    <?php echo esc_html(get_option('optional_nav_label', 'Default label Name')); ?>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <header id="header" class="site-header">
        <!-- hero slider -->
        <?php get_template_part('component-hero-carousel-slider'); ?>
        <!-- Accessibility Tool -->
        <?php get_template_part('accessibility-tool'); ?>
        <!-- Contact Form -->
        <?php get_template_part('contact-form'); ?>  
    </header>

