<?php session_start() ?>
<?php require("admin/model/function.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/global.css">
    <link rel="stylesheet" href="resources/css/header.css">
    <link rel="stylesheet" href="resources/css/destaque.css">
    <link rel="stylesheet" href="resources/css/cardapio.css">
    <link rel="stylesheet" href="resources/css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Texas Burguer</title>
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
    
    <section id="destaque">
        <?php include "resources/layout/destaque.php" ?>
    </section>
    
    <section id="cardapio">
        <?php include "resources/layout/cardapio.php" ?>
    </section>
    
    <section class="footer">
        <?php include "resources/layout/footer.php" ?>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" > </script> 
    <script  nomodule  src = "https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js" > </script>
</body>
</html>