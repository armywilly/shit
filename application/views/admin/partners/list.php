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

<div class="content">
    <div class="container-fluid">

        <!-- Add Clients Start -->
        <div class="row">
            <div class="card-nav-tabs">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li>
                                <a href="<?php echo base_url('admin/partners/create') ?>" class="btn btn-primary">
                                    <i class="material-icons">add_circle_outline</i> Add Partners
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><br>

        <!-- List Clients -->
        <div class="row">

            <?php $i=1; foreach($staff as $list) { ?>

                <div class="col-md-4">
                    <div class="card">

                        <div class="card-header card-chart" data-background-color="">
                             <img src="<?php echo base_url('upload/image/thumbs/'.$list->gambar);?>">
                        </div>
                        
                        <div class="card-content">
                            <h4 class="title"><?php echo $list->nama; ?></h4>
                            <p class="category"><?php echo $list->jabatan; ?></p>
                        </div>

                        <div class="card-footer">
                            <div class="td-actions">
                                <button type="button" rel="tooltip" title="Read Task" class="btn btn-info btn-simple btn-xs">
                                            <i class="material-icons">visibility</i>
                                </button>
                                <a type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs" href="<?php echo base_url('admin/partners/edit/'.$list->id_staff) ?>">
                                            <i class="material-icons">edit</i>
                                </a>
                                <a type="button" rel="tooltip" title="Delete Task" class="btn btn-danger btn-simple btn-xs" href="<?php echo base_url('admin/partners/delete/'.$list->id_staff) ?>">
                                            <i class="material-icons">delete</i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <?php $i++; } ?>
                       
            </div>
    </div>
</div>