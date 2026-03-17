<?php get_header(); ?>


    <!-- Hero Section -->
    <section id="hero">
      <div class="hero-container">
        <div class="hero-content">
          <h1 class="hero-title">
            Laboratório de<br />Cromatografia
            <span class="hero-highlight">(LabCroma)</span>
          </h1>
          <p class="ptext">
            Metodologias analíticas cromatográficas avançadas para aplicações ambientais, alimentares e produtos naturais
          </p>
          <a href="#research-section" class="arrow-link" aria-label="Ver informações">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/arrow-down.svg" alt="" role="presentation" class="arrow-scroll"/>
            <h3>Saiba mais</h3>
          </a>
        </div>
        <div class="hero-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/labs/gc-ms.png" alt="Laboratório LabCroma" />
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
              O Laboratório de Cromatografia desenvolve pesquisas voltadas ao <strong>desenvolvimento e aplicação de métodos cromatográficos</strong> para análise de gases e compostos orgânicos, com ênfase na avaliação da poluição atmosférica, veicular e ambiental. As atividades incluem a identificação e quantificação de compostos voláteis e semivoláteis em diferentes matrizes, com foco em monitoramento e controle ambiental.
            </p>
            <p style="margin-top: 1.5rem;">
              O laboratório utiliza técnicas avançadas de Cromatografia Gasosa acoplada à Espectrometria de Massas (CG-MS) e Cromatografia Gasosa com detectores BID e FID (CG-BID e CG-FID), além de <strong>desenvolver e validar métodos de preparo e extração de amostras</strong>. As metodologias seguem protocolos reconhecidos, garantindo sensibilidade, confiabilidade e qualidade analítica.
            </p>
          </div>
          <div class="research-highlights">
            <h3>Áreas de Atuação</h3>
            <div class="highlights-grid">
              <div class="highlight-card">
                <h4>Análise de Gases</h4>
                <p>Monitoramento de gases e compostos orgânicos voláteis.</p>
              </div>
              <div class="highlight-card">
                <h4>Poluição Atmosférica e Veicular</h4>
                <p>Avaliação de emissões e contaminantes ambientais.</p>
              </div>
              <div class="highlight-card">
                <h4>Cromatografia Gasosa Avançada</h4>
                <p>Análises por CG-MS, CG-BID e CG-FID.</p>
              </div>
              <div class="highlight-card">
                <h4>Preparo e Extração de Amostras</h4>
                <p>Desenvolvimento de métodos para matrizes complexas.</p>
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
          <div class="imagem-equipamento"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/labs/gc-ms.png" alt="Imagem do MS"></div>
          <div class="texto-equipamento"><h3>Cromatógrafo Gasoso acoplada à Espectrometria de Massas (CG-MS)</h3><p>É utilizado para a separação, identificação e quantificação de compostos orgânicos voláteis e semivoláteis em diferentes matrizes. A técnica combina alta eficiência cromatográfica e elevada seletividade, sendo essencial em estudos de poluição atmosférica, veicular e ambiental, bem como em aplicações ambientais, alimentares e de produtos naturais.</p></div>
        </div>
        <div class="card-equipamentos">
          <div class="imagem-equipamento"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/labs/gc-fid.jpg" alt="Imagem do FID"></div>
          <div class="texto-equipamento"><h3>Cromatógrafo Gasoso com Detector de Ionização de Chama (GC-FID)</h3><p>É utilizado na análise quantitativa de compostos orgânicos voláteis e semivoláteis, com excelente reprodutibilidade e sensibilidade. É uma técnica consolidada para aplicações em controle ambiental, avaliação da poluição atmosférica e veicular, e análises de produtos ambientais e naturais.</p></div>
        </div>
        <div class="card-equipamentos">
          <div class="imagem-equipamento"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/labs/gc-bid.png" alt="Imagem do BID"></div>
          <div class="texto-equipamento"><h3>Cromatógrafo Gasoso com Detector de Ionização por Descarga (GC-BID)</h3><p>É empregado na detecção universal de compostos orgânicos e inorgânicos, apresentando alta sensibilidade e ampla faixa linear. É amplamente utilizado no monitoramento ambiental e na análise de gases, permitindo a quantificação confiável de compostos em baixos níveis de concentração.</p></div>
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
            <p>Metodologia cromatográfica para análise de compostos emergentes em matrizes ambientais</p>
          </div>
        </li>
        <li data-date="2024">
          <h6></h6>
          <div class="title">Artigo de Periódico</div>
          <div class="data">
            <h3>2024</h3>
            <p>Desenvolvimento de novo método HPLC-MS para análise de produtos naturais</p>
          </div>
        </li>
        <li data-date="2023">
          <h6></h6>
          <div class="title">Artigo de Periódico</div>
          <div class="data">
            <h3>2023</h3>
            <p>Validação de método cromatográfico conforme protocolos internacionais</p>
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
            src="<?php echo get_template_directory_uri(); ?>/assets/img/members/ronaldo.jpg"
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
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/arrow-down.svg" alt="" /></div
          ></a>
        </div>
      </div>
    </section>

    <?php get_footer(); ?>