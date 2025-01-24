<div class = "row">
	<div class="col-xl-8 col-lg-8">
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		        <h6 class="m-0 font-weight-bold text-primary">Create Patient Account (Child)</h6>
		    </div>
		    <div class="card-body">
			<?php echo $this->renderPartial('_formp1', array('account' => $account, 'user' => $user, 'ImmunizationRecord' => $ImmunizationRecord, 'BirthHistory' => $BirthHistory)); ?>
			</div>
		</div>
	</div>
</div>

<?php if(Yii::app()->user->getState('account_type_id') == 1): ?>
<div class = "row">
<div class="col-xl-12 col-lg-12">
	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	        <h6 class="m-0 font-weight-bold text-primary">List of Patients</h6>
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
							<th>Full Name</th>
							<th>Date Of Birth</th>
							<th>Gender</th>
							<th>View</th>
							<th>Edit</th>
							<th>Delete</th>
	                    </tr>
	                </thead>
	                <tbody>
						<?php 
							foreach($listOfAccounts as $modelValue)
							{
						?>
								<tr>
									<td><?php echo $modelValue->user->getFullname($modelValue->id); ?></td>
									<td><?php echo $modelValue->user->dob; ?></td>
									<td>
										<?php
											if ($modelValue->user->gender == 1) {
												echo 'Male';
											} elseif ($modelValue->user->gender == 2) {
												echo 'Female';
											}
										?>
									</td>
									<?php 
									echo "<td>".CHtml::link('<i class="fas fa-info-circle"></i>', $this->createAbsoluteUrl('account/view/'.$modelValue->id), array('class'=>'btn btn-info btn-circle btn-sm'))."</td>";
		                            echo "<td>".CHtml::link('<i class="fas fa-edit"></i>', $this->createAbsoluteUrl('account/updatePatient/'.$modelValue->id),array('class'=>'btn btn-success btn-circle btn-sm'))."</td>";
		                            echo "<td>".CHtml::link('<i class="fas fa-trash"></i>', $this->createAbsoluteUrl('account/delete/'.$modelValue->id),array('class'=>'btn btn-danger btn-circle btn-sm', 'onclick'=>'return confirm("Are you sure you want to delete this account? Deleting this account will delete all data associated with it including unpaid obligations.")'))."</td>";
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

<?php endif; ?>