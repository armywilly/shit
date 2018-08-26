
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Role Permissions ==> <?php echo $roleName?></h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
<!--                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>-->
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <?php echo isset($_SESSION['errorCekPermission'])?'<div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>'.$_SESSION['errorCekPermission'].'</strong> </div>':''; 
            unset($_SESSION['errorCekPermission']);
            echo isset($_SESSION['okCekPermission'])?'<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>'.$_SESSION['okCekPermission'].'</strong> </div>':''; 
            unset($_SESSION['okCekPermission']);
            
            ?>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <?php echo form_error('roles'); ?><?php echo isset($errors['roles'])?$errors['roles']:''; ?>
                    <div class="x_content">                        
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url()?>permission/submitPermission">
                                <input type="hidden" value="<?php echo $role_id?>" name="roleid"/>
                                      <?php
                                      $judul="";
                                      $i=0;
                          foreach($dataPermission as $hasil){
                              if($judul!=$hasil->group){
                                  if($i>0){
                                    echo '</div>';  
                                  }
                                  echo'<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">';
                                  echo "<label>".$hasil->group.":</label>";
                                  echo '<p style="padding: 5px;">';
                              }
                              if(is_null($hasil->role_id)){
                                  echo'<input type="checkbox" name="roles[]" value="'.$hasil->id.'" /> '.$hasil->description.'<br/>';
                             
                              }else{
                                echo'<input type="checkbox" checked name="roles[]" value="'.$hasil->id.'" /> '.$hasil->description.'<br/>';
                              }
                              $judul=$hasil->group;
                              $i++;
                          }
                          echo '</div>';
                          ?>
                                <div class="form-group">
                                   
                                </div>
                                <div class="form-group">
                                    
                                    <input type="submit" class="btn btn-primary" value="Set permission"/>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->