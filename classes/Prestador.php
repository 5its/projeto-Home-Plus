<?php
session_start();
require_once 'Conexao.php';

class Prestador{

    private $numfonePrestador;
    private $codPrestador;
    private $nomePrestador;
    private $cpfPrestador;
    private $emailPrestador;
    private $datanascPrestador;
    private $cidadePrestador;
    private $senhaPrestador;

    public function getnumfonePrestador()
    {
        return $this->numfonePrestador;
    }

    public function getnomePrestador(){
        return $this->nomePrestador;
    }

    public function getcpfPrestador(){
        return $this->cpfPrestador;
    }

    public function getemailPrestador(){
        return $this->emailPrestador;
    }

    public function getdatanascPrestador(){
        return $this->datanascPrestador;
    }

    public function getcidadePrestador(){
        return $this->cidadePrestador;
    }

    public function getsenhaPrestador(){
        return $this->senhaPrestador;
    }

    //seters

    public function setnumfonePrestador($telefone)
    {
        $this->numfonePrestador = $telefone;
    }

    public function setnomePrestador($nome){
        $this->nomePrestador = $nome;
    }

    public function setcpfPrestador($cpf){
        $this->cpfPrestador = $cpf;
    }

    public function setemailPrestador($email){
        $this->emailPrestador = $email;
    }

    public function setdataNascPrestador($datanasc){
        $this->datanascPrestador = $datanasc;
    }

    public function setcidadePrestador($cidade){
        $this->cidadePrestador = $cidade;
    }

    public function setsenhaPrestador($senha){
        $this->senhaPrestador = $senha;
    }

    public function cadastrarPrestador($prestador){
        $conexao = Conexao::pegarConexao();

        $nome = $prestador->getnomePrestador();
        $cpf = $prestador->getcpfPrestador();
        $email = $prestador->getemailPrestador();
        $dn = $prestador->getdatanascPrestador();
        $cidade = $prestador->getcidadePrestador();
        $senha = $prestador->getSenhaPrestador();

            $stmt = $conexao->prepare("INSERT INTO `tbprestador` (`nomePrestador`, `cpfPrestador`, `emailPrestador`, `datanascPrestador`, `cidadePrestadorServico`, `senhaPrestador`) VALUES ('$nome','$cpf','$email','$dn','$cidade','$senha');");    

            $stmt->execute();

            $P = $stmt; 

            $stmt = null;

            $email = $prestador->getemailPrestador();

            $stmt = $conexao -> prepare("SELECT `codPrestador` FROM `tbPrestador` WHERE `emailPrestador` = '$email' ;");

            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                if ($row[1]=$email) {
                    $a = $row[1];
                    $codPrestador = $row[0];
                }

            $stmt = null;

            $tel = $prestador->getnumfonePrestador();

            $stmt = $conexao -> prepare("INSERT INTO `tbFonePrestador`
                (`numFonePrestador`, `codPrestador`)
                SELECT '$tel', '$codPrestador'
                WHERE NOT EXISTS 
                (SELECT * FROM `tbFonePrestador` WHERE `numFonePrestador` = '$tel');");

            $stmt->execute();

            $t = $stmt;

            $stmt = null;

            $_SESSION['codPrestador'] = $codPrestador;  

            return "$codPrestador";
            
                 
       }
    }


}


// VISUALIZAR

class visualizar{

    private $codPrestador;

    public function getcodPrestador()
    {
       return $this->codPrestador;
    }

    // seters

    public function setcodPrestador($cod)
    {
       $this->codPrestador = $cod; 
    }

    public function verTelefone($visualizar)
    {
        $stmt = null;

        $conexao = Conexao::pegarConexao();

        $cod = $visualizar->getcodPrestador();

        $stmt = $conexao->prepare("SELECT `numFonePrestador` FROM `tbfoneprestador` WHERE `codPrestador` = $cod");

        $stmt->execute();

        return $stmt;


    }

     public function verPrestador($visualizar)
    {

        $stmt = null;

        $conexao = Conexao::pegarConexao();

        $cod =  $visualizar->getcodPrestador();

        $stmt = $conexao->prepare("SELECT * FROM `tbprestador` WHERE `codPrestador` = $cod");
        
        $stmt->execute();

        return $stmt;

    }


}

class visualizarT{

    private $codP;

    public function getcodP()
    {
       return $this->codP;
    }

    // seters

    public function setcodP($cod)
    {
       $this->codP = $cod; 
    }

    public function verT($visualizar)
    {
        $stmt = null;

        $conexao = Conexao::pegarConexao();

        $cod = $visualizar->getcodP();

        $stmt = $conexao->prepare("SELECT * FROM `tbfoneprestador` WHERE `codPrestador` = '$cod'");

        $stmt->execute();

        return $stmt;


    }
}
// VALIDAÇÃO 

class validacao{

    private $emailPrestador;
    private $senhaPrestador;

    public function getemailPrestador(){
        return $this->emailPrestador;
    }

    public function getSenhaPrestador()
    {
        return $this->senhaPrestador;
    }

    // seters

    public function setemailPrestador($email)
    {
       $this->emailPrestador = $email;
    }

    public function setsenhaPrestador($senha)
    {
        $this->senhaPrestador = $senha;
    }

    public function validarPrestador($validacao){

        $stmt = null;

        $conexao = Conexao::pegarConexao();

        $email = $validacao->getemailPrestador();

        $senha = $validacao->getSenhaPrestador();

        $stmt = $conexao->prepare("SELECT * FROM `tbprestador` WHERE `emailPrestador` = '$email' AND `senhaPrestador` = '$senha' ");
        
        $stmt->execute();

        return $stmt;
    }
}

// Servico

class visuPrestadores{
    public function visualziarPrestador($visu)
    {
        $conexao = Conexao::pegarConexao();

        $stmt = $conexao->prepare("SELECT * FROM `tbPrestador`");

        $stmt->execute();

        return $stmt;
    }
    
}

class cliente{
    private $codCliente;

    public function getcodCliente(){
        return $this->codCliente;
    }

    //seters


    public function setcodCliente($codCliente){
        $this->codCliente = $codCliente;
    }

    public function verName($cliente)
    {
     $con = Conexao::pegarConexao();

     $codCliente = $cliente->getcodCliente();

     $stmt = $con->prepare("SELECT nomeCliente FROM tbCliente WHERE codCliente = $codCliente");

     $stmt->execute();

     while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
               $return = $row[0];
    }

     return $return;
    }
}
