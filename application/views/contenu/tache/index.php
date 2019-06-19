<?php
/**
 * Created by PhpStorm.
 * User: josu
 * Date: 19/06/2019
 * Time: 01:20
 */
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-12">
            <h1><?= $title ?></h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="list-group">
                <?php foreach ($taches as $tache): ?>
                <?php if($affectation) : ?>
                    <a href="<?= base_url('Taches/affecter/' . $idprojet . '/' . $tache->IDTACHE)?>" class="list-group-item list-group-item-action"><?= $tache->NOMTACHE ?></a>
                <?php else : ?>
                        <a href="#" class="list-group-item list-group-item-action"><?= $tache->NOMTACHE ?></a>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
