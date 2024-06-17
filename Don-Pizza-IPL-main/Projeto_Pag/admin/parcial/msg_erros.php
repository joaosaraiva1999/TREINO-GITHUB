<!-- As mensagens de erro devem ser guardadas da seguinte forma:
     $_SESSION["erros"]["nome_erro"] = "Mensagem de erro";
-->

<?php
if(!empty($_SESSION["erros"])): ?>
    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
        <strong>Existem erros de validação:</strong>
        <ul>
            <?php
            $erros=$_SESSION["erros"];
            foreach($erros as $erro => $mensagem):  ?>
                <li><strong><?=$erro?></strong> - <?=$mensagem?> </li>
            <?php endforeach; ?>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php 
    unset($_SESSION["erros"]);
endif; ?>