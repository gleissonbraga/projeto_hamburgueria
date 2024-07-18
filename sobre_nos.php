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
    <link rel="stylesheet" href="resources/css/sobre_nos.css">
    <title>Sobre nós</title>
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

    <section class="conteudo-sobre">
    <main>
        <div class="informacoes">
            <h1>SOBRE NÓS</h1>
            <P>“Hamburgueria que transforma refeições em experiências”</P>
        </div>
        <div class="containersobre">
            <section class="sobre">
                <div class="sobreimagem">
                    <img src="resources/css/img/sobrenos.jpg" alt="">
                </div>
                <div class="sobre-comentario">
                    <h2>Um pouco dos nosso sonhos</h2>
                    <p>Somos uma empresa de hamburgueria criada em 2024, não com o objetivo de
                        construir um negócio, mas sim um sonho, onde todos os dias buscamos atender
                        nossos clientes com perfeição. Reunimos o mais seleto grupo para atender a
                        e fazerem sentir-se em casa.
                    </p>
                    <a href="#" class="localidades">Venha nos Conhecer</a>
                </div>
            </section>
        </div>

        <section class="section-testimonials">
            <div>
                <h2>Conheça Nossa Equipe</h2>
            </div>
            <div class="clearfix">
                <blockquote>
                    Cozinhar para tantas pessoas é um prazer inenarrável, ver em estampado em suas faces a satisfação é impagável.
                    <cite>
                        <img src="resources/css/img/bradilson.jpg" alt="Foto do Alberto Saltonetto">
                        Alberto Saltonetto
                    </cite>
                </blockquote>
                <blockquote>
                    Cozinhar para tantas pessoas é um prazer inenarrável, ver em estampado em suas faces a satisfação é impagável.
                    <cite>
                        <img src="resources/css/img/tataw.jpg" alt="Foto de Joicelaine Carneiro">
                        Joicelaine Carneiro
                    </cite>
                </blockquote>
                <blockquote>
                    Cozinhar para tantas pessoas é um prazer inenarrável, ver em estampado em suas faces a satisfação é impagável.
                    <cite>
                        <img src="resources/css/img/madruga.jpg" alt="Foto de Pedro Antunes">
                        Pedro Antunes
                    </cite>
                </blockquote>
            </div>
        </section>
    </main>
    </section>



    <section class="footer">
            <?php include "resources/layout/footer.php" ?>
    </section>


    <script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" > </script> 
    <script  nomodule  src = "https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js" > </script>
</body>
</html>