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
$cadPessoaJ = new cPessoaJ();
$listaPessoaJ = $cadPessoaJ->getPessoaJ(); 
?> 

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Language" content="pt-br">
        <title></title>
    </head>
    <body>
        <br><br>
        <button onclick="location.href = 'cadPessoaJ.php'">Voltar</button>
        <h1>Lista de Pessoas Juridicas</h1>
        <table>
            <thead><!-- Cabeçalho da tabela -->
                <tr>
                    <th>ID</th><th>Nome</th><th>E-mail</th><th>Funções</th>
                </tr>
            </thead>
            <tbody><!-- Corpo da tabela -->
                <?php if ($listaPessoaJ == null) {
                echo "Tabela Pessoa Jurídica esta vazia!";
                } else { foreach ($listaPessoaJ as $pessoaJ): ?>
                    <tr>
                        <td><?php echo $pessoaJ['idPessoa'] ?></td>
                        <td><?php echo $pessoaJ['nome'] ?></td>
                        <td><?php echo $pessoaJ['email'] ?></td>
                        <td> 
                            <?php if ($pessoaJ['email'] != $_SESSION['email']) { ?>
                                <form action="../controller/deletePessoaJ.php" method="post">
                                    <input type="hidden" value="<?php echo $pessoaJ['idPessoa'] ?>" name="idPessoa"/>
                                    <input type="submit" name="deletar" value="Deletar"/>
                                </form>

                                <form action="editPessoaJ.php" method="POST"> 
                                    <input type="hidden" name="id" value="<?php echo $pessoaJ['idPessoa']; ?>"/>  
                                    <input type="submit" name="updatePessoaJ" value="Editar"/>
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
