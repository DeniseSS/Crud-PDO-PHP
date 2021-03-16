<?php require_once '../view/menu.php';


?>
 <div class="container mt-3">
        <?php
             if (isset($_SESSION['msg'])) {
             echo $_SESSION['msg'];
             unset($_SESSION['msg']);
             }
        ?>
    </div>
<div><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a type="button" class="btn btn-success btn-block bt-adicionar" data-toggle="modal" data-target="#exampleModalAdicionar">Adicionar Contato</a>
            </div>
            <div class="col-md-4 ml-auto ">
                <form class="form-inline  my-2 my-lg-0  mt-5 ml-5" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <input class="form-control mr-sm-2" type="search" name="pesquisa" placeholder="Pesquisar" aria-label="Search">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="list-group">
            <a href="#" class="listaGrupos list-group-item list-group-item-action flex-column align-items-start active">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Lista de Contatos</h5>
                </div>
            </a>
            <?php
            require_once '../conexao/conexao.php';

            
            $conn = new conectares();

            

            $consulta = "select * from tbamigos ";

            if (isset ($_POST)) {
               if(isset ($_POST['pesquisa'])){

                $pesquisa = $_POST['pesquisa'];
                
                $consulta = "select * from tbamigos where nome LIKE'%$pesquisa%'";

               }
            $resultado = $conn->getConn()->prepare($consulta);
            $resultado->execute();
            while ($listar = $resultado->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <a data-toggle="collapse" href="#collapseExample<?php echo $listar['id'] ?>" role="button" aria-expanded="false" aria-controls="collapseExample" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><?php echo $listar['nome'] ?></h5>
                        <small class="text-muted">Clique para detalhes</small>
                    </div>
                    <p class="mb-1"><?php echo $listar['email'] ?></p>
                </a>
                <div class="collapse" id="collapseExample<?php echo $listar['id'] ?>">
                    <div class="card card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9">
                                    <p class="font-weight"><b>Nome:</b> <?php echo $listar['nome'] ?></p>
                                    <p class="font-weight"><b>Email:</b> <?php echo $listar['email'] ?></p>
                                    <p class="font-weight"><b>Telefone:</b> <?php echo $listar['telefone'] ?></p>
                                    <p class="font-weight"><b>Data de Nascimento:</b> <?php echo $listar['data_nascimento'] ?></p>
                                    <p class="font-weight"><b>Grau de Amizade:</b> <?php echo $listar['grau_amizade'] ?></p>
                                </div>
                                <div class="col">
                                    <a href="../view/formulario.php?id=<?php echo $listar['id']?>" class="btn btn-warning">Alterar</a>
                                    <a href="../model/excluircliente.php?id=<?php echo $listar['id']?>" class="btn btn-danger">Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
        }
            ?>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalAdicionar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:rgb(0,200,60)">
                <h5 class="modal-title" id="exampleModalLongTitle">Adicionar Amigo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="..\model\gravarDados.php" method="POST">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Nome</label>
                            <input type="text" class="form-control" name="nome" placeholder="Nome">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Telefone</label>
                        <input type="text" class="form-control" name="telefone" placeholder="(11)12345-6789">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Data de Nascimento</label>
                            <input type="text" class="form-control" name="data_nascimento">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Grau de Amizade</label>
                            <select class="custom-select my-1 mr-sm-2" name="grau_amizade">
                                <option selected>Escolher...</option>
                                <option value="MA">Melhor Amigo</option>
                                <option value="AM">Amigo</option>
                                <option value="CG">Colega</option>
                                <option value="NL">Nem Ligo</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success large my-1 mr-sm-2">Cadastrar</button>
                    <a href="listar.php" type="submit" class="btn btn-dark large my-1 mr-sm-2">Voltar</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>