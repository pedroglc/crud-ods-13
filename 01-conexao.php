<?php
    function novaConexao ($banco='crud_ods13'){
        $servidor="127.0.0.1:3306";
        $usuario="root";
        $senha="";

        $conexao = new mysqli($servidor,$usuario,$senha,$banco);
        if($conexao->connect_error){
            die("Erro: ".$conexao->connec_error); //mensagem para erro de conexão
        }
        return $conexao; //mensagem se estiver conectado corretamente
    }
?>

<?php

        $conexao = novaConexao(null);
        $sql = 'CREATE DATABASE IF NOT EXISTS crud_ods13';
        $resultado = $conexao->query($sql);

        if($resultado){
            //echo "Banco de dados criado com sucesso";
        } else {echo":( Erro: ".$conexao->error;
            }

?>

<?php

        $sql = "CREATE TABLE IF NOT EXISTS consumidores(
            idConsumidor INT PRIMARY KEY AUTO_INCREMENT,
            nomeConsumidor VARCHAR(255),
            sobrenome VARCHAR(255),
            cpf BIGINT(11),
            email VARCHAR(255),
            rua VARCHAR(255),
            numero INT,
            bairro VARCHAR(255),
            cep BIGINT(8),
            cidade VARCHAR(255),
            uf VARCHAR(2),
            telefone BIGINT(11)
          );
        CREATE TABLE IF NOT EXISTS empresas(
            idEmpresa INT PRIMARY KEY AUTO_INCREMENT,
            nomeEmpresa VARCHAR(255),
            cnpj BIGINT(14),
            email VARCHAR(255),
            telefone BIGINT(11),
            rua VARCHAR(255),
            numero INT,
            bairro VARCHAR(255),
            cep BIGINT(8),
            cidade VARCHAR(255),
            UF VARCHAR(2)            
          );
        CREATE TABLE IF NOT EXISTS coletor(
            idColetor INT PRIMARY KEY AUTO_INCREMENT,
            nomeColetor VARCHAR(255),
            sobrenome VARCHAR(255),
            cpf BIGINT(11),
            email VARCHAR(255),
            rua VARCHAR(255),
            numero INT,
            bairro VARCHAR(255),
            cep BIGINT(8),
            cidade VARCHAR(255),
            uf VARCHAR(2),
            telefone BIGINT(11)
        );
        CREATE TABLE IF NOT EXISTS Coleta(
            idColeta INT PRIMARY KEY AUTO_INCREMENT,
            idConsumidor INT,
            idColetor INT,
            descricaoProduto VARCHAR(255),
            quantidadeProduto INT,
            dataColeta DATE,
            horaColeta TIME,            
            FOREIGN KEY (idConsumidor) REFERENCES Consumidores(idConsumidor),
            FOREIGN KEY (idColetor) REFERENCES Coletor(idColetor)
        );
        CREATE TABLE IF NOT EXISTS Entrega(
            idEntrega INT PRIMARY KEY AUTO_INCREMENT,
            idColetor INT,
            idEmpresa INT,
            idColeta int,
            dataEntrega DATE,
            horaEntrega TIME,
            FOREIGN KEY (idColetor) REFERENCES Coletor(idColetor),
            FOREIGN KEY (idEmpresa) REFERENCES Empresas(idEmpresa),
            FOREIGN KEY (idColeta) REFERENCES Coleta(idColeta)
            );
        ";
    $conexao = novaConexao();
    $resultado = $conexao->multi_query($sql);

    if ($resultado) {
        //echo "Tabelas criadas com sucesso";
    } else {
        //echo ":(" Erro: " . $conexao->error;"
    }


?>