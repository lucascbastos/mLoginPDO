<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cUsuario
 *
 * @author lucas.bastos
 */
class cPessoaJ {

    //put your code here
    public function inserirPessoaJ() {
        if (isset($_POST['salvarPJ'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $endereco = $_POST['endereco'];
            $telefone = $_POST['telefone'];
            $cnpj = $_POST['cnpj'];
            $nomeFantasia = $_POST['nomeFantasia'];
            $site = $_POST['site'];

            $pdo = require_once '../pdo/connection.php';
            $sql = "insert into pessoa (nome, email, endereco, telefone, cnpj, nomeFantasia, site) values (?,?,?,?,?,?,?)";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(1, $nome, PDO::PARAM_STR);
            $sth->bindParam(2, $email, PDO::PARAM_STR);
            $sth->bindParam(3, $endereco, PDO::PARAM_STR);
            $sth->bindParam(4, $telefone, PDO::PARAM_STR);
            $sth->bindParam(5, $cnpj, PDO::PARAM_STR);
            $sth->bindParam(6, $nomeFantasia, PDO::PARAM_STR);
            $sth->bindParam(7, $site, PDO::PARAM_STR);
            $sth->execute();
            unset($sth);
            unset($pdo);
        }
    }

    public function getPessoaJ() {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select idPessoa, nome, email, endereco, telefone, cnpj, nomeFantasia, site from pessoa where cpf is null";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        unset($sth);
        unset($pdo);
        return $result;
    }
    

    public function deletarPessoaJ() {
        if (isset($_POST['deletar'])) {
            $id = $_POST['idPessoa'];

            $pdo = require_once '../pdo/connection.php';
            $sql = "delete from pessoa where idPessoa = ?";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(1, $id, PDO::PARAM_INT);
            $sth->execute();
            unset($sth);
            unset($pdo);
            header("Refresh: 0");
        }
    }

    public function getPessoaJById($id) {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select * from pessoa where idPessoa = $id";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        unset($sth);
        unset($pdo);
        return $result;
    }

}
