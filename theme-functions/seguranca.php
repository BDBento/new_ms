<?php
 
  // retira checkbox de senha fraca
  function worldless_custom_script() {
	?>
		<script>
			jQuery(document).ready(function() {
				jQuery('.pw-weak').remove();
			});
		</script>
	<?php
}
add_action('admin_head','worldless_custom_script');

function worldless_login_custom_script() {
	?>
		<script>
			document.addEventListener("DOMContentLoaded", function(event) { 
				var elements = document.getElementsByClassName('pw-weak');
				console.log(elements);
				var requiredElement = elements[0];
				requiredElement.remove();
			});
		</script>
	<?php
}
add_action('login_enqueue_scripts','worldless_login_custom_script');

// adiciona verificacao de duas etapas
add_filter(
    'two_factor_enabled_providers_for_user',
    function ($providers) {
        if (empty($providers) && class_exists('Two_Factor_Email')) {
            $providers[] = 'Two_Factor_Email';
        }

        return $providers;
    }
);

// esconde a versao do wordpress
function dartcreations_remove_version()
{
    return '';
}
add_filter('the_generator', 'dartcreations_remove_version');
remove_action('wp_head', 'wp_generator');



add_action('init', 'bloquear_caminho_wp_json', 1);

function bloquear_caminho_wp_json() {
    $url = $_SERVER['REQUEST_URI'];
    if (strpos($url, '/wp-json/wp/v2/users') !== false) {
        wp_die('Acesso negado.', 'Acesso negado', array('response' => 403));
    }
}



//------------------------------------------------------------------------------------------------------------------

// Desativa os comentários em posts e páginas novos por padrão
function disable_comments_post_types_support() {
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'disable_comments_post_types_support');

// Fecha os comentários em posts e páginas antigos
function disable_comments_status() {
    return false;
}
add_filter('comments_open', 'disable_comments_status', 20, 2);
add_filter('pings_open', 'disable_comments_status', 20, 2);

// Oculta o campo de comentários na página de edição de posts e páginas
function disable_comments_hide_existing_comments($comments) {
    $comments = array();
    return $comments;
}
add_filter('comments_array', 'disable_comments_hide_existing_comments', 10, 2);

// Remove o menu de comentários do painel de administração
function disable_comments_admin_menu() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'disable_comments_admin_menu');

// Remove widgets de comentários do dashboard
function disable_comments_dashboard() {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'disable_comments_dashboard');

// Remove o item de comentários na barra de administração
function disable_comments_admin_bar() {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
}
add_action('init', 'disable_comments_admin_bar');
