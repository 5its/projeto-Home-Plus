 -- MER Home+:
 
 
DROP DATABASE homeplus;

-- --------------------------------------------------------

--
-- Criação do banco de dados "home Plus"
--

CREATE DATABASE homePlus DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Selecionado banco de dados "homePlus" para ser utilizado
--

USE homePlus;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbCliente`
--

CREATE TABLE tbCliente (
    codCliente INT PRIMARY KEY AUTO_INCREMENT,
    nomeCliente VARCHAR(50),
    cpfCliente CHAR(11),
    datanascCliente DATE,
    logradouroCliente VARCHAR(50),
    numerocasaCliente INT,
    genero char,
    bairroCliente VARCHAR(50),
    senhaCliente CHAR(20),
    emailCliente VARCHAR(50),
    UNIQUE (codCliente, cpfCliente, emailCliente)
)CHARACTER SET utf8 COLLATE utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbServicos`
--

CREATE TABLE tbServicos (
    codServicos INT PRIMARY KEY UNIQUE AUTO_INCREMENT, 
    nomeServico VARCHAR(50),
    descServico TEXT
)CHARACTER SET utf8 COLLATE utf8_general_ci;


-- --------------------------------------------------------

--
-- Estrutura da tabela `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL PRIMARY KEY auto_increment,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_type` enum('no','yes') NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `tbMensagens` (
  `idChat` int(11) NOT NULL PRIMARY KEY auto_increment,
  `codSolicitacao` INT NOT NULL, 
  `codC` INT NOT NULL,
  `codP` INT NOT NULL,
  `msg` text CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

-- --------------------------------------------------------
--
-- Estrutura da tabela `tbPrestador`
--

CREATE TABLE tbPrestador (
    codPrestador INT PRIMARY KEY AUTO_INCREMENT,
    nomePrestador VARCHAR(50),
    cpfPrestador CHAR(11),
    emailPrestador varchar(50),
    datanascPrestador DATE,
    cidadePrestadorServico VARCHAR(50),
    senhaPrestador CHAR(50),
    UNIQUE (codPrestador, cpfPrestador, emailPrestador)
)CHARACTER SET utf8 COLLATE utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbFonePrestador`
--

CREATE TABLE tbFonePrestador (
    codFonePrestador INT PRIMARY KEY UNIQUE AUTO_INCREMENT,
    numFonePrestador CHAR(15),
    codPrestador INT
)CHARACTER SET utf8 COLLATE utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbFoneCliente`
--

CREATE TABLE tbFoneCliente (
    codFoneCliente  INT PRIMARY KEY UNIQUE AUTO_INCREMENT,
    numFoneCliente CHAR(15),
    codCliente INT
)CHARACTER SET utf8 COLLATE utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbContrato`
--

CREATE TABLE tbContrato (
    codContrato INT PRIMARY KEY UNIQUE AUTO_INCREMENT,
    dataContrato DATE,
    codPrestador INT,
    codCliente INT,
    codStatusContrato INT
)CHARACTER SET utf8 COLLATE utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbStatusContrato`
--

CREATE TABLE tbStatusContrato (
    codStatusContrato INT PRIMARY KEY AUTO_INCREMENT,
    descStatus TEXT
)CHARACTER SET utf8 COLLATE utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbServicoPrestado`
--

CREATE TABLE tbServicoPrestado (
    codServicoPrestado INT PRIMARY KEY AUTO_INCREMENT,
    codServico INT,
    codPrestador INT,
    valorMinimo INT
)CHARACTER SET utf8 COLLATE utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbServicoContrato`
--

CREATE TABLE tbServicoContrato (
    codServicoContrato INT PRIMARY KEY AUTO_INCREMENT,
    codContrato INT,
    codServicoPrestado INT
)CHARACTER SET utf8 COLLATE utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbForPagamento`
--

CREATE TABLE tbForPagamento (
    codFormPagamento INT PRIMARY KEY AUTO_INCREMENT,
    descFormpagamento VARCHAR(50),
    codContrato INT
)CHARACTER SET utf8 COLLATE utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbSolicitacao`
--

CREATE TABLE tbSolicitacao (
    codSolicitacao INT PRIMARY KEY AUTO_INCREMENT,
    codPrestador INT,
    codCliente INT,
    UNIQUE (codPrestador, codCliente)
)CHARACTER SET utf8 COLLATE utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura de inserção de chave estrangeira 
--
 
ALTER TABLE tbMensagens ADD CONSTRAINT FK_tbMensagens_1
    FOREIGN KEY (codSolicitacao)
    REFERENCES tbSolicitacao (codSolicitacao);

-- --------------------------------------------------------

--
-- Estrutura de inserção de chave estrangeira 
--
 
ALTER TABLE tbFonePrestador ADD CONSTRAINT FK_tbFonePrestador_3
    FOREIGN KEY (codPrestador)
    REFERENCES tbPrestador (codPrestador);
    
-- --------------------------------------------------------

--
-- Estrutura de inserção de chave estrangeira 
--
 
ALTER TABLE tbFoneCliente ADD CONSTRAINT FK_tbFoneCliente_3
    FOREIGN KEY (codCliente)
    REFERENCES tbCliente (codCliente);
    
-- --------------------------------------------------------

--
-- Estrutura de inserção de chave estrangeira 
--
 
ALTER TABLE tbContrato ADD CONSTRAINT FK_tbContrato_3
    FOREIGN KEY (codCliente)
    REFERENCES tbCliente (codCliente);
 
ALTER TABLE tbContrato ADD CONSTRAINT FK_tbContrato_4
    FOREIGN KEY (codPrestador)
    REFERENCES tbPrestador (codPrestador);
    
-- --------------------------------------------------------

--
-- Estrutura de inserção de chave estrangeira 
--
 
ALTER TABLE tbContrato ADD CONSTRAINT FK_tbContrato_5
    FOREIGN KEY (codStatusContrato)
    REFERENCES tbStatusContrato (codStatusContrato);
    
-- --------------------------------------------------------

--
-- Estrutura de inserção de chave estrangeira 
--
 
ALTER TABLE tbServicoPrestado ADD CONSTRAINT FK_tbServicoPrestado_2
    FOREIGN KEY (codPrestador)
    REFERENCES tbPrestador (codPrestador);
    
-- --------------------------------------------------------

--
-- Estrutura de inserção de chave estrangeira 
--
 
ALTER TABLE tbServicoPrestado ADD CONSTRAINT FK_tbServicoPrestado_3
    FOREIGN KEY (codServico)
    REFERENCES tbServicos (codServicos);
    
-- --------------------------------------------------------

--
-- Estrutura de inserção de chave estrangeira 
--
 
ALTER TABLE tbServicoContrato ADD CONSTRAINT FK_tbServicoContrato_2
    FOREIGN KEY (codContrato)
    REFERENCES tbContrato (codContrato);
    
-- --------------------------------------------------------

--
-- Estrutura de inserção de chave estrangeira 
--
 
ALTER TABLE tbServicoContrato ADD CONSTRAINT FK_tbServicoContrato_3
    FOREIGN KEY (codServicoPrestado)
    REFERENCES tbServicoPrestado (codServicoPrestado);
    
-- --------------------------------------------------------

--
-- Estrutura de inserção de chave estrangeira 
--
 
ALTER TABLE tbForPagamento ADD CONSTRAINT FK_tbForPagamento_2
    FOREIGN KEY (codContrato)
    REFERENCES tbContrato (codContrato);
    
-- --------------------------------------------------------

--
-- Estrutura de inserção de chave estrangeira 
--
 
ALTER TABLE tbSolicitacao  ADD CONSTRAINT FK_tbSolicitacao_1
    FOREIGN KEY (codCliente)
    REFERENCES tbCliente (codCliente);
    
-- --------------------------------------------------------

--
-- Estrutura de inserção de chave estrangeira 
--
    
ALTER TABLE tbSolicitacao  ADD CONSTRAINT FK_tbSolicitacao_2
    FOREIGN KEY (codPrestador)
    REFERENCES tbPrestador (codPrestador);
    
-- --------------------------------------------------------

--
-- Dados teste prestador 
--
    
    
INSERT INTO `tbprestador` 
	(`codPrestador`, `nomePrestador`, `cpfPrestador`, `emailPrestador`, `datanascPrestador`, `cidadePrestadorServico`, `senhaPrestador`) 
		VALUES 
		(NULL, 'User Teste1', '12345678910', 'user1@teste.com', '2010-10-10', 'testeland', '123456'), 
		(NULL, 'User Teste2', '12345678910', 'user2@teste.com', '2010-10-10', 'testeland', '123456'),
		(NULL, 'User Teste3', '12345678910', 'user3@teste.com', '2010-10-10', 'testeland', '123456'),
		(NULL, 'User Teste4', '12345678910', 'user4@teste.com', '2010-10-10', 'testeland', '123456'),
		(NULL, 'User Teste5', '12345678910', 'user5@teste.com', '2010-10-10', 'testeland', '123456');

-- --------------------------------------------------------

--
-- Dados teste Telefone prestador 
--
        
INSERT INTO `tbfoneprestador`
		(`codFonePrestador`, `numFonePrestador`, `codPrestador`) 
			VALUES 
				('1','(11)11111-1111','1'),
                ('2','(22)22222-2222','2'),
                ('3','(33)33333-3333','3'),
                ('4','(44)44444-4444','4'),
                ('5','(55)55555-5555','5');
                
-- --------------------------------------------------------

--
-- Dados teste Cliente 
--
                
INSERT INTO `tbcliente`
	(`codCliente`, `nomeCliente`, `cpfCliente`, `datanascCliente`, `logradouroCliente`, `numerocasaCliente`, `genero`, `bairroCliente`, `senhaCliente`, `emailCliente`) 
		VALUES 
		(NULL,'User Teste1','12345678910','2010-10-10','Sei lá','1','M','Teste','123456','user1@teste.com'),
        (NULL,'User Teste2','12345678910','2010-10-10','Sei lá','2','M','Teste','123456','user2@teste.com'),
        (NULL,'User Teste3','12345678910','2010-10-10','Sei lá','3','F','Teste','123456','user3@teste.com'),
        (NULL,'User Teste4','12345678910','2010-10-10','Sei lá','4','F','Teste','123456','user4@teste.com'),
        (NULL,'User Teste5','12345678910','2010-10-10','Sei lá','5','M','Teste','123456','user5@teste.com');
        
-- --------------------------------------------------------

--
-- Dados teste Telefone Cliente 
--
        
INSERT INTO `tbfonecliente`
	(`codFoneCliente`, `numFoneCliente`, `codCliente`) 
		VALUES 
		(NULL,'(11)11111-1111','1'),
        (NULL,'(22)22222-2222','2'),
        (NULL,'(33)33333-3333','3'),
        (NULL,'(44)44444-4444','4'),
        (NULL,'(55)55555-5555','5');
        
-- --------------------------------------------------------

--
-- Dados teste Serviço 
--
        
INSERT INTO `tbservicos`
	(`codServicos`, `nomeServico`, `descServico`) 
		VALUES 
        (NULL,'Teste 1',"CREATE FOR ADMIN"),
        (NULL,'Teste 2',"CREATE FOR ADMIN"),
        (NULL,'Teste 3',"CREATE FOR ADMIN"),
        (NULL,'Teste 4',"CREATE FOR ADMIN"),
        (NULL,'Teste 5',"CREATE FOR ADMIN"),
        (NULL,'Teste 6',"CREATE FOR ADMIN"),
        (NULL,'Teste 7',"CREATE FOR ADMIN"),
        (NULL,'Teste 8',"CREATE FOR ADMIN");
        
-- --------------------------------------------------------

--
-- Dados teste serviço prestado 
--
        
INSERT INTO `tbservicoprestado`
	(`codServicoPrestado`, `codServico`, `codPrestador`, `valorMinimo`) 
		VALUES 
        (NULL,'1','1','100'),
        (NULL,'2','1','100'),
        (NULL,'3','1','100'),
        (NULL,'4','1','100'),
        (NULL,'3','2','100'),
        (NULL,'4','2','100'),
        (NULL,'1','3','100'),
        (NULL,'5','3','100'),
        (NULL,'7','3','100'),
        (NULL,'8','4','100'),
        (NULL,'1','5','100'),
        (NULL,'2','5','100'),
        (NULL,'3','5','100'),
        (NULL,'6','5','100'),
        (NULL,'7','5','100'),
        (NULL,'4','5','100');
        
-- --------------------------------------------------------

--
-- LOGINS PRESTADOR 
--
DELIMITER $$
CREATE PROCEDURE ver_prestador()
BEGIN
SELECT 
	`emailPrestador` AS "LOGIN", 
    `senhaPrestador` AS "SENHA"
		FROM
		`tbPrestador`;
END $$
DELIMITER ;


    
-- --------------------------------------------------------

--
-- LOGINS Clientes 
--

DELIMITER $$
CREATE PROCEDURE ver_cliente()
BEGIN
SELECT 
	`emailCliente`, 
	`senhaCliente`
		FROM 
		`tbCliente`;
END $$
DELIMITER ;

CALL ver_cliente();

CALL ver_prestador();

        
INSERT INTO `tbstatuscontrato` (`codStatusContrato`, `descStatus`) 
VALUES 
(NULL, 'Em andamento'),
(NULL, 'Cancelado'),
(NULL, 'Concluído'),
(NULL, 'Pendente');
