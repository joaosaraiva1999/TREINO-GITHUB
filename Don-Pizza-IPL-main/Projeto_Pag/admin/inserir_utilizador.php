<?php
$caminho_raiz_admin = "../";
session_start();
// if (!isset($_SESSION["authenticated"]) || !$_SESSION["authenticated"]) {
//     header("Location: login.php");
//     exit(0);
// }
$nome = $user_name = $email = $pass = $cpass = $data_nasc = $tel = "";

if (!empty($_POST)) {
    $nome = $_POST["nome"] ?? "";
    $user_name = $_POST["user_name"] ?? "";
    $email = $_POST["email"] ?? "";
    $pass = $_POST["pass"] ?? "";
    $cpass = $_POST["cpass"] ?? "";
    $data_nasc = $_POST["data_nasc"] ?? "";
    $tel = $_POST["tel"] ?? "";

    if (strlen(trim($nome)) < 3) {
        $_SESSION["erros"]["Nome"] = "Deve ter 3 ou mais caracteres";
    }
    if (strlen(trim($user_name)) < 3) {
        $_SESSION["erros"]["User Name"] = "Deve ter 3 ou mais caracteres";
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
    if (empty($data_nasc)) {
        $_SESSION["erros"]["Data Nascimento"] = "Data de nascimento é obrigatória";
    }

    if (empty($_SESSION["erros"])) {
        require_once "db_connection.php";
        $data_inscricao = date("Y-m-d H:i:s"); // Current date and time
        $hashed_pass = password_hash($pass, PASSWORD_BCRYPT);
        $sql = "INSERT INTO utilizador (user_name, nome, data_inscricao, data_nasc, pass, telefone, email) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssss', $user_name, $nome, $data_inscricao, $data_nasc, $hashed_pass, $tel, $email);
        $stmt->execute();
        if ($stmt->affected_rows) {
            $_SESSION["msg_sucesso"] = "Utilizador inserido com sucesso!";
            header("Location: listar_utilizadores.php"); // Redirect to a success page
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
    <?php require_once "parcial/topnav.php"; ?>
    <div id="layoutSidenav">
        <?php require_once "parcial/sidenav.php"; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <!-- colocar título da página -->
                    <?php
                    //Local onde são apresentadas mensagens de erro e sucesso, caso existam
                    require_once "parcial/msg_erros.php";
                    require_once "parcial/msg_sucesso.php";
                    ?>
                    <!-- colocar título da página -->
                    <h1 class="mt-4">Inserir Utilizador</h1>
                    <!-- colocar conteúdo da página -->
                    <div>
                        <form action="#" method="post" onsubmit="return validarDados();" enctype="multipart/form-data">

                            <label for="user_name" class="form-label">User Name: </label>
                            <input type="text" name="user_name" id="user_name" minlength="3" required class="form-control mb-3">

                            <label for="nome" class="form-label">Nome: </label>
                            <input type="text" name="nome" id="nome" minlength="2" required class="form-control mb-3">

                            <label for="email" class="form-label">Email: </label>
                            <input type="email" name="email" id="email" minlength="5" required class="form-control mb-3">

                            <label for="tel" class="form-label">Telefone: </label>
                            <input type="text" name="tel" id="tel" minlength="9" maxlength="9" required class="form-control mb-3">

                            <label for="pass" class="form-label">Password: </label>
                            <input type="password" name="pass" id="passId" minlength="5" required class="form-control mb-3">

                            <label for="cpassId" class="form-label">Confirmar Password: </label>
                            <input type="password" name="cpass" id="cpassId" required class="form-control mb-3">

                            <label for="data_nasc" class="form-label">Data de Nascimento: </label>
                            <input type="date" name="data_nasc" id="data_nasc" required class="form-control mb-3">

                            <input type="submit" value="Inserir" class="btn btn-primary">
                            <input type="reset" value="Limpar" class="btn btn-secondary">
                        </form>
                    </div>
            </main>
            <?php require_once "parcial/footer.php"; ?>
        </div>
    </div>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script>
        function validarDados() {
            const pass = document.getElementById("passId").value;
            const cpass = document.getElementById("cpassId").value;
            if (pass !== cpass) {
                alert("Passwords não são iguais");
                return false;
            }
            return true;
        }
    </script>
</body>

</html>
