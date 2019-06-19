<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">avancement tache</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php foreach($listetache as $mestache){?>
                        <ul>
                            <li>
                                <a href="<?php echo base_url('Taches/avancement/'.$mestache->IDTACHE)?>"></a><?php echo $mestache->NOMTACHE;?>
                            </li>
                        </ul>
                        <?php }?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            