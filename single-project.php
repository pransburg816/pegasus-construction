<?php get_header(); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>

                <?php
                // Get the repeater field values
                $image_gallery = get_field('image_gallery');

                if ($image_gallery) :
                ?>
                    <div id="project-carousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php foreach ($image_gallery as $index => $image) : ?>
                                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                    <img src="<?php echo esc_url($image['url']); ?>" class="d-block w-100" alt="<?php echo esc_attr($image['alt']); ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#project-carousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#project-carousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                <?php endif; ?>
            <?php endwhile;
            endif; ?>
        </div>

        <div class="col-lg-4">
            <h2>Select a Project</h2>
            <?php
            // Query for projects
            $projects = new WP_Query(array('post_type' => 'project'));

            if ($projects->have_posts()) :
            ?>
                <select class="form-select mb-3" id="project-dropdown">
                    <option value="" selected>Select a Project</option>
                    <?php while ($projects->have_posts()) : $projects->the_post(); ?>
                        <option value="<?php the_ID(); ?>"><?php the_title(); ?></option>
                    <?php endwhile; ?>
                </select>
            <?php endif; ?>

            <div id="project-tabs">
                <!-- Project tabs will be dynamically populated here using JavaScript -->
            </div>
        </div>
    </div>
</div>


<script>
    jQuery(document).ready(function ($) {
        // Event listener for project dropdown change
        $('#project-dropdown').change(function () {
            var projectId = $(this).val();

            // Fetch project content using AJAX and update project tabs
            if (projectId) {
                $.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    type: 'post',
                    data: {
                        action: 'get_project_content',
                        project_id: projectId,
                    },
                    success: function (response) {
                        $('#project-tabs').html(response);
                    },
                });
            } else {
                $('#project-tabs').empty();
            }
        });
    });
</script>

<?php get_footer(); ?>
