
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (!isset($_SESSION['logado']) && $_SESSION['logado'] != true) {
    header("Location: login.php");
} else {
    echo $_SESSION['usuario'] . " | " . $_SESSION['email'];
    echo " | <a href='../controller/logout.php'>Sair</a>";
}

require_once '../controller/cPessoaJ.php';
$id = 0;
if (isset($_POST['updatePessoaJ'])) {
    $id = $_POST['id'];
}
$listaPessoaJ = new cPessoaJ();
$lis = $listaPessoaJ->getPessoaJById($id);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Pessoa Juridica</title>
    </head>
    <body>
        <h1>Editar Pessoa Juridica</h1>
        <form action="../controller/editarPessoaJ.php" method="POST">
            <input type="hidden" value="<?php echo $lis[0]['idPessoa']; ?>" name="id"/>
            <input type="text" value="<?php echo $lis[0]['nome']; ?>" name="nome"/>
            <br><br>
            <input type="text" value="<?php echo $lis[0]['nomeFantasia']; ?>" name="nomeFantasia"/>
            <br><br>
            <input type="email" value="<?php echo $lis[0]['email']; ?>" name="email"/>
            <br><br>
            <input type="tel" value="<?php echo $lis[0]['telefone']; ?>" name="telefone"/>
            <br><br>
            <input type="text" value="<?php echo $lis[0]['endereco']; ?>" name="endereco"/>
            <br><br>
            <input type="number" value="<?php echo $lis[0]['cnpj']; ?>" name="cnpj"/>
            <br><br>
            <input type="text" value="<?php echo $lis[0]['site']; ?>" name="site"/>
            <br><br>
            <input type="submit" value="Salvar Alterações" name="updatePJ"/>
            <input type="button" value="Cancelar"
                   onclick="location.href = 'listaPessoaJ.php'"/>
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
