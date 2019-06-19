<?php
/**
 * Created by PhpStorm.
 * User: josu
 * Date: 19/06/2019
 * Time: 09:38
 */
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-12">
            <h1>Affectation de la tache <span class="text-primary"><?= $tache->NOMTACHE ?></span></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form action="<?= base_url('Taches/assigner/' . $idprojet . '/' . $tache->IDTACHE) ?>" method="post">
                <div class="panel">
                    <div class="panel-body">
                        <?php foreach ($devs as $dev) : ?>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="dev-<?= $dev->IDUSER ?>" name="designe"
                                       value="<?= $dev->IDUSER ?>" class="form-check-input">
                                <label class="form-check-label"
                                       for="dev-<?= $dev->IDUSER ?>"><?= $dev->NOM ?> <?= $dev->PRENOM ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-success">Définir</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
