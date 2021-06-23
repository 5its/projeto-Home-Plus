<?php

//database_connection.php

$connect = new PDO("mysql:host=localhost;dbname=homeplus", "root", "");

date_default_timezone_set('America/Sao_Paulo');

function fetch_user_last_activity($user_id, $connect)
{
 $query = "
 SELECT * FROM login_details
 WHERE user_id = '$user_id';";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  return $row['last_activity'];
 }
}

function fetch_user_chat_history($from_user_id, $to_user_id, $connect)
{
 $query = "
 SELECT * FROM tbMensagens AS M
 INNER JOIN tbSolicitacao AS S
 ON `S`.codSolicitacao = `M`.codSolicitacao
 WHERE (`S`.codPrestador = '".$from_user_id."' 
 AND `S`.codCliente = '".$to_user_id."') 
 OR (`S`.codPrestador = '".$to_user_id."' 
 AND `S`.codCliente = '".$from_user_id."') 
 ORDER BY timestamp DESC
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $output = '<ul class="list-unstyled">';
 foreach($result as $row)
 {
  $user_name = '';
  if($row["codC"] == $from_user_id)
  {
   $user_name = '<b class="text-success">You</b>';
  }
  else
  {
   $user_name = '<b class="text-danger">'.get_user_name($row['codC'], $connect).'</b>';
  }
  $output .= '
  <li style="border-bottom:1px dotted #ccc">
   <p>'.$user_name.' - '.$row["msg"].'
    <div align="right">
     - <small><em>'.$row['timestamp'].'</em></small>
    </div>
   </p>
  </li>
  ';
 }
 $output .= '</ul>';
 return $output;
}

function get_user_name($user_id, $connect)
{
 $query = "SELECT nomeCliente FROM tbCliente WHERE codCliente = '$user_id'";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  return $row['nomeCliente'];
 }
}
?>


