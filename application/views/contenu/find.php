<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>nom</th>
                        <th>prenom</th>
                        <th>email</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php foreach($user as $row){?>
                        <td><?php echo $row->NOM;?></td>
                        <td><?php echo $row->PRENOM;?></td>
                        <td><?php echo $row->EMAIL;?></td>
                        <td><a href="<?php echo base_url('CrudUser/profilseul/'.$row->IDUSER)?>"><button>voir fiche</button></a></td>
                        <?php } ?>
                    </tr>
                   
                    </tbody>
                </table>      
                </div>
                
            </div>
            <div class="row">
                <div class="col-lg-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>resultat</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <?php foreach($tache as $row){?>
                        <td><?php echo $row->NOMTACHE;?></td>
                        <td><a href="<?php echo base_url('Taches/fiche/'.$row->IDTACHE)?>"><button>voir fiche</button></a></td>
                        <?php } ?>
                    </tr>
                   
                    </tbody>
                </table>      
                </div>
                
            </div>
           
        </div>