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
							<th>Actions</th>
	                    </tr>
	                </thead>
                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
									<td>
										<?php echo CHtml::button('Consult', array('class' => 'btn btn-primary', 'onclick' => 'redirectToConsultForm(' . $modelValue->id . ')')); ?>
									</td>
								</tr>
						<?php		
							}
						?>
                        <script>
							function redirectToConsultForm(patientId) {
								// Redirect to the consultation form with the patient ID filled in
								window.location.href = '<?php echo $this->createUrl("consultationRecord/createForDoctorNew"); ?>' + '?patientId=' + patientId;
							}
						</script>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>