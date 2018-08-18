<div class="wrapper">
            <div class="container">

                <br>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="bg-picture card-box">
                            <div class="profile-info-name">
                                <img src="<?php echo base_url('./upload/klien/'.$mc['image']) ?>"
                                     class="img-thumbnail" alt="profile-image">

                                <div class="profile-info-detail">
                                    <h3 class="m-t-0 m-b-0"><?php echo $mc['nama_client']; ?></h3>
                                    <p class="text-muted m-b-20"><i><? echo $mc['alamat_client'] ?></i></p>
                                    <p class="text-muted m-b-20"><? echo $mc['no_telp_client'] ?></p>
                                    <p class="text-muted m-b-20"><? echo $mc['pic'] ?></p>

                                    <div class="button-list m-t-20">
                                        <a  href="" type="button" class="btn btn-danger btn-sm waves-effect waves-light">
                                           <i class="fa fa-envelope"></i>
                                        </a>

                                        <a href="" type="button" target="_blank" class="btn btn-sm btn-linkedin waves-effect waves-light">
                                           <i class="fa fa-linkedin"></i>
                                        </a>

                                        <a type="button" class="btn btn-sm btn-info waves-effect waves-light">
                                           <i class="fa fa-comments"></i>
                                        </a>

                                    </div>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!--/ meta -->
                    </div><!-- End Col -->


                    <!-- Dihide Saja Dulu
                    <div class="col-sm-4">
                        <div class="card-box">

                            <h4 class="header-title m-t-0 m-b-30">Datagram Case</h4>

                            <div id="simple-pie" class="ct-chart ct-golden-section simple-pie-chart-chartist"></div>
                        </div>
                    </div>-->


                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">History Kerja Sama</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Case</th>
                                        <th>Mulai</th>
                                        <th>Berakhir</th>
                                        <th>Status</th>
                                        <th>Assign By</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Kasus Tipe A</td>
                                        <td>01/01/2016</td>
                                        <td>26/04/2016</td>
                                        <td><span class="label label-danger">Pending</span></td>
                                        <td>Coderthemes</td>
                                        <td class="actions">
                                            <a href="#" class="btn btn-info">Detail&nbsp;<i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Kasus Tipe B</td>
                                        <td>01/01/2016</td>
                                        <td>26/04/2016</td>
                                        <td><span class="label label-success">Complete</span></td>
                                        <td>Adminto admin</td>
                                        <td class="actions">
                                            <a href="#" class="btn btn-info">Detail&nbsp;<i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Kasus Tipe C</td>
                                        <td>01/01/2016</td>
                                        <td>31/05/2016</td>
                                        <td><span class="label label-purple">In Proogress</span>
                                        </td>
                                        <td>Adminto admin</td>
                                        <td class="actions">
                                            <a href="#" class="btn btn-info">Detail&nbsp;<i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Kasus Tipe C</td>
                                        <td>01/01/2016</td>
                                        <td>31/05/2016</td>
                                        <td><span class="label label-warning">Invoice</span></td>
                                        <td>Coderthemes</td>
                                        <td class="actions">
                                            <a href="#" class="btn btn-info">Detail&nbsp;<i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- end col -->

                </div>
                <!-- end row -->