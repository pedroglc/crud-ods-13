<!DOCTYPE html>
<html lang="pt-br">
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
        <title>Dashboard | Painel</title>
    </head>
<body>
    <!-- Splash Screen -->
    <!-- <div class="wrapper-splash"><div class="follow-the-leader"><div></div><div></div><div></div><div></div></div></div> -->
    <header data-js-header>
        <div>
            <a href="index.php"><img src="imgs/bitmap2.png" alt="Logo"></a>
        </div>
        <div class="menu-options-links">
            <i class="fa-brands fa-github"><a href="#">GitHub</a></i>
        </div>
    </header>
    <nav>
        <section class="box-user">
            <img src="imgs/user.png" class="img-user" alt="Imagem de usuário">
            <h3>Samuel R Souza</h3>
            <h5>Administrador</h5>
        </section>
        <section class="box-itens-nav">
            <ul>
                <li data-js-tabMenu-item><i class="fa-solid fa-user"></i>Usuários</li>
                <li data-js-tabMenu-item><i class="fa-solid fa-recycle"></i>Coletores</li>
                <li data-js-tabMenu-item><i class="fa-solid fa-building-flag"></i>Empresas</li>
                <li data-js-tabMenu-item><i class="fa-solid fa-truck-fast"></i>Coleta</li>
                <li data-js-tabMenu-item><i class="fa-solid fa-calendar-days"></i>Entrega</li>
                <li data-js-tabMenu-item><i class="fa-solid fa-gear"></i>Configurações</li>
            </ul>
        </section>
    </nav>
    <main data-js-main>
     
        <section class="main-section" data-js-tabMenu-content>
            <article class="article-titles">
                <h1>Usuários</h1>
                <input type="text" class="txt-pesquisa" placeholder="Pesquise em Usuários">
            </article>
            <article class="box-btns-crud">
                <button class="crud-btn-criar" data-js-btnTabFormsTables>Criar Novo</button>
            </article>
            <form method="POST" action="" class="box-form-crud" data-js-frmTabFormsTables>
                <h1>Cadastrar Usuários</h1>
                <input type="text" placeholder="Nome" class="txtNomeUsuario"name="nome">
                <input type="text" placeholder="Sobrenome" class="txtSobreNomeUsuario"name="sobrenome">
                <input type="number" placeholder="CPF" class="txtCpfUsuario"name="cpf">
                <input type="text" placeholder="E-Mail" class="txtEmailUsuario"name="email">
                <input type="text" placeholder="Rua" class="txtRuaUsuario"name="rua">
                <input type="number" placeholder="Nº"name="numero">
                <input type="text" placeholder="Bairro" class="txtBairroUsuario"name="bairro">
                <input type="number" placeholder="CEP" class="txtCepUsuario"name="cep">
                <input type="text" placeholder="Cidade" class="txtCidadeUsuario" name="cidade">
                <select type="text" placeholder="UF" class="txtUfUsuario"name="uf">
                    <option value="sp">SP</option>
                    <option value="mg">MG</option>
                    <option value="pr">PR</option>
                    <option value="rj">RJ</option>
                    <option value="sc">SC</option>
                </select>
                <input type="number" placeholder="Telefone" class="txtTelefoneUsuario" name="telefone">
                <button class="btnLimparCadastro">Limpar</button>
                <a href="index.php?CadastrarUsuario">
                    <input type="submit" value="Cadastrar" class="btnSubmitCadastrar" name="CadastrarUsuario">
                </a>
                <?php  
                require_once('01-conexao.php');               
                include('dados_consumidor.php');
                    if(isset($_POST['CadastrarUsuario'])){                        
                        inserir_dadosUsuario();                                                
                    }                                      
                ?>
            </form>
            <section class="box-table" data-js-tableTabFormsTables>
                <div class="row-header-table">
                    <div class="col-header-table">Ações</div>
                    <div class="col-header-table"><a href="quick-pi.php?sort=desc">Id <i class="fa-solid fa-chevron-up fa-rotate-180"></i></a></div>
                    <div class="col-header-table">Nome</div>
                    <div class="col-header-table">Sobrenome</div>
                    <div class="col-header-table">CPF</div>
                    <div class="col-header-table">E-Mail</div>
                    <div class="col-header-table">Telefone</div>
                    <div class="col-header-table">Rua</div>
                    <div class="col-header-table">Nº</div>
                    <div class="col-header-table">Bairro</div>
                    <div class="col-header-table">CEP</div>
                    <div class="col-header-table">Cidade</div>
                    <div class="col-header-table">UF</div>
                </div>
                <?php 
                    listar_consumidor();
                    if (isset($registrosC) && !empty($registrosC)) {
                    foreach ($registrosC as $registro) : ?>
                <div class="row-table">
                    <div class="col-table actions">
                    <a href="update_usuario.php?editarUsuario=<?= $registro['idConsumidor'] ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>                        
                    <a href="index.php?excluirConsumidor=<?= $registro['idConsumidor'] ?>">
                        <i class="fa-solid fa-trash"name="excluirConsumidor"></i> 
                    </a>
                    </div>
                    <div class="col-table"><?php echo $registro['idConsumidor'] ?></div>
                    <div class="col-table"><?php echo $registro['nomeConsumidor'] ?></div>
                    <div class="col-table"><?php echo $registro['sobrenome'] ?></div>
                    <div class="col-table"><?php echo $registro['cpf'] ?></div>
                    <div class="col-table"><?php echo $registro['email'] ?></div>
                    <div class="col-table"><?php echo $registro['telefone'] ?></div>
                    <div class="col-table"><?php echo $registro['rua'] ?></div>
                    <div class="col-table"><?php echo $registro['numero'] ?></div>
                    <div class="col-table"><?php echo $registro['bairro'] ?></div>
                    <div class="col-table"><?php echo $registro['cep'] ?></div>
                    <div class="col-table"><?php echo $registro['cidade'] ?></div>
                    <div class="col-table"><?php echo $registro['uf'] ?></div>
                </div>
                <?php endforeach ;
                        }
                    ?>  
            </section>
        </section>
         <section class="main-section" data-js-tabMenu-content>
            <article class="article-titles">
                <h1>Coletores</h1>
                <input type="text" class="txt-pesquisa" placeholder="Pesquise em Coletores">
            </article>
            <article class="box-btns-crud">
                <button class="crud-btn-criar" data-js-btnTabFormsTables>Criar Novo</button>
            </article>
            <form method="post" action="" class="box-form-crud" data-js-frmTabFormsTables>
                <h1>Cadastrar Coletores</h1>
                <input type="text" placeholder="Nome/Razão Social" class="txtNomeRazaoColetores"name="nome">
                <!-- <input type="text" placeholder="Sobrenome" class="txtSobreNomeUsuario"name="sobrenome"> -->
                <input type="number" placeholder="CPF/CNPJ" class="txtCpfCnpjColetores"name="cpf">
                <input type="text" placeholder="E-Mail" class="txtEmailColetores"name="email">
                <input type="text" placeholder="Rua" class="txtRuaColetores"name="rua">
                <input type="number" placeholder="Nº"name="numero" class="txtNumeroColetores">
                <input type="text" placeholder="Bairro" class="txtBairroColetores"name="bairro">
                <input type="number" placeholder="CEP" class="txtCepColetores"name="cep">
                <input type="text" placeholder="Cidade" class="txtCidadeColetores"name="cidade">
                <select type="text" placeholder="UF" class="txtUfColetores"name="uf">
                    <option value="sp">SP</option>
                    <option value="mg">MG</option>
                    <option value="pr">PR</option>
                    <option value="rj">RJ</option>
                    <option value="sc">SC</option>
                </select>
                <input type="number" placeholder="Telefone" class="txtTelefoneColetores"name="telefone">
                <button class="btnLimparCadastro">Limpar</button>
                <input type="submit" value="Cadastrar" class="btnSubmitCadastrar"name="CadastrarColetor">
            </form>
            <?php
                require_once('01-conexao.php');
                require_once('dados_coletores.php');
                    if(isset($_POST['CadastrarColetor'])){                        
                        inserir_coletor();
                    }
                ?>
            <section class="box-table" data-js-tableTabFormsTables>
                <div class="row-header-table">
                    <div class="col-header-table">Ações</div>
                    <div class="col-header-table">iD</div>
                    <div class="col-header-table">Nome</div>
                    <div class="col-header-table">Sobrenome</div>
                    <div class="col-header-table">CPF</div>
                    <div class="col-header-table">E-Mail</div>
                    <div class="col-header-table">Telefone</div>
                    <div class="col-header-table">Rua</div>
                    <div class="col-header-table">Nº</div>
                    <div class="col-header-table">Bairro</div>
                    <div class="col-header-table">CEP</div>
                    <div class="col-header-table">Cidade</div>
                    <div class="col-header-table">UF</div>
                </div>
                <?php 
                    listar_coletor();
                    if (isset($registros) && !empty($registros)) {
                    foreach ($registros as $registro) : ?>
                <div class="row-table">
                    <div class="col-table actions">
                    <a href="update_coletor.php?editarColetor=<?= $registro['idColetor'] ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a href="index.php?excluirColetor=<?= $registro['idColetor'] ?>">
                        <i class="fa-solid fa-trash"name="excluirColetor"></i> 
                    </a> 
                    </div>
                    <div class="col-table"><?php echo $registro['idColetor'] ?></div>
                    <div class="col-table"><?php echo $registro['nomeColetor'] ?></div>
                    <div class="col-table"><?php echo $registro['sobrenome'] ?></div>
                    <div class="col-table"><?php echo $registro['cpf'] ?></div>
                    <div class="col-table"><?php echo $registro['email'] ?></div>
                    <div class="col-table"><?php echo $registro['telefone'] ?></div>
                    <div class="col-table"><?php echo $registro['rua'] ?></div>
                    <div class="col-table"><?php echo $registro['numero'] ?></div>
                    <div class="col-table"><?php echo $registro['bairro'] ?></div>
                    <div class="col-table"><?php echo $registro['cep'] ?></div>
                    <div class="col-table"><?php echo $registro['cidade'] ?></div>
                    <div class="col-table"><?php echo $registro['uf'] ?></div>
                </div>
                <?php endforeach ;
                        }
                    ?> 
            </section>
        </section>
        <section class="main-section" data-js-tabMenu-content>
            <article class="article-titles">
                <h1>Empresas</h1>
                <input type="text" class="txt-pesquisa" placeholder="Pesquise em Agenda">
            </article>
            <article class="box-btns-crud">
                <button class="crud-btn-criar" data-js-btnTabFormsTables>Criar Novo</button>
            </article>
            <form method="POST" action="" class="box-form-crud" data-js-frmTabFormsTables>
                <h1>Cadastrar Entrega</h1>
                <input type="number" placeholder=" ID Coletor" class="txtIdColetorAgendamento" name="coletor">                
                <input type="number" placeholder="Empresa" class="txtIdEmpresaAgendamento" name="empresa">
                <input type="date" placeholder="Data da coleta" class="txtDataColetaAgendamento" name="data">
                <input type="time" placeholder="Hora da coleta" class="txtDataEntregaAgendamento"name="hora">
                <input type="text" placeholder="ID do Produto" class="txtIdProdutoAgendamento"name="idColeta">
                <button class="btnLimparCadastro">Limpar</button>
                <input type="submit" value="Cadastrar" class="btnSubmitCadastrar"name="CadastrarEntrega">
                <?php
                require_once('01-conexao.php'); 
                require_once('dados_entrega.php');
                    if(isset($_POST['CadastrarEntrega'])){                        
                        inserir_dadosEntrega();
                    }                    
                ?>
            </form>
            <section class="box-table" data-js-tableTabFormsTables>
                <div class="row-header-table">
                    <div class="col-header-table">Ações</div>
                    <div class="col-header-table">#</div>
                    <div class="col-header-table">Empresa coletora</div>                    
                    <div class="col-header-table">Empresa Recicladora</div>
                    <div class="col-header-table">Produto</div>
                    <div class="col-header-table">Quantidade</div>
                    <div class="col-header-table">Data da entrega</div>
                    <div class="col-header-table">Hora da entrega</div>                    
                    <div class="col-header-table">Rua</div>
                    <div class="col-header-table">Número</div>
                    <div class="col-header-table">Bairro</div>
                    <div class="col-header-table">Cidade</div>
                </div>
                <?php 
                    listar_entrega();
                    if (isset($registrosEntrega) && !empty($registrosEntrega)) {
                    foreach ($registrosEntrega as $registro) : ?>
                <div class="row-table">
                    <div class="col-table actions">
                    <a href="update_entrega.php?editarEntrega=<?= $registro['idEntrega'] ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>                        
                    <a href="index.php?excluirEntrega=<?= $registro['idEntrega'] ?>">
                        <i class="fa-solid fa-trash"name="excluirEntrega"></i> 
                    </a>
                    </div>
                    <div class="col-table"><?php echo $registro['idEntrega'] ?></div>
                    <div class="col-table"><?php echo $registro['nomeColetor'] ?></div>
                    <div class="col-table"><?php echo $registro['nomeEmpresa'] ?></div>
                    <div class="col-table"><?php echo $registro['descricaoProduto'] ?></div>
                    <div class="col-table"><?php echo $registro['quantidadeProduto'] ?></div>
                    <div class="col-table"><?php echo date('d/m/Y', strtotime($registro['dataEntrega'])); ?></div>
                    <div class="col-table"><?php echo $registro['horaEntrega'] ?></div>
                    <div class="col-table"><?php echo $registro['rua'] ?></div>
                    <div class="col-table"><?php echo $registro['numero'] ?></div>
                    <div class="col-table"><?php echo $registro['bairro'] ?></div>
                    <div class="col-table"><?php echo $registro['cidade'] ?></div>                    
                </div>
                <?php endforeach ;
                        }
                    ?> 
            </section>
        </section>
        <section class="main-section" data-js-tabMenu-content>
            <article class="article-titles">
                <h1>Coleta</h1>
                <input type="text" class="txt-pesquisa" placeholder="Pesquise em Agenda">
            </article>
            <article class="box-btns-crud">
                <button class="crud-btn-criar" data-js-btnTabFormsTables>Criar Novo</button>
            </article>
            <form method="POST" action="" class="box-form-crud" data-js-frmTabFormsTables>
                <h1>Cadastrar Coleta</h1>
                <input type="number" placeholder="ID do Consumidor" class="txtIdConsumidorColeta"name="consumidor">
                <input type="number" placeholder="ID do Coletor" class="txtIdColetorColeta"name="coletor">
                <input type="text" placeholder="Descrição do Produto" class="txtIdProdutoColeta"name="produto">
                <input type="number" placeholder="Quantidade" class="txtQuantidadeColeta"name="quantidade">
                <input type="date" placeholder="Data da entrega" class="txtDataColeta"name="data">
                <input type="time" placeholder="HOra da entrega" class="txtHoraColeta"name="hora">
                <button class="btnLimparCadastro">Limpar</button>
                <input type="submit" value="Cadastrar" class="btnSubmitCadastrar"name="CadastrarAgenda">
                <?php
                require_once('01-conexao.php'); 
                require_once('dados_agenda.php');
                    if(isset($_POST['CadastrarAgenda'])){                        
                        inserir_dadosAgenda();
                    }                    
                ?>
            </form>
            <section class="box-table" data-js-tableTabFormsTables>
                <div class="row-header-table">
                    <div class="col-header-table">Ações</div>
                    <div class="col-header-table">#</div>
                    <div class="col-header-table">Empresa coletora</div>                    
                    <div class="col-header-table">Cliente</div>                    
                    <div class="col-header-table">Produto</div>
                    <div class="col-header-table">Quantidade</div>
                    <div class="col-header-table">Data da coleta</div>
                    <div class="col-header-table">Hora da coleta</div>
                    <div class="col-header-table">Rua</div>
                    <div class="col-header-table">numero</div>
                    <div class="col-header-table">Bairro</div>
                    <div class="col-header-table">Cidade</div>
                </div>
                <?php 
                    listar_agenda();
                    if (isset($registrosAg) && !empty($registrosAg)) {
                    foreach ($registrosAg as $registro) : ?>
                <div class="row-table">
                    <div class="col-table actions">
                    <a href="update_agenda.php?editarAgenda=<?= $registro['idColeta'] ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>                        
                    <a href="index.php?excluirAgenda=<?= $registro['idColeta'] ?>">
                        <i class="fa-solid fa-trash"name="excluirAgenda"></i> 
                    </a>
                    </div>
                    <div class="col-table"><?php echo $registro['idColeta'] ?></div>
                    <div class="col-table"><?php echo $registro['nomeColetor'] ?></div>
                    <div class="col-table"><?php echo $registro['nomeConsumidor'] ?></div>
                    <div class="col-table"><?php echo $registro['descricaoProduto'] ?></div>
                    <div class="col-table"><?php echo $registro['quantidadeProduto'] ?></div>
                    <div class="col-table"><?php echo date('d/m/Y', strtotime($registro['dataColeta'])); ?></div>
                    <div class="col-table"><?php echo $registro['horaColeta'] ?></div>
                    <div class="col-table"><?php echo $registro['rua'] ?></div>
                    <div class="col-table"><?php echo $registro['numero'] ?></div>
                    <div class="col-table"><?php echo $registro['bairro'] ?></div>
                    <div class="col-table"><?php echo $registro['cidade'] ?></div>                    
                </div>
                <?php endforeach ;
                        }
                    ?> 
            </section>
        </section>
        <section class="main-section" data-js-tabMenu-content>
            <article class="article-titles">
                <h1>Entrega</h1>
                <input type="text" class="txt-pesquisa" placeholder="Pesquise em Agenda">
            </article>
            <article class="box-btns-crud">
                <button class="crud-btn-criar" data-js-btnTabFormsTables>Criar Novo</button>
            </article>
            <form method="POST" action="" class="box-form-crud" data-js-frmTabFormsTables>
                <h1>Cadastrar Entrega</h1>
                <input type="number" placeholder="Coletor" class="txtIdColetorAgendamento" name="coletor">                
                <input type="number" placeholder="Empresa" class="txtIdUsuarioAgendamento" name="empresa">
                <input type="date" placeholder="Data da coleta" class="txtDataColetaAgendamento" name="data">
                <input type="time" placeholder="Hora da coleta" class="txtDataEntregaAgendamento"name="hora">
                <input type="text" placeholder="Produto" class="txtIdColetorAgendamento"name="idColeta">
                <button class="btnLimparCadastro">Limpar</button>
                <input type="submit" value="Cadastrar" class="btnSubmitCadastrar"name="CadastrarEntrega">
                <?php
                require_once('01-conexao.php'); 
                require_once('dados_entrega.php');
                    if(isset($_POST['CadastrarEntrega'])){                        
                        inserir_dadosEntrega();
                    }                    
                ?>
            </form>
            <section class="box-table" data-js-tableTabFormsTables>
                <div class="row-header-table">
                    <div class="col-header-table">Ações</div>
                    <div class="col-header-table">#</div>
                    <div class="col-header-table">Empresa coletora</div>                    
                    <div class="col-header-table">Empresa Recicladora</div>
                    <div class="col-header-table">Produto</div>
                    <div class="col-header-table">Quantidade</div>
                    <div class="col-header-table">Data da entrega</div>
                    <div class="col-header-table">Hora da entrega</div>                    
                    <div class="col-header-table">Rua</div>
                    <div class="col-header-table">numero</div>
                    <div class="col-header-table">Bairro</div>
                    <div class="col-header-table">Cidade</div>
                </div>
                <?php 
                    listar_entrega();
                    if (isset($registrosEntrega) && !empty($registrosEntrega)) {
                    foreach ($registrosEntrega as $registro) : ?>
                <div class="row-table">
                    <div class="col-table actions">
                    <a href="update_entrega.php?editarEntrega=<?= $registro['idEntrega'] ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>                        
                    <a href="index.php?excluirEntrega=<?= $registro['idEntrega'] ?>">
                        <i class="fa-solid fa-trash"name="excluirEntrega"></i> 
                    </a>
                    </div>
                    <div class="col-table"><?php echo $registro['idEntrega'] ?></div>
                    <div class="col-table"><?php echo $registro['nomeColetor'] ?></div>
                    <div class="col-table"><?php echo $registro['nomeEmpresa'] ?></div>
                    <div class="col-table"><?php echo $registro['descricaoProduto'] ?></div>
                    <div class="col-table"><?php echo $registro['quantidadeProduto'] ?></div>
                    <div class="col-table"><?php echo date('d/m/Y', strtotime($registro['dataEntrega'])); ?></div>
                    <div class="col-table"><?php echo $registro['horaEntrega'] ?></div>
                    <div class="col-table"><?php echo $registro['rua'] ?></div>
                    <div class="col-table"><?php echo $registro['numero'] ?></div>
                    <div class="col-table"><?php echo $registro['bairro'] ?></div>
                    <div class="col-table"><?php echo $registro['cidade'] ?></div>                    
                </div>
                <?php endforeach ;
                        }
                    ?> 
            </section>
        </section>
        <section class="main-section" data-js-tabMenu-content>
            <article class="article-titles">
                <h1>Configurações</h1>
                <input type="text" class="txt-pesquisa" placeholder="Pesquise em Configurações">
            </article>
        </section>
        <div class="subirGrid-icon" data-js-subirGrid-icon>
            <i class="fa-solid fa-chevron-up"></i>
        </div>
    </main>
    <aside>
        <h1>Acesso</h1>
        <article class="article-infos">
            <div class="box-infos">
                <div class="infos-local">
                    <p>Samuel Ribeiro de Souza</p>
                    <p>rssamuel17@gmail.com</p>
                    <p>Administrador</p>
                </div>
            </div>
        </article>
        <h1>Informações</h1>
        <article class="article-infos">
            <div class="box-infos">
                <div class="infos-local">
                    <p><?php $hoje = date('d/m/Y'); echo $hoje; ?></p>
                    <p>Registro, SP - BR</p>
                    <p>29° C</p>
                </div>
            </div>
        </article>
    </aside>
    <footer>Todos os direitos reservados</footer>
<script src="https://kit.fontawesome.com/33170ddcd4.js" crossorigin="anonymous"></script>
<script type="module" src="js/script.js"></script>
</body>
</html>
