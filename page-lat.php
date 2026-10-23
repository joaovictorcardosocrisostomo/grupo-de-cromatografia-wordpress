<?php get_header(); ?>


    <!-- Hero Section -->
    <section id="hero">
      <div class="hero-container">
        <div class="hero-content">
          <h1 class="hero-title">
            Laboratório de<br />Análise de Traços
            <span class="hero-highlight">(LAT)</span>
          </h1>
          <p class="ptext">
            Detecção de contaminantes em níveis ultrabaixos com tecnologias especializadas
          </p>
          <a href="#research-section" class="arrow-link" aria-label="Ver informações">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/icons/arrow-down.svg" alt="" role="presentation" class="arrow-scroll"/>
            <h3>Saiba mais</h3>
          </a>
        </div>
        <div class="hero-img">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/labs/absorlathorizontal.jpeg" alt="Laboratório LAT" />
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
             O Laboratório de Análises de Traços (LAT) dedica-se à <strong>análise de contaminantes emergentes em níveis de traços</strong>, com ênfase na determinação de pesticidas, hidrocarbonetos policíclicos aromáticos (HPAs), metais pesados e outros compostos de interesse ambiental. As análises são realizadas em diferentes matrizes utilizando técnicas analíticas de alta sensibilidade.
            <p style="margin-top: 1.5rem;">
              O laboratório desenvolve e aplica metodologias baseadas em Cromatografia Líquida de Alta Eficiência (HPLC) e Espectrometria de Absorção Atômica em Chama (FAAS), voltadas ao <strong>monitoramento ambiental, avaliação de impactos antrópicos e estudos de contaminação em níveis de traços</strong>. As pesquisas incluem aplicações em controle ambiental, monitoramento da poluição e investigação da presença e do comportamento de contaminantes emergentes em diferentes sistemas.
            </p>
          </div>
          <div class="research-highlights">
            <h3>Áreas de Atuação</h3>
            <div class="highlights-grid">
              <div class="highlight-card">
                <h4>Análise de Contaminantes Emergentes</h4>
                <p>Pesticidas, HPAs, metais pesados e outros contaminantes em níveis de traços.</p>
              </div>
              <div class="highlight-card">
                <h4>Cromatografia Líquida (HPLC)</h4>
                <p>Análise de compostos orgânicos em diferentes matrizes.</p>
              </div>
              <div class="highlight-card">
                <h4>Análise de Metais (FAAS)</h4>
                <p>Determinação de metais pesados em amostras ambientais.</p>
              </div>
              <div class="highlight-card">
                <h4>Monitoramento Ambiental</h4>
                <p>Avaliação da contaminação em água, solo e sedimentos.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Seção de Equipamentos | precisa reconstruir essa seção -->
    <section id="equipamentos">
      <h2 class="titulo-equipamentos">Equipamentos</h2>
      <div class="lista-equipamentos">
        <div class="card-equipamentos">
          <div class="imagem-equipamento"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/labs/hplchorizontal.jpeg" alt="Imagem do BID"></div>
          <div class="texto-equipamento"><h3>Cromatógrafo Líquido de Alta Eficiência (HPLC)</h3><p>É utilizado na identificação e quantificação de contaminantes emergentes em níveis de traços, como pesticidas, HPAs e outros compostos orgânicos de interesse ambiental. A técnica permite a análise de diferentes matrizes ambientais com alta sensibilidade, precisão e seletividade, sendo fundamental em estudos de monitoramento e avaliação de impactos antrópicos.</p></div>
        </div>
        <div class="card-equipamentos">
          <div class="imagem-equipamento"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/labs/absorlathorizontal.jpeg" alt="Imagem do MS"></div>
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
            <p>
              <a href="http://repositorio.ufc.br/handle/riufc/79780" target="_blank">Emissões veiculares: determinação rápida de H₂, CO, CH₄ e CO₂ por GC-BID e de BTEX por SPME-GC-BID</a>
          </div>
        </li>
        <li data-date="2024">
          <h6></h6>
          <div class="title">Artigo de Periódico</div>
          <div class="data">
            <h3>2024</h3>
            <p>Análise de BTEX em amostras ambientais por SPME-GC-BID</p>
          </div>
        </li>
        <li data-date="2023">
          <h6></h6>
          <div class="title">Artigo de Periódico</div>
          <div class="data">
            <h3>2023</h3>
            <p>Monitoramento de qualidade do ar: detecção de contaminantes traços</p>
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