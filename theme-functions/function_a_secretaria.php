<?php
// secretario e secretario adjunto 

// Função para adicionar a página de opções no painel administrativo
function secretaria_options_page()
{
    add_menu_page(
        'A Secretaria', // Título da página
        'A Secretaria', // Nome do menu
        'manage_options', // Capacidade necessária para acessar a página
        'secretaria-options', // Slug da página
        'secretaria_options_page_html', // Função que renderiza o conteúdo da página
        'dashicons-admin-generic', // Ícone do menu
        10 // Posição no menu
    );
}
add_action('admin_menu', 'secretaria_options_page');

// Função para renderizar o conteúdo da página de opções
function secretaria_options_page_html()
{
    // Verifica se o usuário tem permissão para acessar a página
    if (!current_user_can('manage_options')) {
        return;
    }

    // Exibe mensagem de sucesso se as configurações foram salvas
    if (isset($_GET['settings-updated'])) {
        add_settings_error('secretaria_messages', 'secretaria_message', 'Configurações Salvas', 'updated');
    }

    settings_errors('secretaria_messages');
?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('secretaria_options'); // Campos de configuração
            do_settings_sections('secretaria-options'); // Seções da página
            submit_button('Salvar Configurações'); // Botão de envio
            ?>
        </form>
    </div>
<?php
}

// Função para inicializar as configurações da página de opções
function secretaria_settings_init()
{
    register_setting('secretaria_options', 'secretaria_options');

    add_settings_section(
        'secretaria_section_developers', // ID da seção
        __('Informações da Secretaria', 'secretaria'), // Título da seção
        'secretaria_section_developers_cb', // Função de callback para a descrição da seção
        'secretaria-options' // Página na qual a seção será adicionada
    );


    // Adicionar imagem do gestor
    add_settings_field(
        'secretario_field_image', // ID do campo
        __('A foto do Gestor(a) titular', 'secretaria'), // Rótulo do campo
        'secretario_field_image_cb', // Função de callback para renderizar o campo
        'secretaria-options', // Página na qual o campo será adicionado
        'secretaria_section_developers', // Seção à qual o campo pertence
        [
            'label_for' => 'secretaria_field_image',
            'class' => 'secretaria_row',
            'secretaria_custom_data' => 'custom',
        ]
    );

    // Adicionar campo de texto
    add_settings_field(
        'secretaria_field_text_gestor', // ID do campo
        __('Descricao', 'secretaria'), // Rótulo do campo
        'secretaria_field_text_cb', // Função de callback para renderizar o campo
        'secretaria-options', // Página na qual o campo será adicionado
        'secretaria_section_developers', // Seção à qual o campo pertence
        [
            'label_for' => 'descricao_do_gestor',
            'class' => 'secretaria_row',
            'secretaria_custom_data' => 'custom',
        ]
    );


    // Adicionar campo de exemplo
    // add_settings_field(
    //     'secretaria_field_example', // ID do campo
    //     __('Campo de Exemplo', 'secretaria'), // Rótulo do campo
    //     'secretaria_field_example_cb', // Função de callback para renderizar o campo
    //     'secretaria-options', // Página na qual o campo será adicionado
    //     'secretaria_section_developers', // Seção à qual o campo pertence
    //     [
    //         'label_for' => 'descricao_do_gestor',
    //         'class' => 'secretaria_row',
    //         'secretaria_custom_data' => 'custom',
    //     ]
    // );

    // secretario adjunto --------------------------------------------------------------------------------------------


    add_settings_section(
        'gestor_adjunto', // ID da seção
        __('', 'secretaria'), // Título da seção
        'secretaria_section_gestor_adjunto', // Função de callback para a descrição da seção
        'secretaria-options' // Página na qual a seção será adicionada
    );


    add_settings_field(
        'secretario_field_image_gestorAdgunto', // ID do campo
        __('A foto do Gestor(a) adjunto', 'secretaria'), // Rótulo do campo
        'secretario_field_image_gestorAdgunto', // Função de callback para renderizar o campo
        'secretaria-options', // Página na qual o campo será adicionado
        'gestor_adjunto', // Seção à qual o campo pertence
        [
            'label_for' => 'imagem_gestorAdgunto',
            'class' => 'secretaria_row',
            'secretaria_custom_data' => 'custom',
        ]
    );

    add_settings_field(
        'secretaria_field_text_', // ID do campo
        __('Descricao', 'secretaria'), // Rótulo do campo
        'secretaria_field_text_gestorAdjunto', // Função de callback para renderizar o campo
        'secretaria-options', // Página na qual o campo será adicionado
        'gestor_adjunto', // Seção à qual o campo pertence
        [
            'label_for' => 'descricao_do_gestorAdjunto',
            'class' => 'secretaria_row',
            'secretaria_custom_data' => 'custom',
        ]
    );

    //navbar links-------------------------------------------------------------------------------------

    add_settings_section(
        'aSecretariaNavbarLinks', // ID da seção
        __('', 'secretaria'), // Título da seção
        'secretaria_section_links', // Função de callback para a descrição da seção
        'secretaria-options' // Página na qual a seção será adicionada
    );

    add_settings_field(
        'aSecretariaNavbarLinksOrganograma', // ID do campo
        __('Link do Organograma', 'secretaria'), // Rótulo do campo
        'aSecretariaNavbarLinksOrganograma', // Função de callback para renderizar o campo
        'secretaria-options', // Página na qual o campo será adicionado
        'aSecretariaNavbarLinks', // Seção à qual o campo pertence
        [
            'label_for' => 'LinksOrganograma',
            'class' => 'secretaria_row',
            'secretaria_custom_data' => 'custom',
        ]
    );

    add_settings_field(
        'aSecretariaNavbarLinksContratoDeGestao', // ID do campo
        __('Link do Contrato de Gestao', 'secretaria'), // Rótulo do campo
        'aSecretariaNavbarLinksContratoDeGestao', // Função de callback para renderizar o campo
        'secretaria-options', // Página na qual o campo será adicionado
        'aSecretariaNavbarLinks', // Seção à qual o campo pertence
        [
            'label_for' => 'LinksContratoDeGestao',
            'class' => 'secretaria_row',
            'secretaria_custom_data' => 'custom',
        ]
    );

    add_settings_field(
        'aSecretariaNavbarLinksPlanejamentoEstrategico', // ID do campo
        __('Link do Planejamento estrategico', 'secretaria'), // Rótulo do campo
        'aSecretariaNavbarLinksPlanejamentoEstrategico', // Função de callback para renderizar o campo
        'secretaria-options', // Página na qual o campo será adicionado
        'aSecretariaNavbarLinks', // Seção à qual o campo pertence
        [
            'label_for' => 'LinksPlanejamentoEstrategico',
            'class' => 'secretaria_row',
            'secretaria_custom_data' => 'custom',
        ]
    );
    //navbar main-------------------------------------------------------------------------------------

    add_settings_field(
        'aSecretariaMainCompetencias',
        __('Competências', 'secretaria'),
        'aSecretariaMainCompetencias',
        'secretaria-options',
        'aSecretariaNavbarLinks',
        [
            'label_for' => 'aSecretariaMainCompetencias',
            'class' => 'secretaria_row',
            'secretaria_custom_data' => 'custom',
        ]

    );
}
add_action('admin_init', 'secretaria_settings_init');



// funcao para deichar abrir a galeria de imagens
function secretaria_enqueue_media()
{
    wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'secretaria_enqueue_media');



// Função de callback para a descrição da seção gestor---------------------------------------------------------------------------------
function secretaria_section_developers_cb($args)
{
?>
    <h3 style="border-top: 2px solid #ffffff; padding-top: 10px"><?php esc_html_e('informacoes sobre o gestor', 'secretaria'); ?></h3>
<?php
}


// Função de callback para o campo de imagem
function secretario_field_image_cb($args)
{
    $options = get_option('secretaria_options', []);
?>
    <input type="text" id="<?php echo esc_attr($args['label_for']); ?>" name="secretaria_options[<?php echo esc_attr($args['label_for']); ?>]" value="<?php echo esc_attr($options[$args['label_for']] ?? ''); ?>">
    <button type="button" class="button secretaria_upload_image_button"><?php esc_html_e('Selecionar Imagem', 'secretaria'); ?></button>
    <p class="description">
        <?php esc_html_e('Insira a URL da imagem ou clique no botão para selecionar a imagem.', 'secretaria'); ?>
    </p>
    <script>
    jQuery(document).ready(function($) {
        $('.secretaria_upload_image_button').click(function(e) {
            e.preventDefault();
            var button = $(this);
            var custom_uploader = wp.media({
                    title: 'Selecionar Imagem',
                    button: {
                        text: 'Usar Imagem'
                    },
                    multiple: false
                })
                .on('select', function() {
                    var attachment = custom_uploader.state().get('selection').first().toJSON();
                    button.prev('input').val(attachment.url);
                })
                .open();
        });
    });
</script>
<?php
}


// Função de callback para o campo de texto
function secretaria_field_text_cb($args)
{
    $options = get_option('secretaria_options');
?>
    <textarea id="<?php echo esc_attr($args['label_for']); ?>" name="secretaria_options[<?php echo esc_attr($args['label_for']); ?>]" rows="5" cols="50"><?php echo esc_textarea($options[$args['label_for']] ?? ''); ?></textarea>
    <p class="description">
        <?php esc_html_e('Aqui sera a headline do gestor ', 'secretaria'); ?>
    </p>
<?php
}





// Função de callback para a descrição da seção gestor adjunto---------------------------------------------------------------------------------


function secretaria_section_gestor_adjunto($args)
{
?>
    <h3 style="border-top: 2px solid #ffffff; padding-top: 10px"><?php esc_html_e('informacoes sobre o gestor adjunto', 'secretaria'); ?></h3>
<?php
}

// Função de callback para o campo de imagem
function secretario_field_image_gestorAdgunto($args)
{
    $options = get_option('secretaria_options');
?>
    <input type="text" id="<?php echo esc_attr($args['label_for']); ?>" name="secretaria_options[<?php echo esc_attr($args['label_for']); ?>]" value="<?php echo esc_attr($options[$args['label_for']] ?? ''); ?>">

    <button type="button" class="button secretaria_upload_image_button"><?php esc_html_e('Selecionar Imagem', 'secretaria'); ?></button>
    <p class="description">
        <?php esc_html_e('Insira a URL da imagem ou clique no botão para selecionar a imagem.', 'secretaria'); ?>
    </p>
    <script>
        jQuery(document).ready(function($) {
            $('.secretaria_upload_image_button_gestorAdgunto').click(function(e) {
                e.preventDefault();
                var button = $(this);
                var custom_uploader = wp.media({
                        title: 'Selecionar Imagem',
                        button: {
                            text: 'Usar Imagem'
                        },
                        multiple: false
                    })
                    .on('select', function() {
                        var attachment = custom_uploader.state().get('selection').first().toJSON();
                        button.prev('input').val(attachment.url);
                    })
                    .open();
            });
        });
    </script>
<?php
}

// Função de callback para o campo de texto
function secretaria_field_text_gestorAdjunto($args)
{
    $options = get_option('secretaria_options');
?>
    <textarea id="<?php echo esc_attr($args['label_for']); ?>" name="secretaria_options[<?php echo esc_attr($args['label_for']); ?>]" rows="5" cols="50"><?php echo esc_textarea($options[$args['label_for']] ?? ''); ?></textarea>
    <p class="description">
        <?php esc_html_e('Aqui sera a headline do gestor adjunto', 'secretaria'); ?>
    </p>
<?php
}



// Função de callback para a descrição da seção links navbar---------------------------------------------------------------------------------
function secretaria_section_links($args)
{
?>
    <h3 style="border-top: 2px solid #ffffff; padding-top: 10px"><?php esc_html_e('Links Navbar', 'secretaria'); ?></h3>
<?php
}

// Função de callback para o campo link organograma

function aSecretariaNavbarLinksOrganograma($args)
{
    $options = get_option('secretaria_options');
?>
    <input type="text" id="<?php echo esc_attr($args['label_for']); ?>" name="secretaria_options[<?php echo esc_attr($args['label_for']); ?>]" value="<?php echo esc_attr($options[$args['label_for']] ?? ''); ?>">
    <p class="description">
        <?php esc_html_e('Insira link do organograma', 'secretaria'); ?>
    </p>
<?php
}

function aSecretariaNavbarLinksContratoDeGestao($args)
{
    $options = get_option('secretaria_options');
?>
    <input type="text" id="<?php echo esc_attr($args['label_for']); ?>" name="secretaria_options[<?php echo esc_attr($args['label_for']); ?>]" value="<?php echo esc_attr($options[$args['label_for']] ?? ''); ?>">
    <p class="description">
        <?php esc_html_e('Insira link do Contrato de gestão', 'secretaria'); ?>
    </p>
<?php
}


function aSecretariaNavbarLinksPlanejamentoEstrategico($args)
{
    $options = get_option('secretaria_options');
?>
    <input type="text" id="<?php echo esc_attr($args['label_for']); ?>" name="secretaria_options[<?php echo esc_attr($args['label_for']); ?>]" value="<?php echo esc_attr($options[$args['label_for']] ?? ''); ?>">
    <p class="description">
        <?php esc_html_e('Insira link do Planejamento estratégico', 'secretaria'); ?>
    </p>
<?php
}


// Função de callback para a descrição da seção a secretaria main---------------------------------------------------------------------------------
// Função de callback para adicionar campos de título e texto de competências
function aSecretariaMainCompetencias($args) {
    $options = get_option('secretaria_options');
    $field_id = esc_attr($args['label_for']);
    $field_name = 'secretaria_options[' . $field_id . ']';
    
    // Garante que $fields seja um array de arrays
    $fields = isset($options[$field_id]) && is_array($options[$field_id]) ? $options[$field_id] : [['title' => '', 'text' => '']];
    ?>
    <div id="secretaria_competencias_fields_container">
        <?php foreach ($fields as $index => $field): ?>
            <div class="secretaria_competencia_field">
                <label for="titulo_<?php echo $field_id . '_' . $index; ?>">Título da Competência:</label>
                <br/>
                <input type="text" id="titulo_<?php echo $field_id . '_' . $index; ?>" name="<?php echo $field_name . '[' . $index . '][title]'; ?>" value="<?php echo esc_attr($field['title']); ?>">
                <br/>
                <label for="text_<?php echo $field_id . '_' . $index; ?>">Texto da Competência:</label>
                <br/>
                <textarea id="text_<?php echo $field_id . '_' . $index; ?>" name="<?php echo $field_name . '[' . $index . '][text]'; ?>" rows="5" cols="50"><?php echo esc_textarea($field['text']); ?></textarea>
                <button type="button" class="button remove_competencia_button"><?php esc_html_e('Remover', 'secretaria'); ?></button>
                <br/><br/>
            </div>
        <?php endforeach; ?>
    </div>
    <button type="button" class="button add_competencia_button"><?php esc_html_e('Adicionar Nova Competência', 'secretaria'); ?></button>
    <p class="description">
        <?php esc_html_e('Insira o título e o texto para a competência. Clique em "Adicionar Nova Competência" para adicionar mais campos.', 'secretaria'); ?>
    </p>
    <script>
        jQuery(document).ready(function($) {
            var fieldIndex = <?php echo count($fields); ?>;
            $('.add_competencia_button').click(function(e) {
                e.preventDefault();
                var newFieldHTML = '<div class="secretaria_competencia_field">' +
                    '<label for="titulo_<?php echo $field_id; ?>_' + fieldIndex + '">Título da Competência:</label><br/>' +
                    '<input type="text" id="titulo_<?php echo $field_id; ?>_' + fieldIndex + '" name="<?php echo $field_name; ?>[' + fieldIndex + '][title]" value=""><br/>' +
                    '<label for="text_<?php echo $field_id; ?>_' + fieldIndex + '">Texto da Competência:</label><br/>' +
                    '<textarea id="text_<?php echo $field_id; ?>_' + fieldIndex + '" name="<?php echo $field_name; ?>[' + fieldIndex + '][text]" rows="5" cols="50"></textarea>' +
                    '<button type="button" class="button remove_competencia_button"><?php echo esc_html_e('Remover', 'secretaria'); ?></button><br/><br/>' +
                    '</div>';
                $('#secretaria_competencias_fields_container').append(newFieldHTML);
                fieldIndex++;
            });

            $(document).on('click', '.remove_competencia_button', function(e) {
                e.preventDefault();
                $(this).parent('.secretaria_competencia_field').remove();
            });
        });
    </script>
    <?php
}


