
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

require_once '../controller/cUsuario.php';
$id = 0;
if (isset($_POST['updateUser'])) {
    $id = $_POST['id'];
}
$listaUser = new cUsuario();
$lis = $listaUser->getUsuarioById($id);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Usuário</title>
    </head>
    <body>
        <h1>Editar Usuário</h1>
        <form action="../controller/editUser.php" method="POST">
            <input type="hidden" value="<?php echo $lis[0]['idUser']; ?>" name="id"/>
            <input type="text" value="<?php echo $lis[0]['nomeUser']; ?>" name="nome"/>
            <br><br>
            <input type="email" disabled value="<?php echo $lis[0]['email']; ?>" name="email"/>
            <br><br>
            <input type="submit" value="Salvar Alterações" name="update"/>
            <input type="button" value="Cancelar"
                   onclick="location.href = 'listaUsuarios.php'"/>
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
