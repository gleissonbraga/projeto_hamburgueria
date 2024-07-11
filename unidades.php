<?php require("admin/controller/function.php");?>
<?php require("admin/controller/connect.php");?>
<?php $unidades = dadosDasTabelas("unidades", "nome_unidade"); ?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/global.css">
    <link rel="stylesheet" href="resources/css/header.css">
    <link rel="stylesheet" href="resources/css/unidades.css">
    <link rel="stylesheet" href="resources/css/footer.css">
    <title>Unidades</title>
</head>
<body>
    <header id="inicio">
        <div class="inicio-logo">
            <?php include "resources/layout/logo.php"?>
        </div>
        <nav class="inicio-nav">
            <?php include "resources/layout/menu.php"?>
        </nav>
    </header>

    <section class="conteudo-unidades">
        
    </section>

    <section class="conteudo">
        <form action="" method="post" class="conteudo-form">
            <select name="user" id="" aria-placeholder="Selecione uma unidade">
                <option value="">Selecione a unidade</option>

                    <?php foreach($unidades as $unidade): ?>
                        <?php $id_unidade = $unidade['id']; ?>
                        <?php $nome = $unidade['nome_unidade']; ?>
                        <?php $selected = $id_unidade == $id ? 'selected' : '';?>
                        <?php echo "<option value='{$id_unidade}' $selected>{$nome}</option>"; ?>
                    <?php endforeach ?>

            </select>
            <input type="submit" name="buscar_unidade" value="Buscar">
        </form>
            <div class="conteudo-infos">
            <?php if(!isset($_POST['buscar_unidade']) or $_POST['user'] == null){ ?>
                <?= "<h2 class='conteudo-infos__title'>Bem vindo!</h2>" ?>
                <?= "<h3 class='conteudo-infos__title'>Busque uma unidade que deseja conhecer.</h3>" ?>
            <?php } else { ?>
                <div class="conteudo-dados">
                    <?php $unidades_selects[] = buscarUnidadePorId($connect);?> 
                    <?php foreach($unidades_selects as $unidade_select): ?>
                        <div class="conteudo-dados__img">
                            <?php if(!empty($unidade_select['foto_hamburguer'])){ ?>
                                <img src="admin/controller/uploads/<?php echo $unidade_select['foto_unidade']; ?>" alt="">
                            <?php } else { ?>
                                <img src="resources/css/img/hamburguer.jpg" alt="">
                            <?php }?>
                        </div>
                        <div class="conteudo-dados__unidade">
                        <?=  "<h3>{$unidade_select['nome_unidade']}</h3>"?>
                        <?=  "<p> <span><ion-icon name='location'></ion-icon>Endereço: </span> {$unidade_select['endereco_unidade']} - {$unidade_select['cidade']}/{$unidade_select['uf']}</p>"?>
                        <?=  "<p><span><ion-icon name='call'></ion-icon>Telefone: </span> {$unidade_select['contato_unidade']}</p>"?>
                            <div class="conteudo-dados__horaFunc">
                                <span>Horário de funcionamento:</span>
                                <?= "<p><span class='conteudo-dados_span'>Segunda-feira: </span> {$unidade_select['hora_abertura']} - {$unidade_select['hora_fechamento']}</p>" ?>
                                <?= "<p><span class='conteudo-dados_span'>Terça-feira: </span> {$unidade_select['hora_abertura']} - {$unidade_select['hora_fechamento']}</p>" ?>
                                <?= "<p><span class='conteudo-dados_span'>Quarta-feira: </span> {$unidade_select['hora_abertura']} - {$unidade_select['hora_fechamento']}</p>" ?>
                                <?= "<p><span class='conteudo-dados_span'>Quinta-feira: </span> {$unidade_select['hora_abertura']} - {$unidade_select['hora_fechamento']}</p>" ?>
                                <?= "<p><span class='conteudo-dados_span'>Sexta-feira: </span> {$unidade_select['hora_abertura']} - {$unidade_select['hora_fechamento']}</p>" ?>
                                <?= "<p><span class='conteudo-dados_span'>Sábado-feira: </span> {$unidade_select['hora_abertura']} - {$unidade_select['hora_fechamento']}</p>" ?>
                                <?= "<p><span class='conteudo-dados_span'>Domingo-feira: </span> {$unidade_select['hora_abertura']} - {$unidade_select['hora_fechamento']}</p>" ?>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>                   
            <?php } ?>
            </div>
    </section>
        

    <section class="back-radius">


    </section>

    <section class="footer">
            <?php include "resources/layout/footer.php" ?>
    </section>

    <script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" > </script> 
    <script  nomodule  src = "https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js" > </script>
</body>
</html>