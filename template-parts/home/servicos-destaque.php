<?php
// Exemplo de loop para exibir os Serviços em Destaque
$args = array(
    'post_type' => 'servico_em_destaque',
    'posts_per_page' => -1, // Mostrar todos os serviços em destaque
);

$query = new WP_Query($args);

?>




<div class="container">
    <h3>Serviços em Destaque</h3>
    <p>Conheça nossos serviços em destaque.</p>
</div>
<section class="servico-em-destaque-section">
    <div class="container">
        <div class="servico-em-destaque-content">
            <?php
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $link_url = get_post_meta(get_the_ID(), '_link_url_servico_em_destaque', true);
                    ?>
                    <div class="servico-em-destaque">
                        <?php the_post_thumbnail(''); ?>
                        <?php
                        // Obter categorias associadas ao post
                        $categorias = get_the_terms(get_the_ID(), 'categoria_servico_em_destaque');
                        if ($categorias && !is_wp_error($categorias)) {
                            echo '<p>Categoria: ';
                            $categoria_links = array();
                            foreach ($categorias as $categoria) {
                                $categoria_links[] = '<a href="' . esc_url(get_term_link($categoria)) . '">' . $categoria->name . '</a>';
                            }
                            echo implode(', ', $categoria_links);
                            echo '</p>';
                        }
                        ?>
                    </div>
                    <?php
                }
                wp_reset_postdata();
            } else {
                echo 'Nenhum serviço em destaque encontrado.';
            }
            ?>

        </div>
    </div>
    <div class="servico-btn-content">
        <?php
        $button_link = get_theme_mod('mytheme_button_link');
        if (!empty($button_link)) {
            echo '<a href="' . esc_url($button_link) . '" class="servico-em-destaque-button">Ver todos</a>';
        }
        ?>
    </div>

</section>






