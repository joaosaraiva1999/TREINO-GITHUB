<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Gestão</div>

                <!-- opção de utilizadores -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers"
                    aria-expanded="false" aria-controls="collapseUsers">
                    <div class="sb-nav-link-icon"><i class="fa-regular fa-address-book"></i></div>
                    Utilizadores
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseUsers" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="inserir_utilizador.php">Adicionar utilizador</a>
                        <a class="nav-link" href="listar_utilizadores.php">Lista de utilizadores</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseArtigos"
                    aria-expanded="false" aria-controls="collapseArtigos">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-pizza-slice"></i></div>
                    Artigos
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseArtigos" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="#">Adicionar Artigo</a>
                        <a class="nav-link" href="listar_artigos.php">Lista de Artigos</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAvaliacoes"
                    aria-expanded="false" aria-controls="collapseAvaliacoes">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-star"></i></div>
                    Avaliações
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseAvaliacoes" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="listar_avaliacoes.php">Adicionar Avaliações</a>
                        <a class="nav-link" href="listar_avaliacoes.php">Lista de Avaliações</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSocios"
                    aria-expanded="false" aria-controls="collapseSocios">
                    <div class="sb-nav-link-icon"><i class="fa-regular fa-user"></i></div>
                    Sócios
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseSocios" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="#">Adicionar Socios</a>
                        <a class="nav-link" href="listar_socios.php">Lista de Socios</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseReservas"
                    aria-expanded="false" aria-controls="collapseReservas">
                    <div class="sb-nav-link-icon"><i class="fa-regular fa-bookmark"></i></div>
                    Reservas
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseReservas" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="#">Adicionar Reservas</a>
                        <a class="nav-link" href="listar_reservas.php">Lista de Reservas</a>
                    </nav>
                </div>

                <!-- outra opção no menu (não esquecer de mudar "collapseOutra" para outro nome) -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOutra"
                    aria-expanded="false" aria-controls="collapseOutra">
                    <!-- Não esquecer de mudar o ícone - neste caso estamos a utilizar fa-folder-->
                    <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                    Outra
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseOutra" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="#">Adicionar outra</a>
                        <a class="nav-link" href="#">Lista de outras</a>
                    </nav>
                </div>


            </div>
        </div>
    </nav>
</div>