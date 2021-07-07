<?php
/**
 * Etapas da conexão com o banco de dados
 * 1 - Iniciar sessão
 * 2- Criar as variáveis de conexão
 * 3 - Realizar a verificação de conexão e tratamento de erro com try e catch.
 */
session_start();
// Conexão com banco de dados
    $servidor = "localhost";
    $dbusuario = "root";
    $dbsenha = "";
    $dbdados = "login";

    try {
        $pdo = new PDO("mysql:dbname=".$dbdados.";host=".$servidor,$dbusuario,$dbsenha); // Conexão com banco de dados
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Tratamento dos erros
    } catch (PDOException $e) {
        echo "Erro: ".$e->getMenssage();
        exit;
    }
