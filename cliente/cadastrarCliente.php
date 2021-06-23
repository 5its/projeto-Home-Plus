<?php

// require_once '../global.php';
require_once '../classes/Cliente.php';

    try{

//         $certificar = new certificar();

//         print_r($certificar->certificarDados());

//         $vd = $certificar->certificarDados();

//          while ($row = $vd->fetch(PDO::FETCH_BOTH)) {
//             $cpf = $row['cpfCliente'];
//             $email = $row['emailCliente'];
//             $mycpf = $_POST['cpf'];
//             $myemail = $_POST['email'];
//             $textErro;

//             if ($cpf = $row['cpfCliente']) {
//                 $textErro = $textErro. "cpf ";
//                 $e = $e + 1;
//             }

//             if ($email = $row['emailCliente'] {
//                 $textErro = $textErro. "Email ";
//                 $e = $e + 1;
//             }

// }

// if ($e >= 1) {
                
//   echo '<script> alert("ERRO: '.$textErro.' Já cadastrado(s)."); </script>';
//   header("Location:formularioCliente.php");

// }else{

        // header("Location: index.php");
        $name = $_POST['cpf'];

$cpf = $_POST["cpf"];
$cpf = preg_replace("/[^0-9]/", "", $cpf);
$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);



        $cliente = new Cliente();
        $cliente->setnomeCliente($_POST['name']);
        $cliente->setcpfCliente($cpf);
        $cliente->setdataNascCliente($_POST['datanasc']);
        $cliente->setEmailCliente($_POST['email']);
        $cliente->setSenhaCliente($_POST['senha']);
        $cliente->setlogradouroCliente($_POST['logradouro']);
        $cliente->setNumeroCasaCliente($_POST['numR']);
        $cliente->setBairroCliente($_POST['bairoC']);
        $cliente->setGeneroCliente($_POST['ge']);
        echo $cliente->cadastrarCliente($cliente);


        
        $cliente  = new verCod();
        $cliente ->setCpfCliente($cpf);
        $codCli = $cliente ->verCodCli($cliente);



        $telefone = new insertTelefon();
        $telefone->setNumTelefone($_POST['telefone']);
        $telefone->setcodCliente($codCli);
        echo $telefone->adicionarTelefone($telefone);

echo "  <script> 
            alert('cadastro realizado com sucesso'); 
        </script>
";

header("Location:loginCliente.php");



// }

    }

    catch(Exception $e){
        echo '<prev>';
            print_r($e);
        echo '<prev>';
        echo $e->getMessage();
    }