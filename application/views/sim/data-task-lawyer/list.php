<div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Task Lawyers</h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-4">
                        <a href="<?php echo base_url('sim/data_task_lawyer/create') ?>" type="button" class="btn btn-success w-md waves-effect waves-light m-b-20">Tambah Data <i class="fa fa-plus"></i></a>
                    </div>
                    <div class="col-sm-8">
                        <div class="project-sort pull-right">
                            <div class="project-sort-item">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <label>Phase :</label>
                                        <select class="form-control input-sm">
                                            <option>All Projects(6)</option>
                                            <option>Complated</option>
                                            <option>Progress</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Sort :</label>
                                        <select class="form-control input-sm">
                                            <option>Date</option>
                                            <option>Name</option>
                                            <option>End date</option>
                                            <option>Start Date</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- end col-->
                </div>
                <!-- end row -->


                <div class="row">
                    <?php $i=1; foreach($dt as $list) { ?>

                    <div class="col-lg-4">
                        <div class="card-box project-box">
                            <!-- Menu Card -->
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo base_url('sim/data_task_lawyer/edit/'.$list['id_task']);?>">Edit</a></li>
                                    <li><a href="<?php echo base_url('sim/data_task_lawyer/delete/'.$list['id_task']);?>">Delete</a></li>
                                </ul>
                            </div>

                            <!-- Body Card -->
                            <h4 class="m-t-0 m-b-5"><a href="<?php echo base_url('sim/master_task_karyawan/detil/'.$list['id_master_task']);?>" class="text-inverse"><?php echo $list['task']; ?></a></h4>

                            <p class="text-success text-uppercase m-b-20 font-13">Category</p>
                            <p class="text-muted font-13"><?php echo substr(strip_tags($list['isi_task']),0,100) ?>...<a href="#" class="font-600 text-muted">view more</a>
                            </p>

                            <ul class="list-inline">
                                <li>
                                    <p class="m-b-0"><?php echo date('M/d/Y', strtotime($list['tgl_mulai'])); ?> - <?php echo date('M/d/Y', strtotime($list['tgl_berakhir'])); ?></p>
                                    <p class="text-muted">Range Waktu</p>
                                </li>
                            </ul>

                            <div class="project-members m-b-20">
                                <span class="m-r-5 font-600">Team :</span>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $list['nama']; ?>">
                                    <img src="<?php echo base_url('upload/image/thumbs/'.$list['image']) ;?>" class="img-circle thumb-sm" alt="Team" />
                                </a>

                            </div>

                            <p class="font-600 m-b-5">Progress <span class="text-success pull-right">50%</span></p>
                            <div class="progress progress-bar-success-alt progress-sm m-b-5">
                                <div class="progress-bar progress-bar-success progress-animated wow animated animated"
                                     role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                                     style="width: 50%; visibility: visible; animation-name: animationProgress;">
                                </div><!-- /.progress-bar .progress-bar-danger -->
                            </div><!-- /.progress .no-rounded -->

                        </div>
                    </div><!-- end col-->
                    <?php $i++; } ?>
                </div>