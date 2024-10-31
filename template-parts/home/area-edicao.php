<section class="area-edicao">
    <div class="container">
        <div class="">
            <div class="">
                <?php if (is_active_sidebar('area-edicao')) : ?>
                    <?php dynamic_sidebar('area-edicao'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<style>
    .area-edicao{
        padding: 50px 0;
    }
</style>