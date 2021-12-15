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
require_once '../controller/cPessoaF.php';
$cadPessoaF = new cPessoaF();
$listaPessoaF = $cadPessoaF->getPessoaF();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Language" content="pt-br">
        <title></title>
    </head>
    <body>
        <br><br>
        <button onclick="location.href = 'cadPessoaF.php'">Voltar</button>
        <h1>Lista de Pessoas Fisicas</h1>
        <table>
            <thead><!-- Cabeçalho da tabela -->
                <tr>
                    <th>ID</th><th>Nome</th><th>E-mail</th><th>Funções</th>
                </tr>
            </thead>
            <tbody><!-- Corpo da tabela -->
                <?php if ($listaPessoaF == null) {
                echo "Tabela Pessoa Fisica esta vazia!";
                } else { foreach ($listaPessoaF as $pessoaF): ?>
                    <tr>
                        <td><?php echo $pessoaF['idPessoa'] ?></td>
                        <td><?php echo $pessoaF['nome'] ?></td>
                        <td><?php echo $pessoaF['email'] ?></td>
                        <td>
                            <?php if ($pessoaF['email'] != $_SESSION['email']) { ?>
                                <form action="../controller/deletePessoaF.php" method="post">
                                    <input type="hidden" value="<?php echo $pessoaF['idPessoa'] ?>" name="idPessoa"/>
                                    <input type="submit" name="deletar" value="Deletar"/>
                                </form>

                                <form action="editPessoaF.php" method="POST"> 
                                    <input type="hidden" name="id" value="<?php echo $pessoaF['idPessoa']; ?>"/>  
                                    <input type="submit" name="updatePessoaF" value="Editar"/>
                                </form>

                            <?php }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; }
                ?>               
            </tbody>
        </table>
        <?php
        // put your code here
        ?>
    </body>
</html>
