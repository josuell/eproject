<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">creation projet</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
                            <!-- <div class="pull-right"> -->
                            <form role="form" action="<?php echo base_url('Projets/creeProjet')?>" method="get">
                            <h1>Création nouveau projet</h1>    
                            <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">nom projet</label>
                                <input type="text" class="form-control" id="inputSuccess" name="nom">
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">debut</label>
                                <input type="date" class="form-control" id="inputSuccess" name="debut">
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">fin</label>
                                <input type="date" class="form-control" id="inputSuccess" name="fin">
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