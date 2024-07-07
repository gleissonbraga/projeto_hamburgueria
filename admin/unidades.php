<?php session_start(); ?>
<?php require("controller/function.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/usuario.css">
    <title>Área administrativa</title>
</head>
<body id="container">
    <?php if (isset($_SESSION['active'])) {?>
     <?php $unidades = dadosDasTabelas("unidades", "nome_unidade"); ?>   

    <section class="menu">
        <?php include "layout/menu.php" ?>
    </section>
    
    <section class="content">
        <h2 class="content-title">Cadastre, exclua ou altere um usuário</h2>
        <div class="content-link-cadastro"><a href="criar_unidade.php">Cadastrar unidade</a></div>
        <div class="caixa-tabela">
            <table class="tabela">
                <thead class="tabela-cabecalho">
                    <tr>
                        <th>Imagem</th>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Cidade</th>
                        <th>UF</th>
                        <th>Contato</th>
                        <th>Horário de funcionamento</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody class="tabela-body">
                    <?php foreach($unidades as $unidade): ?>
                        <tr class="tabela-body-coluna">
                            <?php if(!empty($unidade['foto_unidade'])){ ?>
                                <td><img width="80px" src="controller/uploads/<?php echo $unidade['foto_unidade']; ?>" alt=""></td>
                            <?php } ?>
                            <td><?php echo $unidade['id'] ?></td>
                            <td><?php echo $unidade['nome_unidade'] ?></td>
                            <td><?php echo $unidade['endereco_unidade'] ?></td>
                            <td><?php echo $unidade['cidade'] ?></td>
                            <td><?php echo $unidade['uf'] ?></td>
                            <td><?php echo $unidade['contato_unidade'] ?></td>
                            <td><?php echo $unidade['hora_abertura'] . " às " . $unidade['hora_fechamento']?></td>
                            <td class="tabela-body-editar">
                                <a href="#" target="_blank" class="tabela-body-coluna__update"><ion-icon name="sync-circle"></ion-icon></a>
                                <a href="#" target="_blank" class="tabela-body-coluna__delete"><ion-icon name="trash"></ion-icon></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    
    
    
    
    <?php } else {
        header("location: index.php");
    } ?>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>