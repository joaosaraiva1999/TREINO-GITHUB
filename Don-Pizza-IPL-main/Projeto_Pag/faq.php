<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  require_once('admin/db_connection.php');

  $id = '0';
  $nome = $_POST['nome'];
  $pergunta = $_POST['pergunta'];
  $currentDate = date("Y-m-d H:i:s");
  $result = mysqli_query($conn, ("INSERT INTO faq(id, nome, pergunta, data_perg) VALUES ('$id','$nome','$pergunta','$currentDate')"));

  $conn->close();
};

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require_once "scripts/head.php";
  ?>
  <link rel="stylesheet" href="css/style_faq.css">
</head>

<body>
  <?php
  require_once "scripts/header.php";
  ?>

  <main>
    <section>
      <div class="img"><img src="img/5241461.jpg" alt="question">
        <h1 class="titulo">FAQ</h1>
        <p class="subtitulo">Perguntas Frequentes</p>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#D14F4F" fill-opacity="1" d="M0,256L30,240C60,224,120,192,180,165.3C240,139,300,117,360,96C420,75,480,53,540,85.3C600,117,660,203,720,245.3C780,288,840,288,900,288C960,288,1020,288,1080,250.7C1140,213,1200,139,1260,138.7C1320,139,1380,213,1410,250.7L1440,288L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z">
        </path>
      </svg>
    </section>
    <section class="container">


      <div class="card">
        <div class="card-body">
          <div class="accordion-container">
            <div class="title-accordion">
              <svg fill="#FF7A00 " width="64px" height="64px" viewBox="-0.95 -0.95 20.90 20.90" xmlns="http://www.w3.org/2000/svg" class="cf-icon-svg" stroke="#FF7A00 " stroke-width="0.00019">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.038"></g>
                <g id="SVGRepo_iconCarrier">
                  <path d="M16.417 9.579A7.917 7.917 0 1 1 8.5 1.662a7.917 7.917 0 0 1 7.917 7.917zm-4.165-4.6a10.965 10.965 0 0 0-7.662-.004.396.396 0 1 0 .275.742 10.173 10.173 0 0 1 7.11.003.396.396 0 1 0 .277-.741zm-.435 1.48s-.23-.09-.498-.175a9.597 9.597 0 0 0-5.697-.034c-.3.09-.596.205-.596.205a.308.308 0 0 0-.175.407l3.444 8.327c.067.16.175.16.242 0l3.453-8.323a.31.31 0 0 0-.173-.408zM6.875 8.662a1.026 1.026 0 1 0-1.026-1.026 1.026 1.026 0 0 0 1.026 1.026zm1.546 3.852a1.026 1.026 0 1 0-1.026-1.025 1.026 1.026 0 0 0 1.026 1.025zm1.16-2.747a1.026 1.026 0 1 0-1.026-1.026A1.026 1.026 0 0 0 9.58 9.768z">
                  </path>
                </g>
              </svg> Faq's <div class="accordion" id="monogram-acc">
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                      Há opções vegetarianas?
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#monogram-acc">
                    <div class="accordion-body">
                      Claro! Temos várias opções vegetarianas deliciosas no nosso menu. Nossas pizzas vegetarianas
                      incluem a <strong> Margherita</strong>, <strong>Quatro Queijos</strong> e a
                      <strong>Vegetariana</strong> (com pimentões, cogumelos, azeitonas e cebolas). Além disso, também
                      podemos personalizar qualquer pizza de acordo com suas preferências.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                      O estabelicimento é acessivel a pessoas com dificiências físicas ou psiquicas?
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#monogram-acc">
                    <div class="accordion-body">
                      Sim, nosso estabelecimento é acessível a pessoas com <strong>deficiências físicas e
                        psíquicas</strong>. Temos <strong>rampas de acesso, casas de banho adaptadas e mesas
                        espaçosas</strong> para acomodar cadeiras de rodas. Além disso, toda a nossa equipa está
                      treinada para oferecer todo o suporte necessário. Se precisar de alguma assistência específica,
                      por favor, avise-nos!
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                      Quais são as formas de pagamento?
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" data-bs-parent="#monogram-acc">
                    <div class="accordion-body">
                      Aceitamos várias formas de pagamento para sua conveniência: <strong>MB Way, Transferência bancária
                        e Dinheiro</strong>. No entanto, não aceitamos cheques. Se tiver alguma outra dúvida, estamos à
                      disposição para ajudar!
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                      Fazem rodízio de Pizzas?
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" data-bs-parent="#monogram-acc">
                    <div class="accordion-body">
                      Atualmente, <strong>não oferecemos</strong> rodízio de pizzas. No entanto, temos uma variedade
                      extensa de pizzas deliciosas no nosso menu para você escolher. Se precisar de alguma recomendação,
                      ficaremos felizes em ajudar!
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



    <section class="container">
      <div class="card">
        <div class="ptitle">
          <h1 class="titlefaq">Formulário de Nova Pergunta</h1>
        </div>
        <form action="#" method="POST">
          <div class="pb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name='nome'>
          </div>
          <div class="pb-3">
            <label for="pergunta" class="form-label">Pergunta</label>
            <textarea class="form-control" id="pergunta" rows="2" name='pergunta'></textarea>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Confirma a Pergunta</label>
          </div>
          <button type="submit" class="btn btn-primary">Submeter</button>
        </form>
      </div>
    </section>
  </main>
  <br>
  <br>
  <br>
  <br>
  <?php
  require_once "scripts/footer.php"
  ?>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

  <script src="js/navigation.js"></script>
</body>

</html>