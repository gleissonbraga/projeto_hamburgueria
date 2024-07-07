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
     <?php $bebidas = dadosDasTabelas("bebida", "nome_bebida"); ?>   

    <section class="menu">
        <?php include "layout/menu.php" ?>
    </section>
    
    <section class="content">
        <h2 class="content-title">Cadastre, exclua ou altere uma bebida</h2>
        <div class="content-link-cadastro"><a href="criar_bebida.php">Cadastrar bebida</a></div>
        <div class="caixa-tabela">
            <table class="tabela">
                <thead class="tabela-cabecalho">
                    <tr>
                        <th>Foto</th>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody class="tabela-body">
                    <?php foreach($bebidas as $bebida): ?>
                        <tr class="tabela-body-coluna">
                            <?php if(!empty($bebida['foto_bebida'])){ ?>
                                <td><img width="80px" src="controller/uploads/<?php echo $bebida['foto_bebida']; ?>" alt=""></td>
                            <?php } ?>
                            <td><?php echo $bebida['id'] ?></td>
                            <td><?php echo $bebida['nome_bebida'] ?></td>
                            <td><?php echo $bebida['descricao_bebida'] ?></td>
                            <td><?php echo "R$ " . $bebida['preco_bebida'] ?></td>
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