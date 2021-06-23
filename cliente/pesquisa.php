<?php
// Verifica se existe a variável txtnome
if (isset($_GET["txtpesquisa"]) && $_GET["txtpesquisa"] != "") {	

	$nome = "%";

    $nome .= $_GET["txtpesquisa"];
    // Conexao com o banco de dados
    $conexao = new PDO("mysql:host=localhost;dbname=homeplus","root","");
    // Verifica se a variável está vazia
    if (empty($nome)) {
        $sql = "SELECT * FROM tbservicoprestado";
    } else {
        $nome .= "%";
        $sql = "

SELECT `P`.`codPrestador` ,`P`.`nomePrestador`, `S`.`nomeServico`, `SP`.`valorMinimo`
	FROM `tbservicoprestado` AS SP
    	INNER JOIN `tbPrestador` AS P
			ON `SP`.`codPrestador` = `P`.`codPrestador`
		INNER JOIN `tbservicos` AS S
			ON `SP`.`codServico` = `S`.`codServicos`
	WHERE `S`.`nomeServico` like'$nome'";

    }
    sleep(1);
    $result = $conexao->prepare($sql);
    $result->execute();
    $cont = $result->rowCount();
    // Verifica se a consulta retornou linhas
    if ($cont > 0) {
        // Atribui o código HTML para montar uma tabela
        $tabela = "<table class='table' id='lista'>
                    <thead>
                        <tr>
                            <th scope='col'> NOME PRESTADOR </th>
                            <th scope='col'> SERVIÇO </th>
                            <th scope='col'> VALOR </th>
                            <th scope='col'> </th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>";
        $return = "$tabela";
        // Captura os dados da consulta e inseri na tabela HTML

        $id = 1;

        while ($linha = $result->fetch(PDO::FETCH_BOTH)) {
            $return.= "<th scope='row'> " . utf8_encode($linha[1]) . " </th>";
            $return.= "<td>" . utf8_encode($linha[2]) . "</td>";
            $return.= "<td> R$: " . utf8_encode($linha[3]) . " </td>";
            $return.= "<td><form action='solicita.php' method='POST'><input type='text' value=". utf8_encode($linha[0])." name='id' hidden><button onclick='add($id)' value='". utf8_encode($linha[0])."' name='".utf8_encode($linha[1]) ."'> Solicitar contrato </button></form></td>";
            $return.= "</tr>";
            $id += 1;
        }
        
        echo $return.="</tbody></table>";



    } else {
        // Se a consulta não retornar nenhum valor, exibi mensagem para o usuário
        echo "Não foram encontrados registros!";
    }
}
?>