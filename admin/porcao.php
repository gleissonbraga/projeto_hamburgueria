<?php session_start(); ?>
<?php require("model/function.php"); ?>
<?php require("model/connect.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/usuario.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Área administrativa</title>
</head>

<body id="container">
    <?php if (isset($_SESSION['active'])) { ?>
        <?php $porcoes = dadosDasTabelas("porcao", "nome_porcao"); ?>

        <section class="menu">
            <?php include "layout/menu.php" ?>
        </section>

        <section class="content">
            <div class="div1">
                <div class="div2 back-porcao">
                    <h2 class="content-title"><ion-icon name="document-text"></ion-icon>Cadastre, exclua ou altere uma porcao</h2>
                </div>
                <div class="div3">
                    <div class="content-link-cadastro"><a href="criar_usuario.php" class="bn5">Cadastrar uma porcao</a></div>
                    <div class="delete-usuario">
                        <?php if(isset($_GET['id'])):?>
                            <h3>Gostaria de deletar a porcao: <?= $_GET['nome']; ?></h3>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                                <input type="submit" name="delete" value="Sim">
                                <input type="submit" name="nao_deletar" value="Não">
                            </form>
                        <?php endif ?>

                        <?php if(isset($_POST['delete'])){ ?>
                            <?php 
                                delete($connect, "porcao", $_POST['id']);
                            ?>
                        <?php } elseif (isset($_POST['nao_deletar'])) { ?>
                            <?php header("location: porcao.php"); ?>
                        <?php } ?>
                    </div>
                    <div class="caixa-tabela">
                        <table class="tabela table table-bordered table-striped table-hover">
                            <thead class="tabela-cabecalho">
                                <tr>
                                    <th>Imagem</th>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Preco</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody class="tabela-body">
                                <?php foreach ($porcoes as $porcao) : ?>
                                    <tr class="tabela-body-coluna">
                                        <?php if (!empty($porcao['foto_porcao'])) { ?>
                                            <td class="text-center"><img width="80px" src="model/uploads/<?php echo $porcao['foto_porcao']; ?>" alt=""></td>
                                        <?php } else { ?>
                                            <td class="text-center"><img width="80px" src="css/img/avtar.png" alt=""></td>
                                        <?php } ?>
                                        <td class="align-middle text-center"><?php echo $porcao['id'] ?></td>
                                        <td class="align-middle text-center"><?php echo $porcao['nome_porcao'] ?></td>
                                        <td class="align-middle text-center"><?php echo $porcao['descricao_porcao'] ?></td>
                                        <td class="align-middle text-center"><?php echo "R$ " . $porcao['preco_porcao'] ?></td>
                                        <td  class="tabela-body-editar text-center align-middle">
                                            <a href="#" class="tabela-body-coluna__update"><ion-icon name="sync-circle"></ion-icon></a>
                                            <a href="porcao.php?id=<?php echo $porcao['id']; ?>&nome=<?php echo $porcao['nome_porcao']; ?>" class="tabela-body-coluna__delete"><ion-icon name="trash"></ion-icon></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
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