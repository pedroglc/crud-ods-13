<?php
    require_once('01-conexao.php');

    function inserir_dadosEntrega(){
        if(isset($_POST['CadastrarEntrega'])){
            $coletor = $_POST['coletor'];
            $empresa = $_POST['empresa'];
            $data = $_POST['data'];
            $hora = $_POST['hora'];
            $idColeta = $_POST['idColeta'];
            
            
        }

        $erros = [];
        if (count($_POST) > 0) {
            if (empty($coletor)) {               
                $erros['coletor'] = "coletor é obrigatório";
            }
            if (empty($empresa)) {                
                $erros['empresa'] = "O empresa é obrigatório";
            }
            if (empty($data)) {                
                $erros['data'] = "O data é obrigatório";
            }
            if (empty($hora)) {                
                $erros['hora'] = "hora é obrigatório";
            }
            if (empty($idColeta)) {                
                $erros['idColeta'] = "idColeta é obrigatório";
            }            

            if(count($erros)==0){
            if(isset($_POST['CadastrarEntrega'])){

                $sql="INSERT INTO entrega (idColetor, idEmpresa, idColeta, dataEntrega, horaEntrega) 
                values (?, ?, ?, ?, ?)";

                $conexao = novaConexao();
                $insert = $conexao->prepare($sql);

                $params = [
                    $_POST['coletor'],
                    $_POST['empresa'],
                    $_POST['idColeta'],                    
                    $_POST['data'],
                    $_POST['hora']
                                       
                ];

                $insert->bind_param("iiiss", ...$params);
                
                if ($insert->execute()){
                    unset($_POST); 
                    }
                    $conexao->close();
                }
            } 
        } echo "<script>  window.location ='index.php'; </script>";  
    }

?>

<?php

    if (isset($_GET['excluirEntrega'])){   
        $conexao = novaConexao();  
                    
        $excluirSQL = "DELETE FROM entrega WHERE idEntrega = ?"; 
            $stmt = $conexao->prepare($excluirSQL);  
            $stmt->bind_param("i", $_GET['excluirEntrega']); 
            $stmt->execute();
            
            $conexao->close();  
    } 

    function listar_entrega(){
        $conexao = novaConexao();
        $sql = "SELECT * from coletor inner join entrega on entrega.idColetor=coletor.idColetor 
        inner join empresas on empresas.idEmpresa=entrega.idEmpresa
        inner join coleta on coleta.idColeta=entrega.idColeta";
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

    $registrosEntrega = listar_entrega();

?>