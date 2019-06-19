<?php
/**
 * Created by PhpStorm.
 * User: josu
 * Date: 19/06/2019
 * Time: 11:50
 */
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Diagramme de Gantt des projets</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <select name="" id="projet" class="form-control" onchange="loadGantt()">
                    <?php foreach ($projets as $projet): ?>
                    <option value="<?= $projet->IDPROJET ?>"><?= $projet->NOMPROJET ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12" id="chartdiv" style="height: 450px;">

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary" onclick="exporterPDF()">Exporter PDF</button>
        </div>
    </div>
</div>

