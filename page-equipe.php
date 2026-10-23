<?php get_header(); ?>
    
    <section class="members-section">
        <div class="sectionTitle"><h1 class="section-title">Nossos membros</h1></div>

        <?php
        // FUNÇÃO INTELIGENTE: Lê o banco de dados e monta o HTML do card automaticamente
        function renderizar_membros($slug_cargo, $tipo_card = 'member-card', $tag_wrapper = 'li') {
            // Whitelist: estes valores viram nome de tag/classe HTML
            if ( ! in_array( $tag_wrapper, array( 'li', 'div' ), true ) ) { $tag_wrapper = 'li'; }
            $tipo_card = sanitize_html_class( $tipo_card );

            $args = array(
                'post_type' => 'membro',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'cargo',
                        'field'    => 'slug',
                        'terms'    => $slug_cargo,
                    ),
                ),
            );
            $query = new WP_Query($args);

            if ( $query->have_posts() ) :
                while ( $query->have_posts() ) : $query->the_post();
                    // Puxa os links customizados
                    $lattes = get_post_meta(get_the_ID(), 'link_lattes', true);
                    $orcid = get_post_meta(get_the_ID(), 'link_orcid', true);
                    $rg = get_post_meta(get_the_ID(), 'link_researchgate', true);
                    ?>
                    
                    <<?php echo $tag_wrapper; ?> class="<?php echo esc_attr( $tipo_card ); ?>">
                        <div class="member-photo">
                            <?php if ( has_post_thumbnail() ) { the_post_thumbnail('medium'); } ?>
                        </div>
                        <div class="member-info">
                            <h3 class="member-name"><?php the_title(); ?></h3>
                            
                            <div class="member-description"><?php echo esc_html( get_the_excerpt() ); ?></div>
                            
                            <div class="member-contact">
                                <?php if(!empty($rg)) : ?>
                                    <a class="contact-icon email" title="ResearchGate" href="<?php echo esc_url($rg); ?>" target="_blank" rel="noopener noreferrer"></a>
                                <?php endif; ?>
                                
                                <?php if(!empty($lattes)) : ?>
                                    <a class="contact-icon cv" title="Lattes" href="<?php echo esc_url($lattes); ?>" target="_blank" rel="noopener noreferrer"></a>
                                <?php endif; ?>
                                
                                <?php if(!empty($orcid)) : ?>
                                    <a class="contact-icon lattes" title="Orcid" href="<?php echo esc_url($orcid); ?>" target="_blank" rel="noopener noreferrer"></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </<?php echo $tag_wrapper; ?>>
                    
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
        }
        ?>

        <h2 class="category-title" id="Coordenadores">Coordenadores</h2>
        <ul class="c-grid">
            <?php renderizar_membros('coordenador'); ?>
        </ul>
            
        <h2 class="category-title" id="Pesquisadores">Pesquisadores</h2>
        <ul class="p-grid">
            <?php renderizar_membros('pesquisador'); ?>
        </ul>

        <h2 class="category-title" id="Doutorando">Doutorando</h2>
        <ul class="d-grid">
            <?php renderizar_membros('doutorando'); ?>
        </ul>

        <h2 class="category-title" id="Mestrando">Mestrando</h2>
        <ul class="m-grid">
            <?php renderizar_membros('mestrando'); ?>
        </ul>

        <h2 class="category-title" id="IniciaçãoCientífica">Iniciação Científica</h2>
        <ul class="ic-grid">
            <?php renderizar_membros('iniciacao-cientifica'); ?>
        </ul>
        
        <br>
        
        <div id="Alumni" class="sectionTitle"><h1 class="section-title">Alumni</h1></div>
        <ul class="alumni-grid">
            <div class="al-dout">
                <h2 class="category-title">Doutorado</h2>
                <?php renderizar_membros('alumni-doutorado', 'info-grid', 'div'); ?>
            </div>  

            <br>

            <div class="al-mest">
                <h2 class="category-title">Mestrado</h2>
                <?php renderizar_membros('alumni-mestrado', 'info-grid', 'div'); ?>
            </div>

            <br>

            <div class="al-ics">
                <h2 class="category-title">Iniciação Científica</h2>
                <?php renderizar_membros('alumni-ic', 'info-grid', 'div'); ?>
            </div>
        </ul>
    </section>
    
<?php get_footer(); ?>