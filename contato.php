<?php session_start() ?>
<?php require("admin/model/function.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/global.css">
    <link rel="stylesheet" href="resources/css/header.css">
    <link rel="stylesheet" href="resources/css/footer.css">
    <link rel="stylesheet" href="resources/css/contato.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Contato</title>
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

    <section class="conteudo-contato">
        <div class="conteudo-contato-form">
            <h3>Faça sua reserva</h3>
            <form action="" class="w-50">
                <div class="input-group input-group-sm">
                    <input type="text" name="" id="" placeholder="Nome" class="form-control w-50" aria-label="Sizing example input" aria-describedby="basic-addon1">
                    <input type="text" name="" id="" placeholder="Sobrenome" class="form-control w-50" aria-label="Sizing example input" aria-describedby="basic-addon1">
                </div>
                <div class="input-group input-group-sm">
                    <input type="email" name="" id="" placeholder="Email" class="form-control" aria-label="Sizing example input" aria-describedby="basic-addon1">
                </div>
                <div class="input-group input-group-sm" >
                    <input type="tel" name="" id="" placeholder="Telefone" class="form-control" aria-label="Sizing example input" aria-describedby="basic-addon1">
                </div>
                <select name="" id=""  class="form-select" aria-label="Default select example">
                    <option value="">Selecione a unidade</option>
                </select>
                <div class="input-group input-group-sm">
                    <input type="date" name="" id="" class="form-control w-75" aria-label="Sizing example input" aria-describedby="basic-addon1">
                    <input type="time" name="" id="" class="form-control w-25" aria-label="Sizing example input" aria-describedby="basic-addon1">
                </div>
                <input type="submit" value="Enviar Reserva" class="btn btn-outline-secondary">
            </form>
        </div>
        <div class="conteudo-contato-links">
            <h3>Nos siga nas nossas redes</h3>
            <nav>
                <ul>
                    <li><a href="#"><ion-icon name="logo-instagram"></ion-icon>Instragram</a></li>
                    <li><a href="#"><ion-icon name="logo-facebook"></ion-icon>Facebook</a></li>
                    <li><a href="#"><ion-icon name="logo-whatsapp"></ion-icon>Whatsapp</a></li>
                </ul>
            </nav>
        </div>
    </section>

    <section class="footer">
            <?php include "resources/layout/footer.php"?>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" > </script> 
    <script  nomodule  src = "https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js" > </script>
</body>
</html>