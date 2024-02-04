<div class="col-md-6 d-flex pt-1">
    <div>
    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    </div>
    <a href="index.html" class="mx-auto logo d-flex">
    <div class="site-badge <?php if (!is_front_page()) echo 'hide-on-mobile'; ?>">
        <div class="custom-logo-text">
            <?php
            $args = [
                "post_type" => "site_profile",
                "posts_per_page" => 1,
                "orderby" => "date",
                "order" => "DESC",
            ];
            $site_profile_posts = new WP_Query($args);
            if ($site_profile_posts->have_posts()) {
                while ($site_profile_posts->have_posts()) {
                    $site_profile_posts->the_post();
                    // Assume the logo URL and text are stored in post content
                    echo get_the_content();
                }
                wp_reset_postdata();
            }
            ?>
        </div>
    </div>
    </a>
</div>