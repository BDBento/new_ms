<?php
/*
Template Name: O Órgâo

*/


get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <div class="container">

            <div class="row">
                <div class="col-md-4">
                
                    <?php dynamic_sidebar('sidebar-o-orgao'); ?>
                </div>

                <div class="col-md-8">
                    <?php
                    while (have_posts()) :
                        the_post();
                        the_content(); // Gutenberg editable area
                    endwhile; // End of the loop.
                    ?>
                </div>
            </div>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
