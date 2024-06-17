<?php
session_start();
// if (!isset($_SESSION["authenticated"]) || !$_SESSION["authenticated"]) {
//     header("Location:../../index.php");
//     exit(0);
// }

if (!empty($_GET["id_utilizador"])) {
    $id_utilizador = $_GET["id_utilizador"];
    require_once "../bd_connection.php";
    $sql = "select * from utilizadores where id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_utilizador);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
    }
}
if (empty($row)) {
    $_SESSION["erros"]["Mostrar"] = "Não é possível mostrar o utilizador";
    header("Location:listar_utilizadores.php");
    exit(0);
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Dashboard - Nome do Projeto</title>
    <link href="css/styles_admin.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">
    <?php require_once "../parcial/topnav.php"; ?>
    <div id="layoutSidenav">
        <?php require_once "../parcial/sidenav.php"; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <!-- colocar título da página -->
                    <?php
                    //Local onde são apresentadas mensagens de erro e sucesso, caso existam
                    require_once "../parcial/msg_erros.php";
                    require_once "../parcial/msg_sucesso.php";
                    ?>
                    <h1 class="mt-4">Dados do utilizador</h1>
                    <!-- colocar conteúdo da página -->
                    <div>
                        <?php if ($row["imagem"]) : ?>
                            <p>
                                <img src="../../img/imgsUtilizadores/<?=$row["imagem"] ?>" alt="Img do utilizador" width="200">
                            </p>
                        <?php endif; ?>
                        <p><strong>Nome:</strong> <?= $row["nome"] ?></p>
                        <p><strong>Email:</strong> <?= $row["email"] ?></p>
                    </div>
            </main>
            <?php require_once "../parcial/footer.php"; ?>
        </div>
    </div>
    <script src="../../js/fontawesome.all.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/scripts.js"></script>
</body>

</html>