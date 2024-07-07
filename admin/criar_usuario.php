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
    <link rel="stylesheet" href="css/form_cadastro.css">
    <title>Área administrativa</title>
</head>
<body id="container">
    <?php if (isset($_SESSION['active'])) {?>


    <section class="menu">
        <?php include "layout/menu.php" ?>
    </section>
    
    <section class="content">
        <h2>Cadastro de usuário</h2>
        <section>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="text" name="nome" placeholder="Seu Nome">
                <input type="email" name="email" placeholder="Seu E-mail">
                <input type="password" name="senha" placeholder="Crie uma senha">
                <input type="file" name="imagem">
                <input type="submit" name="cadastrar">
            </form>
            <?php criarUsuario(); ?>
        </section>
    </section>
    <?php } else {
        header("location: index.php");
    } ?>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>