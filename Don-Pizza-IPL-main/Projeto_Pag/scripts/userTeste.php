<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION["authenticated"]) || !$_SESSION["authenticated"]) {
    header("Location: index.php");
    exit(0);
}
require_once "../admin/admin/db_connection.php";
$curriculo = $conn->query("SELECT * FROM curriculo");
$utilizador = $conn->query("SELECT * FROM utilizador");
if (!$utilizador) {
    echo "Erro ao aceder a base de dados";
}
if (!$curriculo) {
    echo "Erro ao aceder a base de dados";
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <?php require_once "head.php" ?>
    <link rel="stylesheet" href="../css/Header.css">
    <!-- Inclua aqui os arquivos de estilo CSS e outros recursos necessários -->
</head>

<body>
    <!-- Inclua aqui o cabeçalho -->


    <?php
    // Conecta ao banco de dados
    $db = mysqli_connect($server, $user, $pass, $db_name);

    // Verifica se houve erro na conexão
    if (mysqli_connect_errno()) {
        echo "Falha na conexão com o banco de dados: " . mysqli_connect_error();
        exit();
    }

    // Prepara e executa a consulta SQL
    $sql_user = "SELECT * FROM utilizador WHERE email='" . $_SESSION["email"] . "'";
    $result = mysqli_query($db, $sql_user);

    // Verifica se houve resultados na consulta
    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        echo "Nome do usuário: " . $user_data["nome"];
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($db);
    ?>
    <div class="container m-4">
        <pre>
       <h1>Seja bem Vindo! <?php echo $_SESSION["email"]  ?></h1>
       <h4>Seu número de utilizador é <?php $finn = $conn->query("SELECT nome FROM utilizador");
                $nsocios = mysqli_num_rows($finn);
                echo "$nsocios"; ?></h4>
    </pre>
        <div>
            <span>Session ID: <?php echo session_id(); ?></span>
        </div>
        <table class="tablemain">
            <thead>
                <th>Nome</th>
                <th>Telefone</th>
                <th>idioma</th>
            </thead>
            <tbody>
                <?php while ($curriculos = mysqli_fetch_array($curriculo, MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td><?= $curriculos["nome"] ?></td>
                        <td><?= $curriculos["telefone"] ?></td>
                        <td><?= $curriculos["idioma"] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <style>
        body {
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            color: white;
            text-align: center;
        }

        .tablemain {
            background: rgba(0, 0, 0, 0.4);
            max-width: 100vw;
            width: 100%;
            margin: 1rem;
            border-radius: 15px 15px 0 0;
        }
    </style>


    <!-- Inclua aqui o rodapé -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!-- JQuerry -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>~
    <script src="http://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>

</body>

</html>