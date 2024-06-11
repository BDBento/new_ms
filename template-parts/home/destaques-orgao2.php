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
<style>
    .home-apresentacao-destaque{
        
    }

    .home-apresentacao {
        border: 1px solid #9b9b9b;
        border-radius: 5px;
        height: 100%;
        display: grid;
    }

    .home-apresentacao img {
        width: 100%;
        height: auto;
        border-radius: 5px 5px 0 0;
    }

    .home-apresentacao h4 {
        font-size: 18px;
        font-weight: 700;
    }

    .Destaque-content {
        padding: 10px 25px;
    }

    .info-post-destaque {
        display: flex;
        justify-content: space-between;
        height: 25px;
        align-self: end;
    }

    .info-post-destaque .botao {
        margin-right: 20px;
        font-size: 17px;
        font-weight: 500;
        color: black;
        text-decoration: underline;
    }

    .info-post-destaque a:first-child {
        font-size: 12px;
        font-weight: 600;
        color: black;
        background: #dddddd;
        padding: 2px;
        border-radius: 5px;
    }

    .home-apresentacao-destaque-grande {
        row-gap: 10px;
        margin: 0;
        padding: 0 5px;
    }

    .home-apresentacao-destaque-grande .col-md-6 {
        padding: 0 5px;
    }

    /* card pequeno */

    .home-apresentacao-card-2,
    .redes-sociais-2 {
        border: 1px solid #9b9b9b;
        border-radius: 5px;
        height: 100%;
    }

    .home-apresentacao-card-2 img {
        width: 100%;
        height: auto;
    }

    .home-apresentacao-card-2 a {
        position: absolute;
        z-index: 9;
        bottom: 0px;
        font-size: 12px;
        font-weight: 600;
        color: black;
        background: white;
        padding: 2px;
        border-radius: 5px;
    }

    .home-apresentacao-destaque-pequeno {
        row-gap: 10px;
        margin: 0;
        padding: 0 5px;
    }

    .apresentacao-pequeno-itens {
        margin: 0;
        padding: 0 5px;
    }

    /* Redes sociais */

    .redes-sociais-2 {
        padding: 10px 33px 0;
    }

    .redes-sociais-2 h3 {
        font-size: 20px;
        text-align: start;
        margin-bottom: 75px;
    }

    .redes-sociais-2 .bi {
        font-size: 50px;
        color: black;
    }

    .redes-sociais-2 .bg-redes-sociais-2 {
        background: #dddddd;
        margin: 10px 0;
        border-radius: 5px;
        width: 70px;
        height: 70px;
        display: grid;
        justify-content: center;
        align-content: center;
    }

    .redes-grid-2 {
        justify-content: space-between;
        padding: 0 45px;
    }
</style>