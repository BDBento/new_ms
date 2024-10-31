<?php

include(TEMPLATEPATH . '/theme-functions/carrossel_register.php');
include(TEMPLATEPATH . '/theme-functions/seguranca.php');
include(TEMPLATEPATH . '/theme-functions/nav-walker.php');
include(TEMPLATEPATH . '/theme-functions/taxonomia/servoco_em _destaque.php');
include(TEMPLATEPATH . '/theme-functions/function_a_secretaria.php');


function add_theme_scripts()
{

    wp_enqueue_script('jquery_js', get_template_directory_uri() . '/assets/js/jquery.js', array('jquery'), '3.6.0', true);

    wp_enqueue_script('bootstrap-1', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), time(), true);

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
        'before_widget' => '<div class="area-edicao-content">', // edited mmoraes************************************************ <div class="area-edicao">
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





// Filtro para definir o comprimento do excerpt
function custom_excerpt_length($length) {
    return 15; // Define o número de palavras
}
add_filter('excerpt_length', 'custom_excerpt_length');

// Filtro para modificar o final do excerpt
function custom_excerpt_more($more) {
    return '...'; // Define o sufixo do excerpt
}
add_filter('excerpt_more', 'custom_excerpt_more');




function remover_estilos_admin_do_frontend() {
    if (!is_admin()) {
        wp_dequeue_style('common'); // Remove o estilo "common.min.css" do front-end
    }
}
add_action('wp_enqueue_scripts', 'remover_estilos_admin_do_frontend', 100);




// -------------------------------------------------------------------------------------------------------- mmoraes

function footer_widget() {
    register_sidebar( array(
        'name'          => __( 'Widget Footer' ),
        'id'            => 'footer-widgets',
        'description'   => __( 'Adicione widgets aqui para aparecer no footer.'),
        'before_widget' => '<div id="%1$s" class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'footer_widget' );



function adicionar_menu_ordem_cronologica() {
    add_menu_page(
        'Ordem Cronológica de Pagamentos', // Título da página
        'Barra cinza obrigatoriedades',              // Texto do menu
        'manage_options',                   // Capacidade
        'ordem-cronologica-pagamentos',     // Slug do menu
        'renderizar_ordem_cronologica',     // Função de callback
        'dashicons-admin-generic',          // Ícone do menu
        6                                   // Posição no menu
    );
}

add_action('admin_menu', 'adicionar_menu_ordem_cronologica');


function footer_widget_customizer( $wp_customize ) {

    // Adicionar seção de Footer no Customizer
    $wp_customize->add_section( 'footer_section' , array(
        'title'      => __( 'Footer Settings'),
        'priority'   => 30,
    ) );

    // Adicionar configuração para o texto do footer
    $wp_customize->add_setting( 'footer_text', array(
        'default'   => __( 'Texto do Footer'),
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_kses_post',
    ) );

    // Adicionar controle de texto
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'footer_text',
        array(
            'label'      => __( 'Texto do Footer'),
            'section'    => 'footer_section',
            'settings'   => 'footer_text',
            'type'       => 'textarea',
        )
    ) );

}
add_action( 'customize_register', 'footer_widget_customizer' );



function renderizar_ordem_cronologica() {
    ?>
    <div class="wrap">
        <h1>Ordem Cronológica de Pagamentos</h1>

        <!-- Formulário para upload de arquivo -->
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="arquivo_pagamentos" />
            <input type="submit" name="enviar_arquivo" value="Upload" class="button button-primary" />
        </form>

        <?php
        if (isset($_POST['enviar_arquivo'])) {
            if (!empty($_FILES['arquivo_pagamentos']['name'])) {
                // Processar o upload do arquivo
                $arquivo = $_FILES['arquivo_pagamentos'];

                // Verificar se o upload foi bem-sucedido
                if ($arquivo['error'] == 0) {
                    // Caminho do upload no servidor
                    $upload_dir = wp_upload_dir();
                    $upload_path = $upload_dir['path'] . '/' . basename($arquivo['name']);

                    // Mover o arquivo para o diretório de uploads
                    if (move_uploaded_file($arquivo['tmp_name'], $upload_path)) {
                        $file_url = $upload_dir['url'] . '/' . basename($arquivo['name']);
                        update_option('arquivo_pagamentos_url', $file_url);
                        echo '<p>Arquivo enviado com sucesso!</p>';
                    } else {
                        echo '<p>Erro ao enviar o arquivo.</p>';
                    }
                } else {
                    echo '<p>Erro no upload do arquivo.</p>';
                }
            } else {
                // Se nenhum arquivo for enviado, remover a opção armazenada
                delete_option('arquivo_pagamentos_url');
                echo '<p>Arquivo removido com sucesso!</p>';
            }
        }
        ?>

        <!-- Formulário separado para o campo Link para LGPD -->
        <h2>Link para LGPD</h2>
        <form method="post">
            <input type="text" name="link_lgpd" placeholder="Link para LGPD" value="<?php echo esc_attr(get_option('link_lgpd')); ?>" />
            <input type="submit" name="salvar_link_lgpd" value="Salvar Link" class="button button-primary" />
        </form>

        <?php
        if (isset($_POST['salvar_link_lgpd'])) {
            if (!empty($_POST['link_lgpd'])) {
                // Processar o link para LGPD
                $link_lgpd = sanitize_text_field($_POST['link_lgpd']);
                update_option('link_lgpd', $link_lgpd);
                echo '<p>Link para LGPD salvo com sucesso!</p>';
            } else {
                // Se o campo estiver vazio, remover a opção armazenada
                delete_option('link_lgpd');
                echo '<p>Link para LGPD removido com sucesso!</p>';
            }
        }
        ?>
    </div>
    <?php
}