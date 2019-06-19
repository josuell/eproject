<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    
                    <?php foreach($alluser as $user){?>
                    <ul  class="list-group">
                        
                        <li class="list-group-item"><img src="../../assets/img/profil/<?php echo $user->IMAGE;?>" alt="profil"></li>
                        <li class="list-group-item"><?php echo $user->NOM." ".$user->PRENOM?></li>
                        <a href="<?php echo base_url('CrudUser/profilseul/'.$user->IDUSER)?>"><button class="btn btn-primary">voir profil</button></a>
                    </ul>
                    <?php } ?>
                </div>
                
            </div>
           
        </div>