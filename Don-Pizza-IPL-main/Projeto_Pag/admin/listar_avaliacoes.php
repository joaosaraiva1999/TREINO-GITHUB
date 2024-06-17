<?php
session_start();

// Conexão com o banco de dados
require_once "db_connection.php";

// Consultar dados das tabelas
$avaliacoes = $conn->query("SELECT * FROM avaliacao");
if (!$avaliacoes) {
    die("Erro ao acessar a base de dados: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Dashboard - Nome do Projeto</title>
    <link href="css/styles_admin.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
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
                    <h1 class="mt-4">Listagem de Avaliações</h1>

                    <div>
                        <table id="tabelaavaliacoes">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Estrelas</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($avaliacao = $avaliacoes->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?= htmlspecialchars($avaliacao["avaliacao"]) ?></td>
                                        <td><?= htmlspecialchars($avaliacao["nome"]) ?></td>
                                        <td><?= htmlspecialchars($avaliacao["estrelas"]) ?></td>
                                        <td>
                                            <a href="visualizar_avaliacao.php?avaliacao=<?= $avaliacao["avaliacao"] ?>" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="editar_avaliacao.php?avaliacao=<?= $avaliacao["avaliacao"] ?>" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="apagar_avaliacao.php?avaliacao=<?= $avaliacao["avaliacao"] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja apagar esta avaliação?');">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
            </main>
            <?php require_once "parcial/footer.php"; ?>
        </div>
    </div>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="http://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabelaavaliacoes').DataTable({
                "language": {
                    "sProcessing": "Processando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "Não foram encontrados resultados",
                    "sEmptyTable": "Nenhum dado disponível nesta tabela",
                    "sInfo": "Mostrando registros de _START_ a _END_ de um total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros de 0 a 0 de um total de 0 registros",
                    "sInfoFiltered": "(filtrado de um total de _MAX_ registros)",
                    "sSearch": "Pesquisar:",
                    "oAria": {
                        "sSortAscending": ": ativar para ordenar a coluna em ordem crescente",
                        "sSortDescending": ": ativar para ordenar a coluna em ordem decrescente"
                    }
                }
            });
        });
    </script>
</body>

</html>
<?php
// Fechar a conexão
$conn->close();
?>
