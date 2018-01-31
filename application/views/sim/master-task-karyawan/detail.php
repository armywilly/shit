<div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title"><?php echo $mt['task']; ?></h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-8">
                        <div class="card-box task-detail">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Edit</a></li>
                                </ul>
                            </div>
                            <div class="media m-b-20">
                                <div class="media-left">
                                    <a href="#"> <img class="media-object img-circle" alt="64x64" src="<?php echo base_url() ?>assets/sim/assets/images/users/avatar-2.jpg" style="width: 48px; height: 48px;"> </a>
                                </div>
                                <div class="media-body">

                                    <h4 class="media-heading m-b-0"><?php echo $mt['full_name']; ?></h4>
                                    <span class="label label-danger">Urgent</span>
                                </div>
                            </div>

                            <h4 class="font-600 m-b-20"><?php echo $mt['task']; ?></h4>

                            <p class="text-muted">
                                <?php echo $mt['isi_task']; ?>
                            </p>


                            <ul class="list-inline task-dates m-b-0 m-t-20">
                                <li>
                                    <h5 class="font-600 m-b-5">Start Date</h5>
                                    <p> <?php echo date('M/d/Y', strtotime($mt['tgl_mulai'])); ?></p>
                                </li>

                                <li>
                                    <h5 class="font-600 m-b-5">Due Date</h5>
                                    <p> <?php echo date('M/d/Y', strtotime($mt['tgl_berakhir'])); ?></p>
                                </li>
                            </ul>
                            <div class="clearfix"></div>

                             <!--
                             <div class="task-tags m-t-20">
                                 <h5 class="font-600">Tags</h5>
                                <input type="text" value="Amsterdam,Washington,Sydney" id="tagsinput" placeholder="add tags"/>
                            </div> -->

                            <div class="assign-team m-t-30">
                                <h5 class="font-600 m-b-5">Assign to</h5>
                                <div>
                                    <a href="#"> <img class="img-circle thumb-sm" alt="64x64" src="<?php echo base_url() ?>assets/sim/assets/images/users/avatar-2.jpg"> </a>
                                    <a href="#"> <img class="img-circle thumb-sm" alt="64x64" src="<?php echo base_url() ?>assets/sim/assets/images/users/avatar-3.jpg"> </a>
                                    <a href="#"> <img class="img-circle thumb-sm" alt="64x64" src="<?php echo base_url() ?>assets/sim/assets/images/users/avatar-5.jpg"> </a>
                                    <a href="#"> <img class="img-circle thumb-sm" alt="64x64" src="<?php echo base_url() ?>assets/sim/assets/images/users/avatar-8.jpg"> </a>
                                    <a href="#"><span class="add-new-plus"><i class="zmdi zmdi-plus"></i> </span></a>
                                </div>
                            </div>

                            <div class="attached-files m-t-30">
                                <h5 class="font-600">Attached Files </h5>
                                <div class="files-list">
                                    <div class="file-box">
                                        <a href=""><img src="<?php echo base_url() ?>assets/sim/assets/images/attached-files/img-1.jpg" class="img-responsive img-thumbnail" alt="attached-img"></a>
                                        <p class="font-13 m-b-5 text-muted"><small>File one</small></p>
                                    </div>
                                    <div class="file-box">
                                        <a href=""><img src="<?php echo base_url() ?>assets/sim/assets/images/attached-files/img-2.jpg" class="img-responsive img-thumbnail" alt="attached-img"></a>
                                        <p class="font-13 m-b-5 text-muted"><small>Attached-2</small></p>
                                    </div>
                                    <div class="file-box">
                                        <a href=""><img src="<?php echo base_url() ?>assets/sim/assets/images/attached-files/img-3.png" class="img-responsive img-thumbnail" alt="attached-img"></a>
                                        <p class="font-13 m-b-5 text-muted"><small>Dribbble shot</small></p>
                                    </div>
                                    <div class="file-box m-l-15">
                                        <div class="fileupload add-new-plus">
                                            <span><i class="zmdi-plus zmdi"></i></span>
                                            <input type="file" class="upload">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- end col -->

                    <div class="col-md-4">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Edit</a></li>
                                </ul>
                            </div>

                            <h4 class="header-title m-t-0 m-b-30">Comments (6)</h4>

                            <div>
                                <div class="media m-b-10">
                                    <div class="media-left">
                                        <a href="#"> <img class="media-object img-circle thumb-sm" alt="64x64" src="<?php echo base_url() ?>assets/sim/assets/images/users/avatar-1.jpg"> </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Mat Helme</h4>
                                        <p class="font-13 text-muted m-b-0">
                                            <a href="" class="text-primary">@Michael</a>
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                        ante sollicitudin commodo. Cras purus odio.
                                        </p>
                                        <a href="" class="text-success font-13">Reply</a>
                                    </div>
                                </div>
                                <div class="media m-b-10">
                                    <div class="media-left">
                                        <a href="#"> <img class="media-object img-circle thumb-sm" alt="64x64" src="<?php echo base_url() ?>assets/sim/assets/images/users/avatar-2.jpg"> </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Media heading</h4>
                                        <p class="font-13 text-muted m-b-0">
                                            <a href="" class="text-primary">@Michael</a>
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                        ante sollicitudin commodo. Cras purus odio.
                                        </p>
                                        <a href="" class="text-success font-13">Reply</a>
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#"> <img class="media-object img-circle thumb-sm" alt="64x64" src="<?php echo base_url() ?>assets/sim/assets/images/users/avatar-3.jpg"> </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">Nested media heading</h4>
                                                <p class="font-13 text-muted m-b-0">
                                                    <a href="" class="text-primary">@Michael</a>
                                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                                ante sollicitudin commodo. Cras purus odiot.
                                                </p>
                                                <a href="" class="text-success font-13">Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="media m-b-10">
                                    <div class="media-left">
                                        <a href="#"> <img class="media-object img-circle thumb-sm" alt="64x64" src="<?php echo base_url() ?>assets/sim/assets/images/users/avatar-1.jpg"> </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Mat Helme</h4>
                                        <p class="font-13 text-muted m-b-0">
                                            <a href="" class="text-primary">@Michael</a>
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                        ante sollicitudin commodo. Cras purus odio.
                                        </p>
                                        <a href="" class="text-success font-13">Reply</a>
                                    </div>
                                </div>
                                <div class="media m-b-10">
                                    <div class="media-left">
                                        <a href="#"> <img class="media-object img-circle thumb-sm" alt="64x64" src="<?php echo base_url() ?>assets/sim/assets/images/users/avatar-2.jpg"> </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Media heading</h4>
                                        <p class="font-13 text-muted m-b-0">
                                            <a href="" class="text-primary">@Michael</a>
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                        ante sollicitudin commodo. Cras purus odio.
                                        </p>
                                        <a href="" class="text-success font-13">Reply</a>
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#"> <img class="media-object img-circle thumb-sm" alt="64x64" src="<?php echo base_url() ?>assets/sim/assets/images/users/avatar-3.jpg"> </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">Nested media heading</h4>
                                                <p class="font-13 text-muted m-b-0">
                                                    <a href="" class="text-primary">@Michael</a>
                                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                                ante sollicitudin commodo. Cras purus odiot.
                                                </p>
                                                <a href="" class="text-success font-13">Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="media">
                                    <div class="media-left">
                                        <a href="#"> <img class="media-object img-circle thumb-sm" alt="64x64" src="<?php echo base_url() ?>assets/sim/assets/images/users/avatar-1.jpg"> </a>
                                    </div>
                                    <div class="media-body">
                                        <input type="text" class="form-control input-sm" placeholder="Some text value...">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->