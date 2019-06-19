<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">avancement tache</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row" >
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> modification
                            <!-- <div class="pull-right"> -->
                            <form role="form" action="<?php echo base_url('Taches/editing')?>" method="get">  
                            
                                <div class="form-group has-success">
                                    <label class="control-label" for="inputSuccess">nom tache</label>
                                    <input type="text" class="form-control" id="inputSuccess" name="nom" value="<?php echo $tache->NOMTACHE;?>" disabled>
                                </div>
                                <div class="form-group has-success">
                                    <label class="control-label" for="inputSuccess">temps estime</label>
                                    <input type="text" class="form-control" id="inputSuccess" name="estimation" value="<?php echo $tempsEstime;?>" disabled>
                                </div>
                                <div class="form-group has-success">
                                    <label class="control-label" for="inputSuccess">temps passe</label>
                                    <input type="text" class="form-control" id="inputSuccess" name="tempsfait" value="<?php echo $tempspasse;?>">
                                </div>
                                <div class="form-group has-success">
                                    <label class="control-label" for="inputSuccess">reste à faire</label>
                                    <input type="text" class="form-control" id="inputSuccess" name="reste" value="<?php echo $resteafaire;?>">
                                </div>
                                <div class="form-group has-success">
                                    <label class="control-label" for="inputSuccess">etat</label>
                                    <input type="text" class="form-control" id="inputSuccess" name="etat" value="<?php echo $tache->ETAT;?>" disabled>
                                </div>
                               <input type="hidden" name="id" value="<?php echo $tache->IDTACHE;?>">
                                <button type="submit" class="btn btn-default">valider</button>
                            </form>
                            <!-- </div> -->
                        </div>
                        
                    </div>
                    
                </div>
               
            </div>
            <!-- /.row -->
        </div>