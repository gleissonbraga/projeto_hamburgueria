<!-- <h1 class="destaque-title">Nossos campeões de vendas!</h1>
<?php $destaques = destaque() ?>
<article class="destaque-box">
    <div class="destaque-burguers">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($destaques as $destaque) : ?>
                    <div class="carousel-item active">
                        <?php if (!empty($destaque['foto_hamburguer'])) { ?>
                            <img src="admin/model/uploads/<?php echo $destaque['foto_hamburguer']; ?>" alt="" class="height-100 d-block w-100 rounded">
                        <?php } else { ?>
                            <img src="resources/css/img/hamburguer.jpg" alt="" class="height-100 d-block w-100 rounded">
                        <?php } ?>
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?= $destaque['nome_hamburguer'] ?></h5>
                            <p><?= $destaque['descricao_hamburguer'] ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
</article>
 -->



 <h1 class="destaque-title">Nossos campeões de vendas!</h1>
 <?php $destaques = destaque() ?>
<article class="destaque-box">
    <?php foreach ($destaques as $destaque) : ?>
    <div class="destaque-burguers">
        <?php if (!empty($destaque['foto_hamburguer'])) { ?>
            <img src="admin/model/uploads/<?php echo $destaque['foto_hamburguer']; ?>" alt="">
        <?php } else { ?>
            <img src="resources/css/img/hamburguer.jpg" alt="">
        <?php } ?>
        <div class="destaque-burguers__conteudo">
            <h3><?= $destaque['nome_hamburguer'] ?></h3>
            <p><?= $destaque['descricao_hamburguer'] ?></p>
        </div>
    </div>
    <?php endforeach ?>
</article>