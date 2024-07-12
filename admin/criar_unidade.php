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
        <h2>Cadastro de unidades</h2>
        <section>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="text" name="nome" placeholder="Nome da unidade">
                <input type="text" name="endereco" placeholder="Endereço">
                <input type="text" name="cidade" placeholder="Cidade">
                <input type="text" name="uf" placeholder="Estado">
                <input type="tel" name="telefone" placeholder="Telefone (51) 99999-9999">
                <label for="hora_abertura">Horário de abertura</label>
                <input type="time" name="hora_abertura">
                <label for="hora_fechamento">Horário de fechamento</label>
                <input type="time" name="hora_fechamento">
                <input type="file" name="imagem">
                <input type="submit" name="cadastrar">
            </form>
            <?php criarUnidade(); ?>
        </section>
    </section>
    <?php } else {
        header("location: index.php");
    } ?>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>