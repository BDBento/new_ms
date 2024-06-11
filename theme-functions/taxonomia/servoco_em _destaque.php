<?php
// Registrar o tipo de post personalizado
function registrar_servicos_em_destaque() {
    $labels = array(
        'name'                  => _x( 'Serviços em Destaque', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Serviço em Destaque', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Serviços em Destaque', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Serviço em Destaque', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Adicionar Novo', 'textdomain' ),
        'add_new_item'          => __( 'Adicionar Novo Serviço em Destaque', 'textdomain' ),
        'new_item'              => __( 'Novo Serviço em Destaque', 'textdomain' ),
        'edit_item'             => __( 'Editar Serviço em Destaque', 'textdomain' ),
        'view_item'             => __( 'Ver Serviço em Destaque', 'textdomain' ),
        'all_items'             => __( 'Todos os Serviços em Destaque', 'textdomain' ),
        'search_items'          => __( 'Buscar Serviços em Destaque', 'textdomain' ),
        'parent_item_colon'     => __( 'Serviços em Destaque Pai:', 'textdomain' ),
        'not_found'             => __( 'Nenhum Serviço em Destaque encontrado.', 'textdomain' ),
        'not_found_in_trash'    => __( 'Nenhum Serviço em Destaque encontrado na lixeira.', 'textdomain' ),
        'featured_image'        => _x( 'Imagem em Destaque', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Definir imagem em destaque', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remover imagem em destaque', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Usar como imagem em destaque', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Arquivos de Serviços em Destaque', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Inserir no Serviço em Destaque', 'Overrides the “Insert into post”/“Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Enviado para este Serviço em Destaque', 'Overrides the “Uploaded to this post”/“Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filtrar lista de Serviços em Destaque', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/“Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Navegação da lista de Serviços em Destaque', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/“Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Lista de Serviços em Destaque', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/“Pages list”. Added in 4.4', 'textdomain' ),
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Serviços em Destaque do site', 'textdomain' ),
        'public'             => true,
        'menu_icon'          => 'dashicons-star-filled', 
        'supports'           => array( 'title', 'thumbnail' ),
        'taxonomies'         => array( '' ),
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => 'servicos-em-destaque' ),
        'show_in_rest'       => true,  // Adicionado para suporte ao editor de blocos (Gutenberg)
    );

    register_post_type( 'servico_em_destaque', $args );
}
add_action( 'init', 'registrar_servicos_em_destaque' );

function adicionar_categoria_servico_em_destaque() {
    $labels = array(
        'name'                       => _x( 'Categorias de Serviços em Destaque', 'taxonomy general name', 'textdomain' ),
        'singular_name'              => _x( 'Categoria de Serviço em Destaque', 'taxonomy singular name', 'textdomain' ),
        'search_items'               => __( 'Buscar Categorias de Serviços em Destaque', 'textdomain' ),
        'all_items'                  => __( 'Todas as Categorias de Serviços em Destaque', 'textdomain' ),
        'parent_item'                => __( 'Categoria Pai', 'textdomain' ),
        'parent_item_colon'          => __( 'Categoria Pai:', 'textdomain' ),
        'edit_item'                  => __( 'Editar Categoria', 'textdomain' ),
        'update_item'                => __( 'Atualizar Categoria', 'textdomain' ),
        'add_new_item'               => __( 'Adicionar Nova Categoria', 'textdomain' ),
        'new_item_name'              => __( 'Nome da Nova Categoria', 'textdomain' ),
        'menu_name'                  => __( 'Categorias', 'textdomain' ),
        'view_item'                  => __( 'Ver Categoria', 'textdomain' ),
        'popular_items'              => __( 'Categorias Populares', 'textdomain' ),
        'separate_items_with_commas' => __( 'Separe as categorias com vírgulas', 'textdomain' ),
        'add_or_remove_items'        => __( 'Adicionar ou remover categorias', 'textdomain' ),
        'choose_from_most_used'      => __( 'Escolher entre as mais usadas', 'textdomain' ),
        'not_found'                  => __( 'Nenhuma categoria encontrada', 'textdomain' ),
        'back_to_items'              => __( 'Voltar para categorias', 'textdomain' ),
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'categoria-servico-em-destaque' ),
        'show_in_rest'      => true, // Adicionado para suporte ao editor de blocos (Gutenberg)
    );

    register_taxonomy( 'categoria_servico_em_destaque', array( 'servico_em_destaque' ), $args );
}
add_action( 'init', 'adicionar_categoria_servico_em_destaque' );

// Adicionar Metabox para inserir o link URL
function adicionar_metabox_link_servico_em_destaque() {
    add_meta_box(
        'metabox_link_servico_em_destaque',
        'Link do Serviço em Destaque',
        'exibir_metabox_link_servico_em_destaque',
        'servico_em_destaque',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'adicionar_metabox_link_servico_em_destaque' );

// Função para exibir o conteúdo do Metabox
function exibir_metabox_link_servico_em_destaque( $post ) {
    // Recuperar o valor atual do link (se existir)
    $link_url = get_post_meta( $post->ID, '_link_url_servico_em_destaque', true );
    ?>
    <label for="link_url_servico_em_destaque">URL do Link:</label>
    <input type="text" id="link_url_servico_em_destaque" name="link_url_servico_em_destaque" style="width: 100%;" value="<?php echo esc_url( $link_url ); ?>" placeholder="Insira o URL do link aqui">
    <?php
}

// Salvar o valor do campo do link quando o post for salvo
function salvar_metabox_link_servico_em_destaque( $post_id ) {
    if ( isset( $_POST['link_url_servico_em_destaque'] ) ) {
        $link_url = sanitize_text_field( $_POST['link_url_servico_em_destaque'] );
        update_post_meta( $post_id, '_link_url_servico_em_destaque', $link_url );
    }
}
add_action( 'save_post', 'salvar_metabox_link_servico_em_destaque', 0 );


