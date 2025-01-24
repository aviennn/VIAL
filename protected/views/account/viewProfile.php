<div class="container mt-4">
    <div class="row">
        
        <!-- PROFILE -->
        <div class="col-md-6">
            <div class="card shadow mb-4">
            <div class="card-body text-center" style="background: linear-gradient(to bottom, #04bc6a, #0072a3); height: 140px; border-radius: 5px;"></div>
                <div class="card-body text-center" style="height: 500px;">
                    <i class="fas fa-user-circle fa-10x mb-3" style="margin-top: -80px;"></i>
                    <h1><?php echo $doctorUser->getFullname($doctorAccount->id); ?></h1>
                    <h5 class="card-title">(<?php echo $doctorAccount->username; ?>)</h5>
                    <p class="card-text"><?php echo $doctorUser->specialization; ?></p>
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
                        <strong>Email:</strong> <?php echo $doctorAccount->email_address; ?>
                    </div>

                    <hr class="bg-dark">

                    <div class="about-item mb-3">
                        <strong>License No.:</strong> <?php echo $doctorUser->license_number; ?>
                    </div>

                    <hr class="bg-dark">

                    <div class="about-item mb-3">
                        <strong>PTR:</strong> <?php echo $doctorUser->ptr_number; ?>
                    </div>
                    
                    <hr class="bg-dark">

                    <div class="about-item mb-3">
                        <strong>S2:</strong> <?php echo $doctorUser->s2_number; ?>
                    </div>
                    
                    <hr class="bg-dark">

                    <div class="about-item mb-3">
                        <strong>Subscription:</strong> <?php echo ($doctorAccount->expiration_date != '' && $doctorAccount->expiration_date != '0000-00-00') ? date('M d,Y', strtotime($doctorAccount->expiration_date)) : "Unlimited"; ?>
                    </div>
                </div>
                <div class="card-body bg-dark text-white text-left" style="margin-top: -1px; margin-bottom: 0;">
                    <strong>Maxicare:</strong> <?php echo $doctorUser->maxicare_number; ?>
                </div>
            </div>
        </div>


    </div>
</div>