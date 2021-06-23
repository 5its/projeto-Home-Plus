<!-- create_contrato.php -->

<?php 
include('chat.php');

session_start();

$codP =  $_SESSION['cod'];

$data_contrato = $_POST['data_contrato'];

$codC = $_POST['codCliente'];

$servicoPrestador = $_POST['servicoPrestador'];


$sql = "INSERT INTO `tbcontrato`
(`dataContrato`, `codPrestador`, `codCliente`, `codStatusContrato`) 
VALUES 
('$data_contrato', '$codP' , $codC , 1)";


$stmt = $connect->prepare($sql);

$stmt->execute();

$stmt = null;

$select = "SELECT codContrato FROM tbcontrato WHERE dataContrato = '$data_contrato' AND codCliente = '$codC' AND codPrestador = '$codP'";

$stmt = $connect->prepare($select);

$stmt->execute();

foreach ($stmt as $row) {
	$codContrato = $row[0];
}

$stmt = null;

$query = "INSERT INTO `tbservicocontrato`(`codContrato`, `codServicoPrestado`) VALUES ('$codContrato', '$servicoPrestador')";

$stmt = $connect->prepare($query);

$stmt->execute();


 ?>