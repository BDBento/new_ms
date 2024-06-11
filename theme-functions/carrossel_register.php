<?php

function carrossel_register_widget() {
    register_widget( 'carrossel_widget' );
    }
    
    add_action( 'widgets_init', 'carrossel_register_widget' );
    
    class carrossel_widget extends WP_Widget {
    
    function __construct() {
    parent::__construct(
    // widget ID
    'carrossel_widget',
    // widget name
    __('Banner Dinamico:', ' carrossel_widget_domain'),
    // widget description
    array( 'description' => __( 'carrossel Widget Tutorial', 'carrossel_widget_domain' ), )
    );
    }
    
    public function widget( $args, $instance ) {
        echo get_template_part( 'template-parts/home/template','banners' );
    }
    
    public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) )
    $title = 'banner'; //$instance[ 'title' ];
    else
    $title = __('', 'carrossel_widget_domain' );
    ?>
    <p>
        Aqui aparecera o banner. nao duplicar ou adicionar mais de uma vez na mesma pagina.
    </p>
    <p>
        Para adicionar em um novo local exclua este aqui...
    </p>
    <?php
    }
    
    public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
    }
    
}
