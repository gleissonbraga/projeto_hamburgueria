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
     <?php $users = dadosDasTabelas("usuarios", "data_usuario"); ?>   

    <section class="menu">
        <?php include "layout/menu.php" ?>
    </section>
    
    <section class="content">
        <h2 class="content-title">Cadastre, exclua ou altere um usuário</h2>
        <div class="content-link-cadastro"><a href="criar_usuario.php">Cadastrar usuário</a></div>

        <div class="teste">
            <div class="teste2">

                <div class="teste3">
            </div>

            </div>
        </div>
    
        <div class="caixa-tabela">
            <table class="tabela">
            <thead class="tabela-cabecalho">
                    <tr>
                        <th>Foto</th>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Ingredientes</th>
                        <th>Preço</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody class="tabela-body">
                    <?php foreach($users as $user): ?>
                        <tr class="tabela-body-coluna">
                            <?php if(!empty($user['img_user'])){ ?>
                                <td><img width="100px" src="controller/uploads/<?php echo $user['img_user']; ?>" alt=""></td>
                            <?php } ?>
                            <td><?php echo $user['id'] ?></td>
                            <td><?php echo $user['nome_user'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td><?php echo $user['data_usuario'] ?></td>
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