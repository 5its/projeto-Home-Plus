<?php

session_start();

// Verifica se existe a variável txtnome
if (isset($_POST["id"]) && $_POST["id"] != "") {	

    $codCli = $_SESSION['codCliente'];
    $nome = $_POST["id"];
    // Conexao com o banco de dados
    $conexao = new PDO("mysql:host=localhost;dbname=homeplus","root","");
    // Verifica se a variável está vazia
        $sql = "INSERT INTO `tbsolicitacao`(`codPrestador`, `codCliente`) VALUES ('$nome','$codCli')";

    sleep(1);

    $result = $conexao->prepare($sql);

    $result->execute();

    } else {
        // Se a consulta não retornar nenhum valor, exibi mensagem para o usuário
        echo "Não foi possivel realizar a solicitação";
    }

    header("Location:home.php");
?>