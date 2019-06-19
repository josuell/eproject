<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ajout utilisateur</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
                            <!-- <div class="pull-right"> -->
                            <?php echo form_open_multipart('CrudUser/validerAjout'); ?>
                            <form enctype="multipart/from-data" action="<?php echo base_url('CrudUser/validerAjout')?>" method="post">
                                <div class="form-group has-success">
                                    <label class="control-label" for="inputSuccess">nom</label>
                                    <input type="text" class="form-control" id="inputSuccess" name="nom">
                                </div>
                                <div class="form-group has-success">
                                    <label class="control-label" for="inputSuccess">prenom</label>
                                    <input type="text" class="form-control" id="inputSuccess" name="prenom">
                                </div>
                                <div class="form-group has-success">
                                    <label class="control-label" for="inputSuccess">email</label>
                                    <input type="text" class="form-control" id="inputSuccess" name="email">
                                </div>
                                <div class="form-group has-warning">
                                    <label class="control-label" for="inputWarning">mot de passe</label>
                                    <input type="password" class="form-control" id="inputWarning" name="mdp">
                                </div>
                                <div class="form-group">
                                    <label for="image">Profil: </label>
                                    <input type="file" name="image" id="image" class="form-control form-control-sm">
                                    <i class="form-group__bar"></i>
                                </div>
                                <button type="submit" class="btn btn-default">ajouter</button>
                                </form>
                            <div class="msg">
                                <?php if(strcmp($msg,"")!=0) echo $msg;?>
                            </div>
                            <!-- </div> -->
                        </div>
                        
                    </div>
                    
                </div>
               
            </div>
            <!-- /.row -->
        </div>