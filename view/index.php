<?php
require_once 'menu.php';

?>

<div class=" bg-image" >
    <div class="container">
        <?php if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        } ?>
    </div>
    <div class="container espaco">
        <section class="jumbotron jumbotron-fluid bg-transparent">

            <h1 class=" display-4  text-center text-white"><strong>AGENDA</strong></h1>
            <p class="text-white text-center">Construa sua agenda de contatos online</p>
            <p class="text-center text-white">
            <?php
                if(!isset($_SESSION['user'])){
                    echo  '<a class="text-white" href="usuario.php">Cadastre-se</a></p>';
                }
                else{
                    echo '<a class="text-white" href="../model/listar.php">Minha lista</a></p>';
                }
            ?>
        </section>
    </div>   
</div>
</body>

</html>