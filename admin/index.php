<?php require_once("controller/connect.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Área do administrador</title>
</head>
<body>
    <?php login($connect); ?>
    <main id="container">
        <section class="conteudo-login">
            <h1>Bem vindo!</h1>
            <h2>Área do Administrador</h2>
            
            <form action="" method="post" class="form">
                <input type="email" name="email" id="email" placeholder="Email" require autofocus class="text">
                <input type="password" name="senha" id="senha" placeholder="Senha" require class="text">
                <?php
                    if (isset($_SESSION['error_message'])) {
                        echo "<p class='msg-erro'>" . $_SESSION['error_message'] . "</p>";
                        unset($_SESSION['error_message']);
                    }
                ?>
                <input type="submit" value="Logar" name="logar" class="btn bn632-hover bn26">
            </form>
            <a href="http://localhost:8080/texasBurguer/" target="_blank"><button class="bn632-hover bn25"><ion-icon name="arrow-back-circle-sharp"></ion-icon>Ir para o site</button></a>
        </section>
        <section class="conteudo-fundo">
           
        </section>
    </main>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>