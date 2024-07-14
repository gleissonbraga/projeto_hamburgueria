<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/adm_inicio.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/hamburguer.css">
    <link rel="stylesheet" href="css/bebida.css">
    <link rel="stylesheet" href="css/porcao.css">
    <link rel="stylesheet" href="css/unidades.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Área administrativa</title>
</head>
<body id="container">
    <?php if (isset($_SESSION['active'])) {?>


    <section class="menu">
        <?php include "layout/menu.php" ?>
    </section>
    
    <section class="content">
        <h2>Bem vindo!</h2>
        <h3>Área administrativa do site Texas Burguer!</h3>
    </section>
    
    
    
    
    <?php } else {
        header("location: index.php");
    } ?>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>