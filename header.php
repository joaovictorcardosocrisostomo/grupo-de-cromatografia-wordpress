<?php
// 1. Variáveis Padrão
$tema_css = 'dark-blue';
$logo_img = '';
$nome_lab = 'Grupo de Cromatografia';

// 2. O Radar do WordPress: Descobrindo em qual página estamos
if ( is_page('croma') ) {
    $tema_css = 'orange';
    $logo_img = 'logo labcroma colorido.svg';
    $nome_lab = 'LabCroma';
} elseif ( is_page('labitech') ) {
    $tema_css = 'green';
    $logo_img = 'logo labitech colorido.svg';
    $nome_lab = 'Labitech';
} elseif ( is_page('lanagua') ) {
    $tema_css = 'light-blue';
    $logo_img = 'logo lanagua colorido.svg';
    $nome_lab = 'Lanagua';
} elseif ( is_page('lat') ) {
    $tema_css = 'red';
    $logo_img = 'logo lat colorido.svg';
    $nome_lab = 'LAT';
} elseif ( is_page('labpoa') ) {
    $tema_css = 'dark-blue';
    $logo_img = 'logotipo labpoa colorido.svg';
    $nome_lab = ''; 
} elseif ( is_front_page() ) {
    // 1º: A Landing Page principal (A prioridade máxima)
    $tema_css = 'dark-blue';
    $logo_img = ''; 
    $nome_lab = 'Grupo de Cromatografia';

} elseif ( is_page('noticias') ) { 
    // 2º: A página real de notícias
    $tema_css = 'dark-blue';
    $logo_img = ''; 
    $nome_lab = 'Notícias';
    
} elseif ( is_page('equipe') ) { 
    // 2º: A página real de notícias
    $tema_css = 'dark-blue';
    $logo_img = ''; 
    $nome_lab = 'Equipe';
}
?>
<!DOCTYPE html>
<html lang="pt-BR" data-theme="<?php echo esc_attr( $tema_css ); ?>">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/brand/favicon.svg" />
    
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header id="header-div">
      <div class="container">
        <div class="header-content">
          <div id="logoHeader">
            
            <?php if ( is_front_page() ) : ?>
                <div><h2><?php echo esc_html( $nome_lab ); ?></h2></div>
                
            <?php elseif ( is_page('noticias') ) : ?>
                <div><h1 style="font-weight: bold;"><?php echo esc_html( $nome_lab ); ?></h1></div>

            <?php elseif ( is_page('equipe') ) : ?>
                <div><h1 style="font-weight: bold;"><?php echo esc_html( $nome_lab ); ?></h1></div>
                
            <?php else : ?>
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/brand/<?php echo esc_attr( $logo_img ); ?>" alt="Logo <?php echo esc_attr( $nome_lab ); ?>" class="logo">
                <h1><?php echo esc_html( $nome_lab ); ?></h1>
            <?php endif; ?>

          </div>
          <button class="mobile-menu-btn">☰</button>
          <div id="menuHeader">
            <ul class="menu">
              <li><a href="<?php echo esc_url( home_url() ); ?>">Início</a></li>

              <li class="dropdown-pai">
                <a href="<?php echo esc_url( home_url() ); ?>#noticias">Notícias</a>
                <ul class="dropdown-gaveta">
                  <li><a href="<?php echo esc_url( home_url() ); ?>#noticias">Recentes</a></li>
                  <li><a href="<?php echo esc_url( home_url('/noticias') ); ?>">Todas</a></li>
                </ul>
              </li>
              
              <li class="dropdown-pai">
                <a href="<?php echo esc_url( home_url() ); ?>#linhasPesquisa">Pesquisas</a>
                <ul class="dropdown-gaveta">
                  <li><a href="<?php echo esc_url( home_url('/labpoa') ); ?>">LabPOA</a></li>
                  <li><a href="<?php echo esc_url( home_url('/lat') ); ?>">LAT</a></li>
                  <li><a href="<?php echo esc_url( home_url('/lanagua') ); ?>">Lanagua</a></li>
                  <li><a href="<?php echo esc_url( home_url('/croma') ); ?>">LabCroma</a></li>
                  <li><a href="<?php echo esc_url( home_url('/labitech') ); ?>">LabItech</a></li>
                </ul>
              </li>
              <li><a href="<?php echo esc_url( home_url() ); ?>#publicacoes">Publicações</a></li>
              <li class="dropdown-pai">
                <a href="<?php echo esc_url( home_url() ); ?>#coordenacao">Membros</a>
                <ul class="dropdown-gaveta">
                  <li><a href="<?php echo esc_url( home_url() ); ?>#coordenacao">Coordenação</a></li>
                  <li><a href="<?php echo esc_url( home_url('/equipe') ); ?>">Outros</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>
    <hr />