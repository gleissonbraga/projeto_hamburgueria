<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/menu.css">
    <title>Área administrativa</title>
</head>
<body>
    <?php if (isset($_SESSION['active'])) {?>


    <section class="menu">
        <?php include "layout/menu.php" ?>
    </section>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <?php } else {
        header("location: index.php");
    } ?>
</body>
</html>