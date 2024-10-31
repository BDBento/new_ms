<div class="barra-foter-cinzenta">
    <div class="container d-flex justify-content-between">

        <div class="footer_link">
            <?php
            $link_lgpd = get_option('link_lgpd');
            if ($link_lgpd && !empty($link_lgpd)) {
                echo '<a href="' . esc_url($link_lgpd) . '">LGPD</a>';
            } else {
                echo '<a href="https://www.lgpd.ms.gov.br/">LGPD</a>';
            }
            ?>
        </div>
        <div class="footer_link"><a href="https://www.canaldedenuncia.ms.gov.br/">Fala Servidor</a> </div>
        <div class="footer_link"><a href="https://www.ms.gov.br/pagina/acessibilidade6563">Acessibilidade</a></div>

        <?php
        $file_url = get_option('arquivo_pagamentos_url');

        if ($file_url) {
            echo ' <div class="footer_link link_orden"><a href="' . esc_url($file_url) . '" download>Ordem Cronológica de Pagamentos</a></div>';
        } else {
        }
        ?>

    </div>
</div>

<footer>



    <div class="container widgets-rodape acao-baixo-cima">
        <div class="footer">
            <?php get_sidebar('footer'); ?>
        </div>
    </div>
    <div class="barra-rodape">
        <div class="container">
            <div class="row d-flex justify-content-between" style="padding-top: 12px; padding-bottom: 12px;color:#fff">
                <div class="col">
                    <p>SETDIG | Secretaria-Executiva de Transformação Digital</p>
                </div>
                <div class="col">
                    <p class="text-end"> </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
        <div class="vw-plugin-top-wrapper"></div>
    </div>
</div>

<?php
function fcms_menu()
{ ?>
    <script>
        jQuery(document).ready(function ($) {
            $('#menuBtn').click(function () {
                $(this).hasClass("ativo") ? ($(this).removeClass("ativo"), $("#menu-header").slideUp()) : ($(this).addClass("ativo"), $("#menu-header").slideDown())
            });
        });
    </script>
<?php }

add_action('wp_footer', 'fcms_menu', 70);

?>
<!-- Acessibilidade  -->
<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
<script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
</script>
<script defer>
    (function (d) {
        var s = d.createElement("script");
        s.setAttribute("data-account", "n4LcBHs32d");
        s.setAttribute("src", "https://cdn.userway.org/widget.js");
        (d.body || d.head).appendChild(s);
    })(document)
</script><noscript>Please ensure Javascript is enabled for purposes of <a href="https://userway.org">website
        accessibility</a></noscript>
<!-- Acessibilidade  -->
<?php


wp_footer(); ?>

</body>

</html>