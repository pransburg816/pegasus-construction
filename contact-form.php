<div id="slideOutMenuContact">

     <button class="mt-2 px-2 fw-lighter float-end close-menu" id="closeButtonContact"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-lg text-white" viewBox="0 0 16 16">

      <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/></svg>

    </button>

        <div class="container">

            <div class="mt-5">

                <h3 class="fw-lighter text-white">Pegasus Construction Services</h3>

            </div>

        <form action="<?php echo esc_url(get_theme_mod('contact_form_action_url', '#')); ?>" method="POST">

            <div class="row justify-content-center">

                 <div class="container text-white">

                           <span class="footer-heading text-white fw-lighter fs-4">Connect With Us</span>
                            <p>
                                <strong>Phone:</strong> <span id="protected-phone" itemprop="telephone"><?php echo esc_html(get_theme_mod('company_phone')); ?></span><br>
                                <strong>Email:</strong> <span id="protected-email" itemprop="email"><a href="mailto:<?php echo esc_attr(get_theme_mod('company_email')); ?>"><?php echo esc_html(get_theme_mod('company_email')); ?></a></span><br>
                            </p>
                            <div class="social-links mt-3 m">
                                <div class="row footer-social-icons m-0">
                                    <?php if (get_theme_mod('facebook_link') && get_theme_mod('facebook_link') != '#'): ?>
                                    <div class="col-3">
                                        <a href="<?php echo esc_url(get_theme_mod('facebook_link')); ?>" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
                                    </div>
                                     <?php if (get_theme_mod('twitter_link') && get_theme_mod('twitter_link') != '#'): ?>
                                    <div class="col-3">
                                        <a href="<?php echo esc_url(get_theme_mod('twitter_link')); ?>" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>
                                    </div>
                                    <?php endif; ?>
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

                <div class="col-md-12 col-lg-12">

                    <div class="contact-form">

                        <div class="mb-3 position-relative highlight highlight-text p-0">

                            <label for="name" class="fw-lighter p-2 text-white">Your Name:</label>

                            <input type="text" class="form-control bg-transparent nav-contact-form text-white fw-lighter" id="name" name="name" autocomplete="on" required>

                        </div>

                        <div class="mb-3 position-relative highlight highlight-text p-0">

                            <label for="name" class="fw-lighter p-2 text-white">Email:</label>

                            <input type="email" class="form-control bg-transparent nav-contact-form text-white fw-lighter fw-6" id="email" name="email" autocomplete="on" required>

                        </div>

                        <div class="mb-3 position-relative highlight highlight-text p-0">

                            <label for="name" class="fw-lighter p-2 text-white">Message:</label>

                            <textarea class="form-control bg-transparent nav-contact-form text-white fw-lighter" id="message" name="message" rows="5" required></textarea>

                        </div>

                        <div class="text-center">

                            <button type="submit" class="form-control-submit text-white">Send Message</button>

                        </div>

                    </div>

                </div>

            </div>

        </form> 

    </div>

</div>

