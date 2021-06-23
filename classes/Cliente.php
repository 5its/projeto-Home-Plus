<?php

require_once 'Conexao.php';

class Cliente{
    private $nomeCliente;
    private $cpfCliente;
    private $datanascCliente;
    private $logradouroCliente;
    private $numeroCliente;
    private $generoCliente;
    private $bairroCliente;
    private $senhaCliente;
    private $emailCliente;


    public function getnomeCliente(){
        return $this->nomeCliente;
    }

    public function getcpfCliente(){
        return $this->cpfCliente;
    }

    public function getdataNascCliente(){
        return $this->datanascCliente;
    }

    public function getlogradouroCliente(){
        return $this->logradouroCliente;
    }

    public function getnumeroCasaCliente(){
        return $this->numeroCasaCliente;
    }

    public function getgeneroCliente(){
        return $this->generoCliente;
    }

    public function getbairroCliente(){
        return $this->bairroCliente;
    }

    public function getsenhaCliente(){
        return $this->senhaCliente;
    }

    public function getemailCliente(){
        return $this->emailCliente;
    }

    //seters


    public function setnomeCliente($nome){
        $this->nomeCliente = $nome;
    }

    public function setcpfCliente($cpf){
        $this->cpfCliente = $cpf;
    }

    public function setdataNascCliente($datanasc){
        $this->datanascCliente = $datanasc;
    }

    public function setlogradouroCliente($logradouro){
        $this->logradouroCliente = $logradouro;
    }

    public function setnumeroCasaCliente($numero){
        $this->numeroCasaCliente = $numero;
    }

    public function setgeneroCliente($genero){
        $this->generoCliente = $genero;
    }

    public function setbairroCliente($bairro){
        $this->bairroCliente = $bairro;
    }

    public function setsenhaCliente($senha){
        $this->senhaCliente = $senha;
    }

    public function setemailCliente($email){
        $this->emailCliente = $email;
    }

    public function cadastrarCliente($cliente){

        $conexao = Conexao::pegarConexao();

        $name = $cliente->getnomeCliente();
        $cpf = $cliente->getCpfCliente();
        $nasc = $cliente->getDataNascCliente();
        $logradouro = $cliente->getLogradouroCliente();
        $numCasa = $cliente->getNumeroCasaCliente();
        $bairro = $cliente->getBairroCliente();
        $senha = $cliente->getSenhaCliente();
        $email = $cliente->getEmailCliente();
        $ge = $cliente->getGeneroCliente(); 
       
            $stmt = $conexao->prepare("INSERT INTO `tbcliente`
        (`nomeCliente`, `cpfCliente`, `datanascCliente`, `logradouroCliente`, `numerocasaCliente` , `bairroCliente`, `senhaCliente`, `emailCliente`, `genero`) 
        VALUES 
        ('$name','$cpf','$nasc','$logradouro','$numCasa','$bairro','$senha','$email', '$ge');");

           
            
            $stmt->execute();

        return 'Cadastro Realizado com Sucesso!';
    }

}


class certificar
{

      public function certificarDados(){

        $conexao = Conexao::pegarConexao();

        $stmt = $conexao->prepare("SELECT cpfCliente, emailCliente FROM tbCliente;");
            
        $stmt->execute();

        return $stmt;
    }

}

/**
 *
 */
class insertTelefon
{
    private $codCliente;
    private $numTelefone;

       public function getcodCliente(){
        return $this->codCliente;
    }

    public function getNumTelefone(){
        return $this->numTelefone;
    }

    //seters


    public function setcodCliente($cod){
        $this->codCliente = $cod;
    }

    public function setNumTelefone($telefone)
    {
        $this->numTelefone = $telefone;
    }

    public function adicionarTelefone($telefone)
    {
        $conexao = Conexao::pegarConexao();

        $cod = $telefone->getcodCliente();
        $num = $telefone->getNumTelefone();

        $stmt = $conexao->prepare("INSERT INTO `tbfoneCliente` (`numFoneCliente`, `codCliente`) VALUES ('$num','$cod');");

        $stmt->execute();

        return "Cadastro realizado com Sucesso.";

    }

}

/**
 * 
 */
class verCod
{
    private $cpf;

    public function getCpfCliente()
    {
        return $this->cpf;
    }

    // setters

    public function setCpfCliente($cpf)
    {
        $this->cpf = $cpf;
    }
    
    function verCodCli($cliente)
    {
        $conexao = Conexao::pegarConexao();

        $cpf = $cliente->getCpfCliente();

        $stmt = $conexao->prepare("SELECT codCliente FROM tbcliente WHERE cpfCliente = '$cpf';");

        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
            $cpf = $row[0];
        }

        return $cpf;

    }
}


class visualizar{

    private $codCliente;

    public function getcodCliente()
    {
       return $this->codCliente;
    }

    // seters

    public function setcodCliente($cod)
    {
       $this->codCliente = $cod; 
    }

     public function visuaCliente($visualizar)
    {

        $cod = $visualizar->getcodCliente();

        $conexao = Conexao::pegarConexao();

        $stmt = $conexao->prepare("SELECT * FROM `tbCliente` WHERE `codCliente` = '$cod';");

        $stmt->execute();

        return $stmt;

        $stmt = null;
    }


    public function visuaTelefone($visualizar)
    {
        $cod = $visualizar->getcodCliente();
        $conexao = Conexao::pegarConexao();

        $stmt = $conexao->prepare("SELECT * FROM `tbfonecliente` WHERE `codCliente` = '$cod';");

        $stmt->execute();

        return $stmt;

        $stmt = null;
    }
}

class validarCliente
{
    private $emailCli;
    private $senhaCli;

    public function getemailCli(){
        return $this->emailCli;
    }

    public function getSenhaCli()
    {
        return $this->senhaCli;
    }

    // seters

    public function setemailCli($email)
    {
       $this->emailCli = $email;
    }

    public function setsenhaCli($senha)
    {
        $this->senhaCli = $senha;
    }

    public function verCli($validarCliente){

        $stmt = null;

        $conexao = Conexao::pegarConexao();

        $email = $validarCliente->getemailCli();

        $senha = $validarCliente->getSenhaCli();

        $stmt = $conexao->prepare("SELECT * FROM `tbCliente` WHERE `emailCliente` = '$email' AND `senhaCliente` = '$senha';");
        
        $stmt->execute();

        return $stmt;
    }
    
}
