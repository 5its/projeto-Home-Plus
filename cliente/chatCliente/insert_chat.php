<?php

include('chat.php');

session_start();


$codP = $_POST['to_user_id'];

$codC = $_SESSION['codCliente'];

$sql = "SELECT codSolicitacao FROM tbSolicitacao WHERE codPrestador = '$codP' AND codCliente = '$codC'";


$stmt = $connect->prepare($sql);

$stmt->execute();


while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
	$id = $row[0];
}

$data = array(
 ':to_codSolic' => $id,
 ':to_user_id'  => $_POST['to_user_id'],
 ':from_user_id'  => $_SESSION['codCliente'],
 ':chat_message'  => $_POST['chat_message'],
 ':status'   => '1'
);


$query = "
INSERT INTO tbMensagens
(codSolicitacao, codP, codC, msg, status) 
VALUES (:to_codSolic, :to_user_id, :from_user_id, :chat_message, :status)
";

$statement = $connect->prepare($query);

if($statement->execute($data))
{
 echo fetch_user_chat_history($_SESSION['codCliente'], $_POST['to_user_id'], $connect);
}

?>