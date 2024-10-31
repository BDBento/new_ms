<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer-widgets')) : else : ?>
    <div class="col-lg-3 col-12">
        <?php get_search_form(); ?>
    </div>

    <div class="col-lg-3 col-12">
        <?php wp_list_pages('title_li=<h2>Pages</h2>' ); ?>
    </div>

    <div class="col-lg-3 col-12">
        <ul>
            <?php wp_get_archives('type=monthly'); ?>
        </ul>
    </div>

    <div class="col-lg-3 col-12">
        <h2>Categories</h2>
        <ul>
            <?php wp_list_categories('show_count=1&title_li='); ?>
        </ul>
    </div>
<?php endif; ?>
