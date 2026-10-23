<?php get_header(); ?>

    <section id="hero">
      <div class="hero-container">
        <div class="hero-content">
          <h1 class="hero-title">
            Análises poderosas em cromatografia e produção
            <span class="hero-highlight"> científica </span> de alta qualidade
          </h1>
          <p class="ptext">
            +10 anos produzindo conhecimento e divulgando ciência de ponta.
          </p>
          <a
            href="#linhasPesquisa"
            class="arrow-link"
            aria-label="Ver linhas de pesquisa"
          >
            <img
              src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/icons/arrow-down.svg"
              alt=""
              role="presentation"
              class="arrow-scroll"
            />
            <h3>Saiba mais</h3>
          </a>
        </div>
        <div class="hero-img">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/labs/gc-bid.png" alt="" />
        </div>
      </div>
    </section>

    <!-- Seção Sobre Nós -->
    <section id="sobre-nos">
      <div class="sobre-nos-container">
        <h2 class="titulo-sobre">Sobre Nós</h2>
        <div class="sobre-nos-content">
          <p class="sobre-nos-texto">
            Fundado sob a liderança do Prof. Dr. Ronaldo Ferreira do Nascimento, o Grupo de Cromatografia da UFC consolidou-se como uma referência nacional no desenvolvimento de métodos analíticos de alta precisão. Com origem no Departamento de Química Analítica e Físico-Química, o grupo nasceu da necessidade de aplicar técnicas cromatográficas avançadas para solucionar desafios ambientais e industriais complexos. Ao longo das décadas, o laboratório evoluiu de uma unidade de pesquisa acadêmica para um centro de excelência, formando mestres e doutores que hoje ocupam posições de destaque na ciência e na indústria brasileira.
          </p>
          <p class="sobre-nos-texto">
            Nossa expertise está centrada no uso estratégico da Cromatografia Gasosa (GC) e Líquida (HPLC), aliada ao desenvolvimento de novos materiais adsorventes para o tratamento de águas e efluentes. O grupo destaca-se pela produção científica robusta, incluindo a publicação de livros fundamentais para a área e o desenvolvimento de metodologias para a detecção de contaminantes em níveis de traços. Buscamos constantemente a inovação tecnológica, integrando a química analítica fundamental com aplicações práticas que visam a sustentabilidade e a preservação dos recursos hídricos, especialmente no contexto do semiárido nordestino.
          </p>
          <p class="sobre-nos-texto">
            O compromisso com a excelência acadêmica e a colaboração interdisciplinar define a nossa identidade. Além de manter parcerias com programas de pós-graduação em Química e Engenharia Civil, o grupo atua na interface entre a pesquisa básica e a prestação de serviços tecnológicos. Nossa infraestrutura e corpo técnico estão dedicados a transformar o conhecimento científico em soluções reais, promovendo avanços significativos na monitoração de poluentes e na purificação de matrizes ambientais, sempre pautados pela ética e pelo rigor metodológico que são marcas registradas da UFC.
          </p>
        </div>
      </div>
    </section>

    <section id="noticias">
      <div class="noticias-container">
        <h2 class="titulo-noticias">Notícias</h2>
        
        <div class="noticias-scroll">
          
          <?php 
          // 1. CONFIGURANDO A BUSCA (Trazendo apenas as 5 últimas notícias)
          $args_noticias_home = array(
              'post_type' => 'post',
              'posts_per_page' => 5 // Limite de cards no scroll da home
          );
          $busca_noticias_home = new WP_Query( $args_noticias_home );

          // 2. INÍCIO DO LOOP
          if ( $busca_noticias_home->have_posts() ) : 
            while ( $busca_noticias_home->have_posts() ) : $busca_noticias_home->the_post(); 
          ?>
          
            <div class="noticia-card">
              <div class="noticia-imagem">
                <?php 
                if ( has_post_thumbnail() ) {
                    // Puxa a imagem destacada do painel
                    the_post_thumbnail('large'); 
                } else {
                    // Imagem de segurança
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
            // Limpa a memória para não bugar o resto da página inicial
            wp_reset_postdata(); 
            
          else : 
          ?>
            <p>Nenhuma notícia encontrada.</p>
          <?php endif; // FIM DO LOOP ?>

        </div>

        <div id="noticias-veja-mais">
          <a href="<?php echo esc_url( home_url('/noticias') ); ?>">Veja mais notícias</a>
        </div>
      </div>
    </section>
    
    <section id="contato-index">
      <div id="titlecontato">
        <h2 class="titulo-contato">Entre em contato</h2>
      </div>
      <div id="textcontato">
        <p>
          Email: laboratoriopoaufc@ufc.com.br <br />
          Departamento de Química Analítica e Físico-Química <br />
          Campus do Pici - Bloco 939 <br />
          CEP: 60440-900 Fortaleza-CE Brasil
        </p>
        <p class="maps">
          <a href="https://maps.app.goo.gl/mKpCmsMdut5kbHBh7"
            >Veja no Google Maps</a
          >
        </p>
      </div>
    </section>

    <!-- Seção de linhas de pesquisa -->
    <section id="linhasPesquisa">
      <div class="content-overlay">
        <h2 class="titulo-pesquisas">Linhas de pesquisa</h2>
      </div>
      <!-- Slider main container de classe dupla -->
      <div class="swiper swiper-pesquisa">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->
          <div class="swiper-slide">
            <div class="slidePesquisa">
              <div id="filtro"></div>
              <img
                src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/labs/gc-ms.png"
                alt="Linhas de pesquisa — GC-MS"
              />
              <a href="croma.html"><div class="caixaLink">
                <h3>Ir para LabCroma</h3>
              </div></a>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="slidePesquisa">
              <div id="filtro"></div>
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/labs/toc.png" alt="Linhas de pesquisa — TOC" />
              <a href="labpoa.html"><div class="caixaLink">
                <h3>Ir para LabPOA</h3>
              </div></a>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="slidePesquisa">
              <div id="filtro"></div>
              <img
                src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/labs/hplc-dad.png"
                alt="Linhas de pesquisa — HPLC"
              />
              <a href="lat.html"><div class="caixaLink">
                <h3>Ir para LAT</h3>
              </div></a>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="slidePesquisa">
              <div id="filtro"></div>
              <img
                src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/labs/ics.png"
                alt="Linhas de pesquisa — Lanagua"
              />
              <a href="lanagua.html"><div class="caixaLink">
                <h3>Ir para Lanagua</h3>
              </div></a>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="slidePesquisa">
              <div id="filtro"></div>
              <img
                src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/labs/impressorhorizontal.jpeg"
                alt="Linhas de pesquisa — LabItech"
              />
              <a href="labitech.html"><div class="caixaLink">
                <h3>Ir para LabItech</h3>
              </div></a>
            </div>
          </div>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
      </div>
    </section>

    <!-- seção publicações (livros) -->
    <section id="publicacoes">
      <h2 class="titulo-publicacoes">Nossos Livros</h2>
      <div class="swiper galeria-livros">
        <!-- classe dupla -->
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="card-livro">
              <a href="https://repositorio.ufc.br/bitstream/riufc/32127/1/2017_liv_rfnascimento.pdf" target="_blank" rel="noopener noreferrer"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/books/poas.png" alt="Livro sobre POAs" /></a>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card-livro">
              <a href="https://repositorio.ufc.br/bitstream/riufc/39260/1/2018_liv_rfnascimento.pdf" target="_blank" rel="noopener noreferrer"><img
                src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/books/cromatografia.png"
                alt="Livro sobre Cromatografia"
              /></a>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card-livro">
              <a href="https://repositorio.ufc.br/bitstream/riufc/53271/1/2020_liv_rfnascimento.pdf" target="_blank" rel="noopener noreferrer"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/books/adsorcao.png" alt="Livro sobre Adsorção" /></a>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card-livro">
              <a href="https://repositorio.ufc.br/bitstream/riufc/58652/1/2021_liv_rfnascimento.pdf" target="_blank" rel="noopener noreferrer"><img
                src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/books/processos-eletroliticos.png"
                alt="Livro sobre Processos Eletrolíticos"
              /></a>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card-livro">
              <a href="https://repositorio.ufc.br/bitstream/riufc/19569/1/2014-liv_rfnascimento.pdf" target="_blank" rel="noopener noreferrer"><img
                src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/books/bioadsorventes-capa.jpg"
                alt="Livro sobre Uso de Bioadsorventes"
              /></a>
            </div>
          </div>
        </div>

      </div>

      <div id="previous-next-livros">
        <!-- div por fora pra manter botões embaixo -->
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>

      <div id="linkRepositorio">
        <a href="https://repositorio.ufc.br/simple-search?location=%2F&query=Ronaldo+Ferreira+do+Nascimento&rpp=10&sort_by=score&order=desc&filter_field_1=type&filter_type_1=equals&filter_value_1=Livro" target="_blank" rel="noopener noreferrer"><h4>Veja nossos livros e adquira gratuitamente</h4></a>
      </div>
    </section>

    <!-- seção timeline -->
    <section class="timeline-publi" id="timeline">
      <h2 class="titulo-pesquisas">Publicações</h2>
      <ul class="timeline">
        <li data-date="2025">
          <h6></h6>
          <div class="title">Tese</div>
          <div class="data">
            <h3>2025</h3>
            <p>
              <a href="http://repositorio.ufc.br/handle/riufc/79780" target="_blank">
              Emissões veiculares: uma abordagem rápida e eficiente para a
              determinação de H2, CO, CH4 e CO2 por GC-BID e de BTEX por
              SPME-GC-BID</a>
            </p>
          </div>
        </li>
        <li data-date="2024">
          <h6></h6>
          <div class="title">Artigo de Periódico</div>
          <div class="data">
            <h3>2024</h3>
            <p>
              <a href="http://repositorio.ufc.br/handle/riufc/77466" target="_blank"> The impact of chronic and acute problems on sea turtles: The
              consequences of the oil spill and ingestion of anthropogenic
              debris on the tropical semi-arid coast of Ceará, Brazil</a>
            </p>
          </div>
        </li>
        <li data-date="2023">
          <h6></h6>
          <div class="title">Artigo de Periódico</div>
          <div class="data">
            <h3>2023</h3>
            <p>
              <a href="http://repositorio.ufc.br/handle/riufc/74377" target="_blank">
              Climatic regionalization and rainfed agricultural production in
              the state of Maranhão, Brazil</a>
            </p>
          </div>
        </li>
        <li data-date="2022">
          <h6></h6>
          <div class="title">Artigo de Periódico</div>
          <div class="data">
            <h3>2022</h3>
            <p>
              <a href="http://repositorio.ufc.br/handle/riufc/69386" target="_blank">
              A physical study to explain response differences between the BID
              and FID detectors for PAHs and pesticides</a>
            </p>
          </div>
        </li>
        <li data-date="2021">
          <h6></h6>
          <div class="title">Artigo de Periódico</div>
          <div class="data">
            <h3>2021</h3>
            <p>
              <a href="http://repositorio.ufc.br/handle/riufc/69388" target="_blank">
              Integrated UPLC-HRMS, chemometric tools, and metabolomic analysis
              of forage palm (Opuntia spp. and Nopalea spp.) to define
              biomarkers associated with non-susceptibility to Carmine Cochineal
              (Dactylopius opuntiae)</a>
            </p>
          </div>
        </li>
        <li data-date="2020">
          <h6></h6>
          <div class="title">Livro</div>
          <div class="data">
            <h3>2020</h3>
            <p>
              <a href="http://repositorio.ufc.br/handle/riufc/10267" target="_blank">
              Adsorção: aspectos teóricos e aplicações ambientais</a>
            </p>
          </div>
        </li>
        <li data-date="2019">
          <h6></h6>
          <div class="title">Artigo de Periódico</div>
          <div class="data">
            <h3>2019</h3>
            <p>
              <a href="http://repositorio.ufc.br/handle/riufc/66846" target="_blank">
              Zinc ferrite nanoparticles via coprecipitation modified method:
              glycerol as structure directing and stabilizing agent</a>
            </p>
          </div>
        </li>
        <li data-date="2018">
          <h6></h6>
          <div class="title">Artigo de Evento</div>
          <div class="data">
            <h3>2018</h3>
            <p>
              <a href="http://repositorio.ufc.br/handle/riufc/54740" target="_blank">
              Remoção de metais tóxicos através dos resíduos de cinzas de lodo
              de fossa séptica</a>
            </p>
          </div>
        </li>
        <li data-date="2017">
          <h6></h6>
          <div class="title">Artigo de Periódico</div>
          <div class="data">
            <h3>2017</h3>
            <p>
              <a href="http://repositorio.ufc.br/handle/riufc/61477" target="_blank">
              Strategy for correction of matrix effect on the determination of
              pesticides in water bodies using SPME-GC-FID</a>
            </p>
          </div>
        </li>
        <li data-date="2016">
          <h6></h6>
          <div class="title">Artigo de Evento</div>
          <div class="data">
            <h3>2016</h3>
            <p>
              <a href="http://repositorio.ufc.br/handle/riufc/54095" target="_blank">
              Desenvolvimento e validação de metodologia para determinação de
              interferentes endócrinos em águas superficiais</a>
            </p>
          </div>
        </li>
        <li data-date="2015">
          <h6></h6>
          <div class="title">Artigo de Periódico</div>
          <div class="data">
            <h3>2015</h3>
            <p>
              <a href="http://repositorio.ufc.br/handle/riufc/72049" target="_blank">
              Carbonyl compounds from urban activities and their associated
              cancer risks: The influence of seasonality on air quality
              (Fortaleza-Ce, Brazil)</a>
            </p>
          </div>
        </li>
      </ul>
      <!-- setinha da timeline usando vanilla css -->
      <div id="timeline-arrow">
        <div></div>
        <div></div>
        <div></div>
      </div>
    </section>

    <!-- Seção da coordenação -->

    <section id="coordenacao">
      <div><h1 class="titulo-coordenacao">Coordenação</h1></div>
      <div id="coordenador">
        <div id="perfil-img">
          <img
            src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/members/ronaldo.jpg"
            alt="Foto de Ronaldo Ferreira do Nascimento"
          />
        </div>

        <div class="info-container">
          <div class="nome"><h2>Ronaldo Ferreira do Nascimento</h2></div>
          <div class="descricao-coordenador">
            <h4>
              Coordenador do Laboratório de Processos Oxidativos Avançados
              (LabPOA); Laboratório de Análise de Traços (LAT); Laboratório de
              Análise de Água (Lanágua); Laboratório de Cromatografia (LabCroma).
            </h4>
            <p>
              Formado em Química Industrial pela Universidade Federal do Maranhão
              (UFMA, 1991), doutor em Química Analítica pela Universidade de São
              Paulo (USP, 1997), Instituto de Química de São Carlos (IQSC).
              Atualmente é professor titular da Universidade Federal do Ceará
              (UFC). Publicou artigos (186) em periódicos científicos, capítulos
              de livros (20) e livros (09). Possui experiência na área de Química
              Analítica, com ênfase no Desenvolvimento de Métodos Cromatográficos
              (análise de resíduos de pesticidas em água e alimentos); Química
              Ambiental (análises de traços); Adsorção (remoção de poluentes de
              efluentes aquosos utilizando adsorventes naturais); Processos
              Oxidativos Avançados (tratamento de água e efluentes).
            </p>
          </div>
          <div class="links-externos-coordenador">
            <p>ronaldo@ufc.br | 
              <a href="http://lattes.cnpq.br/6345440666273561" target="_blank" rel="noopener noreferrer">
                Currículo Lattes
              </a>
            </p>
          </div>
        </div>  
      </div>

      <div style="width: 100%;">
        <div id="nossosmembros">
          <a href="<?php echo esc_url( home_url('/equipe') ); ?>">
            Saiba mais sobre nossos membros
            <div id="seta-membros">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/icons/arrow-down.svg" alt="" /></div
          ></a>
        </div>
      </div>
    </section>

   <?php get_footer(); ?>