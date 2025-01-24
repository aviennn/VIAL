
<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-12">
        <div class="card shadow h-100 border-0" style="background-image: url('images/secretary.png'); background-size: cover; background-position: center;">
            <div class="card-body" style="padding: 40px;">

            <div class="row no-gutters align-items-center">

                <div class="col align-self-start">
                    <h1 class="font-weight-bold text-uppercase"> Welcome to VIAL! </h1>
                    <p class=" text-sm"> Where compassionate care meets cutting-edge medical expertise. </p>

                </div>

            </div>
            
            </br>
            </br>
            </br>
                    
                <div class="row no-gutters align-items-center">

                    <!-- Logo on the left with reduced margin -->
                    <div class="col-auto pr-3">
                        <i class="fas fa-user fa-2x text-white"></i>
                    </div>

                    <!-- Text and Patient Count on the right -->
                    <div class="col">
                        <div class="text-xs font-weight-bold text-uppercase mb-1 text-white">
                            Number of Patients
                        </div>
                        <div class="h5 mb-0 font-weight-bold text text-white"><?= $patientCount ?></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</br>

<div class="row">

    <!-- List of Patients -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List of Patients</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <style>
                        #dataTable_length, #dataTable_filter {
                            display: none;
                        }
                    </style>
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($assignedPatients as $modelValue)
                                {
                            ?>
                                    <tr>
                                        <td><?php echo $modelValue->user->getFullname($modelValue->id); ?></td>
                                        <td>
                                            <?php
                                                if ($modelValue->user->gender == 1) {
                                                    echo 'Male';
                                                } elseif ($modelValue->user->gender == 2) {
                                                    echo 'Female';
                                                }
                                            ?>
                                        </td>
                                    </tr>
                            <?php		
                                }
                            ?>
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->

<div class="row">

    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Active Appointments</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <style>
                        #dataTable_length, #dataTable_filter {
                            display: none;
                        }
                    </style>
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Patient</th>
                                <th>Doctor</th>
                                <th>Clinic</th>
                                <th>Date of Appointment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                // Sort appointments by appointment date in descending order
                                usort($listOfActiveAppointments, function($a, $b) {
                                    return strtotime($b->appointment_date_time) - strtotime($a->appointment_date_time);
                                });

                                foreach($listOfActiveAppointments as $Appointment) {
                            ?>
                                    <tr>
                                        <td><?php echo $Appointment->patientAccount->user->getFullname($Appointment->patient_account_id); ?></td>
                                        <td><?php echo $Appointment->doctorAccount->user->getFullname($Appointment->doctor_account_id); ?></td>
                                        <td><?php echo $Appointment->clinic->getClinicName($Appointment->clinic_id); ?></td>
                                        <td><?php echo $Appointment->appointment_date_time; ?></td>
                                    </tr>
                            <?php		
                                }
                            ?>
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">

    
</div>