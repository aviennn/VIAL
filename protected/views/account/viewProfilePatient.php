<div class="container mt-4">
    <div class="row">
        
        <!-- PROFILE -->
        <div class="col-md-6">
            <div class="card shadow mb-4">
            <div class="card-body text-center" style="background: linear-gradient(to bottom, #04bc6a, #0072a3); height: 140px; border-radius: 5px;"></div>
                <div class="card-body text-center" style="height: 500px;">
                    <i class="fas fa-user-circle fa-10x mb-3" style="margin-top: -80px;"></i>
                    <h1><?php echo $patientUser->getFullname($patientAccount->id); ?></h1>
                    <h5 class="card-title">(<?php echo $patientAccount->username; ?>)</h5>
                </div>
            </div>
        </div>

        <!-- ABOUT -->
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header bg-dark text-white text-center">
                    <strong class="mb-0 font-weight-bold" style="font-size: 30px;">ABOUT</strong>
                </div>
                <div class="card-body">
                    <div class="about-item mb-3">
                        <strong>Email:</strong> <?php echo $patientAccount->email_address; ?>
                    </div>

                    <hr class="bg-dark">

                    <div class="about-item mb-3">
                        <strong>Firstname</strong> <?php echo $patientUser->firstname; ?>
                    </div>

                    <hr class="bg-dark">

                    <div class="about-item mb-3">
                        <strong>Lastname</strong> <?php echo $patientUser->lastname; ?>
                    </div>
                    
                    <hr class="bg-dark">

                    <div class="about-item mb-3">
                        <strong>Birthday:</strong> <?php echo $patientUser->dob; ?>
                    </div>
                    
                    <hr class="bg-dark">

                    <div class="about-item mb-3">
                        <strong>Address:</strong> <?php echo $patientUser->address ?>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>