    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background-image: linear-gradient(to right, #00bd67, #1c47a3);">

        <!-- Sidebar - Brand -->
    
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php $this->createAbsoluteUrl('site/index') ?>" style="margin-top:20px;">
            <div class="sidebar-brand-icon">
                <img style="max-width: 70px;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png"/>
            </div>
            <div class="sidebar-brand-text mx-3">VIAL</div>
        </a>

         <!--Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
        	<?php echo CHtml::link('<i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span>', $this->createAbsoluteUrl('site/index'), array('class'=>'nav-link')); ?>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
           Profile Management
        </div>

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-user"></i><span>My Profile</span></a>', $this->createAbsoluteUrl('account/viewProfile/'), array('class'=>'nav-link')); ?>
        </li>
        
        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-clipboard-list"></i><span>My Secretary</span></a>', $this->createAbsoluteUrl('account/ListDoctorSecretaryAssignment/'), array('class'=>'nav-link')); ?>
        </li>

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-address-book"></i><span>Appointments &amp; Queue</span></a>', $this->createAbsoluteUrl('appointment/SeeAppointments/'), array('class'=>'nav-link')); ?>
        </li>

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-clinic-medical"></i><span>Clinics</span></a>', $this->createAbsoluteUrl('clinic/listClinicsForDoctor/'), array('class'=>'nav-link')); ?>
        </li>

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-archive"></i><span>Prescription Archives</span></a>', $this->createAbsoluteUrl('prescription/listPrescriptionsDoctor/'), array('class'=>'nav-link')); ?>
        </li>

        <li class="nav-item">
        <?php echo CHtml::link('<i class="fas fa-solid fa-syringe"></i><span>Add Immunization<br>Record</span></a>', $this->createAbsoluteUrl('immunizationrecord/CreateImmunizationRecordForDoctor'), array('class'=>'nav-link')); ?>
     
                  
        </li>


        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-running"></i><span>Active Patients</span></a>', $this->createAbsoluteUrl('account/viewPatients/'), array('class'=>'nav-link')); ?>
        </li>
         <!-- Divider -->
        <hr class="sidebar-divider my-0"><br>
        <!-- Heading -->
        <div class="sidebar-heading">
           Patient Management
        </div>
        
        <li class="nav-item">
    <?php echo CHtml::link(
        '<i class="fas fa-fw fa-user-plus"></i><span>Add Patient</span>',
        '#',
        array(
            'class'=>'nav-link collapsed',
            'data-toggle'=>'collapse',
            'data-target'=>'#collapseDoctors',
            'aria-haspopup'=>'true',
            'aria-expanded'=>'true',
            'aria-controls'=>'collapseDoctors'
        )
    ); ?>

    <div id="collapseDoctors" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="py-2 collapse-inner rounded" style="background-color: #104f49;">
            <?php echo CHtml::link('For Kids', $this->createAbsoluteUrl('account/createPatient1ForDoctor'), array('class'=>'collapse-item')); ?>
            <?php echo CHtml::link('For Adult', $this->createAbsoluteUrl('account/createPatient2ForDoctor'), array('class'=>'collapse-item')); ?>
        </div>
    </div>
</li>

        <li class="nav-item">
    <?php echo CHtml::link(
        '<i class="fas fa-fw fa-user-clock"></i><span>Manage Consultation</span>',
        '#',
        array(
            'class'=>'nav-link collapsed',
            'data-toggle'=>'collapse',
            'data-target'=>'#collapsePatients',
            'aria-haspopup'=>'true',
            'aria-expanded'=>'true',
            'aria-controls'=>'collapsePatients'
        )
    ); ?>

    <div id="collapsePatients" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="py-2 collapse-inner rounded" style="background-color: #104f49;">
            <?php echo CHtml::link('<span>Add Consultation</span>', $this->createAbsoluteUrl('consultationrecord/createForDoctor/'), array('class'=>'collapse-item')); ?>
            <?php echo CHtml::link('<span>List Consultation</span>', $this->createAbsoluteUrl('consultationrecord/listOfConsultationRecordForDoctor/'), array('class'=>'collapse-item')); ?>
        </div>
    </div>
</li>

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-search"></i><span>Search Patient</span></a>', $this->createAbsoluteUrl('account/searchpatients/'), array('class'=>'nav-link')); ?>
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