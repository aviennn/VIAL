<div class="container-fluid">

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-12">
            <div class="card shadow h-100 border-0" style="background-image: url('images/admin.png'); background-size: cover; background-position: center;">
                <div class="card-body" style="padding: 40px;">

                    <div class="row no-gutters align-items-center">

                        <div class="col align-self-start">
                            <h1 class="font-weight-bold text-uppercase"> Welcome to VIAL, ADMIN! </h1>
                            <p class="text-sm"> Where compassionate care meets cutting-edge medical expertise. </p>

                        </div>

                    </div>
                
                    </br>
                    </br>
                    </br>
                        

                    
                </div>
            </div>
        </div>
    </div>

    <br>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #4e73df;">
                            Number of Doctors:</div>
                        <div class="h5 mb-0 font-weight-bold text"><?= $doctorCount ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-md fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Number of Patients</div>
                        <div class="h5 mb-0 font-weight-bold text"><?= $patientCount ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Number Of Secretary
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text"><?= $secretaryCount ?></div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                           Number of Clinics</div>
                        <div class="h5 mb-0 font-weight-bold text"><?= $clinicCount ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hospital fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->

<div class="row">

    <div class="col-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold" style="color: #fff;">Specializations Tally</h6>
            </div>
            <div class="card-body">
                <?php 
                    $specialization = $user->getSpecializationTally(5);
                    foreach($specialization as $key=>$value)
                    {
                ?>
                        <h4 class="small font-weight-bold"><?php echo $key; ?> <span class="float-right"><?php echo $value."%"; ?></span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $value; ?>%"
                                aria-valuenow="<?php echo $value; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>

</div>