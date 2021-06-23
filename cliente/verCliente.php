<?php
require_once '../classes/Cliente.php';

try {

	$Cliente = new Cliente();
	$sql = $Cliente->visuaCliente($Cliente);
	while ($row = $sql->fetch(PDO::FETCH_BOTH)) {
	echo "$row[1]";
	echo "$row[2]";
	} 
	
} catch (Exception $e) {
	
}
?>