<div class="col-md-6 pb-0">
    <nav class="navbar p-0 navbar-expand-lg navbar-light sticky-navbar">
        <div class="container-fluid">
            <div class="collapse justify-content-center navbar-collapse pt-2" id="navbarNav">
                <ul class="main-menu list-unstyled navbar-nav ml-auto p-1" role="navigation">
                    <?php wp_nav_menu([
                        "theme_location" => "primary-menu",
                        "container" => "",
                        "items_wrap" => '%3$s',
                        "link_before" => '<div class="nav-link nav-adjust text-uppercase">',
                        "link_after" => "</div>",
                    ]); ?>
                   
                    <li class="<?php if (is_page('Contact me')) echo ' active'; ?>">
                        <a id="menuButtonContact" class="nav-link text-uppercase" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOneContact" aria-expanded="true" aria-controls="collapseOneContact">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div> 