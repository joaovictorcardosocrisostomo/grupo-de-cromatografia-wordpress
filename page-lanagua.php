<?php get_header(); ?>


    <!-- Hero Section -->
    <section id="hero">
      <div class="hero-container">
        <div class="hero-content">
          <h1 class="hero-title">
            Laboratório de Análise<br />de Água
            <span class="hero-highlight">(Lanagua)</span>
          </h1>
          <p class="ptext">
            Análises químicas de alta precisão para monitoramento e qualidade de água
          </p>
          <a href="#research-section" class="arrow-link" aria-label="Ver informações">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/icons/arrow-down.svg" alt="" role="presentation" class="arrow-scroll"/>
            <h3>Saiba mais</h3>
          </a>
        </div>
        <div class="hero-img">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/labs/uvvishorizontal.jpeg" alt="Laboratório Lanagua" />
        </div>
      </div>
    </section>

    <!-- Seção de Linhas de Pesquisa -->
    <section id="research-section">
      <div id="research-container">
        <h2 class="titulo-contato">Linhas de Pesquisa</h2>
        <div class="research-content">
          <div class="research-text">
            <p>
              O Laboratório de Análises de Água (Lanagua) desenvolve pesquisas voltadas ao estudo de <strong>processos de adsorção aplicados à remoção de contaminantes, bem como à investigação da poluição atmosférica</strong> e seus impactos ambientais. As atividades incluem a avaliação de diferentes materiais adsorventes e sua eficiência em sistemas aquosos e ambientais.
            </p>
            <p style="margin-top: 1.5rem;">
              O laboratório também atua na <strong>análise de íons inorgânicos e orgânicos por Cromatografia de Íons</strong>, aplicando metodologias analíticas precisas para a caracterização da qualidade ambiental em diferentes matrizes. As pesquisas visam o monitoramento ambiental e o desenvolvimento de soluções para o controle e mitigação da poluição, em conformidade com normas e padrões de qualidade.
            </p>
          </div>
          <div class="research-highlights">
            <h3>Áreas de Atuação</h3>
            <div class="highlights-grid">
              <div class="highlight-card">
                <h4>Processos de Adsorção</h4>
                <p>Estudo e aplicação de materiais adsorventes para remoção de contaminantes.</p>
              </div>
              <div class="highlight-card">
                <h4>Poluição Atmosférica</h4>
                <p>Avaliação e monitoramento de poluentes no ar e seus impactos ambientais.</p>
              </div>
              <div class="highlight-card">
                <h4>Cromatografia de Íons</h4>
                <p>Análise de íons inorgânicos e orgânicos em diferentes matrizes.</p>
              </div>
              <div class="highlight-card">
                <h4>Monitoramento Ambiental</h4>
                <p>Caracterização da qualidade da água e do ambiente.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Seção de Equipamentos -->
    <section id="equipamentos">
    <h2 class="titulo-equipamentos">Equipamentos</h2>
      <div class="lista-equipamentos">
        <div class="card-equipamentos">
          <div class="imagem-equipamento"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/labs/cromaionshorizontal.jpeg" alt="Imagem do BID"></div>
          <div class="texto-equipamento"><h3>Cromatógrafo de Íons</h3><p>É utilizado na identificação e quantificação de íons inorgânicos e orgânicos em diferentes matrizes ambientais. A técnica apresenta alta sensibilidade e seletividade, sendo fundamental para a avaliação da qualidade da água, monitoramento ambiental e estudos voltados ao controle e mitigação da poluição, em conformidade com normas e padrões de qualidade.</p></div>
        </div>
        <div class="card-equipamentos">
          <div class="imagem-equipamento"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/labs/absorlanhorizontal.jpeg" alt="Imagem do MS"></div>
          <div class="texto-equipamento"><h3>Espectrômetro de Absorção Atômica em Chama (FAAS)</h3><p>É empregado na determinação de metais pesados em amostras ambientais, como água, solo e sedimentos. A técnica apresenta boa sensibilidade e reprodutibilidade, sendo amplamente utilizada em estudos de contaminação ambiental, controle ambiental e avaliação da presença de metais em níveis de traços.</p></div>
        </div>
      </div>
    </section>

    <!-- Seção de Publicações -->
    <section class="timeline-publi" id="timeline">
      <h2 class="titulo-pesquisas">Publicações</h2>
      <ul class="timeline">
        <li data-date="2025">
          <h6></h6>
          <div class="title">Artigo de Periódico</div>
          <div class="data">
            <h3>2025</h3>
            <p>Metodologia HPLC para monitoramento de qualidade de água potável</p>
          </div>
        </li>
        <li data-date="2024">
          <h6></h6>
          <div class="title">Artigo de Periódico</div>
          <div class="data">
            <h3>2024</h3>
            <p>Determinação de pesticidas em amostras de água por GC-FID</p>
          </div>
        </li>
        <li data-date="2023">
          <h6></h6>
          <div class="title">Artigo de Periódico</div>
          <div class="data">
            <h3>2023</h3>
            <p>Análise de traços de poluentes emergentes em águas superficiais</p>
          </div>
        </li>
      </ul>
      <div id="timeline-arrow">
        <div></div>
        <div></div>
        <div></div>
      </div>
    </section>

    <!-- Seção de Coordenação -->
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
          <a href="equipe.html"
            >Saiba mais sobre nossos membros
            <div id="seta-membros">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/icons/arrow-down.svg" alt="" /></div
          ></a>
        </div>
      </div>
    </section>

   <?php get_footer(); ?>