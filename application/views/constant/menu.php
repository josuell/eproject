<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    
                </button>
                
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                  
                </li>
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('Connection/deco');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <?php if(isset($_SESSION['admin'])){?>
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="<?php echo base_url('Projets');?>"><i class="fa fa-table fa-fw"></i> Projet</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('Projets/affecter');?>"><i class="fa fa-table fa-fw"></i> assignation Projet</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('CrudUser/gantt');?>"><i class="fa fa-table fa-fw"></i>voir gantt</a>
                            </li>
                           
                            
                            <li>
                                <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url('CrudUser/ajout');?>">ajout utilisateur</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('CrudUser/listUser');?>">voir les utilisateurs</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li><a href="<?php echo base_url('Connection/deco');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </ul>
                        <?php }
                        else{?>
                         
                            <li>
                                <a href="<?php echo base_url('CrudUser/profil');?>"><i class="fa fa-table fa-fw"></i> Profil</a>
                            </li>
                        <li><a href="<?php echo base_url('Connection/deco');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            
                        <?php } ?>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>