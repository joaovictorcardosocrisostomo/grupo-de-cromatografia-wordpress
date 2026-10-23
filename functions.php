<?php
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
    if (!isset($_POST['membro_nonce']) || !wp_verify_nonce($_POST['membro_nonce'], 'salvar_dados_membro')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    // Salva os links blindados contra injeção de código (esc_url_raw)
    if (isset($_POST['link_lattes'])) update_post_meta($post_id, 'link_lattes', esc_url_raw($_POST['link_lattes']));
    if (isset($_POST['link_orcid'])) update_post_meta($post_id, 'link_orcid', esc_url_raw($_POST['link_orcid']));
    if (isset($_POST['link_researchgate'])) update_post_meta($post_id, 'link_researchgate', esc_url_raw($_POST['link_researchgate']));

    // Pega a nossa Descrição customizada e devolve pro "excerpt" escondido do WP
    if (isset($_POST['membro_descricao'])) {
        remove_action('save_post', 'salvar_dados_membro'); // Evita que o WP entre num loop infinito salvando
        wp_update_post(array(
            'ID' => $post_id,
            'post_excerpt' => sanitize_textarea_field($_POST['membro_descricao'])
        ));
        add_action('save_post', 'salvar_dados_membro');
    }
}

/* // GATILHO: Só roda se colocar ?importar_equipe=sim na URL
if ( isset($_GET['importar_equipe']) && $_GET['importar_equipe'] == 'sim' ) {
    add_action('init', 'importacao_magica_membros_cromatografia', 99);
}

function importacao_magica_membros_cromatografia() {
    
    // Evita duplicidade criando as categorias primeiro
    $cargos = ['coordenador', 'pesquisador', 'doutorando', 'mestrando', 'iniciacao-cientifica', 'alumni-doutorado', 'alumni-mestrado', 'alumni-ic'];
    foreach($cargos as $cargo) {
        if(!term_exists($cargo, 'cargo')) { wp_insert_term($cargo, 'cargo'); }
    }

    // 1. O BANCO DE DADOS EXTRAÍDO DO SEU HTML
    $equipe = [
        // COORDENADORES
        ['nome' => 'Ronaldo Ferreira do Nascimento', 'desc' => 'Professor do Departamento de Físico-Química e Química Analítica', 'cargo' => 'coordenador', 'img' => 'ronaldo.jpg', 'rg' => 'https://www.researchgate.net/profile/Ronaldo-Do-Nascimento-2', 'lattes' => 'http://lattes.cnpq.br/6345440666273561', 'orcid' => 'https://orcid.org/0000-0002-6393-6944'],
        ['nome' => 'Francisco Belmino Romero', 'desc' => 'Professor do Departamento de Físico-Química e Química Analítica', 'cargo' => 'coordenador', 'img' => 'belmino.jpg', 'rg' => 'https://www.researchgate.net/profile/Francisco-Romero-29', 'lattes' => 'http://lattes.cnpq.br/6859342900447012', 'orcid' => ''],
        ['nome' => 'Jhonyson Arruda C. Guedes', 'desc' => 'Professor do Departamento de Físico-Química e Química Analítica', 'cargo' => 'coordenador', 'img' => 'jhony.jpg', 'rg' => 'https://www.researchgate.net/profile/Jhonyson-Guedes', 'lattes' => 'http://lattes.cnpq.br/2704350967341344', 'orcid' => 'https://orcid.org/0000-0002-8317-9338'],
        
        // PESQUISADORES
        ['nome' => 'Jefferson Pereira Ribeiro', 'desc' => 'Engenharia Cívil', 'cargo' => 'pesquisador', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => ''],
        ['nome' => 'Juliene Tomé Oliveira', 'desc' => 'Química Analítica', 'cargo' => 'pesquisador', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => ''],
        ['nome' => 'Eliezer Fares Abdala Neto', 'desc' => 'Engenharia Cívil', 'cargo' => 'pesquisador', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => ''],
        ['nome' => 'Rouse da Silva Costa', 'desc' => 'Química Analítica', 'cargo' => 'pesquisador', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => ''],
        ['nome' => 'Tatiana Sainara Maia Fernandes', 'desc' => 'Engenharia Civil (Saneamento Ambiental)', 'cargo' => 'pesquisador', 'img' => 'tatiana.jpg', 'rg' => 'https://www.researchgate.net/profile/T-Fernandes-2/research', 'lattes' => 'http://lattes.cnpq.br/0550193077852389', 'orcid' => 'http://orcid.org/0000-0003-2961-5124'],
        ['nome' => 'Carlos Emanuel de Carvalho Magalhães', 'desc' => 'Química Analítica', 'cargo' => 'pesquisador', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => ''],
        ['nome' => 'Vicente de Oliveira Sousa Neto', 'desc' => 'Química Analítica', 'cargo' => 'pesquisador', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => ''],

        // DOUTORANDOS
        ['nome' => 'Luiz Thiago Vasconcelos da Silva', 'desc' => 'Química Analítica', 'cargo' => 'doutorando', 'img' => 'thiago.jpg', 'rg' => 'https://www.researchgate.net/profile/Luiz-Silva-21?ev=hdr_xprf', 'lattes' => 'http://lattes.cnpq.br/9563890892291290', 'orcid' => 'https://orcid.org/0000-0001-5744-8808'],
        ['nome' => 'Taís Coutinho Parente', 'desc' => 'Química Analítica', 'cargo' => 'doutorando', 'img' => 'tais.jpg', 'rg' => 'https://www.researchgate.net/profile/Tais-Parente-2', 'lattes' => 'http://lattes.cnpq.br/8732749280814591', 'orcid' => 'https://orcid.org/0000-0002-9472-8187?lang=en'],
        ['nome' => 'Joaquim Rodrigues de V. Neto', 'desc' => 'Química Analítica', 'cargo' => 'doutorando', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => ''],
        ['nome' => 'Maxwell Lima Maia', 'desc' => 'Química Analítica', 'cargo' => 'doutorando', 'img' => 'maxwell.jpg', 'rg' => 'https://www.researchgate.net/profile/Maxwell-Maia', 'lattes' => 'http://lattes.cnpq.br/4355416753873276', 'orcid' => 'https://orcid.org/0000-0001-6998-6013'],
        ['nome' => 'Jéssica Beserra Alexandre', 'desc' => 'Engenharia Civil', 'cargo' => 'doutorando', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => ''],
        ['nome' => 'Josalia Liberato Rebouças Menezes', 'desc' => 'Química Analítica', 'cargo' => 'doutorando', 'img' => 'josalia.jpg', 'rg' => 'https://www.researchgate.net/profile/Josalia-Liberato', 'lattes' => 'http://lattes.cnpq.br/1049345421748282', 'orcid' => 'https://orcid.org/0000-0002-3725-5424'],
        ['nome' => 'Maria Zillene Franklin da Silva Oliveira', 'desc' => 'Engenharia Civil', 'cargo' => 'doutorando', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => ''],

        // MESTRANDOS
        ['nome' => 'Willon Lessa Santos', 'desc' => 'Química Analítica', 'cargo' => 'mestrando', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => ''],
        ['nome' => 'Bruno', 'desc' => 'Química Analítica', 'cargo' => 'mestrando', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => ''],
        ['nome' => 'Patrícia de Sousa Queiroz', 'desc' => 'Química Analítica', 'cargo' => 'mestrando', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => ''],

        // INICIAÇÃO CIENTÍFICA
        ['nome' => 'Américo Vitor M. Barbosa', 'desc' => 'Ciência da Computação', 'cargo' => 'iniciacao-cientifica', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => ''],
        ['nome' => 'Bruce Eduardo Lopes Silva', 'desc' => 'Engenharia Química', 'cargo' => 'iniciacao-cientifica', 'img' => 'bruce.jpg', 'rg' => 'https://www.researchgate.net/profile/Bruce-Eduardo-Lopes-Silva', 'lattes' => 'http://lattes.cnpq.br/7758403000769172', 'orcid' => 'https://orcid.org/0009-0002-4146-666X'],
        ['nome' => 'Davi Araújo Barros', 'desc' => 'Química', 'cargo' => 'iniciacao-cientifica', 'img' => 'davi.jpg', 'rg' => 'https://www.researchgate.net/profile/Davi-Barros-5/research', 'lattes' => 'http://lattes.cnpq.br/0414619811884175', 'orcid' => 'https://orcid.org/0009-0001-0412-5586'],
        ['nome' => 'Elizabeth F. de Carvalho', 'desc' => 'Engenharia de Energias Renováveis', 'cargo' => 'iniciacao-cientifica', 'img' => 'elizabeth.jpg', 'rg' => '', 'lattes' => 'http://lattes.cnpq.br/0056891490329813', 'orcid' => 'https://orcid.org/0009-0005-1926-5089'],
        ['nome' => 'Inácio Cruz de Loiola', 'desc' => 'Engenharia Química', 'cargo' => 'iniciacao-cientifica', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => ''],
        ['nome' => 'João Victor C. Crisóstomo', 'desc' => 'Química', 'cargo' => 'iniciacao-cientifica', 'img' => 'joao-victor.jpg', 'rg' => 'https://www.researchgate.net/profile/Joao-Cardoso-Crisostomo', 'lattes' => 'http://lattes.cnpq.br/0194067679161324', 'orcid' => 'https://orcid.org/0009-0004-6907-5315'],
        ['nome' => 'Karolina Oliveira Ferreira', 'desc' => 'Engenharia de Energias Renováveis', 'cargo' => 'iniciacao-cientifica', 'img' => 'karol.jpg', 'rg' => 'https://share.google/JzWdqPBw9syOLSsQc', 'lattes' => 'http://lattes.cnpq.br/8142090116056788', 'orcid' => 'https://orcid.org/0009-0006-0302-2813'],
        ['nome' => 'Lara Silva Feitosa', 'desc' => 'Engenharia Química', 'cargo' => 'iniciacao-cientifica', 'img' => 'lara.jpg', 'rg' => '', 'lattes' => 'http://lattes.cnpq.br/0724902226351436', 'orcid' => ''],
        ['nome' => 'Maria Letícia G. de Matos', 'desc' => 'Química', 'cargo' => 'iniciacao-cientifica', 'img' => '', 'rg' => 'https://www.researchgate.net/profile/Leticia-Matos-3', 'lattes' => 'https://lattes.cnpq.br/2395612011271240', 'orcid' => 'https://orcid.org/0009-0005-2862-3255'],
        ['nome' => 'Lívia Melchert Aquino', 'desc' => 'Química', 'cargo' => 'iniciacao-cientifica', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => ''],
        ['nome' => 'Lucas Alexandre Nobre', 'desc' => 'Química', 'cargo' => 'iniciacao-cientifica', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => ''],
        ['nome' => 'Pedro J. O. Nascimento', 'desc' => 'Química', 'cargo' => 'iniciacao-cientifica', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => ''],
        ['nome' => 'Sara', 'desc' => 'Engenharia Química', 'cargo' => 'iniciacao-cientifica', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => ''],
        ['nome' => 'Iuri Marques de Melo', 'desc' => 'Química', 'cargo' => 'iniciacao-cientifica', 'img' => 'iuri.jpg', 'rg' => 'https://www.researchgate.net/profile/Iuri-De-Melo', 'lattes' => 'https://lattes.cnpq.br/3737405149514469', 'orcid' => 'https://orcid.org/0009-0002-3895-6123'],

        // ALUMNI DOUTORADO (Amostra para o script)
        ['nome' => 'Iara Jennifer M. Duarte', 'desc' => 'Engenharia Civil (2024)', 'cargo' => 'alumni-doutorado', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => ''],
        ['nome' => 'Hélio O. do Nascimento', 'desc' => 'Química Analítica (2023)', 'cargo' => 'alumni-doutorado', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => ''],
        ['nome' => 'Weslenn M. da Costa', 'desc' => 'Engenharia Cívil (2022)', 'cargo' => 'alumni-doutorado', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => ''],
        ['nome' => 'Liana Geisa C. Maia', 'desc' => 'Engenharia Cívil (2021)', 'cargo' => 'alumni-doutorado', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => ''],
        
        // ALUMNI MESTRADO E IC (Amostra para o script)
        ['nome' => 'Ricardo Jadson da S. Nascimento', 'desc' => 'Química Analítica (2025)', 'cargo' => 'alumni-mestrado', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => ''],
        ['nome' => 'Mário Rodrigues de L. Neto', 'desc' => 'Engenharia de Alimentos', 'cargo' => 'alumni-ic', 'img' => '', 'rg' => '', 'lattes' => '', 'orcid' => '']
    ];

    // Inclui as bibliotecas do WP para processar imagens
    require_once( ABSPATH . 'wp-admin/includes/image.php' );
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
    require_once( ABSPATH . 'wp-admin/includes/media.php' );

    // 2. O LOOP QUE FAZ O TRABALHO SUJO
    foreach ($equipe as $membro) {
        
        // Verifica se o membro já existe pelo título para não duplicar
        $existe = get_page_by_title($membro['nome'], OBJECT, 'membro');
        
        if ( !$existe ) {
            // Cria a página do membro no painel
            $post_id = wp_insert_post([
                'post_title'   => $membro['nome'],
                'post_excerpt' => $membro['desc'],
                'post_type'    => 'membro',
                'post_status'  => 'publish'
            ]);

            // Atribui a categoria (cargo)
            wp_set_object_terms($post_id, $membro['cargo'], 'cargo');

            // Salva os links nos Custom Fields
            if (!empty($membro['lattes'])) { update_post_meta($post_id, 'link_lattes', $membro['lattes']); }
            if (!empty($membro['orcid'])) { update_post_meta($post_id, 'link_orcid', $membro['orcid']); }
            if (!empty($membro['rg'])) { update_post_meta($post_id, 'link_researchgate', $membro['rg']); }

            // 3. A MÁGICA DA IMAGEM: Extrai da sua pasta do tema e joga na Biblioteca do WP
            if ( !empty($membro['img']) ) {
                $image_path = get_template_directory() . '/assets/img/members/' . $membro['img'];
                
                if ( file_exists($image_path) ) {
                    // Copia o arquivo físico
                    $upload_file = wp_upload_bits( $membro['img'], null, file_get_contents($image_path) );
                    
                    if ( !$upload_file['error'] ) {
                        $wp_filetype = wp_check_filetype( $membro['img'], null );
                        $attachment = array(
                            'post_mime_type' => $wp_filetype['type'],
                            'post_title'     => sanitize_file_name( $membro['img'] ),
                            'post_content'   => '',
                            'post_status'    => 'inherit'
                        );
                        // Insere no banco de dados da Mídia
                        $attach_id = wp_insert_attachment( $attachment, $upload_file['file'], $post_id );
                        // Gera os tamanhos (Thumbnail, Medium, Large)
                        $attach_data = wp_generate_attachment_metadata( $attach_id, $upload_file['file'] );
                        wp_update_attachment_metadata( $attach_id, $attach_data );
                        // Define como a Imagem Destacada do membro!
                        set_post_thumbnail( $post_id, $attach_id );
                    }
                }
            }
        }
    }
    
    // Mostra um aviso na tela e para o carregamento para você saber que deu certo
    die('<h1>Sucesso!</h1><p>Todos os membros, cargos, links e FOTOS foram importados pro painel. <br><b>ATENÇÃO: Vá no functions.php agora mesmo e APAGUE esse script!</b></p>');
} */
?>