        <?php
// Session 
if($this->session->flashdata('sukses')) {
    echo '<div class="col-md-6 pull-left">';
    echo '<div class="alert alert-info alert-with-icon" data-notify="container">';
    echo '<i data-notify="icon" class="material-icons">add_alert</i>';
    echo $this->session->flashdata('sukses');
    echo '</div>';
    echo '</div>';
} 
// Error
echo validation_errors('<div class="col-md-6 pull-left">','<div class="alert alert-danger alert-with-icon" data-notify="container">','<i data-notify="icon" class="material-icons">add_alert</i>','</div>','</div>'); 
?>
<div class="wrapper">
        <div class="container">
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>User Role</h3>
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
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div class="row">
                    
                      <table id="convert" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                          <tr>
                            <th>Role Name</th>
                            <th>Description</th>
                            <th>#</th>
                            
                          </tr>
                        </thead>


                        <tbody>
                            <?php
                            foreach($dataRole as $hasil){
                                echo '<tr><td>'.$hasil->name.'</td><td>'.$hasil->description.'</td><td><a href="'. base_url().'admins/permission/edit/'.$hasil->id.'">edit permission</></td></tr>';
                                
                            }
                            ?>                        
                        </tbody>
                      </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
</div>
</div>

    
    