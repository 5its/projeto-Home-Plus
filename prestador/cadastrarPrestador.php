<?php

require_once '../classes/Prestador.php';

    /*Retirando mascara do cpf*/    

    $cpf = $_SESSION["cpf"];
    $cpf = preg_replace("/[^0-9]/", "", $cpf);
    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);


    try{
        $prestador = new Prestador();
        $prestador->setnomePrestador($_SESSION['username']);
        $prestador->setcpfPrestador($cpf);
        $prestador->setemailPrestador($_SESSION['email']);
        $prestador->setdataNascPrestador($_SESSION['datanasc']);
        $prestador->setcidadePrestador($_SESSION['cidade']);
        $prestador->setsenhaPrestador($_SESSION['senha']);
        $prestador->setnumfonePrestador($_SESSION['telefone']);
        $cod = $prestador->cadastrarPrestador($prestador);

        $_SESSION['cod'] = $cod;
        
         // serviço

        require_once '../classes/Servico.php';

        $servico = $_POST['servico'];
        $valor = $_POST['valor'];


        // Faz loop pelo array dos numeros

            foreach(array_combine($_POST["servico"], $_POST["valor"]) as $servico => $valor)
            {
                $valorS = $servico;
                $valorV = $valor;

                    $servico = new selectServico();
                    $servico->setname($valorS);
                    $servico->setdescServico("Create for user $cod");
                    $codServico = $servico->selectS($servico);


                     while ($row = $codServico->fetch(PDO::FETCH_BOTH)) {
                            $newcodServico = $row[0];
                    }


                   $servico = new servicoPrestado();
                   $servico->setcodPrestador($_SESSION['codPrestador']);
                   $servico->setcodServico($newcodServico);
                   $servico->setvalorMinimo($valorV);
                   print_r($servico->cadastrarServico($servico));
            }

        header("Location: ./home.php");

    }
        
    catch(PDOException $e){
        echo '<prev>';
            print_r($e);
        echo '<prev>';
        echo "ERRO: ". $e -> getMessage();
    }
?>