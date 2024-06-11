<?php
    // Cabecalho
get_header();?>
<section id="post-interno">
    <div class="container">
        <?php // Loop Archives
            if (have_posts()) :
                while (have_posts()) : the_post(); ?>
                <div class="row">

                    <div class="col-12 col-md-12 col-lg-9">
                        <a id="back" href="javascript: history.go(-1)">‹ Voltar</a>
                        <h1 class="green mt-3"><?php the_title(); ?></h1>
                        <ul class="list-inline list-unstyled">
                            <li class="list-inline-item">
                                <span class="badge badge-light data-noticia"><?php the_date( 'd M Y' );?></span>
                            </li>
                            <li class="list-inline-item">
                                <div class="categorias mt-2"><span><i class="fa fa-folder-open"></i>Categorias:</span><?php the_category(', '); ?></div>
                            </li>
                        </ul>
                        <?php the_post_thumbnail( null , ['class' => 'img-fluid mb-4']); ?>
                        <div id="content" class="mb-5">
                            <ul id="share" class="list-inline list-unstyled">
                                <li class="list-inline-item"><strong><i class="fa fa-share-alt"></i> Compartilhar:</strong></li>
                                <li class="list-inline-item"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" target="_blank"> <i class="fa fa-facebook-square"></i></a></li>
                                <li class="list-inline-item"><a href="http://www.twitter.com/share?url=<?php the_permalink();?>"> <i class="fa fa-twitter-square"></i></a></li>
                                <li class="list-inline-item"><a href="https://api.whatsapp.com/send?text=<?php the_permalink();?>"> <i class="fa fa-whatsapp"></i></a></li>
                                <li class="list-inline-item"><a href="#"> <i class="fa fa-envelope"></i></a></li>
                            </ul>
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div id="sidebar" class="col-12 col-md-12 col-lg-3 mt-5">
                        <?php get_sidebar('direito');?>
                    </div>
                </div>
                <?php endwhile;
            endif;
        ?>
    </div>
</section>
<?php
// Template Rodape
get_footer();
