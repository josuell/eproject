<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">creation tache</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
                            <!-- <div class="pull-right"> -->
                            <form role="form" action="<?php echo base_url('Taches/editing')?>" method="get">  
                                <div class="form-group has-success">
                                    <label class="control-label" for="inputSuccess">nom tache</label>
                                    <input type="text" class="form-control" id="inputSuccess" name="nom">
                                </div>
                                <div class="form-group has-success">
                                    <label class="control-label" for="inputSuccess">temps estime</label>
                                    <input type="text" class="form-control" id="inputSuccess" name="estimation" value="00:00:00">
                                </div>
                                <div class="form-group has-success">
                                    <label class="control-label" for="inputSuccess">temps passe</label>
                                    <input type="text" class="form-control" id="inputSuccess" name="tempsfait" value="00:00:00">
                                </div>
                                <div class="form-group has-success">
                                    <label class="control-label" for="inputSuccess">reste à faire</label>
                                    <input type="text" class="form-control" id="inputSuccess" name="reste" value="00:00:00">
                                </div>
                                <div class="form-group has-success">
                                    <label class="control-label" for="inputSuccess">etat</label>
                                    <input type="text" class="form-control" id="inputSuccess" name="etat">
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