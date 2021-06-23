<!-- cancela.php -->

<?php
// Verifica se existe a variável txtnome
if (isset($_GET["cancela"]) && $_GET["cancela"] != "") {	

    $value = $_GET["cancela"];
    // Conexao com o banco de dados
    $conexao = new PDO("mysql:host=localhost;dbname=homeplus","root","");
    // Verifica se a variável está vazia
    if (empty($value)) {
        $sql = "";
    } else {    
        $sql = "
	UPDATE `tbcontrato` SET `codStatusContrato`= '2' WHERE codContrato = '$value'; ";

    }
    sleep(1);
    $result = $conexao->prepare($sql);
    $result->execute();
   
    echo "<p id='pop'>Contrato cancelado com Sucesso<p>";



    } else {
        // Se a consulta não retornar nenhum valor, exibi mensagem para o usuário
        echo "Não foi possivel cancelar o contrato";
    }

?>