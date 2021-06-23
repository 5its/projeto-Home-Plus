<!-- contrato.php-->
<?php 


require_once 'Conexao.php';

/**
 * Classe contrato
 */
class contrato
{
	private $codPrestador;

	public function getcodPrestador(){
        return $this->codPrestador;
    }

    //seters


    public function setcodPrestador($codPrestador){
        $this->codPrestador = $codPrestador;
    }
	
	function visualizar($contrato)
	{
		$con = Conexao::pegarConexao();

		$cod = $contrato->getcodPrestador();


		$stmt = $con->prepare("
		SELECT * 
        FROM tbcontrato AS C
        INNER JOIN tbstatuscontrato AS S
        ON C.codStatusContrato = S.codStatusContrato
        WHERE C.codPrestador = '$cod' AND C.codStatusContrato != '2' AND C.codStatusContrato != '3'
        ORDER BY C.dataContrato ASC");

		$stmt->execute();

		return $stmt;
	}

	function vH($contrato)
	{
		$con = Conexao::pegarConexao();

		$cod = $contrato->getcodPrestador();


		$stmt = $con->prepare("
		SELECT * 
        FROM tbcontrato AS C
        INNER JOIN tbstatuscontrato AS S
        ON C.codStatusContrato = S.codStatusContrato
        WHERE C.codPrestador = '$cod' AND C.codStatusContrato != '1'
        ORDER BY C.dataContrato ASC");

		$stmt->execute();

		return $stmt;
	}

	

	function ver($contrato)
	{
		$con = Conexao::pegarConexao();

		$cod = $contrato->getcodPrestador();


		$stmt = $con->prepare("
	SELECT * FROM `tbservicoprestado` 
	INNER JOIN `tbservicos`
	ON `tbservicoprestado`.`codServico` = `tbservicos`.`codServicos`
	WHERE `tbservicoprestado`.`codPrestador` = $cod;");

		$stmt->execute();

		return $stmt;
	}
}






 ?>