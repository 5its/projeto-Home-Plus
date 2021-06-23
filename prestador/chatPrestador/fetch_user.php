<?php

//fetch_user.php

include('chat.php');

session_start();

$cod = $_SESSION['cod'];

$query = "
SELECT * 
		FROM `tbsolicitacao` AS `S` 
			INNER JOIN `tbcliente` AS `C`
				ON `S`.`codCliente` = `C`.`codCliente` 
			INNER JOIN `tbPrestador` AS `P`
				ON `S`.`codPrestador` = `P`.`codPrestador`  
		WHERE `S`.`codPrestador` = $cod; ";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<table class="table table-bordered table-striped">
 <tr class="title">
  <td>Cliente</td>
  <td>Status</td>
  <td>Abrir</td>
  <td>Criar</td>
 </tr>
';

foreach($result as $row)
{
 $status = '';
 $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
 $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
 $user_last_activity = fetch_user_last_activity($row['codPrestador'], $connect);
 if($user_last_activity > $current_timestamp)
 {
  $status = '<span class="on">Online</span>';
 }
 else
 {
  $status = '<button type="button" class="btn off" disabled> Offline </button>';
 }
 $output .= '
 <tr>
  <td>'.$row['nomeCliente'].'</td>
  <td>'.$status.'</td>
  <td><button type="button" class="btn chat start_chat" data-touserid="'.$row['codCliente'].'" data-tousername="'.$row['nomeCliente'].'">Abrir conversa</button></td>
  <td><button type="button" value="'.$row['nomeCliente'].'" data-iduser="'.$row['codCliente'].'" id="contrato" class="btn create-contract"> Criar contrato </button></td>
 </tr>
 ';
}

$output .= '</table>';

echo $output;

?>