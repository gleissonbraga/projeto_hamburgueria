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
        <?php $unidades = dadosDasTabelas("unidades", "nome_unidade"); ?>

        <section class="menu">
            <?php include "layout/menu.php" ?>
        </section>

        <section class="content">
            <div class="div1">
                <div class="div2 back-unidade">
                    <h2 class="content-title"><ion-icon name="document-text"></ion-icon>Cadastre, exclua ou altere um unidade</h2>
                </div>
                <div class="div3">
                    <div class="content-link-cadastro"><a href="criar_unidade.php" class="bn5">Cadastrar unidade</a></div>
                    <div class="delete-usuario">
                        <?php if(isset($_GET['id'])):?>
                            <form action="" method="post" class="w-50 rounded p-1 d-flex flex-column justify-content-center align-items-center">
                                <h3>Deseja deletar a unidade <?= $_GET['nome']; ?>?</h3>
                                <div>
                                    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                                    <input type="submit" name="delete" value="Sim" class="btn btn-outline-secondary text-black">
                                    <input type="submit" name="nao_deletar" value="Não" class="btn btn-outline-secondary text-black">
                                </div>
                            </form>
                        <?php endif ?>

                        <?php if(isset($_POST['delete'])){ ?>
                            <?php 
                                delete($connect, "unidades", $_POST['id']);
                            ?>
                        <?php } elseif (isset($_POST['nao_deletar'])) { ?>
                            <?php header("location: unidades.php"); ?>
                        <?php } ?>
                    </div>
                    <div class="caixa-tabela">
                        <table class="tabela table table-bordered table-striped table-hover">
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
                                    <th>Data de cadastro</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody class="tabela-body">
                                <?php foreach ($unidades as $unidade) : ?>
                                    <tr class="tabela-body-coluna">
                                        <?php if (!empty($unidade['foto_unidade'])) { ?>
                                            <td class="text-center"><img width="80px" src="model/uploads/<?php echo $unidade['foto_unidade']; ?>" alt=""></td>
                                        <?php } else { ?>
                                            <td class="text-center"><img width="100px" src="css/img/avtar.png" alt=""></td>
                                        <?php } ?>
                                        <td class="align-middle text-center"><?php echo $unidade['id'] ?></td>
                                        <td class="align-middle text-center"><?php echo $unidade['nome_unidade'] ?></td>
                                        <td class="align-middle text-center"><?php echo $unidade['endereco_unidade'] ?></td>
                                        <td class="align-middle text-center"><?php echo $unidade['cidade'] ?></td>
                                        <td class="align-middle text-center"><?php echo $unidade['uf'] ?></td>
                                        <td class="align-middle text-center"><?php echo $unidade['contato_unidade'] ?></td>
                                        <td class="align-middle text-center"><?php echo $unidade['hora_abertura'] . " às " . $unidade['hora_fechamento'] ?></td>
                                        <td class="align-middle text-center"><?php echo $unidade['data_unidade'] ?></td>
                                        <td class=" tabela-body-editar text-center align-middle">
                                            <a href="update_unidade.php?id=<?php echo $unidade['id']; ?>&nome=<?php echo $unidade['nome_unidade']; ?>" class="tabela-body-coluna__update "><ion-icon name="sync-circle"></ion-icon></a>
                                            <a href="unidades.php?id=<?php echo $unidade['id']; ?>&nome=<?php echo $unidade['nome_unidade']; ?>" class="tabela-body-coluna__delete"><ion-icon name="trash"></ion-icon></a>
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