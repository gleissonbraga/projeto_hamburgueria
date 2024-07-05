<aside class="menu-user">
    <div class="conteudo-avatar">
        <img src="css/img/avtar.png" alt="" class="conteudo-avatar__img">
    </div>
    <h2 class="menu-user__title"><?= $_SESSION['nome']?></h2>
</aside>

<nav class="menu-adm">
    <ul class="menu-adm-container">
        <li><a href="usuario.php"><ion-icon name="person"></ion-icon>Usuário</a></li>
        <li><a href="hamburguer.php"><ion-icon name="fast-food"></ion-icon>Hamburguer</a></li>
        <li><a href="porcao.php"><ion-icon name="basket"></ion-icon>Porções</a></li>
        <li><a href="bebida.php"><ion-icon name="beer"></ion-icon>Bebidas</a></li>
        <li><a href="unidades.php"><ion-icon name="basket"></ion-icon>Unidades</a></li>
    </ul>
</nav>

<nav class="menu-site">
    <ul class="menu-site-container">
        <li><a href="#" target="_blank" class="menu-site"><ion-icon name="arrow-back-circle-sharp"></ion-icon>Ver Site</a></li>
        <li><a href="controller/logout.php" class="menu-logout"><ion-icon name="exit-outline"></ion-icon>Sair</a></li>
    </ul>
</nav>