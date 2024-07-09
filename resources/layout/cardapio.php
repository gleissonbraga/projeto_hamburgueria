<?php $hamburguers = dadosDasTabelas("hamburguer", "preco_hamburguer"); ?>   
<article class="cardapio-burguers">
    <h2 class="cardapio-burguers__title">Burguers</h2>
    <div class="cardapio-burguers-b">
        <?php foreach($hamburguers as $hamburguer): ?>
        <div class="cardapio-burguers__box">
            <?php if(!empty($hamburguer['foto_hamburguer'])){ ?>
                <img src="admin/controller/uploads/<?php echo $hamburguer['foto_hamburguer']; ?>" alt="">
            <?php } else { ?>
                <img src="resources/css/img/hamburguer.jpg" alt="">
            <?php }?>
            <div class="cardapio-burguers__content">
                <h3><?php echo $hamburguer['nome_hamburguer'] ?></h3>
                <p><?php echo $hamburguer['descricao_hamburguer'] ?></p>
                <span><?php echo "R$ " . $hamburguer['preco_hamburguer'] ?></span>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</article>

<?php $porcoes = dadosDasTabelas("porcao", "preco_porcao"); ?>
<article class="cardapio-porcoes">
    <h2 class="cardapio-burguers__title">Porções</h2>
    <div class="cardapio-porcoes-b">
        <?php foreach($porcoes as $porcao): ?>
        <div class="cardapio-porcoes__box">
            <?php if(!empty($porcao['foto_porcao'])){ ?>
                <img src="admin/controller/uploads/<?php echo $porcao['foto_porcao']; ?>" alt="">
            <?php } else { ?>
                <img src="resources/css/img/porcao.jpg" alt="">
            <?php }?>
            <div class="cardapio-porcoes__content">
                <h3><?php echo $porcao['nome_porcao'] ?></h3>
                <p><?php echo $porcao['descricao_porcao'] ?></p>
                <span><?php echo "R$ " . $porcao['preco_porcao'] ?></span>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</article>

<?php $bebidas = dadosDasTabelas("bebida", "preco_bebida"); ?>
<article class="cardapio-bebidas">
    <h2 class="cardapio-burguers__title">Bebidas</h2>
    <div class="cardapio-bebidas-b">
        <?php foreach($bebidas as $bebida): ?>
        <div class="cardapio-bebidas__box">
            <?php if(!empty($bebida['foto_bebida'])){ ?>
                <img src="admin/controller/uploads/<?php echo $bebida['foto_bebida']; ?>" alt="">
            <?php } else { ?>
                <img src="resources/css/img/bebida.jpg" alt="">
            <?php }?>
            <div class="cardapio-bebidas__content">
                <h3><?php echo $bebida['nome_bebida'] ?></h3>
                <p><?php echo $bebida['descricao_bebida'] ?></p>
                <span><?php echo "R$ " . $bebida['preco_bebida'] ?></span>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</article>
