<!-- A mensagem de sucesso deve ser guardada da seguinte forma:
     $_SESSION["msg_sucesso"] = "Mensagem de sucesso";
-->
<?php if(!empty($_SESSION["msg_sucesso"])): ?>
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        <?=$_SESSION["msg_sucesso"]?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION["msg_sucesso"]); 
endif;
?>