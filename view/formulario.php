<?php
require_once 'menu.php';
?>
<div class="container mt-3">
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    require_once '../conexao/conexao.php';
    $conn = new conectares();

    $id = $_GET["id"];
    $query = "select * from tbamigos where id = :id";
    $resultado = $conn->getConn()->prepare($query);
    $resultado->bindParam(':id', $id, PDO::PARAM_INT);
    $resultado->execute();
    $lista = $resultado->fetch(PDO::FETCH_ASSOC);
    ?>
</div>
<div class="formulario">
    <div class="container mt-5">
        <form action="../model/editarcliente.php" method="POST">
            <div class="form-row">
                <input type="hidden" name="id" value="<?php echo $lista['id']?>">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Nome</label>
                    <input type="text" class="form-control" value="<?php echo $lista['nome']?>" name="nome">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Email</label>
                    <input type="email" class="form-control" value="<?php echo $lista['email']?>" name="email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Telefone</label>
                <input type="text" class="form-control" value="<?php echo $lista['telefone']?>" name="telefone">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Data de Nascimento</label>
                    <input type="text" class="form-control" value="<?php echo $lista['data_nascimento'] ?>" name="data_nascimento">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCity">Grau de Amizade</label>
                    <input type="text" class="form-control" value="<?php echo $lista['grau_amizade']?>" name="grau_amizade">
                </div>
            </div>
            <input type="submit" class="btn btn-success large my-1 mr-sm-2" name="editar" value="Editar"/>
            <!-- <a href="../model/listar.php" type="submit" class="btn btn-dark large my-1 mr-sm-2">Voltar</a> -->
        </form>
    </div>
</div>
</body>

</html>