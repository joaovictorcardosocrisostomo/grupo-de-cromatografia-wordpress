<?php get_header(); ?>

    <section id="noticia-aberta" style="padding-top: 8rem; padding-bottom: 4rem; min-height: 60vh;">
      <div class="container" style="max-width: 800px; margin: 0 auto; padding: 0 20px;">
        
        <?php 
        // O Loop padrão do WordPress para a página única
        if ( have_posts() ) : 
          while ( have_posts() ) : the_post(); 
        ?>
        
          <h1 style="color: var(--primary-dark); font-family: 'Outfit', sans-serif; font-size: clamp(2rem, 4vw, 2.5rem); margin-bottom: 1rem; line-height: 1.2;">
            <?php the_title(); ?>
          </h1>
          
          <div class="meta-noticia" style="color: var(--text-medium); margin-bottom: 2rem; font-size: 0.95rem;">
            Publicado em: <strong><?php echo esc_html( get_the_date() ); ?></strong>
          </div>

          <?php if ( has_post_thumbnail() ) : ?>
            <div class="imagem-destacada" style="margin-bottom: 2.5rem; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
              <?php the_post_thumbnail('large', ['style' => 'width: 100%; height: auto; display: block; object-fit: cover; max-height: 450px;']); ?>
            </div>
          <?php endif; ?>

          <div class="conteudo-noticia" style="line-height: 1.8; color: var(--text-dark); font-size: 1.1rem; text-align: justify;">
            <?php the_content(); ?>
          </div>

        <?php 
          endwhile; 
        endif; 
        ?>
        
        <div style="margin-top: 4rem; border-top: 1px solid var(--border-color); padding-top: 2rem;">
          <a href="<?php echo esc_url( home_url('/noticias') ); ?>" style="color: var(--primary); font-weight: bold; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
            ← Voltar para todas as notícias
          </a>
        </div>

      </div>
    </section>

<?php get_footer(); ?>