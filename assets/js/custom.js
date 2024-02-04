(function($) {
    // Slide out Accessiblity Panel
    $(document).ready(function() {
        $('#menuButton').click(function() {
            toggleMenu('#slideOutMenu');
        });

        $('#menuButtonContact').click(function() {
            toggleMenu('#slideOutMenuContact');
        });

        $('#closeButton, #closeButtonContact').click(function() {
            closeMenu();
        });

        // Close menu when clicking outside of the menu
        $(document).mouseup(function(e) {
            var menu = $('[id^=slideOutMenu]');
            if (!menu.is(e.target) && menu.has(e.target).length === 0) {
                closeMenu();
            }
        });

        $('#menuButton2').click(function() {
            toggleMenu('#slideOutMenu2');
        });

        $('#closeButton2').click(function() {
            closeMenu();
        });

    });

    function closeMenu() {
        $('[id^=slideOutMenu]').animate({
            left: '-100%'
        }, 500);
    }

    function toggleMenu(menuSelector) {
        var slideOutMenu = $(menuSelector);
        var isActive = slideOutMenu.css('left') === '0px';

        // Close the menu if it's already open
        if (isActive) {
            slideOutMenu.animate({
                left: '-100%'
            }, 500);
        }
        // Open the menu
        else {
            // Close any other open menus first
            $('[id^=slideOutMenu]').not(menuSelector).animate({
                left: '-100%'
            }, 500);

            // Open the clicked menu
            slideOutMenu.animate({
                left: '0'
            }, 500);
        }
    }
    $(document).ready(function() {
        $('#menuButton').click(function() {
            toggleMenu('#slideOutMenu');
        });

        $('#menuButtonContact').click(function() {
            toggleMenu('#slideOutMenuContact');
        });

        $('#closeButton, #closeButtonContact').click(function() {
            closeMenu();
        });

        // Close menu when clicking outside of the menu
        $(document).mouseup(function(e) {
            var menu = $('[id^=slideOutMenu]');
            if (!menu.is(e.target) && menu.has(e.target).length === 0) {
                closeMenu();
            }
        });

        $('#menuButton2').click(function() {
            toggleMenu('#slideOutMenu2');
        });

        $('#closeButton2').click(function() {
            closeMenu();
        });

    });

    function closeMenu() {
        $('[id^=slideOutMenu]').animate({
            left: '-100%'
        }, 500);
    }

    function toggleMenu(menuSelector) {
        var slideOutMenu = $(menuSelector);
        var isActive = slideOutMenu.css('left') === '0px';

        // Close the menu if it's already open
        if (isActive) {
            slideOutMenu.animate({
                left: '-100%'
            }, 500);
        }
        // Open the menu
        else {
            // Close any other open menus first
            $('[id^=slideOutMenu]').not(menuSelector).animate({
                left: '-100%'
            }, 500);

            // Open the clicked menu
            slideOutMenu.animate({
                left: '0'
            }, 500);
        }
    }

    // Show Links Highlighted
    $('#highlightLinks').click(function() {
        var $svg = $(this).find('.bi');
        var $path = $svg.find('path');
        var $highlightDiv = $(this);
        var isHighlighted = $svg.hasClass('bi-toggle-on');

        if (isHighlighted) {
            $path.attr('d', 'M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z');
            $svg.removeClass('bi-toggle-on').addClass('bi-toggle-off');
            $highlightDiv.css({
                'background-color': '',
                'color': '',
                'transition': '',
                'border-radius': '',
                'outline': '',
                'padding': ''
            });
            $('a').css('border', '');
            localStorage.setItem('highlightLinks', 'off');
        } else {
            $path.attr('d', 'M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8H5z');
            $svg.removeClass('bi-toggle-off').addClass('bi-toggle-on');
            $highlightDiv.css({
                'background-color': 'rgba(8, 47, 73, 0.6)',
                'color': '#fff',
                'transition': '0.6s',
                'border-radius': '5px',
                'padding': '10px'
            });
            $('a').css('border', '2px solid yellow');
            localStorage.setItem('highlightLinks', 'on');
        }
    });

    // Check localStorage and set initial state
    $(document).ready(function() {
        if (localStorage.getItem('highlightLinks') === 'on') {
            $('#highlightLinks').click();
        }

        if (localStorage.getItem('highlightText') === 'on') {
            $('#highlightText').click();
        }
    });

    // Highlight - Bold Text
    $('#highlightText').on('click', function() {
        var $svg = $(this).find('.bi');
        var $path = $svg.find('path');
        var $highlightDiv = $(this);
        var isHighlighted = $svg.hasClass('bi-toggle-on');
        var $radialGradient = $('.radial-gradient');

        if (isHighlighted) {
            $path.attr('d', 'M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z');
            $svg.removeClass('bi-toggle-on').addClass('bi-toggle-off');
            $highlightDiv.css({
                backgroundColor: '',
                color: '',
                transition: '',
                borderRadius: '',
                outline: '',
                padding: ''
            });
            $('.container-left *, .main-menu *, blog *, .list-unstyled *, .mt-3 *, .container-fluid *, .hero-message *, .entry-content *').each(function() {
                var $element = $(this);
                if (!$element.attr('id') && !$element.hasClass('font-adjuster') && !$element.hasClass('container-fluid') && !$element.hasClass('line-height-adjuster') && !$element.hasClass('letter-spacing-adjuster') && !$element.hasClass('brightnessText')) {
                    $element.css({
                        color: '',
                        fontWeight: ''
                    });
                }
            });
            $radialGradient.show(); // Show the radial gradient div
            localStorage.setItem('highlightText', 'off');
        } else {
            $path.attr('d', 'M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8H5z');
            $svg.removeClass('bi-toggle-off').addClass('bi-toggle-on');
            $highlightDiv.css({
                backgroundColor: 'rgba(8, 47, 73, 0.6)',
                color: '#fff',
                transition: '0.6s',
                borderRadius: '5px',
                padding: '10px'
            });
            $('.container-left *, .main-menu *, blog *, .list-unstyled *, .mt-3 *, .container-fluid *, .hero-message *, .entry-content *').each(function() {
                var $element = $(this);
                if (!$element.attr('id') && !$element.hasClass('font-adjuster') && !$element.hasClass('container-fluid') && !$element.hasClass('line-height-adjuster') && !$element.hasClass('letter-spacing-adjuster') && !$element.hasClass('brightnessText')) {
                    $element.css({
                        color: '#fff',
                        fontWeight: 'bold'
                    });
                }
            });
            $radialGradient.hide(); // Hide the radial gradient div
            localStorage.setItem('highlightText', 'on');
        }
    });

    $(document).ready(function() {
        var $textArea = $('.entry-content');
        var $lineHeightIndicator = $('.line-height-indicator');
        var $fontSizeIndicator = $('.font-size-indicator');
        var $letterSpacingIndicator = $('.letter-spacing-indicator');
        var savedLineHeight = localStorage.getItem('lineHeight');
        var savedFontSize = localStorage.getItem('fontSize');
        var savedLetterSpacing = localStorage.getItem('letterSpacing');
        var originalLineHeight = parseFloat($textArea.css('--original-line-height'));
        var originalFontSize = parseInt($textArea.css('--original-font-size'));
        var originalLetterSpacing = parseFloat($textArea.css('--original-letter-spacing'));

        if (savedLineHeight) {
            $textArea.css('line-height', savedLineHeight);
            var percentage = ((savedLineHeight / originalLineHeight) * 100).toFixed(0);
            $lineHeightIndicator.text(percentage + '%');
        }

        if (savedFontSize) {
            $textArea.css('font-size', savedFontSize + 'px');
            var percentage = ((savedFontSize / originalFontSize) * 100).toFixed(0);
            $fontSizeIndicator.text(percentage + '%');
        }

        if (savedLetterSpacing) {
            $textArea.css('letter-spacing', savedLetterSpacing + 'px');
            var percentage = ((savedLetterSpacing / originalLetterSpacing) * 100).toFixed(0);
            $letterSpacingIndicator.text(percentage + '%');
        }

        $('.line-height-adjuster__plus-button').click(function() {
            adjustLineHeight($textArea, 0.2, $lineHeightIndicator);
        });
        $('.line-height-adjuster__minus-button').click(function() {
            adjustLineHeight($textArea, -0.2, $lineHeightIndicator);
        });
        $('.font-adjuster__plus-button').click(function() {
            adjustFontSize($textArea, 2, $fontSizeIndicator);
        });
        $('.font-adjuster__minus-button').click(function() {
            adjustFontSize($textArea, -2, $fontSizeIndicator);
        });
        $('.letter-spacing-adjuster__plus-button').click(function() {
            adjustLetterSpacing($textArea, 2, $letterSpacingIndicator);
        });
        $('.letter-spacing-adjuster__minus-button').click(function() {
            adjustLetterSpacing($textArea, -2, $letterSpacingIndicator);
        });
        $('.reset-button').click(function() {
            resetStyles($textArea, $lineHeightIndicator, $fontSizeIndicator, $letterSpacingIndicator);
        });

        function adjustLineHeight($element, adjustment, $indicator) {
            var fontSize = parseFloat($element.css('font-size'));
            var currentLineHeight = parseFloat($element.css('line-height')) / fontSize;
            var newSize = (currentLineHeight + adjustment).toFixed(1);
            var percentage = ((newSize / originalLineHeight) * 100).toFixed(0);
            $element.css('line-height', newSize);
            $indicator.text(percentage + '%');
            localStorage.setItem('lineHeight', newSize);
        }

        function adjustFontSize($element, adjustment, $indicator) {
            var currentSize = parseInt($element.css('font-size'));
            var newSize = currentSize + adjustment;
            var percentage = ((newSize / originalFontSize) * 100).toFixed(0);
            $element.css('font-size', newSize + 'px');
            $indicator.text(percentage + '%');
            localStorage.setItem('fontSize', newSize);
        }

        function adjustLetterSpacing($element, adjustment, $indicator) {
            var currentSpacing = parseFloat($element.css('letter-spacing'));
            var newSize = currentSpacing + adjustment;
            var percentage = ((newSize / originalLetterSpacing) * 100).toFixed(0);
            $element.css('letter-spacing', newSize + 'px');
            $indicator.text(percentage + '%');
            localStorage.setItem('letterSpacing', newSize);
        }

        function resetStyles($element, $lineHeightIndicator, $fontSizeIndicator, $letterSpacingIndicator) {
            $element.css('line-height', originalLineHeight);
            $lineHeightIndicator.text('100%');
            localStorage.removeItem('lineHeight');

            $element.css('font-size', originalFontSize + 'px');
            $fontSizeIndicator.text('100%');
            localStorage.removeItem('fontSize');

            $element.css('letter-spacing', originalLetterSpacing + 'px');
            $letterSpacingIndicator.text('100%');
            localStorage.removeItem('letterSpacing');
        }
    });

    // Letting Spacing //

    $(document).ready(function() {
        var $textArea = $('.entry-content');
        var $letterSpacingIndicator = $('.letter-spacing-indicator');
        var savedLetterSpacing = localStorage.getItem('letterSpacing');

        if (savedLetterSpacing !== null) {
            console.log('Saved Letter Spacing:', savedLetterSpacing); // Log savedLetterSpacing
            $textArea.css('letter-spacing', savedLetterSpacing + 'px');
            var originalSpacing = parseFloat($textArea.css('--original-letter-spacing'));
            console.log('Original Letter Spacing:', originalSpacing); // Log originalSpacing
            var percentage = ((parseFloat(savedLetterSpacing) / originalSpacing) * 100).toFixed(0);
            $letterSpacingIndicator.text(percentage + '%');
        }

        $('.letter-spacing-adjuster__plus-button').click(function() {
            adjustLetterSpacing($textArea, 1, $letterSpacingIndicator);
        });

        $('.letter-spacing-adjuster__minus-button').click(function() {
            adjustLetterSpacing($textArea, -1, $letterSpacingIndicator);
        });

        function adjustLetterSpacing($element, adjustment, $indicator) {
            var currentSpacing = parseFloat($element.css('letter-spacing'));
            var newSize = currentSpacing + adjustment;
            var originalSpacing = parseFloat($element.css('--original-letter-spacing'));
            var percentage = ((newSize / originalSpacing) * 100).toFixed(0);
            $element.css('letter-spacing', newSize + 'px');
            $indicator.text(percentage + '%');
            localStorage.setItem('letterSpacing', newSize);
        }

    /* Site Brightness */

        const $slider = $('#brightnessSlider');
        const $brightnessText = $('#brightnessText');
        if (localStorage.getItem('brightness')) {
            $slider.val(localStorage.getItem('brightness'));
        }
        changeBrightness('p, .fixed-column, .carouselMobile, .radial-gradient, .desktopLeftArrow, .navigation-arrows, img, a, .fw-lighter, span', $slider.val());
        updateText($slider.val());
        $slider.on('input', function() {
            changeBrightness('p, .fixed-column, .carouselMobile, .radial-gradient, .desktopLeftArrow, .navigation-arrows, img, a, .fw-lighter, span', $slider.val());
            updateText($slider.val());
            localStorage.setItem('brightness', $slider.val());
        });

        function changeBrightness(selector, brightness) {
            $(selector).css('filter', `brightness(${brightness})`);
        }

        function updateText(brightness) {
            const percentage = Math.round(parseFloat(brightness) * 100);
            $brightnessText.text(`${percentage}%`);
        }
    });

    // Reset //
    $('#resetButton').on('click', function() {
        // Reset highlight links
        if ($('#highlightLinks .bi').hasClass('bi-toggle-on')) {
            $('#highlightLinks').click();
        }

        // Reset bold text
        if ($('#highlightText .bi').hasClass('bi-toggle-on')) {
            $('#highlightText').click();
        }

    });

    $(document).ready(function() {
        // Function to check scroll position and show/hide the message
        function checkScrollPosition() {
            var scrollPosition = $(window).scrollTop();

            // Adjust the threshold as needed based on when you want the message to appear
            if (scrollPosition > 100) {
                $('#scrollNav').fadeIn();
            } else {
                $('#scrollNav').fadeOut();
            }
        }

        // Attach the function to the scroll event
        $(window).scroll(function() {
            checkScrollPosition();
        });

        // Call the function on page load to handle cases where the page is already scrolled
        checkScrollPosition();
    });

    $(document).ready(function() {
        // Show "View More" button on mouseover
        $(".card-custom").mouseover(function() {
            $(".btn-view-more").show();
        });

        // Hide "View More" button on mouseout
        $(".card-custom").mouseout(function() {
            $(".btn-view-more").hide();
        });
    });

    jQuery(document).ready(function($) {
        $('#dropdownMenuButton').on('change', function() {
            var selectedCategory = $(this).val();

            $.ajax({
                url: ajaxurl, // This is a variable that WordPress automatically defines
                type: 'POST',
                data: {
                    action: 'load_carousel_images',
                    category: selectedCategory
                },
                success: function(response) {
                    $('#carousel-container').html(response);
                }
            });
        });
    });


    jQuery(document).ready(function($) {
        $('.dropdown-item').click(function(e) {
            e.preventDefault();
            var sectionId = $(this).data('section');
            $('.section-content').hide();
            $('#' + sectionId).show();
        });

        // Automatically open the first section on page load
        $('.section-content').hide();
        $('.section-content').first().show();
    });

    // jQuery for swipe support
    $(".carousel").on("touchstart", function(event) {
        var xClick = event.originalEvent.touches[0].pageX;
        $(this).one("touchmove", function(event) {
            var xMove = event.originalEvent.touches[0].pageX;
            if (Math.floor(xClick - xMove) > 5) {
                $(this).carousel('next');
            } else if (Math.floor(xClick - xMove) < -5) {
                $(this).carousel('prev');
            }
        });
        $(".carousel").on("touchend", function() {
            $(this).off("touchmove");
        });
    });


    jQuery(document).ready(function($) {
        $('#custom_image_button').click(function(e) {
            e.preventDefault();
            var image = wp.media({
                    title: 'Upload Image',
                    multiple: false
                }).open()
                .on('select', function(e) {
                    var uploaded_image = image.state().get('selection').first();
                    var image_url = uploaded_image.toJSON().url;
                    $('#custom_image_preview').attr('src', image_url);
                    $('#custom_image').val(uploaded_image.id);
                });
        });
    });


    jQuery(document).ready(function($) {
        // Update for the first text field
        wp.customize('mytheme_home_text_1', function(value) {
            value.bind(function(newval) {
                $('.iamCol p:first').text(newval);
            });
        });

        // Update for the second text field
        wp.customize('mytheme_home_text_2', function(value) {
            value.bind(function(newval) {
                $('.iamCol p:nth-of-type(2)').text(newval);
            });
        });

        // Update for the third text field
        wp.customize('mytheme_home_text_3', function(value) {
            value.bind(function(newval) {
                $('.slideCol .scroller .inner p:nth-of-type(1)').text(newval);
            });
        });

        // Update for the fourth text field
        wp.customize('mytheme_home_text_4', function(value) {
            value.bind(function(newval) {
                $('.slideCol .scroller .inner p:nth-of-type(2)').text(newval);
            });
        });

        // Update for the fifth text field
        wp.customize('mytheme_home_text_5', function(value) {
            value.bind(function(newval) {
                $('.slideCol .scroller .inner p:nth-of-type(3)').text(newval); 
            });
        });

        // Update for the sixth text field
        wp.customize('mytheme_home_text_6', function(value) {
            value.bind(function(newval) {
                $('.slideCol .scroller .inner p:nth-of-type(4)').text(newval);
            });
        });
    });

    jQuery(document).ready(function($) {
        // Example: Hover event for a specific control
        $('#customize-control-assigned_page_section1_control').hover(
            function() {
                // Show the image
                $('#customize-preview').append('<div id="hover-preview"><img src="/wp-content/uploads/2024/01/pegasus-contruction-hm-porch-1.png" /></div>');
            }, function() {
                // Hide the image
                $('#hover-preview').remove();
            }
        );

        // Repeat for other controls as needed
    });

})(jQuery);

(function() {
    /* Highlighting text using IntersectionObserver */
    function handleTextHighlighting() {
        const highlightedTextElements = document.querySelectorAll(".highlight-text");
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("highlight");
                } else {
                    entry.target.classList.remove("highlight");
                }
            });
        }, {
            root: null,
            rootMargin: "0px",
            threshold: 0.5
        });
        highlightedTextElements.forEach(element => {
            observer.observe(element);
        });
    }
    handleTextHighlighting();

})();

/**
 * Initiate glightbox
 */
const glightbox = GLightbox({
    selector: '.glightbox'
});

function updateNavForScreenSize() {
    if (window.innerWidth < 1200) { // Bootstrap XL breakpoint
        // Remove .dropdown-toggle class and data-bs-toggle attribute
        document.querySelectorAll('.main-menu .dropdown-toggle').forEach(function(el) {
            el.classList.remove('dropdown-toggle');
            el.removeAttribute('data-bs-toggle');
        });
    } else {
        // Add .dropdown-toggle class and data-bs-toggle attribute back for larger screens
        document.querySelectorAll('.main-menu li.menu-item-has-children > a').forEach(function(el) {
            el.classList.add('dropdown-toggle');
            el.setAttribute('data-bs-toggle', 'dropdown');
        });
    }
}

// Run on initial load and on resize
updateNavForScreenSize();
window.addEventListener('resize', updateNavForScreenSize);

