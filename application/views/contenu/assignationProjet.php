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
                            <i class="fa fa-bar-chart-o fa-fw"></i> Fiche
                            <!-- <div class="pull-right"> -->
                            <form role="form" action="<?php echo base_url('Projets/affecterProjet')?>" method="post">
                               
                                <div class="form-group">
                                    <label>projet</label>
                                    <select class="form-control" name="projet">
                                        <?php foreach($projet as $data){ ?>
                                        <option value="<?php echo $data->IDPROJET?>"><?php echo $data->NOMPROJET;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>utilisateur à designé</label>
                                    <select class="form-control" name="user">
                                        <?php foreach($user as $data){ ?>
                                        <option value="<?php echo $data->IDUSER?>"><?php echo $data->NOM?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>poste</label>
                                    <select class="form-control" name="categorie">
                                        <?php foreach($categorie as $data){ ?>
                                        <option value="<?php echo $data->IDCATEGORIE?>"><?php echo $data->NOMCATEGORIE?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default">ajouter</button>
                            </form>
                          
                            <!-- </div> -->
                        </div>
                        
                    </div>
                    
                </div>
               
            </div>
            <!-- /.row -->
        </div>