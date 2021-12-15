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
    echo " | <a href= '../controller/logout.php'>Sair</a>";
}
require_once '../controller/cPessoaJ.php';
$cadPessoaJ = new cPessoaJ();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Language" content="pt-br">
        <title></title>
    </head>
    <body>

        <h1>Cadastro de Pessoa Juridica</h1>
        <form action="<?php $cadPessoaJ->inserirPessoaJ(); ?>" method="POST">
            <input type="text" required placeholder="Nome aqui..." name="nome"/>
            <br><br>
            <input type="text" required placeholder="Nome Fantasia aqui..." name="nomeFantasia"/>
            <br><br>
            <input type="tel" required placeholder="Telefone aqui..." name="telefone"/>
            <br><br>
            <input type="email" required placeholder="E-mail aqui..." name="email"/>
            <br><br>
            <input type="text" placeholder="Endereço aqui..." name="endereco"/>
            <br><br>
            <input type="number" placeholder="CNPJ aqui..." minlength="14" maxlength="14" name="cnpj"/>
            <br><br>
            <input type="text" placeholder="Site aqui..." name="site"/>
            <br><br>
            <input type="submit" name="salvarPJ" value="Salvar"/>
            <input type="reset" name="limpar" value="Limpar"/>
            <input type="button" value="Voltar"
                   onclick="location.href = '../index.php'"/>
            <br><br>
            <input type="button" value="Lista Pessoa Juridica" 
                   onclick="location.href = 'listaPessoaJ.php'"/>
        </form>
<?php
// put your code here
?>
    </body>
</html>
