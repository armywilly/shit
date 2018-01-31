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

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-4">
                         <a href="#custom-modal" class="btn btn-success btn-md waves-effect waves-light m-b-30" data-animation="fadein" data-plugin="custommodal"
                                                data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-add"></i> Add Contact</a>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <?php $i=1; foreach($k as $list) { ?>
                    <div class="col-md-4">
                        <div class="text-center card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo base_url('sim/karyawan/edit/'.$list['id_staff']) ?>">Edit</a></li>
                                    <li><a href="#">Delete</a></li>
                                </ul>
                            </div>
                            <div>
                                <img src="<?php echo base_url('upload/image/thumbs/'.$list['image']);?>" class="img-circle thumb-xl img-thumbnail m-b-10" alt="profile-image">

                                <p class="text-muted font-13 m-b-30">
                                    <?php echo substr(strip_tags($list['biodata']),0,100) ?>...
                                </p>

                                <div class="text-left">
                                    <p class="text-muted font-13"><strong>Full Name :</strong> <span class="m-l-15"><?php echo substr(strip_tags($list['nama']),0,20) ?></span></p>

                                    <p class="text-muted font-13"><strong>NIP :</strong><span class="m-l-15"><?php echo $list['nip'] ?></span></p>

                                    <p class="text-muted font-13"><strong>Jabatan :</strong> <span class="m-l-15"><?php echo $list['jabatan']; ?></span></p>

                                    <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15"><?php echo $list['email'] ?></span></p>
                                </div>

                                <button type="button" class="btn btn-custom btn-rounded waves-effect waves-light">Send Message</button>
                            </div>

                        </div>

                    </div> <!-- end col -->
                    <?php $i++; } ?>

                </div><!-- End Row -->
        </div> <!-- End Cont -->