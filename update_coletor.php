<?php
require_once('01-conexao.php');
    $conexao = novaConexao();

    if(isset($_GET['editarColetor'])){
            $sql = "SELECT * FROM coletor where idColetor = ?";
            $consulta = $conexao->prepare($sql);
            $consulta->bind_param("i", $_GET['editarColetor']);

            if ($consulta->execute()) {
                $resultado = $consulta->get_result(); 
                if ($resultado->num_rows > 0) {

                    $dados = $resultado->fetch_assoc();
                
                }
            }
        }else{echo"erro";} 

        if (isset($_POST['Alterarcoletor'])){   
          
                    
            $editarSQL = "UPDATE coletor SET nomeColetor = ?, sobrenome = ?, cpf = ?, email = ?, rua = ?, numero = ?, bairro = ?, cidade = ?, cep = ?, telefone = ?, uf = ? WHERE idColetor = ?"; 
                $consultar = $conexao->prepare($editarSQL);
                $params = [
                    $_POST['nome'],
                    $_POST['sobrenome'],
                    $_POST['cpf'],
                    $_POST['email'],
                    $_POST['rua'],
                    $_POST['numero'],
                    $_POST['bairro'],
                    $_POST['cidade'],
                    $_POST['cep'],
                    $_POST['telefone'],
                    $_POST['uf'],
                    $_POST['id']
                ];
            
                $consultar->bind_param("sssssisssssi", ...$params);
    
                if ($consultar->execute()) {
                    unset($dados);
                } 
                $conexao->close();
                header('location: index.php');
        } 
            
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="css/splash.css">
        <link rel="shortcut icon" href="imgs/dashboard.ico" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
        <title>Update Usuario</title>
    </head>
<body>
<main data-js-main>        
        <section class="main-section ativo" data-js-tabMenu-content>           
            <form method="POST" action="" class="box-form-crud ativo" data-js-frmTabFormsTables>
                <h1>Cadastrar Usuários</h1>
                <input type="hidden"name="id" value="<?= $dados['idColetor']?>">
                <input type="text" placeholder="Nome" class="txtNomeUsuario"name="nome"value="<?= $dados['nomeColetor'] ?>">
                <input type="text" placeholder="Sobrenome" class="txtSobreNomeUsuario"name="sobrenome"value="<?= $dados['sobrenome']?>">
                <input type="number" placeholder="CPF" class="txtCpfUsuario"name="cpf"value="<?= $dados['cpf'] ?>">
                <input type="text" placeholder="E-Mail" class="txtEmailUsuario"name="email"value="<?= $dados['email'] ?>">
                <input type="text" placeholder="Rua" class="txtRuaUsuario"name="rua"value="<?= $dados['rua'] ?>">
                <input type="number" placeholder="Nº"name="numero"value="<?= $dados['numero'] ?>">
                <input type="text" placeholder="Bairro" class="txtBairroUsuario"name="bairro"value="<?= $dados['bairro'] ?>">
                <input type="number" placeholder="CEP" class="txtCepUsuario"name="cep"value="<?= $dados['cep'] ?>">
                <input type="text" placeholder="Cidade" class="txtCidadeUsuario"name="cidade"value="<?= $dados['cidade'] ?>">
                <input type="number" placeholder="telefone" class="txtCidadeUsuario"name="telefone"value="<?= $dados['telefone'] ?>">
                <select type="text" placeholder="UF" class="txtUfUsuario"name="uf"value="<?= $dados['uf'] ?>">
                    <option value="sp">SP</option>
                    <option value="mg">MG</option>
                    <option value="pr">PR</option>
                    <option value="rj">RJ</option>
                    <option value="sc">SC</option>
                </select>
                <button class="btnLimparCadastro">Limpar</button>
                <a href="update_coletor.php?Alterarcoletor">
                    <input type="submit" value="Cadastrar" class="btnSubmitCadastrar" name="Alterarcoletor">
                </a>

            </form>
    </main>
</body>
</html>
