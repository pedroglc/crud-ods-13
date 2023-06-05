<?php
    require_once('01-conexao.php');

    function inserir_dadosUsuario(){
        if(isset($_POST['CadastrarUsuario'])){
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $cpf = $_POST['cpf'];
            $email = $_POST['email'];
            $rua = $_POST['rua'];
            $numero = $_POST['numero'];
            $bairro = $_POST['bairro'];
            $cep = $_POST['cep'];
            $cidade = $_POST['cidade'];
            $uf = $_POST['uf'];
            $telefone = $_POST['telefone'];
        }

        $erros = [];
        if (count($_POST) > 0) {
            if (empty($nome)) {               
                $erros['nome'] = "Nome é obrigatório";
            }
            if (empty($sobrenome)) {                
                $erros['sobrenome'] = "O sobrenome é obrigatório";
            }
            if (empty($cpf)) {                
                $erros['cpf'] = "O cpf é obrigatório";
            }
            if (empty($email)) {                
                $erros['email'] = "email é obrigatório";
            }
            if (empty($rua)) {                
                $erros['rua'] = "rua é obrigatório";
            }
            if (empty($numero)) {                
                $erros['numero'] = "o numero é obrigatório";
            }
            if (empty($bairro)) {                
                $erros['bairro'] = "o bairro é obrigatório";
            }
            if (empty($cep)) {               
                $erros['cep'] = "cep é obrigatório";
            }
            if (empty($cidade)) {                
                $erros['cidade'] = "o cidade é obrigatório";
            }
            if (empty($uf)) {               
                $erros['uf'] = "uf é obrigatório";
            }
            if (empty($telefone)) {                
                $erros['telefone'] = "o telefone é obrigatório";
            }

            if(count($erros)==0){
            if(isset($_POST['CadastrarUsuario'])){

                $sql="INSERT INTO consumidores (nomeConsumidor, sobrenome, cpf, email, telefone, rua, numero, bairro, cep, cidade, uf) 
                values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $conexao = novaConexao();
                $insert = $conexao->prepare($sql);

                $params = [
                    $_POST['nome'],
                    $_POST['sobrenome'],
                    $_POST['cpf'],
                    $_POST['email'],
                    $_POST['telefone'],
                    $_POST['rua'],
                    $_POST['numero'],
                    $_POST['bairro'],
                    $_POST['cep'],
                    $_POST['cidade'],
                    $_POST['uf']                    
                ];

                $insert->bind_param("ssssssissss", ...$params);
                
                if ($insert->execute()){
                    unset($_POST); 
                    }
                    $conexao->close();
                }
            } 
        }  echo "<script> window.location ='index.php'; </script>";
    }
    

?>

<?php

    if (isset($_GET['excluirConsumidor'])){   
        $conexao = novaConexao();  
                    
        $excluirSQL = "DELETE FROM consumidores WHERE idConsumidor = ?"; 
            $stmt = $conexao->prepare($excluirSQL);  
            $stmt->bind_param("i", $_GET['excluirConsumidor']); 
            $stmt->execute();
            
            $conexao->close();  
    } 

    function listar_consumidor(){
        $conexao = novaConexao();
        $sql = "SELECT * FROM consumidores";
        $resultado = $conexao->query($sql);

        if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $registros[] = $row;
        }
    } elseif ($conexao->error) {
        echo ":( Erro: " . $conexao->error;
    }

    return $registros ?? [];
    }

    $registrosC = listar_consumidor();

?>




