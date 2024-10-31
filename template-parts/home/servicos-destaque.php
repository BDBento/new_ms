<?php
// Exemplo de loop para exibir os Serviços em Destaque
$args = array(
    'post_type' => 'servico_em_destaque',
    'posts_per_page' => -1, // Mostrar todos os serviços em destaque
);

$query = new WP_Query($args);
?>

<section class="servico-em-destaque-section">
    <div class="container">
        <div class="d-flex servicos-destaque-tittle">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <circle cx="10" cy="10" r="10" fill="#CCEDD8" />
                <circle cx="9.9987" cy="10.0026" r="6.66667" fill="url(#paint0_linear_1336_15491)" />
                <defs>
                    <linearGradient id="paint0_linear_1336_15491" x1="9.9987" y1="3.33594" x2="9.9987" y2="16.6693"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#009D3D" />
                        <stop offset="0.5" stop-color="#007D37" />
                        <stop offset="1" stop-color="#00622F" />
                    </linearGradient>
                </defs>
            </svg>
            <h3>Serviços em Destaque</h3>
        </div>
        <div class="row">
            <?php
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $link_url = get_post_meta(get_the_ID(), '_link_url_servico_em_destaque', true);

                    // Exibir apenas se o link estiver disponível
                    if (!empty($link_url)) {
                        ?>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <a href="<?php echo esc_url($link_url); ?>">
                                <div class="servico-em-destaque">
                                    <div class="servico-em-destaque-inside">
                                        <div class="servico-em-destaque-tittle">
                                            <h2><?php the_title(); ?></h2>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                                fill="none">
                                                <path
                                                    d="M1.21876 1.16203C1.19667 0.963154 1.37344 0.786377 1.59442 0.786377H10.831C11.052 0.786377 11.2066 0.941057 11.2066 1.16203V10.3986C11.2066 10.6196 11.0299 10.7964 10.831 10.7743L9.96921 10.7964C9.74824 10.7964 9.57146 10.6196 9.59356 10.4207V3.57061L2.05845 11.1057C1.90377 11.2604 1.66071 11.2383 1.52812 11.1057L0.909406 10.487C0.754726 10.3323 0.754726 10.1113 0.909406 9.95667L8.44451 2.42156L1.57232 2.39946C1.37344 2.42156 1.19667 2.24478 1.19667 2.02381L1.21876 1.16203Z"
                                                    fill="#30302E" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p>Acessar serviço</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
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
            echo '<a href="' . esc_url($button_link) . '" class="servico-em-destaque-button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
            <path d="M13.5 9C13.75 9 14 9.25 14 9.5V14.5C14 15.3438 13.3125 16 12.5 16H1.5C0.65625 16 0 15.3438 0 14.5V3.5C0 2.6875 0.65625 2 1.5 2H6.5C6.75 2 7 2.25 7 2.5V3C7 3.28125 6.75 3.5 6.5 3.5H1.6875C1.5625 3.5 1.5 3.59375 1.5 3.6875V14.3125C1.5 14.4375 1.5625 14.5 1.6875 14.5H12.3125C12.4062 14.5 12.5 14.4375 12.5 14.3125V9.5C12.5 9.25 12.7188 9 13 9H13.5ZM15.625 0C15.8125 0 16 0.1875 16 0.375V4.625C15.9688 4.84375 15.8125 5 15.5938 5C15.5 5 15.4062 4.96875 15.3438 4.90625L13.8438 3.40625L5.34375 11.9062C5.25 11.9688 5.15625 12.0312 5.0625 12.0312C4.96875 12.0312 4.875 11.9688 4.8125 11.9062L4.09375 11.1875C4.03125 11.125 3.96875 11.0312 3.96875 10.9375C3.96875 10.8438 4.03125 10.75 4.09375 10.6562L12.5938 2.15625L11.0938 0.65625C11.0312 0.59375 11 0.5 11 0.375C11 0.1875 11.1562 0.03125 11.375 0H15.625Z" fill="#F9F9F9"/>
            </svg>Ver todos os serviços</a>';
        }
        ?>
    </div>
</section>