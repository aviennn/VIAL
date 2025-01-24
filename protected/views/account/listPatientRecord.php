<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List of Records</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <?php if(Yii::app()->user->hasFlash('success')):?>
                        <div class="border-bottom-success ">
                            <?php echo Yii::app()->user->getFlash('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(Yii::app()->user->hasFlash('error')):?>
                        <div class="border-bottom-danger ">
                            <?php echo Yii::app()->user->getFlash('error'); ?>
                        </div>
                    <?php endif; ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Record Type</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                // Iterate through consultation records
                                foreach($consultationRecords as $consultationRecord): ?>
                                <tr>
                                    <td>Consultation</td>
                                    <td>
                                        <!-- Display consultation details (subjective, objective, etc.) -->
                                        Subjective: <?php echo $consultationRecord->subjective; ?><br>
                                        Objective: <?php echo $consultationRecord->objective; ?><br>
                                        Assessment: <?php echo $consultationRecord->assessment; ?><br>
                                        Plan: <?php echo $consultationRecord->plan; ?><br>
                                        Notes: <?php echo $consultationRecord->notes; ?><br>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            <?php 
                                // Iterate through prescription records
                                foreach($prescriptionRecords as $prescriptionRecord): ?>
                                <tr>
                                    <td>Prescription</td>
                                    <td>
                                        <!-- Display prescription details -->
                                        Prescription: <?php echo $prescriptionRecord->prescription; ?><br>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
