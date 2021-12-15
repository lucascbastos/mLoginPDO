<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if (isset($_POST['updatePJ'])) {
    $id = $_POST['id'];
    $Nome = $_POST['nome'];
    $Email = $_POST['email'];
    $Telefone = $_POST['telefone'];
    $Endereco = $_POST['endereco'];
    $Cnpj = $_POST['cnpj'];
    $NomeFantasia = $_POST['nomeFantasia'];
    $Site = $_POST['site'];
    
    $pdo = require_once '../pdo/connection.php';

    $sql = "UPDATE pessoa SET nome = ?, email = ?, telefone = ?, endereco = ?, cnpj = ?, nomeFantasia = ?, site = ? WHERE idPessoa = ?";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(1, $Nome, PDO::PARAM_STR);
    $sth->bindParam(2, $Email, PDO::PARAM_STR);
    $sth->bindParam(3, $Telefone, PDO::PARAM_STR);
    $sth->bindParam(4, $Endereco, PDO::PARAM_STR);
    $sth->bindParam(5, $Cnpj, PDO::PARAM_STR);
    $sth->bindParam(6, $NomeFantasia, PDO::PARAM_STR);
    $sth->bindParam(7, $Site, PDO::PARAM_STR);
    $sth->bindParam(8, $id, PDO::PARAM_INT);
    $sth->execute();
    unset($sth);
    unset($pdo);
    header("location: ../view/listaPessoaJ.php");
}
