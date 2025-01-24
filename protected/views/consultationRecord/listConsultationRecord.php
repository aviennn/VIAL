<div class = "row">
<div class="col-xl-12 col-lg-12">
	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	        <h6 class="m-0 font-weight-bold text-primary">List of Consultation Record</h6>
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
							<th>Patient Name</th>
							<?php if(Yii::app()->user->getState('account_type_id') == 1): ?>
							<th>Doctor Name</th>
							<?php endif; ?>
							<th>Subjective</th>
							<th>Objective</th>
							<th>Asessment</th>
							<th>Plan</th>
							<th>Notes</th>
							<th>View</th>
							<th>Edit</th>
							<th>Delete</th>
	                    </tr>
	                </thead>
	                <tbody>
						<?php 
							foreach($listOfConsultationRecord as $modelValue)
							{
						?>
								<tr>
									<td><?php echo $modelValue->patientAccount->user->getFullname($modelValue->patient_account_id); ?></td>
									<?php if(Yii::app()->user->getState('account_type_id') == 1): ?>
									<td><?php echo $modelValue->doctorAccount->user->getFullname($modelValue->doctor_account_id); ?></td>
									<?php endif; ?>
									<td><?php echo $modelValue->subjective; ?></td>
									<td><?php echo $modelValue->objective; ?></td>
									<td><?php echo $modelValue->assessment; ?></td>
									<td><?php echo $modelValue->plan; ?></td>
									<td><?php echo $modelValue->notes; ?></td>
									<?php 
									echo "<td>".CHtml::link('<i class="fas fa-info-circle"></i>', $this->createAbsoluteUrl('consultationrecord/view/'.$modelValue->id), array('class'=>'btn btn-info btn-circle btn-sm'))."</td>";
		                            echo "<td>".CHtml::link('<i class="fas fa-edit"></i>', $this->createAbsoluteUrl('consultationrecord/update/'.$modelValue->id),array('class'=>'btn btn-success btn-circle btn-sm'))."</td>";
		                            echo "<td>".CHtml::link('<i class="fas fa-trash"></i>', $this->createAbsoluteUrl('consultationrecord/deleteRecord/'.$modelValue->id),array('class'=>'btn btn-danger btn-circle btn-sm', 'onclick'=>'return confirm("Are you sure you want to delete this account? Deleting this account will delete all data associated with it including unpaid obligations.")'))."</td>";
		                            ?>
								</tr>
						<?php		
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>