<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                     foreach($tache as $projet){?>
                    <h3>Projet <?php echo $projet->NOMPROJET;?></h3>
                    <h4>Tache : <?php echo $projet->NOMTACHE;?></h4>
                    <p>developpeur : <?php echo $projet->NOMPROJET;?></p>
                    <p>temps estimé : <?php echo $estime;?></p>
                    <p>temps passé : <?php echo $passe;?></p>
                    <p>reste à faire : <?php echo $reste;?></p>
                    <?php } ?>
                </div>
                
            </div>
           <form multipart="" enctype="multipart/form-data" action="<?php echo base_url('Taches/upload')?>" method="post">
                <div class="form-group">
                <?php
                     foreach($tache as $projet){?>
                    <input type="hidden" name="idtache" value="<?php echo $projet->IDTACHE;?>">
                    <?php } ?>
                    <label for="file">Rattacher des fichiers: </label>
                    <input type="file" name="file" id="file" class="form-control form-control-sm" multiple>
                    <i class="form-group__bar"></i>
                    <input class="btn btn-primary" type="submit" value="envoyer">
                </div>
           </form>
           <div class="form-group">
           <label for="file">Mes fichiers: </label>
           <ul>
           <?php foreach($file as $fichier){?>
                <li><?php echo $fichier->NOMFICHIER;?></li>
                <a href="<?php echo base_url('')?>"><button>télécharger</button></a>
            <?php }?>
           </ul>
            </div>
        </div>