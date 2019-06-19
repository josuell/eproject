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
                            <form role="form" action="<?php echo base_url('Taches/creationTache')?>" method="get">
                                <div class="form-group">
                                    <label>projet</label>
                                    <select class="form-control" name="projet">
                                        <?php var_dump($projet);
                                         foreach($projet as $data){ ?>
                                        <option value="<?php echo $data->IDPROJET?>"><?php echo $data->NOMPROJET;?></option>
                                        <?php } ?>
                                    </select>
                                </div>   
                                <div class="form-group">
                                    <label>detail tache</label>
                                    <select class="form-control" name="detail">
                                        <?php foreach($detail as $data){ ?>
                                        <option value="<?php echo $data->IDDETAILTACHE?>"><?php echo $data->NOM;?></option>
                                        <?php } ?>
                                    </select>
                                </div>   
                                <div class="form-group has-success">
                                    <label class="control-label" for="inputSuccess">nom tache</label>
                                    <input type="text" class="form-control" id="inputSuccess" name="nom">
                                </div>
                                <div class="form-group has-success">
                                    <label class="control-label" for="inputSuccess">temps estime</label>
                                    <input type="text" class="form-control" id="inputSuccess" name="estimation" value="00:00:00">
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