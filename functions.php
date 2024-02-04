<?php
/**
 * Functions and custom code for pegasusconstruction
 *
 * @package pegasusconstruction
 */

// Define constants for theme directory paths

// Theme Directory Paths

define("CUSTOM_THEME_DIR", get_template_directory());
define("CUSTOM_THEME_URI", get_template_directory_uri());

// Enqueue Styles and Scripts

function custom_enqueue_styles()
{
    // Deregister and register jQuery from CDN
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), '3.6.0', true);
    wp_enqueue_script('jquery');

    // Enqueue styles
    wp_enqueue_style("inter-font-rsms", "https://rsms.me/inter/inter.css", [], null);
    wp_enqueue_style("inter-font-google", "https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap", [], null);
    wp_enqueue_style("bootstrap-icons", "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css", [], null, "all");
    wp_enqueue_style("bootstrap-css", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css", [], null, "all");
    wp_enqueue_style("plyr-css", "https://cdn.plyr.io/3.6.12/plyr.css", [], null, "all");
    wp_enqueue_style("glightbox-css", "https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.2.0/css/glightbox.css", [], null, "all");
    
    // Enqueue scripts
    wp_enqueue_script("bootstrap-js", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js", ["jquery"], null, true);
    wp_enqueue_script("glightbox-js", "https://bootstrapmade.com/assets/vendor/glightbox/js/glightbox.min.js", ["jquery"], null, true);
    wp_enqueue_style("theme-style", get_stylesheet_uri(), [], wp_get_theme()->get("Version"));
    wp_enqueue_script("custom-js", get_template_directory_uri() . "/assets/js/custom.js", ["jquery"], null, true);
}

// Hooks and Actions

add_action('wp_enqueue_scripts', 'custom_enqueue_styles');

// Fancybox

// Helper Functions

function my_enqueue_fancybox_assets() {
    // Enqueue FancyBox CSS
    wp_enqueue_style('fancybox-css', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css', array(), '3.5.7');

    // Enqueue FancyBox JavaScript
    wp_enqueue_script('fancybox-js', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', array('jquery'), '3.5.7', true);
}

// Hooks and Actions

add_action('wp_enqueue_scripts', 'my_enqueue_fancybox_assets');

// Register a custom navigation menu

// Helper Functions

function pegasusconstruction_register_menus()
{
    register_nav_menus([
        "primary-menu" => esc_html__("Primary Menu", "pegasusconstruction"),
    ]);
}

// Hooks and Actions

add_action("init", "pegasusconstruction_register_menus");

// Enable support for post thumbnails (featured images)
add_theme_support("post-thumbnails");

// Add support for a custom logo (if desired)
add_theme_support("custom-logo", [
    "height" => 100,
    "width" => 100,
    "flex-width" => true,
    "flex-height" => true,
]);

// Define the maximum content width for embedded media and images
if (!isset($content_width)) {
    $content_width = 800;
}

// Google Tag Manager

// Helper Functions

function theme_enqueue_google_tag_manager() {
    ?>
    <!-- Google Tag Manager -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4Q6GNF45M5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-4Q6GNF45M5');
    </script>
    <!-- End Google Tag Manager -->
    <?php
}

// Hooks and Actions

add_action('wp_body_open', 'theme_enqueue_google_tag_manager');

// Register a widget area (sidebar)

// Helper Functions

function pegasusconstruction_widgets_init()
{
    register_sidebar([
        "name" => esc_html__("Sidebar", "pegasusconstruction"),
        "id" => "sidebar-1",
        "description" => esc_html__(
            "Add widgets here to appear in your sidebar.",
            "pegasusconstruction"
        ),
        "before_widget" => '<section id="%1$s" class="widget %2$s">',
        "after_widget" => "</section>",
        "before_title" => '<h2 class="widget-title">',
        "after_title" => "</h2>",
    ]);
}

// Hooks and Actions

add_action("widgets_init", "pegasusconstruction_widgets_init");

// Helper Functions

function mytheme_customize_register($wp_customize) {
    // Add a new section for the Homepage Feature
    $wp_customize->add_section('mytheme_homepage_feature', array(
        'title'    => __('Homepage Feature', 'mytheme'),
        'priority' => 30,
    ));

    // Repeat this block for each set of image, title, button text, and button URL
    for ($i = 1; $i <= 2; $i++) {
        // Setting for Image Upload
        $wp_customize->add_setting('mytheme_image_upload_' . $i, array(
            'default'   => '',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mytheme_image_upload_control_' . $i, array(
            'label'    => __('&rarr; Image Upload ' . $i, 'mytheme'),
            'section'  => 'mytheme_homepage_feature',
            'settings' => 'mytheme_image_upload_' . $i,
        )));

        // Setting for Image Title
        $wp_customize->add_setting('mytheme_image_title_' . $i, array(
            'default'   => 'Default Title',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control('mytheme_image_title_control_' . $i, array(
            'label'    => __('Image Title ' . $i, 'mytheme'),
            'section'  => 'mytheme_homepage_feature',
            'settings' => 'mytheme_image_title_' . $i,
            'type'     => 'text',
        ));

        // Setting for Button Text
        $wp_customize->add_setting('mytheme_button_text_' . $i, array(
            'default'   => 'View Project',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control('mytheme_button_text_control_' . $i, array(
            'label'    => __('Button Text ' . $i, 'mytheme'),
            'section'  => 'mytheme_homepage_feature',
            'settings' => 'mytheme_button_text_' . $i,
            'type'     => 'text',
        ));

        // Setting for Button URL
        $wp_customize->add_setting('mytheme_button_url_' . $i, array(
            'default'   => 'https://example.com',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control('mytheme_button_url_control_' . $i, array(
            'label'    => __('Button URL ' . $i, 'mytheme'),
            'section'  => 'mytheme_homepage_feature',
            'settings' => 'mytheme_button_url_' . $i,
            'type'     => 'url',
        ));
    }
}

// Hooks and Actions

add_action('customize_register', 'mytheme_customize_register');

add_action('admin_notices', 'feature_admin_notice');

// Add a custom excerpt length

// Helper Functions

function pegasusconstruction_custom_excerpt_length($length)
{
    return 20; // Adjust the number of words you want in the excerpt
}
add_filter("excerpt_length", "pegasusconstruction_custom_excerpt_length");

// Customize the excerpt "read more" link
function pegasusconstruction_excerpt_more($more)
{
    return '... <a href="' .
        get_permalink() .
        '" class="read-more">' .
        esc_html__("Read More", "pegasusconstruction") .
        "</a>";
}
add_filter("excerpt_more", "pegasusconstruction_excerpt_more");

function add_custom_id_to_menu_item($atts, $item, $args)
{
    if ("contact" == $item->title) {
        $atts["id"] = "showFormLink";
    }
    return $atts;
}
add_filter("nav_menu_link_attributes", "add_custom_id_to_menu_item", 10, 3);

//Icons Font Awesome
function theme_enqueue_styles() {
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', array(), '6.0.0-beta3' );
}

// Hooks and Actions

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

//Custom Walker
class Bootstrap_Dropdown_Walker_Nav_Menu extends Walker_Nav_Menu {

// Helper Functions

    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        if ($depth === 0) { // Check if this is the top level menu
            $output .= "\n$indent<div class=\"dropdown-menu mega-dropdown-menu\"><div class=\"row\"><ul class=\"sub-menu\">\n";
        } else {
            $output .= "\n$indent<ul class=\"dropdown-menu\">\n"; // Normal dropdown for other levels
        }
    }
    
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        
        // Check if item has children and is top level
        if ($depth === 0 && in_array('menu-item-has-children', $classes)) {
            $classes[] = 'nav-item';
            $classes[] = 'dropdown';
            $classes[] = 'mega-dropdown'; // Add mega-dropdown class for top level dropdown
        }
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = ' class="' . esc_attr($class_names) . '"';
        $output .= $indent . '<li' . $class_names .'>';
        
        $attributes = ' href="' . esc_attr($item->url) . '"';
        if ($depth === 0 && in_array('menu-item-has-children', $classes)) {
            $attributes .= ' class="dropdown-toggle" data-bs-toggle="dropdown"'; // Add dropdown toggle for top level
        }
        
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    function end_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        if ($depth === 0) {
            $output .= "$indent</ul></div></div>\n"; // Close mega menu div for top level
        } else {
            $output .= "$indent</ul>\n"; // Close normal dropdown for other levels
        }
    }
    
    function end_el(&$output, $item, $depth = 0, $args = array()) {
        $output .= "</li>\n";
    }
}

function custom_hero_image_css() {
    // Replace 'your_theme_textdomain' and 'hero_bg_image_1' with your actual text domain and setting ID.
    $image = get_theme_mod('hero_bg_image_1', '');

    if ($image) {
        ?>
            <style type="text/css">
                /* This will apply the styles to devices with a maximum width of 768px */
                
                @media (max-width: 768px) {
                    .your-hero-image-class {
                        height: 500px;
                        /* Adjust this value according to your needs */
                        background-image: url('<?php echo esc_url($image); ?>');
                        background-size: cover;
                        background-position: center;
                    }
                }
            </style>
            <?php
    }
}

// Hooks and Actions

add_action('wp_head', 'custom_hero_image_css');

// Helper Functions

function homepage_hero_slider($wp_customize) {
    // Add a new section for the slider
    $wp_customize->add_section('slider_section', array(
        'title' => __('Homepage Hero Carousel Slider', 'theme'),
        'priority' => 30,
    ));

    // Add setting for each slide
    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting('slider_image_' . $i, array(
            'default' => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'slider_image_' . $i, array(
            'label' => __('&rarr; Slider Image ' . $i, 'theme'),
            'section' => 'slider_section',
            'settings' => 'slider_image_' . $i,
        )));
    }

    // Add settings for text
    $wp_customize->add_setting('slider_text_1', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('slider_text_1', array(
        'label' => __('Text 1', 'theme'),
        'section' => 'slider_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('slider_text_2', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('slider_text_2', array(
        'label' => __('Text 2', 'theme'),
        'section' => 'slider_section',
        'type' => 'text',
    ));
}

// Hooks and Actions

add_action('customize_register', 'homepage_hero_slider');

// Helper Functions

function Inner_page_hero($wp_customize) {

    // Custom Text Section
    $wp_customize->add_section('custom_texts', array(
        'title'    => __('Internal Page Hero', ''),
        'priority' => 30,
    ));

    // For up to 10 custom text entries
    for ($i = 1; $i <= 10; $i++) {

         // Search Page Hero Message
        $wp_customize->add_setting('search_page_hero_text', array(
            'default'   => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control('search_page_hero_text', array(
            'label'    => 'Search Page Hero Text',
            'section'  => 'custom_texts',
            'type'     => 'textarea',
            'settings' => 'search_page_hero_text',
        ));

        // Page selector for custom text
        $wp_customize->add_setting("custom_text_page_{$i}", array(
            'default'   => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control("custom_text_page_{$i}", array(
            'label'    => "&rarr; SELECT PAGE {$i}",
            'section'  => 'custom_texts',
            'type'     => 'dropdown-pages',
            'settings' => "custom_text_page_{$i}",
        ));

        // Inner Hero Text
        $wp_customize->add_setting("inner_hero_text_{$i}", array(
            'default'   => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control("inner_hero_text_{$i}", array(
            'label'    => "Hero Text {$i}",
            'section'  => 'custom_texts',
            'type'     => 'text',
            'settings' => "inner_hero_text_{$i}",
        ));

        // Create Text
        $wp_customize->add_setting("additional_hero_text_{$i}", array(
            'default'   => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control("additional_hero_text_{$i}", array(
            'label'    => "Additional Hero Text {$i}",
            'section'  => 'custom_texts',
            'type'     => 'text',
            'settings' => "additional_hero_text_{$i}",
        ));

        // Background Image for Each Hero Message Entry
        $wp_customize->add_setting("hero_bg_image_{$i}", array(
            'default'       => '',
            'transport'     => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "hero_bg_image_{$i}", array(
            'label'    => "Background Image for Entry {$i}",
            'section'  => 'custom_texts',
            'settings' => "hero_bg_image_{$i}",
        )));
    }
}

// Funtion Style
function my_custom_admin_styles() {
    echo '
    <style>
        .customize-control-title {
            font-size: 20px;
        }
    </style>
    ';
}
add_action('admin_head', 'my_custom_admin_styles');


// Hooks and Actions

add_action('customize_register', 'Inner_page_hero');

// Helper Functions

function multi_column_content_section($wp_customize) {
    $wp_customize->add_section('multiple_column_section', array(
        'title' => __('Multi-Content Blocks - Video, Image and Text', 'theme'),
        'priority' => 35,
    ));

     // Add setting for selecting a page to display the four-column layout
    $wp_customize->add_setting('assigned4_page', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    // Loop for each section
    for ($i = 1; $i <= 8; $i++) {
        // Add setting for selecting a page to display this section
        $wp_customize->add_setting("assigned_page_section{$i}", array(
            'default' => '',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("assigned_page_section{$i}_control", array(
            'label' => sprintf(__('&rarr; ASSIGN SECTION %d TO PAGE', 'theme'), $i),
            'type' => 'dropdown-pages',
            'section' => 'multiple_column_section',
            'settings' => "assigned_page_section{$i}",
        ));
        // YouTube URL Setting
        $wp_customize->add_setting("youtube{$i}_video_url", array(
            'default' => '',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("youtube{$i}_video_url_control", array(
            'label' => __("Youtube or Video URL", 'theme'),
            'section' => 'multiple_column_section',
            'settings' => "youtube{$i}_video_url",
            'type' => 'url',
        ));

        // Image Upload Setting
        $wp_customize->add_setting("custom{$i}_image", array(
            'default' => '',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "custom{$i}_image_control", array(
            'label' => __("Section Image", 'theme'),
            'section' => 'multiple_column_section',
            'settings' => "custom{$i}_image",
        )));

        // Overlay Toggle Setting
        $wp_customize->add_setting("overlay{$i}_toggle", array(
            'default' => 'yes',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("overlay{$i}_toggle_control", array(
            'label' => __("Toggle Overlay", 'theme'),
            'section' => 'multiple_column_section',
            'settings' => "overlay{$i}_toggle",
            'type' => 'radio',
            'choices' => array(
                'yes' => __('Yes', 'theme'),
                'no'  => __('No', 'theme'),
            ),
        ));

        // Descriptive Text Setting
        $wp_customize->add_setting("descriptive{$i}_text", array(
            'default' => '',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("descriptive{$i}_text_control", array(
            'label' => __("Section Title", 'theme'),
            'section' => 'multiple_column_section',
            'settings' => "descriptive{$i}_text",
            'type' => 'textarea',
        ));

        // Additional Text Setting
        $wp_customize->add_setting("additional{$i}_text", array(
            'default' => '',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("additional{$i}_text_control", array(
            'label' => __("Section Text", 'theme'),
            'section' => 'multiple_column_section',
            'settings' => "additional{$i}_text",
            'type' => 'textarea',
        ));

         // Add setting for each section's button text
        $wp_customize->add_setting("button{$i}_text_custom", array(
            'default' => 'Our Projects',
            'transport' => 'refresh',
        ));

        // Add control for each section's button text
        $wp_customize->add_control("button{$i}_text_custom_control", array(
            'label' => __("Section Button Text", 'theme'),
            'section' => 'multiple_column_section',
            'settings' => "button{$i}_text_custom",
            'type' => 'text',
        ));

          // External Link Setting
        $wp_customize->add_setting("external{$i}_link", array(
            'default' => '',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("external{$i}_link_control", array(
            'label' => __("Section Link", 'theme'),
            'section' => 'multiple_column_section',
            'settings' => "external{$i}_link",
            'type' => 'url',
        ));

        // Button Text Setting
        $wp_customize->add_setting("button{$i}_text", array(
            'default' => 'Watch Our Video',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("button{$i}_text_control", array(
            'label' => __("Video Button Text", 'theme'),
            'section' => 'multiple_column_section',
            'settings' => "button{$i}_text",
            'type' => 'text',
        ));

        // Layout Choice Setting
        $wp_customize->add_setting("layout{$i}_choice", array(
            'default' => 'video-left',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("layout{$i}_choice_control", array(
            'label' => __("Change Layout Position", 'theme'),
            'section' => 'multiple_column_section',
            'settings' => "layout{$i}_choice",
            'type' => 'select',
            'choices' => array(
                'video-left' => __('Video on Left, Text on Right', 'theme'),
                'text-left'  => __('Text on Left, Video on Right', 'theme'),
            ),
        ));

    }
}

// Hooks and Actions

add_action('customize_register', 'multi_column_content_section');

// Helper Functions

function custom_image_sizes() {
    // 540 pixels wide and 430 pixels tall, cropping if necessary
    add_image_size('custom-col-lg-6', 540, 430, true); 
}

// Hooks and Actions

add_action('after_setup_theme', 'custom_image_sizes');

// Register Custom Section Post Type

// Helper Functions

function create_section_post_type() {
    register_post_type('custom_section',
        array(
            'labels'      => array(
                'name'          => __('Category Pages', 'textdomain'),
                'singular_name' => __('Custom Section', 'textdomain'),
            ),
            'public'      => true,
            'has_archive' => true,
            'supports'    => array('title', 'editor', 'thumbnail'),
            'taxonomies'  => array('category'),
        )
    );
}

// Hooks and Actions

add_action('init', 'create_section_post_type');

// Add Categories to Attachments

// Helper Functions

// Hooks and Actions

add_action('init', 'add_categories_to_attachments');

// Custom Attachment Fields to Edit

// Helper Functions

function custom_attachment_fields_to_edit($form_fields, $post) {
    $categories = get_categories(array('hide_empty' => false));
    $html = '<select name="attachments[' . $post->ID . '][category]" id="attachments-' . $post->ID . '-category">';
    $html .= '<option value="">Select a category</option>';

    foreach ($categories as $category) {
        $html .= '<option value="' . esc_attr($category->name) . '">' . esc_html($category->name) . '</option>';
    }

    $html .= '</select>';

    $form_fields['category']['input'] = 'html';
    $form_fields['category']['html'] = $html;

    return $form_fields;
}
add_filter('attachment_fields_to_edit', 'custom_attachment_fields_to_edit', 10, 2);

//Accessibility Options
function accessibility_option( $wp_customize ) {
    // Add Section for Accessibility Options
    $wp_customize->add_section( 'accessibility_options' , array(
        'title'      => __('Accessibility', 'mytheme'),
        'priority'   => 30,
    ));

    // Add Setting for Accessibility Toggle
    $wp_customize->add_setting( 'accessibility_toggle' , array(
        'default'   => 'no',
        'transport' => 'refresh',
    ));

    // Add Control for the Toggle
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'accessibility_control', array(
        'label'      => __('Enable Accessibility Features', 'mytheme'),
        'section'    => 'accessibility_options',
        'settings'   => 'accessibility_toggle',
        'type'       => 'radio',
        'choices'    => array(
            'yes' => 'Yes',
            'no' => 'No',
        ),
    )));

    $wp_customize->add_section( 'slide_out_contact_form_options' , array(
        'title'      => __('Slideout Nav Label', 'mytheme'),
        'priority'   => 30,
    ));

    // Add Setting for Slideout Nav Label Toggle
    $wp_customize->add_setting( 'slide_out_contact_form_toggle' , array(
        'default'   => 'no',
        'transport' => 'refresh',
    ));

    // Add Control for the Toggle
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slide_out_contact_form_control', array(
        'label'      => __('Enable Slideout Nav Label', 'mytheme'),
        'section'    => 'slide_out_contact_form_options',
        'settings'   => 'slide_out_contact_form_toggle',
        'type'       => 'radio',
        'choices'    => array(
            'yes' => 'Yes',
            'no' => 'No',
        ),
    )));
}

// Hooks and Actions

add_action( 'customize_register', 'accessibility_option' );

// Register settings

// Helper Functions

function mytheme_register_settings() {
    register_setting('options_theme_group', 'optional_nav_label');
    register_setting('options_theme_group', 'optional_nav_link');
}

// Hooks and Actions

add_action('admin_init', 'mytheme_register_settings');

// Add theme options page

// Helper Functions

function optional_add_theme_page() {
    add_theme_page('Slideout Nav Label', 'Slideout Nav Label', 'edit_theme_options', 'theme-options', 'optional_theme_page');
}

// Hooks and Actions

add_action('admin_menu', 'optional_add_theme_page');

// Theme options page form

// Helper Functions

function optional_theme_page() {
    ?>
    <div class="wrap">
        <h1>Slideout Navigation Label</h1>
        <form method="post" action="options.php">
            <?php settings_fields('options_theme_group'); ?>
            <?php do_settings_sections('options_theme_group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Slideout Navigation Button Label</th>
                    <div class="fw-6 fst-italic"> *To enable slideout menu, go to <strong>Appearance >  Customize > <a href="/wp-admin/customize.php?return=%2Fwp-admin%2Fthemes.php%3Fpage%3Dtheme-options">Slideout Nav Label</a></strong></div>
                    <td><input type="text" name="optional_nav_label" value="<?php echo esc_attr(get_option('optional_nav_label')); ?>" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

function custom_nav_menu_instructions() {
    $screen = get_current_screen();
    // Check if we're on the nav-menus.php page
    if ($screen->id == 'nav-menus') {
        echo '<div class="notice notice-info is-dismissible" style="background-color: #fff; margin-top: 20px"><p>Add a custom panel slideout navigation link here <strong><i>Appearance &rarr; Customize &rarr; <a href="/wp-admin/customize.php">Slideout Nav Label</a>.</i></strong></p></div>';
    }
}

// Hooks and Actions

add_action('admin_notices', 'custom_nav_menu_instructions');

// Helper Functions

function custom_section_post_instructions() {
    $screen = get_current_screen();
    
    // Check if we're on the custom_section edit page
    if ($screen->id == 'custom_section') {
        if (isset($_GET['post']) && $_GET['post'] == '446') {
            echo '<div class="notice notice-info is-dismissible" style="background-color: #eee;"><p><strong>Important:</strong> Instructions specific to post ID 446.</p></div>';
        } else {
            echo '<div class="notice notice-info is-dismissible" style="background-color: #eee;"><p><strong>Instructions:</strong><br>Category pages work best with the image gallery option. Every 12 images create pagination with section titles that you can add here in the customizer section: <a href="/wp-admin/customize.php">Pagination Section Titles</a>.<br>1. Add a title for the category page.<br>2. Add content (text, images, videos, image galleries, etc.) as needed.<br>3. Insert media into the post.<br>4. Click "Update" to save your changes.</p></div>';
        }
    }
}

// Hooks and Actions
add_action('admin_notices', 'custom_section_post_instructions');


// Helper Functions

function custom_flexi_content_blocks_section( $wp_customize ) {
    // Define the number of subsections
    $num_subsections = 10;

    // Add a single section for all custom settings
    $wp_customize->add_section("flexi_content_blocks_section", array(
        'title'    => __("Flexible-Content Blocks", 'mytheme'),
        'priority' => 30,
    ));

    for ($i = 1; $i <= $num_subsections; $i++) {
        // Add setting and control for selecting a page for each subsection
        $wp_customize->add_setting("select_page_setting_$i", array(
            'default'   => '',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("select_page_control_$i", array(
            'label'    => __("&rarr; SELECT PAGE FOR SUBSECTION ($i)", 'mytheme'),
            'section'  => "flexi_content_blocks_section",
            'settings' => "select_page_setting_$i",
            'type'     => 'dropdown-pages',
        ));

        // Background color setting
        $wp_customize->add_setting("background_color_setting_$i", array(
            'default'   => '#ffffff',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "background_color_control_$i", array(
            'label'    => __("Background Color for Subsection $i", 'mytheme'),
            'section'  => "flexi_content_blocks_section",
            'settings' => "background_color_setting_$i",
        )));

        // Text input setting
        $wp_customize->add_setting("text_setting_$i", array(
            'default'   => '',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("text_control_$i", array(
            'label'    => __("Input Text for Subsection $i", 'mytheme'),
            'section'  => "flexi_content_blocks_section",
            'settings' => "text_setting_$i",
            'type'     => 'text',
        ));

        // Image upload setting
        $wp_customize->add_setting("image_upload_setting_$i", array(
            'default'   => '',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "image_upload_control_$i", array(
            'label'    => __("Upload Image for Subsection $i", 'mytheme'),
            'section'  => "flexi_content_blocks_section",
            'settings' => "image_upload_setting_$i",
        )));

        // Header Title
        $wp_customize->add_setting("subtitle_$i", array(
            'default' => '',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("subtitle_control_$i", array(
            'label' => __("Header Title $i", 'mytheme'),
            'section' => 'flexi_content_blocks_section',
            'settings' => "subtitle_$i",
            'type' => 'text',
        ));

        // Main Content Setting
        $wp_customize->add_setting("main_content_$i", array(
            'default' => '',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("main_content_control_$i", array(
            'label' => __("Main Content for Subsection $i", 'mytheme'),
            'section' => 'flexi_content_blocks_section',
            'settings' => "main_content_$i",
            'type' => 'textarea',
        ));

        // Blockquote input setting
        $wp_customize->add_setting("blockquote_text_setting_$i", array(
            'default'   => '',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("blockquote_text_control_$i", array(
            'label'    => __("Blockquote Subsection $i", 'mytheme'),
            'section'  => "flexi_content_blocks_section",
            'settings' => "blockquote_text_setting_$i",
            'type'     => 'text',
        ));

         // Additional Main Content Setting
        $wp_customize->add_setting("additional_main_content_$i", array(
            'default' => '',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("additional_main_content_control_$i", array(
            'label' => __("Additional Main Content for Subsection $i", 'mytheme'),
            'section' => 'flexi_content_blocks_section',
            'settings' => "additional_main_content_$i",
            'type' => 'textarea',
        ));

        // Layout Choice Setting
        $wp_customize->add_setting("layout_choice_$i", array(
            'default' => 'image-left',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("layout_choice_{$i}_control", array(
            'label' => __("Layout Choice for Subsection $i", 'mytheme'),
            'section' => 'flexi_content_blocks_section',
            'settings' => "layout_choice_$i",
            'type' => 'select',
            'choices' => array(
                'image-left' => __('Image on Left, Text on Right', 'mytheme'),
                'text-left' => __('Text on Left, Image on Right', 'mytheme'),
            ),
        ));
    }
}

// Hooks and Actions

add_action('customize_register', 'custom_flexi_content_blocks_section');

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'WP_Customize_Rich_Text_Control' ) ) {
    class WP_Customize_Rich_Text_Control extends WP_Customize_Control {
        public $type = 'rich-text';

// Helper Functions

        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php
                $settings = array(
                    'textarea_name' => $this->id,
                    'quicktags'     => true,
                    'tinymce'       => array(
                        'wpautop' => true,
                        'plugins' => 'link'
                    ),
                );
                wp_editor( $this->value(), $this->id, $settings );
                ?>
            </label>
            <?php
        }
    }
}

function carousel_banner( $wp_customize ) {
    // Add a section for the carousel
    $wp_customize->add_section( 'carousel_banner_section', array(
        'title'    => __( 'Carousel Banner Text', '' ),
        'priority' => 30,
    ));

    // Setting and control for the H1 title
    $wp_customize->add_setting( 'carousel_h1_title', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'carousel_h1_title_control', array(
        'label'    => __( 'Banner Title', '' ),
        'section'  => 'carousel_banner_section',
        'settings' => 'carousel_h1_title',
        'type'     => 'text',
    ));

    // Settings and controls for 3 carousel items
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting( "carousel_item_$i", array(
            'default'   => "Default text for carousel item $i",
            'transport' => 'refresh',
        ));
        $wp_customize->add_control( "carousel_item_control_$i", array(
            'label'    => __("Carousel Banner Item $i", ''),
            'section'  => 'carousel_banner_section',
            'settings' => "carousel_item_$i",
            'type'     => 'textarea',
        ));
    }

    // Dropdown to assign the carousel to a navigation link
    $wp_customize->add_setting( 'carousel_nav_link', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    // Get all pages to list in the customizer
    $pages = get_pages();
    foreach ($pages as $page) {
        $wp_customize->add_setting( 'carousel_nav_link_' . $page->ID, array(
            'default'   => false,
            'transport' => 'refresh',
        ));

        $wp_customize->add_control( 'carousel_nav_link_control_' . $page->ID, array(
            'label'    => $page->post_title,
            'section'  => 'carousel_banner_section',
            'settings' => 'carousel_nav_link_' . $page->ID,
            'type'     => 'checkbox',
        ));
    }

    // Add other sections and controls as required
}

// Hooks and Actions

add_action( 'customize_register', 'carousel_banner' );

// Helper Functions

function bottom_banner_text( $wp_customize ) {
    // Add a section for bottom banner message
    $wp_customize->add_section( 'bottom_banner_text_section', array(
        'title'    => __( 'Bottom Banner Text', 'mytheme' ),
        'priority' => 30,
    ));

    // Setting and control for the H1 title
    $wp_customize->add_setting( 'bottom_banner_text_h1_title', array(
        'default'   => 'Default H1 Title',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'bottom_banner_text_h1_title_control', array(
        'label'    => __( 'Banner Title', 'mytheme' ),
        'section'  => 'bottom_banner_text_section',
        'settings' => 'bottom_banner_text_h1_title',
        'type'     => 'text',
    ));

    // Settings and controls
    for ($i = 1; $i <= 1; $i++) {
        $wp_customize->add_setting( "bottom_banner_text_item_$i", array(
            'default'   => "Default text for carousel item $i",
            'transport' => 'refresh',
        ));
        $wp_customize->add_control( "bottom_banner_text_item_control_$i", array(
            'label'    => __("Carousel Item $i", 'mytheme'),
            'section'  => 'bottom_banner_text_section',
            'settings' => "bottom_banner_text_item_$i",
            'type'     => 'textarea',
        ));
    }

    // Dropdown to assign the banner to a navigation link
    $wp_customize->add_setting( 'bottom_banner_text_nav_link', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    // Get all pages to list in the customizer
    $pages = get_pages();
    foreach ($pages as $page) {
        $wp_customize->add_setting( 'bottom_banner_text_nav_link_' . $page->ID, array(
            'default'   => false,
            'transport' => 'refresh',
        ));

        $wp_customize->add_control( 'bottom_banner_text_nav_link_control_' . $page->ID, array(
            'label'    => $page->post_title,
            'section'  => 'bottom_banner_text_section',
            'settings' => 'bottom_banner_text_nav_link_' . $page->ID,
            'type'     => 'checkbox',
        ));
    }

    // Add other sections and controls as required
}

// Hooks and Actions

add_action( 'customize_register', 'bottom_banner_text' );

// Helper Functions

function mytheme_textscroll($wp_customize) {
    // Section to be added in the Customizer
    $wp_customize->add_section('mytheme_home_section', array(
        'title'    => __('Scrolling Text', 'mytheme'),
        'priority' => 30,
    ));

    // Setting for the toggle
    $wp_customize->add_setting('mytheme_home_section_toggle', array(
        'default'   => 'yes',
        'transport' => 'refresh',
    ));

    // Control for the toggle
    $wp_customize->add_control('mytheme_home_section_toggle_control', array(
        'label'    => __('Display Home Section', 'mytheme'),
        'section'  => 'mytheme_home_section',
        'settings' => 'mytheme_home_section_toggle',
        'type'     => 'checkbox',
        'choices'  => array('yes' => 'Yes'),
    ));

    // Add settings and controls for each text field
    $texts = [
        'mytheme_home_text_1' => 'Entry 1',
        'mytheme_home_text_2' => 'Entry 2',
        'mytheme_home_text_3' => 'Entry 3',
        'mytheme_home_text_4' => 'Entry 4',
        'mytheme_home_text_5' => 'Entry 5',
        'mytheme_home_text_6' => 'Entry 6',
    ];

    foreach ($texts as $key => $default) {
        // Setting
        $wp_customize->add_setting($key, array(
            'default'   => $default,
            'transport' => 'postMessage', // or 'refresh' if you don't plan to implement live preview
        ));

        // Control
        $wp_customize->add_control($key . '_control', array(
            'label'    => __('&rarr; Text: ' . $default, 'mytheme'),
            'section'  => 'mytheme_home_section',
            'settings' => $key,
            'type'     => 'text',
        ));
    }
}

// Hooks and Actions

add_action('customize_register', 'mytheme_textscroll');

// Helper Functions

function admin_notice(){
    global $pagenow;
    
    // Check if the current page is the Dashboard homepage
    if ($pagenow == 'index.php') {
        echo '<div class="notice notice-success is-dismissible">
                 <p>To edit the home page scrolling texts, please go to the <a href="'.admin_url('customize.php').'">Customizer</a>.</p>
             </div>';
    }
}

// Hooks and Actions

add_action('admin_notices', 'admin_notice');

// Helper Functions

function contact_form($wp_customize) {
    // Section for Contact Page Settings
    $wp_customize->add_section('custom_contact_page', array(
        'title'    => __('Contact Page Settings', 'mytheme'),
        'priority' => 30,
    ));

    // Setting for Intro Text
    $wp_customize->add_setting('contact_intro_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('contact_intro_text_control', array(
        'label'    => __('Intro Text', 'mytheme'),
        'section'  => 'custom_contact_page',
        'settings' => 'contact_intro_text',
        'type'     => 'textarea',
    ));

    // Setting for Form Action URL
    $wp_customize->add_setting('contact_form_action_url', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('contact_form_action_url_control', array(
        'label'    => __('Form Action URL', 'mytheme'),
        'section'  => 'custom_contact_page',
        'settings' => 'contact_form_action_url',
        'type'     => 'url',
    ));

     // Page selector for custom text
        $wp_customize->add_setting("contact_google_label_{$i}", array(
            'default'   => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control("contact_google_label_{$i}", array(
            'label'    => ">>>> SELECT PAGE {$i}",
            'section'  => 'custom_texts',
            'type'     => 'dropdown-pages',
            'settings' => "contact_google_label_{$i}",
        ));

    // Add settings and controls for address components
    $address_components = ['street', 'city', 'state', 'zip'];
    foreach ($address_components as $component) {
        $wp_customize->add_setting("google_maps_{$component}", array(
            'default'   => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control("google_maps_{$component}_control", array(
            'label'    => ucwords($component) . '',
            'section'  => 'custom_contact_page',
            'settings' => "google_maps_{$component}",
            'type'     => 'text',
        ));

        // States and Territories
    $states = array(
        'AL' => 'Alabama', 'AK' => 'Alaska', 'AZ' => 'Arizona', 'AR' => 'Arkansas', 'CA' => 'California',
        'CO' => 'Colorado', 'CT' => 'Connecticut', 'DE' => 'Delaware', 'DC' => 'District of Columbia',
        'FL' => 'Florida', 'GA' => 'Georgia', 'HI' => 'Hawaii', 'ID' => 'Idaho', 'IL' => 'Illinois',
        'IN' => 'Indiana', 'IA' => 'Iowa', 'KS' => 'Kansas', 'KY' => 'Kentucky', 'LA' => 'Louisiana',
        'ME' => 'Maine', 'MD' => 'Maryland', 'MA' => 'Massachusetts', 'MI' => 'Michigan', 'MN' => 'Minnesota',
        'MS' => 'Mississippi', 'MO' => 'Missouri', 'MT' => 'Montana', 'NE' => 'Nebraska', 'NV' => 'Nevada',
        'NH' => 'New Hampshire', 'NJ' => 'New Jersey', 'NM' => 'New Mexico', 'NY' => 'New York',
        'NC' => 'North Carolina', 'ND' => 'North Dakota', 'OH' => 'Ohio', 'OK' => 'Oklahoma', 'OR' => 'Oregon',
        'PA' => 'Pennsylvania', 'RI' => 'Rhode Island', 'SC' => 'South Carolina', 'SD' => 'South Dakota',
        'TN' => 'Tennessee', 'TX' => 'Texas', 'UT' => 'Utah', 'VT' => 'Vermont', 'VA' => 'Virginia',
        'WA' => 'Washington', 'WV' => 'West Virginia', 'WI' => 'Wisconsin', 'WY' => 'Wyoming',
        'AS' => 'American Samoa', 'GU' => 'Guam', 'MP' => 'Northern Mariana Islands', 'PR' => 'Puerto Rico',
        'UM' => 'United States Minor Outlying Islands', 'VI' => 'Virgin Islands'
    );

    // Add setting for State
    $wp_customize->add_setting('google_maps_state', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    // Add dropdown control for State
    $wp_customize->add_control('google_maps_state_control', array(
        'label'    => __('State', 'mytheme'),
        'section'  => 'custom_contact_page',
        'settings' => 'google_maps_state',
        'type'     => 'select',
        'choices'  => $states,
    ));
    }
}

// Hooks and Actions

add_action('customize_register', 'contact_form');

// Helper Functions

function footer_function($wp_customize) {
    // Section for Footer Settings
    $wp_customize->add_section('mytheme_footer_settings', array(
        'title'    => __('Footer Settings', 'mytheme'),
        'priority' => 120,
    ));

     // Company Name
    $wp_customize->add_setting('company_name', array(
        'default'           => 'Default Company Name',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('company_name', array(
        'label'   => __('Company Name', 'mytheme'),
        'section' => 'mytheme_footer_settings',
        'type'    => 'text',
    ));

    // Company Address
    $wp_customize->add_setting('company_address', array(
        'default'           => 'Default Address',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('company_address', array(
        'label'   => __('Company Address', 'mytheme'),
        'section' => 'mytheme_footer_settings',
        'type'    => 'text',
    ));

    // Company Phone
    $wp_customize->add_setting('company_phone', array(
        'default'           => 'Default Phone',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('company_phone', array(
        'label'   => __('Company Phone', 'mytheme'),
        'section' => 'mytheme_footer_settings',
        'type'    => 'text',
    ));

    // Company Email
    $wp_customize->add_setting('company_email', array(
        'default'           => 'Default Email',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('company_email', array(
        'label'   => __('Company Email', 'mytheme'),
        'section' => 'mytheme_footer_settings',
        'type'    => 'email',
    ));

     // Company Info
    $wp_customize->add_setting('company_info', array(
        'default'           => 'Default Company Info',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('company_info', array(
        'label'   => __('Bottom Company Info', 'mytheme'),
        'section' => 'mytheme_footer_settings',
        'type'    => 'text',
    ));

    // Social Media Links
    $social_links = array(
        'twitter'   => __('Twitter Link', 'mytheme'),
        'facebook'  => __('Facebook Link', 'mytheme'),
        'instagram' => __('Instagram Link', 'mytheme'),
        'linkedin'  => __('LinkedIn Link', 'mytheme'),
    );

    foreach ($social_links as $key => $label) {
        $wp_customize->add_setting("{$key}_link", array(
            'default'           => '#',
            'transport'         => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control("{$key}_link", array(
            'label'   => $label,
            'section' => 'mytheme_footer_settings',
            'type'    => 'url',
        ));
    }
}

// Hooks and Actions

add_action('customize_register', 'footer_function');

// Helper Functions

function projects_title_img_head($wp_customize) {
    // Add a section for the Project Gallery page
    $wp_customize->add_section('project_gallery_section', array(
        'title' => __('Pagination Section Titles', 'mytheme'),
        'priority' => 30,
    ));

    // Get categories
    $categories = get_categories(array('taxonomy' => 'category', 'hide_empty' => false));
    $categories_choices = array('' => __('Select a Category', 'mytheme'));
    foreach ($categories as $category) {
        $categories_choices[$category->slug] = $category->name;
    }

    // Create dropdowns and text fields for each group
    for ($group = 1; $group <= 12; $group++) {
        // Add a dropdown setting for each group to select a category
        $wp_customize->add_setting("project_gallery_group_{$group}_category", array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control("project_gallery_group_{$group}_category", array(
            'label' => sprintf(__('&rarr; Category for Group %d', 'mytheme'), $group),
            'section' => 'project_gallery_section',
            'type' => 'select',
            'choices' => $categories_choices,
        ));

        // Add title settings for each page in the group
        for ($page = 1; $page <= 12; $page++) {
            $wp_customize->add_setting("project_gallery_group_{$group}_page_{$page}_title", array(
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
                'transport' => 'refresh',
            ));

            $wp_customize->add_control("project_gallery_group_{$group}_page_{$page}_title", array(
                'label' => sprintf(__('Title for Group %d - Page %d', 'mytheme'), $group, $page),
                'section' => 'project_gallery_section',
                'type' => 'text',
            ));
        }
    }
}

// Hooks and Actions

add_action('customize_register', 'projects_title_img_head');

// Helper Functions

function restrict_editor_access() {
    if (!current_user_can('administrator')) {
        global $current_screen;
        if ($current_screen->id === 'page' || $current_screen->id === 'post') {
            echo '<style>#content-html { display: none; }</style>';
        }
    }
}

// Hooks and Actions

add_action('admin_head', 'restrict_editor_access');

// Helper Functions

function customize_tinymce($init) {
    if (!current_user_can('administrator')) {
        $init['wordpress_adv_hidden'] = true;
    }
    return $init;
}
add_filter('tiny_mce_before_init', 'customize_tinymce');

function add_customizer_access_to_editor() {
    // Get the editor role
    $editor = get_role('editor');

    // Add capabilities related to the Customizer
    $editor->add_cap('edit_theme_options');
}

// Hooks and Actions

add_action('init', 'add_customizer_access_to_editor');

// Helper Functions

function remove_text_tab_for_non_admins($settings, $editor_id) {
    // Check if the user is not an administrator and the editor is the main content editor
    if (!current_user_can('administrator') && $editor_id === 'content') {
        $settings['quicktags'] = false;
    }
    return $settings;
}

add_filter('wp_editor_settings', 'remove_text_tab_for_non_admins', 10, 2);

function custom_admin_scripts() {
    global $pagenow, $typenow;

    // Check if we're on the Media Library page
    if ($pagenow == 'upload.php') {
        // Hide the category assignment for non-administrators
        if (!current_user_can('administrator')) {
            echo '<style>
                    .attachment-details .setting[data-setting="categories"] { 
                        display: none !important;
                    }
                  </style>';
        }
    }

    // Check if we're on the Custom Post Type editor page
    if ($pagenow == 'edit.php' && $typenow == 'custom_section') {
        // Custom logic here (if needed)
    }
}

// Hooks and Actions

add_action('admin_head', 'custom_admin_scripts');

// Helper Functions

function hide_categories_section_from_media_edit() {
    global $pagenow;

    // Check if we are on the post edit page
    if ($pagenow == 'post.php' && isset($_GET['action']) && $_GET['action'] == 'edit') {
        // Get the post ID from the URL
        $post_id = isset($_GET['post']) ? $_GET['post'] : false;

        if ($post_id) {
            $post_type = get_post_type($post_id);

            // Check if the post type is 'attachment'
            if ($post_type === 'attachment') {
                echo '<style>
                        #categorydiv { 
                            display: none !important;
                        }
                      </style>';
            }
        }
    }
}

// Hooks and Actions

add_action('admin_head', 'hide_categories_section_from_media_edit'); 

// Helper Functions

function hide_categories_in_customizer_media_edit() {
    ?>
    <style>
        .compat-item { 
            display: none !important;
        }
    </style>
    <?php
}

// Hooks and Actions

add_action('customize_controls_enqueue_scripts', 'hide_categories_in_customizer_media_edit');

// Helper Functions

function hide_specific_fields_in_media_edit() {
    global $pagenow;

    // Check if we are on the post.php page and editing a post
    if ($pagenow == 'post.php' && isset($_GET['action']) && $_GET['action'] == 'edit') {
        $post_id = isset($_GET['post']) ? $_GET['post'] : false;

        if ($post_id) {
            $post_type = get_post_type($post_id);

            // Check if the post type is 'attachment'
            if ($post_type === 'attachment') {
                echo '<style>
                        /* Hide Alternative Text and its description */
                        .attachment-alt-text,
                        .attachment-alt-text-description,
                        
                        /* Hide Caption */
                        label[for="attachment_caption"],
                        #attachment_caption,
                        
                        /* Hide Description and its label */
                        label[for="attachment_content"],
                        #wp-attachment_content-wrap,
                        
                        /* Hide any other sections as needed */
                        .compat-field-category,
                        .media-types-required-info
                        { 
                            display: none !important;
                        }
                      </style>';
            }
        }
    }
}

// Hooks and Actions

add_action('admin_head', 'hide_specific_fields_in_media_edit');

// Helper Functions

function custom_gallery_shortcode($output, $attr) {
    global $post;

    // Gallery instance counter
    static $instance = 0;
    $instance++;

    // Get the gallery images
    if (!empty($attr['ids'])) {
        // 'ids' is explicitly ordered, unless you specify otherwise.
        if (empty($attr['orderby'])) {
            $attr['orderby'] = 'post__in';
        }
        $attr['include'] = $attr['ids'];
    }

    // Collect the gallery images
    $args = array(
        'include' => $attr['include'],
        'post_status' => 'inherit',
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'orderby' => $attr['orderby']
    );

    $images = get_posts($args);

    // Split images into pages
    $perPage = 12; // Number of images per page
    $totalImages = count($images);
    $totalPages = ceil($totalImages / $perPage);

    // Get current page
    $currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1;

    // Slice the array to get the images for the current page
    $currentImages = array_slice($images, ($currentPage-1) * $perPage, $perPage);

    // Start the gallery output
    $output = "<div class='custom-gallery galleryid-{$instance}'>";

    foreach ($currentImages as $image) {
        $image_url = wp_get_attachment_url($image->ID);
        $image_caption = get_the_title($image->ID); // or use wp_get_attachment_caption($image->ID) for attachment caption

        // Image output for lightbox
        $output .= "<div class='col-xl-2 p-1'>";
        $output .= "<div class='card'>";
        $output .= "<div class='card-image'>";
        $output .= "<a href='" . esc_url($image_url) . "' data-fancybox='gallery' data-caption='" . esc_attr($image_caption) . "'>";
        $output .= "<img src='" . esc_url($image_url) . "' alt='" . esc_attr($image_caption) . "' />";
        $output .= "</a>";
        $output .= "</div>"; // .card-image
        $output .= "</div>"; // .card
        $output .= "</div>"; // .col-xl-2 p-1
    }

    $output .= "</div>"; // .custom-gallery

    // Add pagination if needed
    if ($totalPages > 1) {
        $output .= "<div class='gallery-pagination'>";
        $big = 999999999; // need an unlikely integer
        $output .= paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $totalPages,
        ));
        $output .= "</div>";
    }

    return $output;
}

add_filter('post_gallery', 'custom_gallery_shortcode', 10, 2);

function render_custom_gallery($gallery_category, $images_per_page = 12) {
    // Get current page number
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    // Query arguments to fetch attachments from the specified category
    $args = array(
        'post_type'      => 'attachment',
        'post_mime_type' => 'image',
        'posts_per_page' => $images_per_page,
        'paged'          => $paged,
        'category_name'  => $gallery_category, // Assuming you're using categories to differentiate galleries
        'orderby'        => 'date', // Order by date or another parameter
        'order'          => 'DESC' // Order direction
    );

    // The Query
    $gallery_query = new WP_Query($args);

    // Check if there are images
    if ($gallery_query->have_posts()) {
        echo '<div class="gallery-wrapper">';

        while ($gallery_query->have_posts()) {
            $gallery_query->the_post();

            // Display the image
            echo wp_get_attachment_image(get_the_ID(), 'full');

            // Display the title for each pagination page
            display_pagination_title($gallery_category, $paged);
        }

        echo '</div>';

        // Pagination
        echo paginate_links(array(
            'base'      => get_pagenum_link(1) . '%_%',
            'format'    => 'page/%#%',
            'current'   => $paged,
            'total'     => $gallery_query->max_num_pages,
            'prev_text' => __('« Prev'),
            'next_text' => __('Next »'),
        ));

        // Reset post data
        wp_reset_postdata();
    } else {
        echo '<p>No images found in this category.</p>';
    }
}

// Function to display title for each pagination page
function display_pagination_title($gallery_category, $paged) {
    $title_setting_key = "project_gallery_group_{$gallery_category}_page_{$paged}_title";
    $custom_title = get_theme_mod($title_setting_key);

    if ($custom_title) {
        echo '<h2>' . esc_html($custom_title) . '</h2>';
    }
}

// Hook the function to the WordPress file upload process
add_filter('wp_handle_upload', 'convert_to_webp_and_rename_if_duplicate');

function convert_to_webp_and_rename_if_duplicate($upload) {
    if (strpos($upload['type'], 'image') === false) {
        return $upload;
    }

    $file_path = $upload['file'];
    $upload_dir = wp_upload_dir();
    $base_dir = trailingslashit($upload_dir['basedir']);

    // Check for duplicates and rename if necessary
    $file_name = basename($file_path);
    $file_name_no_ext = pathinfo($file_name, PATHINFO_FILENAME);
    $counter = 1;

    while (file_exists($base_dir . $file_name)) {
        $file_name = $file_name_no_ext . '-' . $counter . '.webp';
        $counter++;
    }

    if ($counter > 1) {
        $new_path = $base_dir . $file_name;
        rename($file_path, $new_path);
        $file_path = $new_path;
        $upload['file'] = $new_path;
        $upload['url'] = trailingslashit($upload_dir['baseurl']) . $file_name;
    }

    // Convert to WebP format if JPEG or PNG
    $info = getimagesize($file_path);
    $extension = image_type_to_extension($info[2], false);

    if ($extension === 'jpeg' || $extension === 'png') {
        $image = $extension === 'jpeg' ? imagecreatefromjpeg($file_path) : imagecreatefrompng($file_path);

        if ($image !== null) {
            $output_file = preg_replace('/\\.[^.\\s]{3,4}$/', '.webp', $file_path);
            imagewebp($image, $output_file);
            imagedestroy($image);

            // Update file path and URL for WebP file
            $upload['file'] = $output_file;
            $upload['type'] = 'image/webp';
            $upload['url'] = str_replace(basename($file_path), basename($output_file), $upload['url']);
        }
    }

    return $upload;
}

add_filter('wp_handle_upload_prefilter', 'enforce_naming_convention_and_convert_to_webp');

function enforce_naming_convention_and_convert_to_webp($file) {
    $required_pattern = '/^([a-z]+-){3}[a-z]+(-[0-9]+)?$/';
    $filename_without_extension = pathinfo($file['name'], PATHINFO_FILENAME);

    if (!preg_match($required_pattern, $filename_without_extension)) {
        $file['error'] = 'Error: File name must consist of four lowercase words separated by dashes (e.g., "word1-word2-word3-word4.webp"). *All images are converted to .webp';
        return $file;
    }

    return $file;
}

// Hooks and Actions

add_action('admin_notices', 'media_library_instructions');

// Helper Functions

function media_library_instructions() {
    $screen = get_current_screen();
    if ($screen->id === 'upload') {
        echo '<div class="notice notice-info is-dismissible"><p>File name must consist of four lowercase words separated by dashes (e.g., "word1-word2-word3-word4.webp"). *All images are converted to .webp</p></div>';
    }
}

function remove_custom_section_categories_meta_box() {
    remove_meta_box('categorydiv', 'custom_section', 'side');
}
add_action('admin_menu', 'remove_custom_section_categories_meta_box');