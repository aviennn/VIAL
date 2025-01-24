    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background-image: linear-gradient(to right, #00bd67, #1c47a3);">

        <!-- Sidebar - Brand -->
    
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php $this->createAbsoluteUrl('site/index') ?>" style="margin-top:20px;">
            <div class="sidebar-brand-icon">
                <img style="max-width: 70px;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png"/>
            </div>
            <div class="sidebar-brand-text mx-3">VIAL</div>
        </a><br>

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
           Super Admin Controls
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-user"></i><span>Manage Doctors</span>', '', array('class'=>'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapseDoctors', 'aria-expanded'=>'true', 'aria-controls'=>'collapseDoctors')); ?>

            <div id="collapseDoctors" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="py-2 collapse-inner rounded" style="background-color: #104f49;">
                    <?php echo CHtml::link('Add Doctor', $this->createAbsoluteUrl('account/createDoctor'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('List Doctors', $this->createAbsoluteUrl('account/listDoctor'), array('class'=>'collapse-item')); ?>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-bed"></i><span>Manage Patients</span>', '', array('class'=>'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapsePatients', 'aria-expanded'=>'true', 'aria-controls'=>'collapsePatients')); ?>

            <div id="collapsePatients" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="py-2 collapse-inner rounded" style="background-color: #104f49;">
                    <?php echo CHtml::link('Add Patient', '#', array('class'=>'collapse-item', 'data-toggle'=>'dropdown', 'aria-haspopup'=>'true', 'aria-expanded'=>'false')); ?>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php echo CHtml::link('Children', $this->createAbsoluteUrl('account/createPatient1'), array('class'=>'dropdown-item')); ?>
                        <?php echo CHtml::link('Adult', $this->createAbsoluteUrl('account/createPatient2'), array('class'=>'dropdown-item')); ?>
                    </div>
                    <?php echo CHtml::link('List Patients', $this->createAbsoluteUrl('account/listPatient'), array('class'=>'collapse-item')); ?>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-calendar-alt"></i><span>Manage Appointment</span>', '', array('class'=>'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapseAppointment', 'aria-expanded'=>'true', 'aria-controls'=>'collapseAppointment')); ?>

            <div id="collapseAppointment" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="py-2 collapse-inner rounded" style="background-color: #104f49;">
                    <?php echo CHtml::link('Add Appointment', $this->createAbsoluteUrl('appointment/create'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('List Appointment', $this->createAbsoluteUrl('appointment/listOfAppointments'), array('class'=>'collapse-item')); ?>
                </div>
            </div>
        </li>
        
        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-clinic-medical"></i><span>Manage Clinics</span>', '', array('class'=>'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapseClinics', 'aria-expanded'=>'true', 'aria-controls'=>'collapseClinics')); ?>

            <div id="collapseClinics" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="py-2 collapse-inner rounded" style="background-color: #104f49;">
                    <?php echo CHtml::link('Add Clinic', $this->createAbsoluteUrl('clinic/create'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('List Clinics', $this->createAbsoluteUrl('clinic/listClinic'), array('class'=>'collapse-item')); ?>
                </div>
            </div>
        </li>

        

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-prescription"></i><span>List Prescription</span></a>', $this->createAbsoluteUrl('prescription/listPrescriptions'), array('class'=>'nav-link')); ?>
        </li>

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-user-clock"></i><span>Manage Consultation</span>', '', array('class'=>'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapseConsultation', 'aria-expanded'=>'true', 'aria-controls'=>'collapseConsultation')); ?>
            
            <div id="collapseConsultation" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="py-2 collapse-inner rounded" style="background-color: #104f49;">
                    <?php echo CHtml::link('Add Consultation<br>Record', $this->createAbsoluteUrl('consultationrecord/create'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('List Consultation<br>Record', $this->createAbsoluteUrl('consultationrecord/listOfConsultationRecord'), array('class'=>'collapse-item')); ?>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-house-user"></i><span>Clinic Assignment</span>', '', array('class'=>'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapseClinicAssignment', 'aria-expanded'=>'true', 'aria-controls'=>'collapseClinicAssignment')); ?>
            <div id="collapseClinicAssignment" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="py-2 collapse-inner rounded" style="background-color: #104f49;">
                    <?php echo CHtml::link('Assign Clinic', $this->createAbsoluteUrl('clinic/AssignClinic'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('List Clinic<br>Assignments', $this->createAbsoluteUrl('clinic/listClinicAssignment'), array('class'=>'collapse-item')); ?>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-syringe"></i><span>Manage Immunization</span>', '', array('class'=>'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapseImmunization', 'aria-expanded'=>'true', 'aria-controls'=>'collapseImmunization')); ?>
            <div id="collapseImmunization" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="py-2 collapse-inner rounded" style="background-color: #104f49;">
                    <?php echo CHtml::link('Add Immunization<br>Record', $this->createAbsoluteUrl('immunizationrecord/create'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('List Immunization<br>Record', $this->createAbsoluteUrl('immunizationrecord/listOfImmunizationRecord'), array('class'=>'collapse-item')); ?>
                </div>
            </div>
        </li>

        
        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-pen-alt"></i><span>Manage Secretary</span>', '', array('class'=>'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapseSecretary', 'aria-expanded'=>'true', 'aria-controls'=>'collapseSecretary')); ?>
            <div id="collapseSecretary" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="py-2 collapse-inner rounded" style="background-color: #104f49;">
                    <?php echo CHtml::link('Add Secretary', $this->createAbsoluteUrl('account/createSecretary'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('List Secretary', $this->createAbsoluteUrl('account/listSecretary'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('Assign Secretary', $this->createAbsoluteUrl('account/assignSecretary'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('List Secretary<br>Assignment', $this->createAbsoluteUrl('account/listSecretaryAssignment'), array('class'=>'collapse-item')); ?>
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