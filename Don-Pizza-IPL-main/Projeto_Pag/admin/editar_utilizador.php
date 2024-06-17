<?php
$caminho_raiz_admin = "../";
session_start();

// Redirect if user is not authenticated
// if (!isset($_SESSION["authenticated"]) || !$_SESSION["authenticated"]) {
//     header("Location: ../../index.php");
//     exit(0);
// }

// Check if user ID is provided, redirect if not
if (empty($_GET['id_utilizador'])) {
    header("Location: listar_utilizadores.php");
    exit(0);
} else {
    $id_utilizador = $_GET["id_utilizador"] ?? "";
    require_once "db_connection.php";
    $sql = "SELECT * FROM utilizador WHERE utilizador=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_utilizador);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows) {
        $utilizador = $result->fetch_assoc();
        $nome = $utilizador["nome"];
        $email = $utilizador["email"];
    } else {
        $_SESSION["erros"]["Utilizador"] = "Utilizador não encontrado";
        header("Location: listar_utilizadores.php");
        exit(0);
    }
}

if (!empty($_POST)) {
    $nome = $_POST["nome"] ?? "";
    $email = $_POST["email"] ?? "";

    // Validate form inputs
    $errors = [];
    if (strlen(trim($nome)) < 3) {
        $errors["Nome"] = "Deve ter 3 ou mais caracteres";
    }
    if (strlen(trim($email)) < 5) {
        $errors["Email"] = "Deve ter 5 ou mais caracteres";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["Email"] = "Email inválido";
    }

    // If no errors, update user data
    if (empty($errors)) {
        $sql = "UPDATE utilizador SET nome=?, email=? WHERE utilizador=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $nome, $email, $id_utilizador);
        $stmt->execute();
        if ($stmt->execute()) {
            $_SESSION["msg_sucesso"] = "Utilizador atualizado com sucesso!";
            header("Location: listar_utilizadores.php");
            exit(0);
        } else {
            $_SESSION["erros"]["Alterar"] = "Não foi possível alterar os dados";
        }
    } else {
        $_SESSION["erros"] = $errors;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Editar Utilizador - Nome do Projeto</title>
    <link href="css/styles_admin.css" rel="stylesheet">
</head>

<body class="sb-nav-fixed">
    <?php require_once "parcial/topnav.php"; ?>
    <div id="layoutSidenav">
        <?php require_once "parcial/sidenav.php"; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <?php
                    require_once "parcial/msg_erros.php";
                    require_once "parcial/msg_sucesso.php";
                    ?>
                    <h1 class="mt-4">Editar Utilizador</h1>
                    <form method="post">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($nome) ?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="listar_utilizadores.php" class="btn btn-secondary">Cancelar</a>
</form>
                </div>
            </main>
            <?php require_once "parcial/footer.php"; ?>
        </div>
    </div>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>
