<div class="container">
  <div class="slick-banner-slider">
    <div class="banner">
      <img class="mobile-banner" src="<?php echo get_template_directory_uri(); ?>/assets/img/banner-cartas-de-servicos-mobile.webp" alt="..." />
    </div>
    <div class="banner">
      <img class="mobile-banner" src="<?php echo get_template_directory_uri(); ?>/assets/img/pix-daems-mobile.png" alt="sefaz agora recebe por pix" />
    </div>
    <div class="banner">
      <img class="mobile-banner" src="<?php echo get_template_directory_uri(); ?>/assets/img/banner-cartas-de-servicos-mobile.webp" alt="..." />
    </div>
  </div>
</div>



<style>
  
</style>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('.slick-banner-slider').slick({
      slidesToShow: 2,
      slidesToScroll: 2,
      autoplay: true,
      autoplaySpeed: 3000,
      arrows: true,
      dots: true,
    });
  });
</script>