<?php
require_once 'menu.php';

?>
<div class="bg-image2">
    
        <div class="container espaco bg-transparent" align="center">
            <div class="container">
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
            </div>
            
            <main class="form" style="background-color:rgba(10,20,10, 0.7); ">
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
                    </div>
                    <div class="form-group col-md-6" align="center">
                        <input type="password" class="form-control" name="senha" placeholder="Senha">
                    </div>
                    <div class="form-group col-md-6" align="center">
                        <input type="password" class="form-control" name="confsenha" placeholder="Confirmar senha">
                    </div>
                    <button type="submit" class="btn btn-outline-light  my-1 mr-sm-2">Cadastrar</button>
                </form>
            </main>
            </div>
    
</div>
</body>

</html>