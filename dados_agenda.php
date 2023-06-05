<?php
    require_once('01-conexao.php');

    function inserir_dadosAgenda(){
        if(isset($_POST['CadastrarAgenda'])){
            $consumidor = $_POST['consumidor'];
            $coletor = $_POST['coletor'];
            $data = $_POST['data'];
            $hora = $_POST['hora'];
            $produto = $_POST['produto'];
            $quantidade = $_POST['quantidade'];
            
        }

        $erros = [];
        if (count($_POST) > 0) {
            if (empty($consumidor)) {               
                $erros['consumidor'] = "consumidor é obrigatório";
            }
            if (empty($coletor)) {                
                $erros['coletor'] = "O coletor é obrigatório";
            }
            if (empty($data)) {                
                $erros['data'] = "O data é obrigatório";
            }
            if (empty($hora)) {                
                $erros['hora'] = "hora é obrigatório";
            }
            if (empty($produto)) {                
                $erros['produto'] = "produto é obrigatório";
            }
            if (empty($quantidade)) {                
                $erros['quantidade'] = "o quantidade é obrigatório";
            }

            if(count($erros)==0){
            if(isset($_POST['CadastrarAgenda'])){

                $sql="INSERT INTO coleta (idConsumidor, idColetor, descricaoProduto, quantidadeProduto, dataColeta, horaColeta) 
                values (?, ?, ?, ?, ?, ?)";

                $conexao = novaConexao();
                $insert = $conexao->prepare($sql);

                $params = [
                    $_POST['consumidor'],
                    $_POST['coletor'],
                    $_POST['produto'],
                    $_POST['quantidade'],
                    $_POST['data'],
                    $_POST['hora']
                                       
                ];

                $insert->bind_param("iisiss", ...$params);
                
                if ($insert->execute()){
                    unset($_POST); 
                    }
                    $conexao->close();
                }
            } 
        } echo "<script> window.location ='index.php'; </script>";   
    }

?>

<?php

    if (isset($_GET['excluirAgenda'])){   
        $conexao = novaConexao();  
                    
        $excluirSQL = "DELETE FROM coleta WHERE idColeta = ?"; 
            $stmt = $conexao->prepare($excluirSQL);  
            $stmt->bind_param("i", $_GET['excluirAgenda']); 
            $stmt->execute();
            
            $conexao->close();  
    } 

    function listar_agenda(){
        $conexao = novaConexao();
        $sql = "SELECT * from coleta as c inner join consumidores A on c.idConsumidor=A.idConsumidor inner join coletor on coletor.idColetor=c.idColetor";
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

    $registrosAg = listar_agenda();

?>