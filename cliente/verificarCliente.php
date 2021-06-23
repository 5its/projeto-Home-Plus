<?php

// require_once '../global.php';
require_once '../classes/Cliente.php';

        // session_start();
        // // header("Location: home.php");
        // $verC = new validarCliente();
        // $verC->setemailCli($_POST['email']);
        // $verC->setsenhaCli($_POST['senha']);
        // print_r($verC->verCli($verC));
        // $_SESSION['email'] = $_POST['email'];
        // header("Location:home.php");

    try{

        $email = $_POST['email'];

        $senha = $_POST['senha'];

        $validarCliente = new validarCliente();

        $validarCliente->setemailCli($email);

        $validarCliente->setsenhaCli($senha);

        $sql = $validarCliente->verCli($validarCliente);

       while ($row = $sql->fetch(PDO::FETCH_BOTH)) {

        if ($row['emailCliente']=$email) {
                if ($row['senhaCliente']=$senha) {
                    session_start();
                    header("Location: ./home.php");
                    $_SESSION['codCliente'] = $row['codCliente'];
                    $_SESSION['usernameCliente'] = $row['nomeCliente'];
                }
            }
           
        }
        
        
        }catch(PDOException $e){
        echo '<prev>';
            print_r($e);
        echo '<prev>';
        echo "ERRO: ". $e -> getMessage();
    }
?>

    <script type="text/javascript">
            setInterval(function(){ 
            alert("Login ou senha incorretos");
            window.location.href = "loginCliente.php";
        }, 2800);
    </script>