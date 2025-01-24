    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background-image: linear-gradient(to right, #00bd67, #1c47a3);">

        <!-- Sidebar - Brand -->
    
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php $this->createAbsoluteUrl('site/index') ?>" style="margin-top:20px;">
            <div class="sidebar-brand-icon">
                <img style="max-width: 70px;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png"/>
            </div>
            <div class="sidebar-brand-text mx-3">VIAL</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
        	<?php echo CHtml::link('<i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span>', $this->createAbsoluteUrl('site/index'), array('class'=>'nav-link')); ?>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Patient Controls
        </div>

        <!-- Nav Item - Pages Collapse Menu -->

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-user"></i><span>My Profile</span></a>', $this->createAbsoluteUrl('account/viewProfileOfPatient/'), array('class'=>'nav-link')); ?>
        </li>

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-user-md"></i><span>See Available Doctors</span>', '', array('class'=>'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapseAvailableDoctors', 'aria-expanded'=>'true', 'aria-controls'=>'collapseAvailableDoctors')); ?>

            <div id="collapseAvailableDoctors" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="py-2 collapse-inner rounded" style="background-color: #104f49;">
                    <?php echo CHtml::link('See Doctors', $this->createAbsoluteUrl('account/AvailableDoctors'), array('class'=>'collapse-item')); ?>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-user-md"></i><span>Prescriptions</span>', '', array('class'=>'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapseDoctors', 'aria-expanded'=>'true', 'aria-controls'=>'collapseDoctors')); ?>

            <div id="collapseDoctors" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="py-2 collapse-inner rounded" style="background-color: #104f49;">
                    <?php echo CHtml::link('View Prescription', $this->createAbsoluteUrl('prescription/listPrescriptionsPatient'), array('class'=>'collapse-item')); ?>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-address-card"></i><span>Medical Records</span>', '', array('class'=>'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapsePatients', 'aria-expanded'=>'true', 'aria-controls'=>'collapsePatients')); ?>

            <div id="collapsePatients" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="py-2 collapse-inner rounded" style="background-color: #104f49;">
                    <?php echo CHtml::link('View Consultation', $this->createAbsoluteUrl('consultationrecord/listOfConsultationRecordPatient'), array('class'=>'collapse-item')); ?>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-calendar-day"></i><span>Appointment</span>', '', array('class'=>'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapsePrescriptions', 'aria-expanded'=>'true', 'aria-controls'=>'collapsePrescriptions')); ?>

            <div id="collapsePrescriptions" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="py-2 collapse-inner rounded" style="background-color: #104f49;">
                    <?php echo CHtml::link('Book Appointment', $this->createAbsoluteUrl('appointment/CreateAppointmentPatient'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('View Appointment', $this->createAbsoluteUrl('appointment/SeeAppointmentsPatient'), array('class'=>'collapse-item')); ?>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0"><br>

        <!-- Heading -->
        <div class="sidebar-heading">
        Account
        </div>

        <!-- Nav Item - Logout -->
        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-sign-out-alt"></i><span>Log Out</span></a>', $this->createAbsoluteUrl('site/logout'), array('class'=>'nav-link')); ?>
        </li>
    </ul>
    <!-- End of Sidebar -->