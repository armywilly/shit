<div class="wrapper">
            <div class="container">

                <br>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="bg-picture card-box">
                            <div class="profile-info-name">
                                <img src="<?php echo base_url('./upload/image/thumbs/'.$k->image) ?>"
                                     class="img-thumbnail" alt="profile-image">

                                <div class="profile-info-detail">
                                    <h3 class="m-t-0 m-b-0"><?php echo $k->nama ?></h3>
                                    <p class="text-muted m-b-20"><i><? echo $k->jabatan ?></i></p>
                                    <p><?php echo $k->biodata ?></p>

                                    <div class="button-list m-t-20">
                                        <button type="button" class="btn btn-danger btn-sm waves-effect waves-light">
                                           <i class="fa fa-envelope"></i>
                                        </button>

                                        <button type="button" class="btn btn-sm btn-linkedin waves-effect waves-light">
                                           <i class="fa fa-linkedin"></i>
                                        </button>

                                        <button type="button" class="btn btn-sm btn-info waves-effect waves-light">
                                           <i class="fa fa-comments"></i>
                                        </button>

                                    </div>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!--/ meta -->
                    </div><!-- End Col -->

                    <div class="col-sm-4">
                        <div class="card-box">

                            <h4 class="header-title m-t-0 m-b-30">Datagram Case</h4>

                            <div id="simple-pie" class="ct-chart ct-golden-section simple-pie-chart-chartist"></div>
                        </div>
                    </div>


                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>

                            <h4 class="header-title m-t-0 m-b-30">Case History</h4>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Project Name</th>
                                        <th>Start Date</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                        <th>Assign</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Adminto Admin v1</td>
                                        <td>01/01/2016</td>
                                        <td>26/04/2016</td>
                                        <td><span class="label label-danger">Released</span></td>
                                        <td>Coderthemes</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Adminto Frontend v1</td>
                                        <td>01/01/2016</td>
                                        <td>26/04/2016</td>
                                        <td><span class="label label-success">Released</span></td>
                                        <td>Adminto admin</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Adminto Admin v1.1</td>
                                        <td>01/05/2016</td>
                                        <td>10/05/2016</td>
                                        <td><span class="label label-pink">Pending</span></td>
                                        <td>Coderthemes</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Adminto Frontend v1.1</td>
                                        <td>01/01/2016</td>
                                        <td>31/05/2016</td>
                                        <td><span class="label label-purple">Work in Progress</span>
                                        </td>
                                        <td>Adminto admin</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Adminto Admin v1.3</td>
                                        <td>01/01/2016</td>
                                        <td>31/05/2016</td>
                                        <td><span class="label label-warning">Coming soon</span></td>
                                        <td>Coderthemes</td>
                                    </tr>

                                    <tr>
                                        <td>6</td>
                                        <td>Adminto Admin v1.3</td>
                                        <td>01/01/2016</td>
                                        <td>31/05/2016</td>
                                        <td><span class="label label-primary">Coming soon</span></td>
                                        <td>Adminto admin</td>
                                    </tr>

                                    <tr>
                                        <td>7</td>
                                        <td>Adminto Admin v1.3</td>
                                        <td>01/01/2016</td>
                                        <td>31/05/2016</td>
                                        <td><span class="label label-primary">Coming soon</span></td>
                                        <td>Adminto admin</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- end col -->

                    </div>
                </div>
                <!-- end row -->