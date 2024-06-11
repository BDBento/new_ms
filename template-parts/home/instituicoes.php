<?php
$args = array(
    'post_type' => 'instituicoes',
    'posts_per_page' => -1, // Número de posts a exibir
);



$instituicoes_query = new WP_Query( $args );

if ( $instituicoes_query->have_posts() ) :
    while ( $instituicoes_query->have_posts() ) : $instituicoes_query->the_post(); ?>
        <div class="instituicao">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="instituicao-thumbnail">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail( 'thumbnail' ); ?>
                    </a>
                </div>
            <?php endif; ?>
            <div class="instituicao-content">
                <h2 class="instituicao-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
            </div>
        </div>
    <?php endwhile;
    wp_reset_postdata();
else : ?>
    <p><?php esc_html_e( 'Nenhuma instituição encontrada.', 'text_domain' ); ?></p>
<?php endif; ?>

ola