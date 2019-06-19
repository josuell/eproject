<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <?php 
           foreach($user as $data){?>

           <img src="../../assets/img/profil/<?php echo $data->IMAGE;?>" alt="profil" width="100" height="100">
           <h1><?php echo $data->NOM?></h1>
           <h2><?php echo $data->PRENOM?></h2>
           <?php }
           foreach($projet as $data){?>
            <h4><?php echo $data->NOMPROJET; ?> : fonction => </h4>
            <h5><?php echo $data->NOMCATEGORIE; ?></h5>
            
            <?php 
           
             } 
                ?>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    
</div>