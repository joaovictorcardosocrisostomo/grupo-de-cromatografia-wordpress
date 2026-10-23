<?php
// Impede acesso direto ao arquivo fora do WordPress
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Função para carregar os scripts e estilos
function carregar_scripts_cromatografia() {
    // 1. Carregando as Fontes do Google (Material Symbols)
    wp_enqueue_style('material-icons', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined', array(), null);

    // 2. Carregando os CSS da pasta assets/css
    wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), '1.0');
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0');
    wp_enqueue_style('temas-style', get_template_directory_uri() . '/assets/css/temas.css', array('main-style'), '1.0');

    // 3. Carregando os JS da pasta assets/js
    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), '1.0', true);
    wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/script.js', array('swiper-js'), '1.0', true);
    wp_enqueue_script('menu-script', get_template_directory_uri() . '/assets/js/script-menu.js', array(), '1.0', true);
}
// Avisa o WP para rodar a função acima na hora de montar o cabeçalho
add_action('wp_enqueue_scripts', 'carregar_scripts_cromatografia');

// Habilitar recursos essenciais do WordPress
function cromatografia_config() {
    add_theme_support('title-tag'); 
    add_theme_support('post-thumbnails'); 
}
add_action('after_setup_theme', 'cromatografia_config');

// --- função de membros ---
// 1. Registrar o Menu de Membros 
function registrar_cpt_membros() {
    register_post_type('membro', array(
        'labels' => array(
            'name' => 'Membros',
            'singular_name' => 'Membro',
            'add_new' => 'Adicionar Novo Membro',
            'add_new_item' => 'Adicionar Novo Membro'
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-groups',
        // A MÁGICA 1: Tiramos 'excerpt' e 'custom-fields' do final desta linha!
        'supports' => array('title', 'thumbnail')
    ));

    register_taxonomy('cargo', 'membro', array(
        'labels' => array('name' => 'Cargos', 'singular_name' => 'Cargo'),
        'hierarchical' => true,
        'show_admin_column' => true
    ));
}
add_action('init', 'registrar_cpt_membros');

// 2. Criar a nossa "Caixinha" customizada, bonita e com instruções claras
add_action('add_meta_boxes', 'adicionar_metabox_membros');
function adicionar_metabox_membros() {
    add_meta_box(
        'dados_membro', // ID
        'Informações do Membro', // Título da caixinha no painel
        'renderizar_metabox_membros', // Função que desenha o HTML
        'membro', // Onde vai aparecer
        'normal',
        'high'
    );
}

// 3. Desenhar os campos na tela
function renderizar_metabox_membros($post) {
    // Segurança do WordPress
    wp_nonce_field('salvar_dados_membro', 'membro_nonce');

    // Puxa os dados que o seu HTML antigo já tinha salvo no banco de dados!
    $descricao = $post->post_excerpt;
    $lattes = get_post_meta($post->ID, 'link_lattes', true);
    $orcid = get_post_meta($post->ID, 'link_orcid', true);
    $rg = get_post_meta($post->ID, 'link_researchgate', true);

    // O HTML da nossa nova interface
    echo '<div style="display: flex; flex-direction: column; gap: 15px; margin-top: 10px;">';
    
    echo '<div>';
    echo '<label style="font-weight: bold; display: block; margin-bottom: 5px;">Descrição / Atuação (Ex: Professor do Departamento...)</label>';
    echo '<textarea name="membro_descricao" rows="3" style="width: 100%;">' . esc_textarea($descricao) . '</textarea>';
    echo '</div>';

    echo '<div>';
    echo '<label style="font-weight: bold; display: block; margin-bottom: 5px;">Link do Lattes</label>';
    echo '<input type="url" name="link_lattes" value="' . esc_attr($lattes) . '" style="width: 100%;" placeholder="http://lattes.cnpq.br/..." />';
    echo '</div>';

    echo '<div>';
    echo '<label style="font-weight: bold; display: block; margin-bottom: 5px;">Link do ORCID</label>';
    echo '<input type="url" name="link_orcid" value="' . esc_attr($orcid) . '" style="width: 100%;" placeholder="https://orcid.org/..." />';
    echo '</div>';

    echo '<div>';
    echo '<label style="font-weight: bold; display: block; margin-bottom: 5px;">Link do ResearchGate</label>';
    echo '<input type="url" name="link_researchgate" value="' . esc_attr($rg) . '" style="width: 100%;" placeholder="https://www.researchgate.net/..." />';
    echo '</div>';
    
    echo '</div>';
}

// 4. Salvar os dados quando a STI clicar em "Publicar" ou "Atualizar"
add_action('save_post', 'salvar_dados_membro');
function salvar_dados_membro($post_id) {
    if (!isset($_POST['membro_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['membro_nonce'])), 'salvar_dados_membro')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (wp_is_post_revision($post_id)) return;
    if (get_post_type($post_id) !== 'membro') return;
    if (!current_user_can('edit_post', $post_id)) return;

    // Salva os links blindados contra injeção de código (esc_url_raw)
    if (isset($_POST['link_lattes'])) update_post_meta($post_id, 'link_lattes', esc_url_raw(wp_unslash($_POST['link_lattes'])));
    if (isset($_POST['link_orcid'])) update_post_meta($post_id, 'link_orcid', esc_url_raw(wp_unslash($_POST['link_orcid'])));
    if (isset($_POST['link_researchgate'])) update_post_meta($post_id, 'link_researchgate', esc_url_raw(wp_unslash($_POST['link_researchgate'])));

    // Pega a nossa Descrição customizada e devolve pro "excerpt" escondido do WP
    if (isset($_POST['membro_descricao'])) {
        remove_action('save_post', 'salvar_dados_membro'); // Evita que o WP entre num loop infinito salvando
        wp_update_post(array(
            'ID' => $post_id,
            'post_excerpt' => sanitize_textarea_field(wp_unslash($_POST['membro_descricao']))
        ));
        add_action('save_post', 'salvar_dados_membro');
    }
}

// A importação em massa de membros fica em tools/importação.php (fora do tema carregado pelo WP).
?>