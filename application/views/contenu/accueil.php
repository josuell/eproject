<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <p><?php if(strcmp($msg,"")!=0) echo $msg;?></p>
                    <h1 class="page-header">Bienvenue à vous</h1>
                    <strong><?php echo $user->NOM;?></strong>
                    <strong><?php echo $user->PRENOM;?></strong>
                </div>
                
            </div>
           
        </div>