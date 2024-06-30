<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/global.css">
    <link rel="stylesheet" href="resources/css/header.css">
    <link rel="stylesheet" href="resources/css/destaque.css">
    <link rel="stylesheet" href="resources/css/cardapio.css">
    
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


    <script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" > </script> 
    <script  nomodule  src = "https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js" > </script>
</body>
</html>