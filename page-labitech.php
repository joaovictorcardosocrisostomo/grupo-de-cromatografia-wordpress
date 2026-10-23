<?php get_header(); ?>


    <!-- Hero Section -->
    <section id="hero">
      <div class="hero-container">
        <div class="hero-content">
          <h1 class="hero-title">
            Laboratório de<br />Inovação em Tecnologias Renováveis
            <span class="hero-highlight">(LabItech)</span>
          </h1>
          <p class="ptext">
            Tecnologia, engenharia química e eletroquímica para produção de hidrogênio de baixa emissão de carbono
          </p>
          <a href="#research-section" class="arrow-link" aria-label="Ver informações">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/icons/arrow-down.svg" alt="" role="presentation" class="arrow-scroll"/>
            <h3>Saiba mais</h3>
          </a>
        </div>
        <div class="hero-img">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/labs/impressorhorizontal.jpeg" alt="Laboratório LabItech" />
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
              O Laboratório de Inovação em Tecnologias Renováveis (LabItech) atua no <strong>desenvolvimento de protótipos em escala piloto para sistemas de tratamento de água</strong>, com ênfase em processos eletrolíticos, como eletrocoagulação e eletro-oxidação. O laboratório integra diversas áreas do conhecimento, incluindo engenharia química, ciências da computação, engenharia de energias renováveis e eletroquímica, para o desenvolvimento de soluções tecnológicas inovadoras e sustentáveis.
            </p>
            <p style="margin-top: 1.5rem;">
              As pesquisas envolvem a <strong>ação de sistemas de tratamento com a produção de energia limpa</strong>, com foco na geração de hidrogênio de baixa emissão de carbono e seu reuso nos próprios processos. Um dos pilares do laboratório é a automação, abrangendo <strong>monitoramento e controle automáticos dos sistemas</strong>, aquisição de dados em tempo real e estratégias inteligentes de operação. O objetivo é desenvolver tecnologias aplicáveis à economia circular, promovendo eficiência ambiental e energética.
            </p>
          </div>
          <div class="research-highlights">
            <h3>Áreas de Atuação</h3>
            <div class="highlights-grid">
              <div class="highlight-card">
                <h4>Tratamento Eletrolítico de Água e Efluentes</h4>
                <p>Eletrocoagulação e eletro-oxidação em sistemas piloto.</p>
              </div>
              <div class="highlight-card">
                <h4>Produção e Reuso de Hidrogênio</h4>
                <p>Geração de hidrogênio de baixa emissão integrada aos processos.</p>
              </div>
              <div class="highlight-card">
                <h4>Automação e Controle de Processos</h4>
                <p>Monitoramento e controle automático em tempo real.</p>
              </div>
              <div class="highlight-card">
                <h4>Tecnologias em Energia Renovável</h4>
                <p>Soluções sustentáveis aplicadas à economia circular.</p>
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
          <div class="imagem-equipamento"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/labs/impressorhorizontal.jpeg" alt="Imagem do BID"></div>
          <div class="texto-equipamento"><h3>Impressora 3D</h3><p>É utilizada para a prototipação rápida de ferramentas, componentes e reatores aplicados a sistemas de tratamento de água e processos eletroquímicos. O equipamento possibilita a fabricação de peças funcionais personalizadas para montagem, suporte e organização dos reatores, permitindo maior flexibilidade no desenvolvimento experimentale otimização do desempenho dos sistemas.</p></div>
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
            <p>Células eletroquímicas para produção sustentável de hidrogênio</p>
          </div>
        </li>
        <li data-date="2024">
          <h6></h6>
          <div class="title">Artigo de Periódico</div>
          <div class="data">
            <h3>2024</h3>
            <p>Reatores integrados: combinando biotecnologia e eletroquímica</p>
          </div>
        </li>
        <li data-date="2023">
          <h6></h6>
          <div class="title">Artigo de Periódico</div>
          <div class="data">
            <h3>2023</h3>
            <p>Avaliação de sistemas de monitoramento para processos eletroquímicos</p>
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
