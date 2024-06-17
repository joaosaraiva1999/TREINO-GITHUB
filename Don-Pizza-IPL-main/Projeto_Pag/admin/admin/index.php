<?php 
    session_start();
   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Dashboard - Don Pizza</title>
        <link href="../css/styles_admin.css" rel="stylesheet" />
    </head>
    <body class="sb-nav-fixed">
		<?php require_once "parcial/topnav.php";?>    
        <div id="layoutSidenav">
            <?php require_once "parcial/sidenav.php"; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
					    <!-- colocar título da página -->
                        <?php 
                            //Local o   nde são apresentadas mensagens de erro e sucesso, caso existam
                            require_once "parcial/msg_erros.php";
                            require_once "parcial/msg_sucesso.php";
                        ?>
                        <h1 class="mt-4">Dashboard</h1>
						<!-- colocar conteúdo da página -->
                        <div>
                           <h3>Bem vindo à área de navegação</h3>
                        </div>
                </main>
                <?php require_once "parcial/footer.php";?>
            </div>
        </div>
		<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </body>
</html>
