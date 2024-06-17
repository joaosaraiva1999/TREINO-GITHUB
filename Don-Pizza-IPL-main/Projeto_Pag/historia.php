<?php 
 require_once "admin/admin/db_connection.php";
 $socios = $conn->query("SELECT * FROM programa_socio");
 if (!$socios) {
     die("Erro ao Aceder a base de dados");
 };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require_once "scripts/head.php"
    ?>
    <link rel="stylesheet" href="css/style_historia.css">
</head>

<body>
    <?php require_once "scripts/header.php" ?>
    <main>
        <div class="container1">
            <div> 
                <div class="img"><img src="img/delicious-pizza-indoors.jpg" alt="big" id="banner"><h1 class="titulo">História</h1> <p class="subtitulo">Don Pizza</p></div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#FF7A00" fill-opacity="1" d="M0,192L30,176C60,160,120,128,180,149.3C240,171,300,245,360,234.7C420,224,480,128,540,80C600,32,660,32,720,64C780,96,840,160,900,181.3C960,203,1020,181,1080,176C1140,171,1200,181,1260,192C1320,203,1380,213,1410,218.7L1440,224L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path>
                </svg>
            </div>
        </div>
        <div class="face2">
            <div id="his">
                <h2>Don Pizza </h2>
                <div>
                    <p>
                        Inspirado pelas receitas familiares e pelo amor pela gastronomia italiana, um empreendedor
                        decidiu abrir as portas de um modesto estabelecimento. Chamada simplesmente de "Don Pizza",
                        a
                        pizzaria rapidamente se tornou um ponto de encontro popular para os moradores locais em
                        busca de
                        uma deliciosa experiência gastronômica.
                        Com uma atmosfera acolhedora e aromas tentadores, Don Pizza conquistou o paladar dos
                        clientes
                        com suas pizzas feitas à mão e ingredientes frescos. A reputação da pizzaria cresceu
                        rapidamente, e logo se tornou um destino favorito para famílias, amigos e casais em busca de
                        uma
                        refeição saborosa e descontraída.
                        Ao longo dos anos, Don Pizza continuou a servir a comunidade de Leiria com dedicação e
                        paixão
                        pela autêntica culinária italiana, criando um legado de sabores que permaneceria vivo por
                        gerações.
                    </p>
                </div>

            </div>
        
        <section class="cardd">
        <div>
                    <div class="tit">
                        <h2>Estatísticas</h2>
                    </div>
                    <div class="cardd">
                        <div id="lol">
                            <h2 class="counter" data-target="4">0</h2>
                            <p>Estabelicimentos Abertos</p>
                        </div>
                        <div id="lol">
                            <h2 class="counter" data-target="2">0</h2>
                            <p>Cidades diferentes</p>
                        </div>
                        <div id="lol">
                            <h2 class="counter" data-target="+10000"></h2>
                            <p>Clientes Servidos</p>
                        </div>
                        <div id="lol">
                            <h2 class="counter"data-target="<?php 
                            $resultado = $conn -> query("SELECT socio FROM programa_socio");
                            $nsocios = mysqli_num_rows($resultado);
                            echo "$nsocios";
                            ?>">0</h2>
                            <p>Tipos de Sócios Diferentes</p>
                        </div>
                        <div id="lol">
                            <h2 class="counter" data-target="<?php    
                             $resultado = $conn -> query("SELECT AVG(preco) AS average FROM programa_socio");
                             $preavg = $resultado  ->fetch_assoc();
                             $avg = $preavg["average"];
                            echo $avg
                                ?>"> 0 </h2>
                            <p>Preço médio do Programa Socio</p>
                        </div>
                    </div>
                </div>
                
        </section>
        </div>

    </main>
    <br>
    <br>
    <br>
    <br>
    <?php require_once "scripts/footer.php" ?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!-- JQuerry -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="js/counterup.js"></script>
    <script src="js/navigation.js"></script>
    <script src="js/load.js"></script>
    <script src="js/loading.js"></script>
</body>

</html>