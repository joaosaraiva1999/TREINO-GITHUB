<?php
if (isset($_POST['utilizador'])) {
    include_once('admin/admin/db_connection.php');

    $utilizador = $_POST['utilizador'];
    $reserva = $_POST['data_reserva'];
    $people = $_POST['pessoas'];
    $erro = [];

    if (empty($utilizador) || strlen($utilizador) < 3) {
        $erro[] = 'O utilizador está Invialido';
    }

    if (empty($reserva)) {
        $erro[] = 'Por favor, selecione uma data de reserva.';
    } else if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $reserva)) {
        $erro[] = 'Formato de data inválido.';
    }

    if (empty($people)) {
        $erro[] = 'Número de pessoas Inválido';
    }

    if (empty($erro)) {
        $stmt = $conn->prepare("INSERT INTO reservas (nome, data_reserva, pessoas) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $utilizador, $reserva, $people);
        if ($stmt->execute()) {
            $idreserva = $stmt->insert_id;
            echo json_encode(['status' => 'success', 'idreserva' => $idreserva]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Erro ao criar a reserva: ' . $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'errors' => $erro]);
    }
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "scripts/head.php"
    ?>
    <link rel="stylesheet" href="css/style_reservas.css">
</head>

<div>
    <?php
    require_once "scripts/header.php"
    ?>
    <div class="container9">
        <div class="hero">
            <img src="img\1.png">
        </div>
    </div>
    <div class="container4">
        <div class="card_body">
            <div class="card_image">
                <img id='card_pic' src="img/Red Modern Hot Burger Promotion Instagram Post.png">
            </div>
            <div class="card_desc">
                <h3 class='h3_card text-light'>Eventos</h3>
                <h5 class="h5_card text-light">Faça aqui o seu Evento!</h5>
                <a href="#" class='lermais'>Read More</a>
            </div>
        </div>
        <div class="card_body">
            <div class="card_image">
                <img id='card_pic' src="img\almoço.png">
            </div>
            <div class="card_desc">
                <h3 class='h3_card text-light'>Almoços</h3>
                <h5 class="h5_card text-light">Faça o seu Almoço Aqui!</h5>
                <a href="#" class='lermais'>Read More</a>
            </div>
        </div>
        <div class="card_body">
            <div class="card_image">
                <img id='card_pic' src="img\jantar.png">
            </div>
            <div class="card_desc">
                <h3 class='h3_card text-light'>Jantares</h3>
                <h5 class="h5_card text-light">Faça o seu jantar aqui!</h5>
                <a href="#" class='lermais'>Read More</a>
            </div>
        </div>
    </div>
    <div class="container6">
        <div class="imagem6">
            <img src="img\Hot Weekend Offer Burger or Fast Food Instagram Post.png">
        </div>
        <div class="form6">
            <form action="" class='form1' method="POST" id='form_reserva'>
                <div class="row mb-3">
                    <div class="col box" id="first-name-container">
                        <label for="utilizador" class="form-label text-dark">Nome</label>
                        <input type="text" name='utilizador' id="utilizador" class="form-control"
                            placeholder="Primeiro Nome">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col" id="data_reserva-container">
                        <label for="data_reserva" class="form-label text-dark">Data Reserva</label>
                        <input type="date" name='data_reserva' id="data_reserva" class="form-control">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="col" id="pessoas-container">
                        <label for="pessoas" class="form-label text-dark">Nº Pessoas</label>
                        <input type="number" name='pessoas' id="pessoas" class="form-control"
                            placeholder="Nº de Pessoas">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="mb-3 mt-3">
                    <button type="submit" name='submit' id='submit' class="btn btn-danger mb-4">Reservar</button>
                </div>
            </form>
            <div class="modal fade" id='modalreserva' tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header  bg-warning">
                            <h5 class="modal-title">Reserva</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bg-warning">
                        <p>A sua reserva foi feita com sucesso. O seu ID de reserva é: <span style='font-weight: bold;'></span></p>
                        </div>
                        <div class="modal-footer bg-warning">
                            <button type="button" class="btn btn-danger"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
</div>
<div>
    <button type="button" class="btn btn-warning sticky-button btn-lg border-light text-bold" data-bs-toggle="modal"
        data-bs-target="#exampleModal">
        Você ja tem Reserva?
    </button>


    <div class="modal fade modal-xl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id='modalbody'>
                    <div class="container3_2">
                        <div class="container2_2">
                            <img src="img\Banner -  pizza.png">
                        </div>
                        <div class="reservainput">
                            <form class='form2' action='#' id='form_refresh' method="POST">
                                <div>
                                    <label class='label' for="pesquisar_reserva">Insira o ID da sua Reserva:</label>
                                    <input type="text" name="search" id="pesquisar_reserva">
                                    <button class='btn btn-danger mb-4 mt-3' type='submit'>Procurar</button>
                                    <div id="search-feedback" class="invalid-feedback"></div>
                                </div>
                            </form>
                        </div>
                        <div id="php-results">

                        </div>
                    </div>
                </div>
                <div class="modal-footer" id='modalfooter'>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>
<!--JQUERY-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script defer src="js/script.js"></script>
</body>

</html>