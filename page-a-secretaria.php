<?php
/*
Template Name: Sobre o Órgão

*/

get_header();

$options = get_option('secretaria_options'); ?>





<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <div class="container">

            <div class="row">
                <div class="col-md-3" style="border-right: solid 2px grey;">

                    <div>
                        <img src="<?php echo ($options['secretaria_field_image']); ?>" alt="">
                        <h3>O Gestor</h3>
                        <p><?php echo esc_html($options['descricao_do_gestor']); ?></p>
                    </div>
                    <?php
                    $gestorAdjuntoImg = $options['imagem_gestorAdgunto'];
                    $gestorAdjuntotxt = $options['descricao_do_gestorAdjunto'];
                    
                    if (!empty($gestorAdjuntoImg) or (!empty($gestorAdjuntotxt))) {
                    ?>
                        <div>
                            <img src="<?php echo ($gestorAdjuntoImg); ?>" alt="">
                            <h3>Gestor Adjunto</h3>
                            <p><?php echo esc_html($gestorAdjuntotxt); ?></p>
                        </div>
                    <?php } ?>

                    <?php
                    $LinksOrganograma = $options['LinksOrganograma'] ?? null;
                    if (!empty($LinksOrganograma)) {
                    ?>
                        <div>
                            <a href="<?php echo esc_html($LinksOrganograma); ?>">Organograma</a>
                        </div>
                    <?php } ?>

                    <?php
                    $LinksContratoDeGestao = $options['LinksContratoDeGestao'] ?? null;
                    if (!empty($LinksContratoDeGestao)) {
                    ?>
                        <div>
                            <a href="<?php echo esc_html($LinksContratoDeGestao); ?>">Contrato de gestão</a>
                        </div>
                    <?php } ?>

                    <?php
                    $LinksPlanejamentoEstrategico = $options['LinksPlanejamentoEstrategico'] ?? null;
                    if (!empty($LinksPlanejamentoEstrategico)) {
                    ?>
                        <div>
                            <a href="<?php echo esc_html($LinksPlanejamentoEstrategico); ?>">Planejamento estratégico</a>
                        </div>
                    <?php } ?>


                </div>

                <div class="col-md-9">
                    <div>
                        <h2>Competências</h2>

                        <?php                       

                        $options = get_option('secretaria_options');

                        if (isset($options['aSecretariaMainCompetencias']) && !empty($options['aSecretariaMainCompetencias']) && is_array($options['aSecretariaMainCompetencias'])) : ?>

                            <?php foreach ($options['aSecretariaMainCompetencias'] as $field) : ?>
                                <details name="panel">
                                    <summary><?php echo esc_html($field['title']); ?></summary>
                                    <p><?php echo esc_html($field['text']); ?></p>
                                </details><!-- #post-## -->
                            <?php endforeach; ?>

                        <?php else : ?>
                            <p><?php esc_html_e('Nenhuma informação disponível.', 'secretaria'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->


<?php

get_footer();
