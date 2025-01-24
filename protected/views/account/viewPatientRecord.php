<div class="container mt-4">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">List of Records</h6>
                </div>
                <div class="card-body">
                    <?php if(Yii::app()->user->hasFlash('success')):?>
                        <div class="alert alert-success">
                            <?php echo Yii::app()->user->getFlash('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(Yii::app()->user->hasFlash('error')):?>
                        <div class="alert alert-danger">
                            <?php echo Yii::app()->user->getFlash('error'); ?>
                        </div>
                    <?php endif; ?>

                    <ul class="list-group">
                        <?php foreach ($listOfAccounts as $listOfAccount): ?>
                            <li class="list-group">
                                <strong>User Information</strong>
                                <ul>
                                    <li>Email: <b> <?php echo $listOfAccount->email_address; ?> </b></li>
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
                                    <li>Gender: <b><?php
                                            if ($listOfAccount->user->gender == 1) {
                                                echo 'Male';
                                            } elseif ($listOfAccount->user->gender == 2) {
                                                echo 'Female';
                                            }
                                        ?></b>
                                    </li>
                                </ul>
                            </li>
                        <?php endforeach; ?>

                        <br>

                        <?php foreach ($consultationRecords as $consultationRecord): ?>
                            <li class="list-group">
                                <strong>Consultation</strong>
                                <ul>
                                    <li>Subjective: <br><?php echo $consultationRecord->subjective; ?></li>
                                    <hr>
                                    <li>Objective: <br><?php echo $consultationRecord->objective; ?></li>
                                    <hr>
                                    <li>Assessment: <br><?php echo $consultationRecord->assessment; ?></li>
                                    <hr>
                                    <li>Plan: <br><?php echo $consultationRecord->plan; ?></li>
                                    <hr>
                                    <li>Notes: <br><?php echo $consultationRecord->notes; ?></li>
                                    <hr>
                                </ul>
                            </li>
                        <?php endforeach; ?>

                        <br>

                        <?php foreach ($immunizationRecords as $immunization): ?>
                            <li class="list-group">
                            <br>
                                <strong>Immunization</strong>
                                <ul>
                                    <li>Immunization: <b><?php echo $immunization->immunization->immunization; ?></b></li>
                                    <li>Date: <b><?php echo $immunization->date; ?></b></li>
                                    <li>Remarks: <b><?php echo $immunization->remarks; ?></b></li>
                                </ul>
                            </li>
                        <?php endforeach; ?>

                        <br>

                        <?php foreach ($prescriptionRecords as $prescriptionRecord): ?>
                            <li class="list-group">
                                <strong>Prescription</strong>
                                <ul>
                                    <li>Prescription: <b><?php echo $prescriptionRecord->prescription; ?></b></li>
                                </ul>
                            </li>
                        <?php endforeach; ?>

                        <br>

                        <?php if (!empty($birthHistory)): ?>
                            <li class="list-group">
                                <strong>Birth History</strong>
                                <ul>
                                    <?php foreach ($birthHistory as $history): ?>
                                        <!-- Modify the code below based on your BirthHistory model attributes -->
                                        <li>Blood Type: <b><?php echo $history->blood_type; ?></b></li>
                                        <li>Delivery Type: <b><?php echo $history->type_of_delivery; ?></b></li>
                                        <li>Birth Weight: <b><?php echo $history->birth_weight; ?></b></li>
                                        <li>Birth Length: <b><?php echo $history->birth_length; ?></b></li>
                                        <li>Birth Head Circumference: <b><?php echo $history->birth_head_circumference; ?></b></li>
                                        <li>Birth Chest Circumference: <b><?php echo $history->birth_chest_circumference; ?></b></li>
                                        <li>Birth Abdominal Circumference: <b><?php echo $history->birth_abdominal_circumference; ?></b></li>
                                        <!-- Add more fields as needed -->
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
