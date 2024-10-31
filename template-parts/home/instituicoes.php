<?php
$args = array(
    'post_type' => 'instituicoes',
    'posts_per_page' => -1, // Número de posts a exibir
);

?>
<div class="area-instituicoes-section">
    <div class="container">
        <div class="area-inscricao-top">
            <div class="area-instituicoes-tittle">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <circle cx="10" cy="10" r="10" fill="#FFF8CC" />
                    <circle cx="9.9987" cy="9.9987" r="6.66667" fill="url(#paint0_linear_1349_28214)" />
                    <defs>
                        <linearGradient id="paint0_linear_1349_28214" x1="9.9987" y1="3.33203" x2="9.9987" y2="16.6654"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#FFD500" />
                            <stop offset="0.5" stop-color="#FDC400" />
                            <stop offset="1" stop-color="#F59C00" />
                        </linearGradient>
                    </defs>
                </svg>
                <h3>Instituição Relacionada</h3>
            </div>
            <div class="carrosel-control">
                <button class="carousel-prev-js">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                        <path
                            d="M0.5 24C0.5 11.0213 11.0213 0.5 24 0.5C36.9787 0.5 47.5 11.0213 47.5 24C47.5 36.9787 36.9787 47.5 24 47.5C11.0213 47.5 0.5 36.9787 0.5 24Z"
                            stroke="#0A0909" stroke-opacity="0.04" />
                        <path
                            d="M27.2188 30.8125C27.0625 30.9688 26.8438 30.9688 26.6875 30.8125L20.125 24.2812C20 24.125 20 23.9062 20.125 23.75L26.6875 17.2188C26.8438 17.0625 27.0625 17.0625 27.2188 17.2188L27.8438 17.8125C27.9688 17.9688 27.9688 18.2188 27.8438 18.3438L22.1875 24L27.8438 29.6875C27.9688 29.8125 27.9688 30.0625 27.8438 30.2188L27.2188 30.8125Z"
                            fill="#30302E" />
                    </svg>
                </button>
                <button class="carousel-next-js">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                        <path
                            d="M0.5 24C0.5 11.0213 11.0213 0.5 24 0.5C36.9787 0.5 47.5 11.0213 47.5 24C47.5 36.9787 36.9787 47.5 24 47.5C11.0213 47.5 0.5 36.9787 0.5 24Z"
                            stroke="#0A0909" stroke-opacity="0.04" />
                        <path
                            d="M20.75 17.2188C20.9062 17.0625 21.125 17.0625 21.2812 17.2188L27.8438 23.75C27.9688 23.9062 27.9688 24.125 27.8438 24.2812L21.2812 30.8125C21.125 30.9688 20.9062 30.9688 20.75 30.8125L20.125 30.2188C20 30.0625 20 29.8125 20.125 29.6875L25.7812 24L20.125 18.3438C20 18.2188 20 17.9688 20.125 17.8125L20.75 17.2188Z"
                            fill="#30302E" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="carousel-container">
            <div class="carousel_js">
                <div class="carousel-inner-js">
                    <?php
                    $instituicoes_query = new WP_Query($args);

                    if ($instituicoes_query->have_posts()):
                        while ($instituicoes_query->have_posts()):
                            $instituicoes_query->the_post(); ?>
                            <div class="instituicao-item">
                                <div class="instituicao-item-logo">
                                    <?php if (has_post_thumbnail()): ?>
                                        <div class="instituicao-thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('thumbnail'); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="instituicao-item-text">
                                    <div>
                                        <h2>
                                            <?php the_title(); ?>
                                        </h2>
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <a href="<?php the_permalink(); ?>">Acessar instituição</a>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                    else: ?>
                        <p><?php esc_html_e('Nenhuma instituição encontrada.', 'text_domain'); ?></p>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const carousel_js = document.querySelector('.carousel-inner-js');
    const prevBtn = document.querySelector('.carousel-prev-js');
    const nextBtn = document.querySelector('.carousel-next-js');

    let currentIndex = 0;
    const totalItems = document.querySelectorAll('.instituicao-item').length;
    const itemsPerView = 5;

    function updateCarousel() {
        const offset = -(currentIndex * 100) / itemsPerView;
        carousel_js.style.transform = `translateX(${offset}%)`;
    }

    nextBtn.addEventListener('click', () => {
        if (currentIndex <= totalItems - itemsPerView) {
            currentIndex++;
            updateCarousel();
        }
    });

    prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });

</script>