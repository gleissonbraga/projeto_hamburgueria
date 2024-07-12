<?php session_start(); ?>
<?php require("model/function.php");?>

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
        <h2>Cadastro de hamburguer</h2>
        <section>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="text" name="nome" placeholder="Nome do produto">
                <input type="text" name="descricao" placeholder="Ingredientes">
                <input type="text" name="preco" placeholder="Preço">
                <input type="file" name="imagem">
                <input type="submit" name="cadastrar">
            </form>
            <?php criarHamburguer(); ?>
        </section>
    </section>
    <?php } else {
        header("location: index.php");
    } ?>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>