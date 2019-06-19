<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <?php 
        //    foreach($user as $data){?>

           <img src="../../assets/img/profil/<?php echo $user->IMAGE;?>" alt="profil" width="100" height="100">
           <h1><?php echo $user->NOM?></h1>
           <h2><?php echo $user->PRENOM?></h2>
           <?php //}
           foreach($projet as $data){?>
            <h4><?php echo $data->NOMPROJET; ?> : fonction => </h4>
            <h5><?php echo $data->NOMCATEGORIE; ?></h5>
            
            <?php 
             if(strcmp($data->NOMCATEGORIE,"teamlead")==0){?>
                <a href="<?php echo base_url('Taches/voirMyProjet/2');?>">ajout tache</a>
                <a href="<?php echo base_url('Taches/voirMyTache/2');?>">liste tache</a>
                <?php }
                else if(strcmp($data->NOMCATEGORIE,"manager")==0){?>
                    <a href="<?php echo base_url('Projets/avancement');?>">avancement projet</a>
                    <a href="<?php echo base_url('Projets/avancementTL');?>">avancement projet par teamlead</a>
                    
                    <?php }
                else{?>
                    <a href="<?php echo base_url('');?>">mes taches</a>
                    <a href="<?php echo base_url('Taches/voirTache/'.$data->IDPROJET);?>">mes avancements</a>

                    <?php }
             } 
                ?>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    
</div>