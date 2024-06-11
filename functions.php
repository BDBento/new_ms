<?php

include(TEMPLATEPATH . '/theme-functions/carrossel_register.php');
include(TEMPLATEPATH . '/theme-functions/seguranca.php');
include(TEMPLATEPATH . '/theme-functions/nav-walker.php');
include(TEMPLATEPATH . '/theme-functions/taxonomia/servoco_em _destaque.php');


function enqueue_slick_scripts()
{
    // Registrar e incluir o arquivo CSS do Slick Slider
    wp_enqueue_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css');
    wp_enqueue_style('slick-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css');

    // Registrar e incluir o arquivo JavaScript do Slick Slider
    wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), null, true);

    // Registrar e incluir o arquivo de inicialização do Slick Slider
    wp_enqueue_script('mytheme-slick-init', get_template_directory_uri() . '/js/slick-init.js', array('jquery', 'slick-js'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_slick_scripts');


function add_theme_scripts()
{

    wp_enqueue_script('jquery_js', get_template_directory_uri() . '/assets/js/jquery.js', array('jquery'), '3.6.0', true);

    wp_enqueue_script('bootstrap-1', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '1.0.0', true);

    wp_enqueue_script('pooer', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');



// Theme Title Support
add_theme_support('title-tag');
// Theme Thumbnail Support and Sizes
add_theme_support('post-thumbnails');
// Theme Custom Logo Support
add_theme_support('custom-logo');
// Theme Custom Header Support
add_theme_support('custom-header');
// Theme Image Size 570
add_image_size('loop', 348, 261, true);
//set_post_thumbnail_size( 50, 50, true );
// Formatos de postagem de tema
add_theme_support('post-formats', array('image', 'gallery', 'video', 'audio'));






function wpbr_home_settings($wp_customize)
{
    $wp_customize->add_section('home_settings', array(
        'title' => 'Selecione as areas de exibição',
        'priority' => 10,
    ));
    $wp_customize->add_setting('servicos-destaque', array(
        'default' => true,
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'servicos-destaque', array(
        'label' => 'Serviços em Destaque',
        'section' => 'home_settings',
        'settings' => 'servicos-destaque',
        'type' => 'checkbox',
    )));

    $wp_customize->add_setting('destaques-do-orgao', array(
        'default' => true,
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'destaques-do-orgao', array(
        'label' => 'Destaques do Orgão',
        'section' => 'home_settings',
        'settings' => 'destaques-do-orgao',
        'type' => 'checkbox',
    )));
    $wp_customize->add_setting('destaques-do-orgao2', array(
        'default' => false,
    ));
 
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'destaques-do-orgao2', array(
        'label' => 'Destaques do Orgão 2',
        'section' => 'home_settings',
        'settings' => 'destaques-do-orgao2',
        'type' => 'checkbox',
    )));

    $wp_customize->add_setting('instituicoes', array(
        'default' => true,
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'instituicoes', array(
        'label' => 'Instituições relacionadas',
        'section' => 'home_settings',
        'settings' => 'instituicoes',
        'type' => 'checkbox',
    )));
    $wp_customize->add_setting('area-edicao', array(
        'default' => true,
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'area-edicao', array(
        'label' => 'Área de Edição',
        'section' => 'home_settings',
        'settings' => 'area-edicao',
        'type' => 'checkbox',
    )));
}
add_action('customize_register', 'wpbr_home_settings');


// Adiciona uma nova seção no Personalizador

if (function_exists('register_sidebar')) {

    //Código para o widget.
    register_sidebar(array(
        'name' => __('servicos'),
        'id' => 'servicos',
        'description' => __('Servicos em destaque'),
        'before_widget' => '<div class="home-apresentacao">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('destaques do orgao'),
        'id' => 'destaques-do-orgao',
        'description' => __('Destaque do Orgão '),
        'before_widget' => '<div class="home-apresentacao">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('destaques do orgao2'),
        'id' => 'destaques-do-orgao2',
        'description' => __('Destaque do Orgão '),
        'before_widget' => '<div class="home-apresentacao">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('instituicoes'),
        'id' => 'instituicoes',
        'description' => __('Instituições relacionadas'),
        'before_widget' => '<div class="instituicao">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="instituicao-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('area-edicao'),
        'id' => 'area-edicao',
        'description' => __('Área de Edição'),
        'before_widget' => '<div class="area-edicao">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Sidebar O Orgao'),
        'id' => 'sidebar-o-orgao',
        'description' => __('Sidebar O Orgao'),
        'before_widget' => '<div class="sidebar-o-orgao">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}






// Adiciona uma nova seção no Personalizador
function ver_todos_servicos($wp_customize)
{
    // Adiciona uma nova seção no Personalizador
    $wp_customize->add_section('mytheme_new_section_name', array(
        'title'    => __('Botao todos servicos', 'mytheme'),
        'priority' => 10,
    ));

    // Adiciona a configuração para o link do botão
    $wp_customize->add_setting('mytheme_button_link', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    // Adiciona o controle do campo de entrada para o link
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'mytheme_button_link_control', array(
        'label'    => __('URL do Botão', 'mytheme'),
        'section'  => 'mytheme_new_section_name',
        'settings' => 'mytheme_button_link',
        'type'     => 'url',
    )));
}
add_action('customize_register', 'ver_todos_servicos');






function redes_sociais_customizer($wp_customize)
{
    // Adiciona uma nova seção no Personalizador
    $wp_customize->add_section('mytheme_redes_sociais', array(
        'title'    => __('Redes Sociais', 'mytheme'),
        'priority' => 10,
    ));

    // Adiciona a configuração para o link do botão
    $wp_customize->add_setting('mytheme_facebook', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    // Adiciona o controle do campo de entrada para o link
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'mytheme_facebook_control', array(
        'label'    => __('Facebook', 'mytheme'),
        'section'  => 'mytheme_redes_sociais',
        'settings' => 'mytheme_facebook',
        'type'     => 'url',
    )));

    $wp_customize->add_setting('mytheme_instagram', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    // Adiciona o controle do campo de entrada para o link
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'mytheme_instagram_control', array(
        'label'    => __('Instagram', 'mytheme'),
        'section'  => 'mytheme_redes_sociais',
        'settings' => 'mytheme_instagram',
        'type'     => 'url',
    )));

    $wp_customize->add_setting('mytheme_twitter', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    // Adiciona o controle do campo de entrada para o link
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'mytheme_twitter_control', array(
        'label'    => __('Twitter', 'mytheme'),
        'section'  => 'mytheme_redes_sociais',
        'settings' => 'mytheme_twitter',
        'type'     => 'url',
    )));


    $wp_customize->add_setting('mytheme_youtube', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    // Adiciona o controle do campo de entrada para o link
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'mytheme_youtube_control', array(
        'label'    => __('Youtube', 'mytheme'),
        'section'  => 'mytheme_redes_sociais',
        'settings' => 'mytheme_youtube',
        'type'     => 'url',
    )));
}
add_action('customize_register', 'redes_sociais_customizer');

//----------------------------------------------------------------------------------------------------------------------------


function custom_post_type_instituicoes() {
    $labels = array(
        'name'                => _x( 'Instituições relacionadas', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Instituição', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Instituições relacionadas', 'text_domain' ),
        'name_admin_bar'      => __( 'Instituição', 'text_domain' ),
        'all_items'           => __( 'Todas as Instituições', 'text_domain' ),
        'add_new_item'        => __( 'Adicionar Nova Instituição', 'text_domain' ),
        'add_new'             => __( 'Adicionar Novo', 'text_domain' ),
        'new_item'            => __( 'Nova Instituição', 'text_domain' ),
        'edit_item'           => __( 'Editar Instituição', 'text_domain' ),
        'update_item'         => __( 'Atualizar Instituição', 'text_domain' ),
        'view_item'           => __( 'Ver Instituição', 'text_domain' ),
        'search_items'        => __( 'Procurar Instituição', 'text_domain' ),
        'not_found'           => __( 'Não encontrado', 'text_domain' ),
        'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'text_domain' ),
    );

    $args = array(
        'label'               => __( 'instituicoes', 'text_domain' ),
        'description'         => __( 'Instituições que nos ajudam', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );

    register_post_type( 'instituicoes', $args );
}
add_action( 'init', 'custom_post_type_instituicoes', 0 );


// Title Truncate
function titulo($max) {
    $titulo = get_the_title(); /* ou você pode usar get_the_title() */
    $getlength = strlen($titulo);
    $thelength = $max;
    if($getlength > $max) {
        echo substr($titulo, 0, $thelength) . "...";
    } else {
        echo $titulo;
    }
}



//----------------------------------------------------------------------------------------------------------------------------
function my_theme_register_block() {
    // Enfileirar o script do bloco
    wp_enqueue_script(
        'my-block-script',
        get_template_directory_uri() . '/meu-bloco-gutenberg/block.js',
        array('wp-blocks', 'wp-element', 'wp-block-editor'),
        filemtime(get_template_directory() . '/meu-bloco-gutenberg/block.js')
    );

    // Enfileirar o estilo do editor
    wp_enqueue_style(
        'my-block-editor-style',
        get_template_directory_uri() . '/meu-bloco-gutenberg/editor.css',
        array('wp-edit-blocks'),
        filemtime(get_template_directory() . '/meu-bloco-gutenberg/editor.css')
    );

    // Enfileirar o estilo do frontend
    wp_enqueue_style(
        'my-block-style',
        get_template_directory_uri() . '/meu-bloco-gutenberg/style.css',
        array(),
        filemtime(get_template_directory() . '/meu-bloco-gutenberg/style.css')
    );
}

add_action('enqueue_block_editor_assets', 'my_theme_register_block');
add_action('wp_enqueue_scripts', 'my_theme_register_block');

