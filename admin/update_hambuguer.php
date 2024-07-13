<?php session_start(); ?>
<?php include("model/function.php"); ?>
<?php include("model/connect.php"); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/usuario.css">
    <link rel="stylesheet" href="css/update.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Área administrativa</title>

    <style>
        .div3 form {
            padding-top: 80px;
        }
    </style>
</head>
<?php ?>

<body id="container">
    <?php if (isset($_SESSION['active'])) { ?>
        <?php if (isset($_GET)) { ?>
            <?php
            $id = $_GET['id'];
            $hamburguer = buscarId($connect, 'hamburguer', $id);
            ?>
        <?php } ?>

        <section class="menu">
            <?php include "layout/menu.php" ?>
        </section>

        <section class="content">
            <div class="div1">
                <div class="div2">
                    <h2 class="content-title"><ion-icon name="document-text"></ion-icon>Atualizando hamburguer: <?= $_GET['nome'] ?></h2>
                </div>
                <div class="div3">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input value="<?= $hamburguer['id']; ?>" type="hidden" name="id">
                        <input value="<?= $hamburguer['nome_hamburguer'] ?>" type="text" name="nome" placeholder="Nome">
                        <input value="<?= $hamburguer['descricao_hamburguer'] ?>" type="text" name="descricao" placeholder="Ingredientes">
                        <input value="<?= $hamburguer['preco_hamburguer'] ?>" type="text" name="preco" placeholder="Ingredientes">
                        <div class="flipswitch">
                            <input type="checkbox" name="destaque" class="flipswitch-cb" id="fs" <?= $hamburguer['destaque'] ? 'checked' : '' ?>>
                            <label class="flipswitch-label" for="fs">
                                <div class="flipswitch-inner"></div>
                                <div class="flipswitch-switch"></div>
                            </label>
                        </div>
                        <input type="file" name="imagem">
                        <input type="submit" name="atualizar" value="Atualizar">
                    </form>
                    <?php updateHamburguer($connect)  ?>
                    <a href="hamburguer.php"><ion-icon name="arrow-undo"></ion-icon>Voltar</a>
                </div>
            </div>
        </section>




    <?php } else {
        header("location: index.php");
    } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>