<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?php foreach($avancement as $avance){?>
                        <h3><?php echo $avance->nomprojet;?></h3>
                        <p>avancement : <?php echo $avance->avancement;?>%</p>
                    <?php }?>
                </div>
                
            </div>
           
        </div>