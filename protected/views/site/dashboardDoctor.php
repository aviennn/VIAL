
<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-12">
        <div class="card shadow h-100 border-0" style="background-image: url('images/hospital.png'); background-size: cover; background-position: center;">
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

<!-- Content Row -->

<div class="row">

    <!-- Patient -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List of Active Patients (Limits to 7)</h6>
            </div>
            <div class="card-body" style="">
                <?php for ($i = 0; $i < min(7, count($activePatients)); $i++): ?>
                    <div class="mb-n1 text-white">
                        <i class="fas fa-user fa-lg text-dark mr-2"></i>
                        <?php echo $activePatients[$i]->user->getFullname($activePatients[$i]->id); ?>
                        <hr class="bg-dark">
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>


    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary" style="color: #fff;">Consultation Records</h6>
            </div>
            <div class="card-body">
                <?php $counter = 0; ?>
                <?php foreach ($listOfConsultationRecord as $modelValue): ?>
                    <?php if ($counter < 7): ?>
                        <div class="mb-n2 text-white">
                            <i class="fas fa-notes-medical text-dark mr-2"></i>
                            <?php echo $modelValue->patientAccount->user->getFullname($modelValue->patient_account_id); ?>
                            <hr class="bg-dark">
                        </div>
                        <?php $counter++; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List of Pending Appointments</h6>
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
                                <th>Date of Appointment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listOfPendingAppointments as $appointment): ?>
                                <tr>
                                    <td><?php echo $appointment->patientAccount->user->getFullname($appointment->patient_account_id); ?></td>
                                    <td><?php echo $appointment->appointment_date_time; ?></td>
                                </tr>
                            <?php endforeach; ?>
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