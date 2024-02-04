<div class="container-fluid">
    <section class="container pb-5 pt-5" <?php if (get_theme_mod('mytheme_home_section_toggle') != 'yes') echo 'style="display: none;"'; ?>>
        <div class="row justify-content-center">
            <div class="col-lg-4 iamCol">
                <p class="text-uppercase fw-bold fs-4" style="color: #4a8cff"><?php echo esc_html(get_theme_mod('mytheme_home_text_1')); ?></p>
                <p class="text-uppercase fs-1"><?php echo esc_html(get_theme_mod('mytheme_home_text_2')); ?></p>
            </div>
            <div class="col-lg-6 p-0 slideCol">
                <div class="scroller">
                    <div class="inner">
                        <p class="text-uppercase"><?php echo esc_html(get_theme_mod('mytheme_home_text_3')); ?></p>
                        <p class="text-uppercase"><?php echo esc_html(get_theme_mod('mytheme_home_text_4')); ?></p>
                        <p class="text-uppercase"><?php echo esc_html(get_theme_mod('mytheme_home_text_5')); ?></p>
                        <p class="text-uppercase"><?php echo esc_html(get_theme_mod('mytheme_home_text_6')); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 hm-search">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="pt-4 wp-block-search__button-outside wp-block-search__text-button wp-block-search" style="position: relative; top: 10px"> 
                    <div class="wp-block-search__inside-wrapper">
                        <input class="search-bar-styles wp-block-search__input" id="wp-block-search__input-1" placeholder="Search" value="<?php echo esc_attr(get_search_query()); ?>" type="search" name="s" required="">
                        <button aria-label="Search" class="wp-block-search__button wp-element-button" type="submit"><i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div> 

