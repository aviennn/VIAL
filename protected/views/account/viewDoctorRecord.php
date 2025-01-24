<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List of Records</h6>
            </div>
            <div class="card-body">
                <?php if(Yii::app()->user->hasFlash('success')):?>
                    <div class="border-bottom-success">
                        <?php echo Yii::app()->user->getFlash('success'); ?>
                    </div>
                <?php endif; ?>
                <?php if(Yii::app()->user->hasFlash('error')):?>
                    <div class="border-bottom-danger">
                        <?php echo Yii::app()->user->getFlash('error'); ?>
                    </div>
                <?php endif; ?>

                <ul class="list-group">
                    <?php foreach($listOfAccounts as $listOfAccount): ?>
                        <li class="list-group">
                            <strong>User Information</strong>
                            <ul>
                                <li>Email: <b><?php echo $listOfAccount->email_address; ?></b></li>
                                <li>Username: <b><?php echo $listOfAccount->username; ?></b></li>
                                <li>Firstname: <b><?php echo $listOfAccount->user->firstname; ?></b></li>
                                <li>Middlename: <b><?php echo $listOfAccount->user->middlename; ?></b></li>
                                <li>Lastname: <b><?php echo $listOfAccount->user->lastname; ?></b></li>
                                <li>Date Of Birth: <b><?php echo $listOfAccount->user->dob; ?></b></li>
                                <li>Address: <b><?php echo $listOfAccount->user->address;?></b></li>
                                <li>Name Of Father: <b><?php echo $listOfAccount->user->name_of_father;?></b></li>
                                <li>Father Date Of Birth: <b><?php echo $listOfAccount->user->father_dob; ?></b></li>
                                <li>Name Of Mother: <b><?php echo $listOfAccount->user->name_of_mother; ?></b></li>
                                <li>Mother Date Of Birth: <b><?php echo $listOfAccount->user->mother_dob; ?></b></li>
                                <li>School: <b><?php echo $listOfAccount->user->school; ?></b></li>
                                <li>Gender: <b>
                                        <?php
                                        if ($listOfAccount->user->gender == 1) {
                                            echo 'Male';
                                        } elseif ($listOfAccount->user->gender == 2) {
                                            echo 'Female';
                                        }
                                        ?>
                                    </b>
                                </li>
                            </ul>
                        </li>
                    <?php endforeach; ?>

                    <br>

                    <?php foreach($clinicAssignment as $clinicAssignments): ?>
                        <li class="list-group">
                            <strong>Clinic</strong>
                            <ul>
                                <li>Clinic: <b><?php echo $clinicAssignments->clinic->clinic; ?></b></li>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
