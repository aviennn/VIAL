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
          Secretary Controls
        </div>

        <!-- Nav Item - Pages Collapse Menu -->

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-user"></i><span>My Profile</span></a>', $this->createAbsoluteUrl('account/viewProfileOfSecretary/'), array('class'=>'nav-link')); ?>
        </li>

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-bed"></i><span>Manage Patients</span>', '', array('class'=>'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapsePatients', 'aria-expanded'=>'true', 'aria-controls'=>'collapsePatients')); ?>

            <div id="collapsePatients" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="py-2 collapse-inner rounded" style="background-color: #104f49;">
                    <h6 class="collapse-header">Actions:</h6>
                    <?php echo CHtml::link('Add Patient', '#', array('class'=>'collapse-item', 'data-toggle'=>'dropdown', 'aria-haspopup'=>'true', 'aria-expanded'=>'false')); ?>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php echo CHtml::link('For Kids', $this->createAbsoluteUrl('account/createPatient1'), array('class'=>'dropdown-item')); ?>
                        <?php echo CHtml::link('For Adult', $this->createAbsoluteUrl('account/createPatient2'), array('class'=>'dropdown-item')); ?>
                    </div>
                    <?php echo CHtml::link('List Patients', $this->createAbsoluteUrl('account/listassignedPatients'), array('class'=>'collapse-item')); ?>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-calendar-plus"></i><span>List Appointment</span>', $this->createAbsoluteUrl('appointment/ListDoctorAppointments'), array('class'=>'nav-link')); ?>
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