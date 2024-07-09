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
        <form action="" method="post">
            <select name="user" id="" aria-placeholder="Selecione uma unidade">
                <option value="">Selecione a unidade</option>
                <?php foreach($unidades as $unidade): ?>
                    <?php $id_unidade = $unidade['id']; ?>
                    <?php $nome = $unidade['nome_unidade']; ?>
                    <?php $selected = $id_unidade === $unidade['id'] ? 'selected' : ""?>
                    <?php echo "<option value='{$id_unidade}' $selected>{$nome}</option>"; ?>
                <?php endforeach ?>
            </select>
            <input type="submit" name="buscar_unidade" value="Buscar unidade">
        </form>
            <div>
                <?php echo buscarUnidadePorId($connect)['nome']?>
                <?php echo buscarUnidadePorId($connect)['endereco']?>
                <?php echo buscarUnidadePorId($connect)['uf']?>
                
            </div>
    </section>
        


    <section class="footer">
            <?php include "resources/layout/footer.php" ?>
    </section>

    <script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" > </script> 
    <script  nomodule  src = "https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js" > </script>
</body>
</html>