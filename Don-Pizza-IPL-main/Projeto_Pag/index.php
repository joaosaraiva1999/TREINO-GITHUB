<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "scripts/head.php";
    ?>
    <link rel="stylesheet" href="css/style_index.css">
</head>

<body>
    <?php
    require_once "scripts/header.php";
    ?>

    <main id="home">
        <div class="container-home">
            <div class="left">  
                <img src="img/Image-1.png" alt="Image de Pizza">
            </div>
            <div class="right">
                <h1 class="color-orange text-gd">Pizzaria Don Pizza</h1>
                <h4 class="color-cinza-1 text-md">Reúna-se e desfrute de momentos deliciosos no Don Pizza!</h4>
                <a href="#" class="btn" id="button">Ver Menu</a>
            </div>
        </div>

        <!-- Section cards -->

        <section class="speciality" id="speciality">

            <h1 class="heading">Explore <span>Nosso</span> Menu</h1>

            <div class="box-container">
                <div class="box">
                    <img src="img/Pizza_Catupiry.jpg" alt="Pizza de Catupiry" class="image">
                    <div class="content">
                        <img src="img/Menu-Image6.png" alt="Promotions" class="image-icon">
                        <h3>Pizza com Catupiry</h3>
                        <p>Pizza Don na Base / Queijo Mussarela / Bordas de Catupiry</p>
                    </div>
                </div>
                <div class="box">
                    <img src="img/Sandwich.jpg" alt="Sandwich" class="image">
                    <div class="content">
                        <img src="img/Menu-Image1.png" alt="Sandwich-Icon" class="image-icon">
                        <h3>Hamburguer</h3>
                        <p>Frango / Tomate / Alface / Cebola</p>
                    </div>
                </div>
                <div class="box">
                    <img src="img/Batatas_Rústicas.jpg" alt="Patatos" class="image">
                    <div class="content">
                        <img src="img/Menu-Image5.png" alt="Patatos-Icon" class="image-icon" id="Patatos-icon">
                        <h3>Batatas Rústicas</h3>
                        <p>Batatas Rústicas irresistíveis cozinhadas no forno</p>
                    </div>
                </div>
                <div class="box">
                    <img src="img/Brownie_chocolate.jpg" alt="Brownie" class="image">
                    <div class="content">
                        <img src="img/Menu-Image3.png" alt="Brownie-Icon" class="image-icon" id="Brownie-icon">
                        <h3>Brownie</h3>
                        <p>Brownie com Chocolate<br>PROMOÇÃO: Compra 2 por 5€ ou 4 por 9€</p>
                    </div>
                </div>
                <div class="box">
                    <img src="img/Néctar_manga_laranja_vital.jpg" alt="Drinks" class="image" id="orange_drink">
                    <div class="content">
                        <img src="img/Menu-Image4.png" alt="Drink-Icon" class="image-icon" id="Nectar-icon">
                        <h3>Néctar Manga Laranja Vital</h3>
                    </div>
                </div>
                <div class="box">
                    <img src="img/pizza_calabresa_e_mussarela_4389_600.jpg" alt="Pizza" class="image">
                    <div class="content">
                        <img src="img/Menu-Image2.png" alt="Pizza-Icon" class="image-icon">
                        <h3>Pizza de Calabreza</h3>
                        <p>Molho Don Base / Queijo Mussarela / Pepperoni </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="steps">
            <div class="box-steps">
                <img src="img/Pizza_and_Drink.png" alt="Pizza and Drink">
                <h3>Escolha sua comida Preferida</h3>
            </div>


            <div class="box-steps">
                <img src="img/Pizza_Delivery_Driver.png" alt="Pizza Delivery Driver">
                <h3>Entrega Rápida e Grátis</h3>
            </div>

            <div class="box-steps">
                <img src="img/Card Payment Icon.png" alt="Card Payment">
                <h3>Método de Pagamento Fácil</h3>
            </div>

            <div class="box-steps">
                <img src="img/Child_Eating.png" alt="Child Eating">
                <h3>E Finalmente, Apreciar sua comida</h3>
            </div>
        </section>




        <?php require_once "scripts/form.php" ?>

        <a href="#home" class="fas fa-angle-up" id="scroll-top"></a>

        <div class="loader-container">
            <canvas id="pizza"></canvas>
        </div>


    </main>
    <?php
    require_once "scripts/footer.php"
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script src="js/navigation.js"></script>
    <script src="js/main.js"></script>
    <script src="js/load.js"></script>
    <script src="js/form.js"></script>
    <script src="js/validation.js"></script>
    <script src="js/loading.js"></script>
</body>

</html>