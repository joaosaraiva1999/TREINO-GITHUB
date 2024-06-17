<?php
session_start();
require_once "db_connection.php";
$reservas = $conn->query("select * from reservas");
if (!$reservas) {
    die("Erro ao Aceder a base de dados");
}
;
?>
<!DOCTYPE html>
<html lang="en">

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
                    <!-- colocar título da página -->
                    <?php
                    //Local o   nde são apresentadas mensagens de erro e sucesso, caso existam
                    require_once "parcial/msg_erros.php";
                    require_once "parcial/msg_sucesso.php";
                    ?>
                    <h1 class="mt-4">Listagem de Reservas</h1>
                    <!-- colocar conteúdo da página -->
                    <div class="m-5">
                        <table id="tabelareservas" class="">
                            <thead>
                                <tr>
                                    <th>
                                        ID Reserva
                                    </th>
                                    <th>
                                        Nome
                                    </th>
                                    <th>
                                        Data Reserva
                                    </th>
                                    <th>
                                        Metodo Pagamento
                                    </th>
                                    <th>
                                        Mesa
                                    </th>
                                    <th>
                                        Nº de Pessoas
                                    </th>
                                    <th>
                                        Opções
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($user_data = mysqli_fetch_assoc($reservas)) {
                                    echo "<tr>";
                                    echo "<td>" . $user_data['reserva'] . "</td>";
                                    echo "<td>" . $user_data['nome'] . "</td>";
                                    echo "<td>" . $user_data['data_reserva'] . "</td>";
                                    echo "<td>" . $user_data['metodo'] . "</td>";
                                    echo "<td>" . $user_data['mesa'] . "</td>";
                                    echo "<td>" . $user_data['pessoas'] . "</td>";
                                    ?> 
                                    <td>
                                            <a href="editar_perguntas.php?id=<?= $faqq["id"] ?>"
                                                class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="apagar_perguntas.php" method="post" class="d-inline"
                                            onsubmit="return confirm('Pretende apagar o registo?');">
                                                <input type="hidden" name="id" value="<?=$faqq["id"]?>">
                                                <button type="submit" class="btn btn-xs p-1 text-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    <?php
                                    echo "</tr>";
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="http://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#tabelareservas').DataTable({
                "language": {
                    "sProcessing": "Processando...",
                    "sLengthMenu": "Mostrar _MENU_ registos",
                    "sZeroRecords": "Não se encontraram resultados",
                    "sEmptyTable": "Não existem dados a mostrar",
                    "sInfo": "Mostrando registos de _START_ a _END_ de um total de _TOTAL_ registos",
                    "sInfoEmpty": "Mostrando registos de 0 a 0 de um total de 0 registos",
                    "sInfoFiltered": "(filtrando de un total de _MAX_ registos)",
                    "sInfoPostFix": "",
                    "sSearch": "Pesquisar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Carregando...",

                    "oAria": {
                        "sSortAscending": ": Ativar para ordenar a coluna de forma ascendente",
                        "sSortDescending": ": Ativar para ordenar a coluna de forma descendente"
                    }
                }
            });
        });
    </script>
</body>



<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="../js/scripts.js"></script>
</body>

</html>