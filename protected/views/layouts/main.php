<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VIAL</title>

    <link href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

<!-- Page Wrapper -->
    <div id="wrapper">
    <?php
        $userRole = '';
        if (!empty(Yii::app()->user->account_type_id)) {
        switch (Yii::app()->user->account_type_id) 
        {
            case 1:
                $userRole = 'admin';
                break;
            case 3:
                $userRole = 'doctor';
                break;
            case 4:
                $userRole = 'patient';
                break;
            case 5:
                $userRole = 'secretary';
                break;
        }
    }
        if ($userRole == 'patient') 
        {
            require('sidebarPatient.php');
        } 
        elseif ($userRole == 'doctor') 
        {
            require('sidebarDoctor.php');
        }
         elseif ($userRole == 'admin') 
        {
            require('sidebarSuperAdmin.php');
        }
        elseif ($userRole == 'secretary') 
        {
            require('sidebarSecretary.php');
        }
    ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" style="background-color: #0d2140;">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg topbar mb-4 static-top shadow" style=" background-color: #21a66f;">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-600 small" style="color: #fff;">
                                    <?php echo User::model()->getFullname(Yii::app()->user->id); ?>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <?php echo CHtml::link('<i class="fas fa-fw fa-sign-out-alt"></i><span>Log Out</span></a>', $this->createAbsoluteUrl('site/logout'), array('class'=>'dropdown-item')); ?>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" style="background-color:#0d2140;">       	
                	<?php echo $content; ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer" style="color: #fff; background-color: #000;">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    	<span><b>VIAL - Vital Indexing for Analytical-Medical Logs</b></span><br/><br/>
                        <span>&copy; VIAL 2023. All rights reserved.</span><br/>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Log Out</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/demo/chart-pie-demo.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/demo/datatables-demo.js"></script>
</body>
</html>
