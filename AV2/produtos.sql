CREATE TABLE `dawalunos`.`produtos` ( `id` INT NOT NULL AUTO_INCREMENT , `codigobarra` VARCHAR(13) NOT NULL , `nome` VARCHAR(50) NOT NULL , `fabricante` VARCHAR(50) NOT NULL , `categoria` VARCHAR(50) NOT NULL , `tipo` VARCHAR(50) NOT NULL , `preco` FLOAT NOT NULL , `estoque` INT NOT NULL , `peso` INT NOT NULL , `descricao` VARCHAR(300) NOT NULL , `linkimagem` VARCHAR(100) NOT NULL , `data` VARCHAR(12) NOT NULL , `ativo` BOOLEAN NOT NULL , PRIMARY KEY (`id`, `codigobarra`)) ENGINE = InnoDB;