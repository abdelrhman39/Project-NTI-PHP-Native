<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="<?php echo url('index.php');?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                          



                             <?php 


                             
                                $modules = ['Roles','users','products','cart','orders'];




                                foreach ($modules as $key => $value) {
 

                             ?>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts<?php echo $key;?>" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                <?php echo $value;?>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts<?php echo $key;?>" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    
                                    <a class="nav-link" href="<?php echo url($value.'/create.php');?>">+ Add</a>
                                   
                                    <a class="nav-link" href="<?php echo url($value.'/');?>">Display</a>
                                </nav>
                            </div>

                      <?php }?>

                      




                      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsSettings" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Settings
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayoutsSettings" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                
                            <?php  
                                $settings = ['about','contact','services'];
                                foreach ($settings as $keys => $values) {
                                ?>

                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#<?php echo $values;?>" aria-expanded="false" aria-controls="<?php echo $values;?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                <?php echo $values;?>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>

                                <div class="collapse" id="<?php echo $values;?>" aria-labelledby="headingOne" data-parent="#<?php echo $values;?>">
                                <nav class="sb-sidenav-menu-nested nav">
                                    
                                    <a class="nav-link" href="<?php echo url('settings/'.$values.'/create.php');?>">+ Add</a>
                                
                                    <a class="nav-link" href="<?php echo url('settings/'.$values.'/');?>">Display</a>
                                </nav>
                                </div>

                                <?php }?>
                            </nav>
                        </div>




                      







                            


                       
                  
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>