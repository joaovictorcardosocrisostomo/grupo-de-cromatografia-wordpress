<?php
// Lógica para puxar a logo branca correta no rodapé
$logo_footer = '';

if ( is_page('croma') ) {
    $logo_footer = 'logotipo labcroma branco.svg';
} elseif ( is_page('labitech') ) {
    $logo_footer = 'logotipo labitech branco.svg';
} elseif ( is_page('lanagua') ) {
    $logo_footer = 'logotipo lanagua branco.svg';
} elseif ( is_page('lat') ) {
    $logo_footer = 'logotipo lat branco.svg';
} elseif ( is_page('labpoa') ) {
    $logo_footer = 'logotipo labpoa branco.svg';
}
?>

    <footer>
      <div id="footer-div">
        
        <?php if ( is_front_page() || is_home() || is_page('equipe') || is_page('noticias') ) : ?>
            <div id="logoHeader">
              <div>
                <div class="logo"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/brand/logo labitech branco.svg" alt=""></div>
                <div class="logo"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/brand/logo lanagua branco.svg" alt=""></div>
                <div class="logo"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/brand/logo labpoa branco.svg" alt=""></div>
                <div class="logo"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/brand/logo labcroma branco.svg" alt=""></div>
                <div class="logo"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/brand/logo lat branco.svg" alt=""></div>
              </div>
            </div>
        <?php else : ?>
            <div class="footer-container">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/brand/<?php echo esc_attr( $logo_footer ); ?>" alt="Logo Rodapé" />
            </div>
        <?php endif; ?>

        <div class="footer-container"><p>Todos os direitos reservados</p></div>
        <div class="footer-container">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/brand/ufc-logo.svg" alt="UFC" class="logo-ufc"/>
        </div>
      </div>
    </footer>

    <div>
      <a href="#hero" class="devolta" aria-label="Retornar ao topo">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/icons/arrow-down.svg" alt="Seta subir" />
      </a>
    </div>

    <?php wp_footer(); ?>
  </body>
</html>