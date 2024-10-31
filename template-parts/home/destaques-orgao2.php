<?php

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'order' => 'created',
    'tax_query' => array(
        array(
            'taxonomy' => 'post_tag',
            'field' => 'slug',
            'terms' => 'destaque',
        ),
    ),
);

$destaques = new WP_Query($args);

?>

<div class="container">

    <div class="home-apresentacao-destaque row">

        <div class="home-apresentacao-destaque-grande col-md-3">

            <?php

            if ($destaques->have_posts()) {
                while ($destaques->have_posts()) {
                    $destaques->the_post();
                    ?>
                        <div class="home-apresentacao">
                            <?php the_post_thumbnail(); ?>
                            <div class="Destaque-content">
                                <h4><?php the_title(); ?></h4>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                            <div class="info-post-destaque">
                                <?php the_category(",", ","); ?>
                                <a href="<?php echo esc_url(get_post_meta(get_the_ID(), '_link_url_servico_em_destaque', true)); ?>"
                                    class="botao">Saiba mais</a>
                            </div>
                        </div>
                    <?php
                }
                wp_reset_postdata();
            } else {
                ?>
                <p>Nenhum destaque encontrado.</p>
                <?php
            }
            ?>
        </div>
        <?php

        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 4,
            'offset' => 1,
            'orderby' => 'date',
            'tax_query' => array(
                array(
                    'taxonomy' => 'post_tag',
                    'field' => 'slug',
                    'terms' => 'destaque',
                ),
            ),
        );

        $destaques = new WP_Query($args); // The Loop
        
        ?>

        <div class="home-apresentacao-destaque-pequeno col-md-6 row">

            <?php

            if ($destaques->have_posts()) {
                while ($destaques->have_posts()) {
                    $destaques->the_post();
                    ?>
                    <div class="apresentacao-pequeno-itens col-md-6">
                        <div class="home-apresentacao-card-2">
                            <?php the_post_thumbnail(); ?>
                            <div class="position-relative">
                                <?php the_category(",", ","); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                wp_reset_postdata();
            } else {
                ?>
                <p>Nenhum destaque encontrado.</p>
                <?php
            }
            ?>

        </div>

        <div class="apresentacao-pequeno-itens col-md-3">
            <div class="redes-sociais-2">
                <h3>redes sociais</h3>
                <div class="redes-grid-2 row">
                    <?php
                    $redes_sociais_link_facebook = get_theme_mod('mytheme_facebook');
                    $redes_sociais_link_instagram = get_theme_mod('mytheme_instagram');
                    $redes_sociais_link_twitter = get_theme_mod('mytheme_twitter');
                    $redes_sociais_link_youtube = get_theme_mod('mytheme_youtube');

                    if (!empty($redes_sociais_link_facebook)) {
                        echo '<div class="col-md-6"> <div class="bg-redes-sociais-2"><a href="' . esc_url($redes_sociais_link_facebook) . '" ><i class="bi bi-facebook"></i></a></div></div>';
                    }
                    if (!empty($redes_sociais_link_instagram)) {
                        echo '<div class="col-md-6"> <div class="bg-redes-sociais-2"><a href="' . esc_url($redes_sociais_link_instagram) . '" ><i class="bi bi-instagram"></i></a></div></div>';
                    }
                    if (!empty($redes_sociais_link_twitter)) {
                        echo '<div class="col-md-6"> <div class="bg-redes-sociais-2"><a href="' . esc_url($redes_sociais_link_twitter) . '" ><i class="bi bi-twitter"></i></a></div></div>';
                    }
                    if (!empty($redes_sociais_link_youtube)) {
                        echo '<div class="col-md-6"> <div class="bg-redes-sociais-2"><a href="' . esc_url($redes_sociais_link_youtube) . '" ><i class="bi bi-youtube"></i></a></div></div>';
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php

?>
