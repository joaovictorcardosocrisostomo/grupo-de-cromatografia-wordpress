<?php get_header(); ?>

    <section id="noticias" style="padding-top: 6rem;">
      <div class="noticias-container">
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h2 class="titulo-noticias" style="margin-bottom: 0;">Notícias</h2>
            
            <div id="filtro-data">
              <ul class="menu" style="list-style: none; padding: 0; margin: 0;">
                <li class="dropdown-pai" style="position: relative;">
                  <a href="#" style="cursor: pointer; font-weight: bold; text-decoration: none;">Filtrar por Ano ▾</a>
                  <ul class="dropdown-gaveta" id="ano-filter-dropdown" style="right: 0; left: auto;">
                    <li><a href="#" class="filter-btn" data-filter="all">Todos</a></li>
                    
                    <?php
                    // MÁGICA: Puxa do banco de dados apenas os anos que possuem notícias publicadas
                    global $wpdb;
                    $anos_publicados = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY post_date DESC");
                    
                    foreach($anos_publicados as $ano_filtro) {
                        echo '<li><a href="#" class="filter-btn" data-filter="' . esc_attr( $ano_filtro ) . '">' . esc_html( $ano_filtro ) . '</a></li>';
                    }
                    ?>
                    
                  </ul>
                </li>
              </ul>
            </div>
            </div>
        
        <?php 
        // 1. CONFIGURANDO A BUSCA
        $args_noticias = array(
            'post_type' => 'post',
            'posts_per_page' => -1 
        );
        $busca_noticias = new WP_Query( $args_noticias );

        // 2. INÍCIO DO LOOP
        if ( $busca_noticias->have_posts() ) : 
            
            $ano_atual = '';

            while ( $busca_noticias->have_posts() ) : $busca_noticias->the_post(); 
                
                $ano_da_noticia = get_the_date('Y'); 

                // 3. AGRUPAMENTO POR ANO
                if ( $ano_da_noticia != $ano_atual ) {
                    if ( $ano_atual != '' ) {
                        echo '</div>'; // Fecha o noticias-content anterior
                    }
                    $ano_atual = $ano_da_noticia;
                    ?>
                    <h3 class="noticia-year-section" data-year="<?php echo esc_attr( $ano_atual ); ?>"><?php echo esc_html( $ano_atual ); ?></h3>
                    <div class="noticias-content" data-year="<?php echo esc_attr( $ano_atual ); ?>">
                    <?php
                }
                ?>
          
                <div class="noticia-card" data-year="<?php echo esc_attr( $ano_atual ); ?>">
                  <div class="noticia-imagem">
                    <?php 
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail('large'); 
                    } else {
                        echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/img/brand/logotipo-v2.svg" alt="Sem imagem" />';
                    }
                    ?>
                  </div>
                  
                  <h3><?php the_title(); ?></h3>
                  <?php the_excerpt(); ?>
                  <a href="<?php the_permalink(); ?>">Leia mais</a>
                </div>

          <?php 
            endwhile; 
            
            echo '</div>'; // Fecha a última gaveta de notícias
            wp_reset_postdata(); 
            
        else : 
        ?>
            <div class="noticias-content">
                <p>Nenhuma notícia encontrada.</p>
            </div>
        <?php endif; ?>

      </div>
    </section>

<?php get_footer(); ?>