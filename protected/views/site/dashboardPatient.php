<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-12">
        <div class="card shadow h-100 border-0" style="background-image: url('images/patient.png'); background-size: cover; background-position: center;">
            <div class="card-body" style="padding: 40px;">

                <div class="row no-gutters align-items-center">

                    <div class="col align-self-start">
                        <h1 class="font-weight-bold text-uppercase"> Welcome to VIAL, <?php echo User::model()->getFullname(Yii::app()->user->id); ?>! </h1>
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

</br>



<div class="row">

    <!-- Promote Health Awareness Card Example -->
    <div class="col mb-4">
        <div class="card h-100 py-2 border-0 shadow text-white " style="background-color: #EDE9E8;">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <i class="fas fa-medkit fa-2x mb-2" style="color: #04b46b;"></i>
                        <div class="font-weight-bold text-uppercase" style="color: #04b46b;">
                            Promote Health Awareness</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Enhance Patient Experience Card Example -->
    <div class="col mb-4">
        <div class="card h-100 py-2 border-0 shadow" style="background-color: #EDE9E8;">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <i class="fas fa-heart fa-2x mb-2" style="color: #18a3b8;"></i>
                        <div class="font-weight-bold text-uppercase" style="color: #18a3b8;">
                            Enhance Patient Experience</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Streamline Communication Card Example -->
    <div class="col mb-4">
        <div class="card h-100 py-2 border-0 shadow" style="background-color: #EDE9E8;">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <i class="fas fa-comments fa-2x mb-2" style="color: #1875ad;"></i>
                        <div class="font-weight-bold text-uppercase" style="color: #1875ad;">
                            Streamline Communication</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<!-- Content Row -->
<div class="row">

    <!-- Appointments -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Appointments</h6>
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
                                <th>Doctor</th>
                                <th>Clinic</th>
                                <th>Date of Appointment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                // Sort appointments by appointment date in descending order
                                usort($listOfAppointments, function($a, $b) {
                                    return strtotime($b->appointment_date_time) - strtotime($a->appointment_date_time);
                                });

                                foreach($listOfAppointments as $Appointment) {
                            ?>
                                    <tr>
                                        <td><?php echo $Appointment->doctorAccount->user->getFullname($Appointment->doctor_account_id); ?></td>
                                        <td><?php echo $Appointment->clinic->getClinicName($Appointment->clinic_id); ?></td>
                                        <td><?php echo $Appointment->appointment_date_time; ?></td>
                                    </tr>
                            <?php		
                                    // Break after the first iteration
                                    break;
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

    <!-- Prescriptions -->
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">My Prescriptions</h6>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <?php $counter = 0; ?>
                    <?php foreach($listPrescriptionsPatient as $modelValue): ?>
                        <?php if ($counter < 5): ?>
                            <div class="mb-n1 text-white">
                                <strong class="mb-2">Prescribed by:</strong> <?php echo $modelValue->doctorAccount->user->getFullname($modelValue->doctor_account_id); ?><br>
                                <strong>Prescription:</strong> <?php echo $modelValue->prescription; ?>
                                <hr class="bg-dark">
                            </div>
                            <?php $counter++; ?>
                        <?php else: ?>
                            <?php break; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>



    <!-- Consultations -->
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Consultations</h6>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <?php $counter = 0; ?>
                    <?php foreach($listOfConsultationRecordPatient as $modelValue): ?>
                        <?php if ($counter < 5): ?>
                            <div class="mb-n1 text-white">
                                <strong class="mb-2">Consulted by:</strong> <?php echo $modelValue->doctorAccount->user->getFullname($modelValue->doctor_account_id); ?><br>
                                <strong>Notes:</strong> <?php echo $modelValue->notes; ?>
                                <hr class="bg-dark">
                            </div>
                            <?php $counter++; ?>
                        <?php else: ?>
                            <?php break; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>