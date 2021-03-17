<?php
require_once 'menu.php';

?>
<main class="jumbotron bg-image2  align-items-center" style="border-radius:0px;">
    
        <div class="container" align="center">
            <div class="container">
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
            </div>
            
            <div class="card my-4 w-50" style="background-color:rgba(10,20,10, 0.7); ">
            <br/>
            <h5 class="text-white">INFORME SEUS DADOS</h5>

                <form class="mt-5" action="..\model\usuarioDados.php " method="POST">
                    
                    <div class="form-col center mt-3" align="center">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="nome" placeholder="Nome">
                        </div>
                        <div class="form-group col-md-6" align="center">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                    
                    <div class="form-group col-md-6" align="center">
                        <input type="password" class="form-control" name="senha" placeholder="Senha">
                    </div>
                    <div class="form-group col-md-6" align="center">
                        <input type="password" class="form-control" name="confsenha" placeholder="Confirmar senha">
                    </div>
                    <button type="submit" class="btn btn-outline-light  my-1 mr-sm-2">Cadastrar</button>
                </form>
            </div>
            </div>
    
</main>
</body>

</html>