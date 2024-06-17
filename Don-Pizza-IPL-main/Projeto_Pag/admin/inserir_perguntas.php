<?php
$caminho_raiz_admin = "../";
session_start();
if (!isset($_SESSION["authenticated"]) || !$_SESSION["authenticated"]) {
    header("Location:../index.php");
    exit(0);
}
$nome = $email = $pass = $cpass = "";

if (!empty($_POST)) {
    $nome = $_POST["nome"] ?? "";
    $email = $_POST["email"] ?? "";
    $pass = $_POST["pass"] ?? "";
    $cpass = $_POST["cpass"] ?? "";

    if (strlen(trim($nome)) < 3) {
        $_SESSION["erros"]["Nome"] = "Deve ter 3 ou mais caracteres";
    }
    if (strlen(trim($email)) < 5) {
        $_SESSION["erros"]["Email"] = "Deve ter 5 ou mais caracteres";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["erros"]["Email"] = "Email inválido";
    }
    if (strlen(trim($pass)) < 5) {
        $_SESSION["erros"]["Password"] = "Deve ter 5 ou mais caracteres";
    }
    if ($pass !== $cpass) {
        $_SESSION["erros"]["Password"] = "As passwords devem ser iguais";
    }
    //se tiverem role/tipo/perfil
    //if (!in_array($tipo,['N','A']) ){    }


    if (empty($_SESSION["erros"])) {
        require_once "../bd_connection.php";
        $sql = "insert into utilizadores (nome, email, pass, imagem) values(?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $pass = hash("sha512", $pass);
        $stmt->bind_param("ssss", $nome, $email, $pass, $nome_imagem); //s=string, i=integer e d=float
        $stmt->execute();
        if ($stmt->affected_rows) {
            $_SESSION["msg_sucesso"] = "Utilizador inserido com sucesso!";
            if ($nome_imagem) {
                move_uploaded_file($_FILES['imagem']['tmp_name'], $diretoria . $nome_imagem);
            }
            header("Location:listar_utilizadores.php");
            exit(0);
        } else {
            $_SESSION["erros"]["Inserir"] = "Não foi possível inserir os dados";
        }
    }
}
?>
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
                    <!-- colocar título da página -->
                    <h1 class="mt-4">Inserir Utilizador</h1>
                    <!-- colocar conteúdo da página -->
                    <div>
                        <form action="#" method="post" onsubmit="return validarDados();" enctype="multipart/form-data">
                            <?php require_once "parcial/inserir_editar_campos.php"; ?>

                            <label for="passId" class="form-label">Password: </label>
                            <input type="password" name="pass" id="passId" minlength="5" required class="form-control mb-3">

                            <label for="cpassId" class="form-label">ConfirmarPassword: </label>
                            <input type="password" name="cpass" id="cpassId" required class="form-control mb-3">
                            <!-- Se valor for restrito a um conjunto de opções
                                <label for="tipoId" class="form-label">Tipo: </label>
                                <select name="tipo" id="tipoId" class="form-select mb-3" >
                                    <option value="">Selecione uma opção</option>
                                    <option value="N" <?= $tipo == 'N' ? "selected" : "" ?>>Normal</option>
                                    <option value="A" <?= $tipo == 'A' ? "selected" : "" ?>>Admin</option>
                                </select>

                                Se tiverem campos do tipo text
                                <label for="obsId" class="form-label">Observações: </label>
                                <textarea name="obs" id="obsId" class="form-control mb-3"><?= $obs ?></textarea>


                            -->

                            <input type="submit" value="Inserir" class="btn btn-primary">
                            <input type="reset" value="Limpar" class="btn btn-secondary">
                        </form>
                    </div>
            </main>
            <?php require_once "../parcial/footer.php"; ?>
        </div>
    </div>
    <script src="../../js/fontawesome.all.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/jquery-3.7.1.js"></script>
    <script src="../../js/scripts.js"></script>
    <script>
        function validarDados() {
            pass = $("#passId").val();
            cpass = $("#cpassId").val();
            if (pass != cpass) {
                alert("Passwords não são iguais");
                return false;
            }
            return true;
        }
    </script>
</body>

</html>