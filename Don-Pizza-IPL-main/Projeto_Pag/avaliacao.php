<?php
$servername = "localhost";
$username = "root";
$password = "Wimbledon_7";
$dbname = "bd_vp";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar dados do formulário
    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $descricao = $_POST['descricao'];

    // Conectar ao banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Inserir dados na tabela avaliacao
    $sql = "INSERT INTO avaliacao (nome, apelido, email, telefone, descricao) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nome, $apelido, $email, $telefone, $descricao);

    if ($stmt->execute()) {
        echo "Novo registro criado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    // Fechar a conexão
    $stmt->close();
    $conn->close();
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Avaliação</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom CSS -->
    <link href="css/style_avaliacao.css" rel="stylesheet">
  </head>
  <body class="p-3 m-0 border-0 bd-example m-0 border-0">

<head>
<?php 
require_once "scripts/head.php"
?>
    <link rel="stylesheet" href="css\style_reservas.css">
</head>

<div>
<?php 
    require_once "scripts/header.php"
?>

    <div class="container mt-5">
        <div class="card-container m-5">
            <div class="card card-custom">
                <div class="card-horizontal">
                    <div class="card-body w-100 p-md-5 p-4">

                    <p class="fs-3">Avaliação</p>

                        <form method="POST" action="avaliacao.php" class="row g-3">
                          <div class="col-md-6">
                              <label for="nome" class="form-label">Nome</label>
                              <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o seu nome" required>
                          </div>
                          <div class="col-md-6">
                              <label for="apelido" class="form-label">Apelido</label>
                              <input type="text" class="form-control" id="apelido" name="apelido" placeholder="Insira o seu apelido">
                          </div>
                          <div class="col-12">
                              <label for="email" class="form-label">Email</label>
                              <input type="email" class="form-control" id="email" name="email" placeholder="Insira o seu email" required>
                          </div>
                          <div class="col-12">
                              <label for="telefone" class="form-label">Telefone</label>
                              <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Insira o seu telefone">
                          </div>
                          <div class="mb-3">
                              <label for="descricao" class="form-label">Avaliação</label>
                              <textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="Descreva a sua experiência"></textarea>
                          </div>
                          <div class="col-12">
                              <button type="submit" class="btn btn-primary">Submeter</button>
                          </div>
                      </form>
                    </div>
                    <div class="image-container">
                        <img class="card-img-right" src="img/pizza.jpg" alt="Card image cap">
                        <div class="hidden-card">
                            <div class="card-body">
                                <h5 class="card-title">DON PIZZA</h5>
                                <p class="card-text">Descreva a sua experiência na DON PIZZA</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
<?php 
require_once "scripts/footer.php"
?>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gyb4fQKO6Xh7ph8tHaA1lWgMXQhMUHEU6LgNfOPP3VJp2Aw8g" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9QMBR8l2LB3jWBCsow93Q9LFpGV6HxxD4G6PGN4Ek9subF9HgKfZj" crossorigin="anonymous"></script>
  </body>
</html>
