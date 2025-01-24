<div class = "row">
<div class="col-xl-12 col-lg-12">
	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	        <h6 class="m-0 font-weight-bold text-primary">Active Appointments</h6>
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
							<th>Patient</th>
							<th>Doctor</th>
							<th>Clinic</th>
                            <th>Date of Appointment</th>
                            <th>Note</th>
							<th>Status</th>
							<th>Delete</th>
	                    </tr>
	                </thead>
	                <tbody>
						<?php 
							foreach($listOfActiveAppointments as $Appointment)
							{
						?>
								<tr>
									<td><?php echo $Appointment->patientAccount->user->getFullname($Appointment->patient_account_id); ?></td>
									<td><?php echo $Appointment->doctorAccount->user->getFullname($Appointment->doctor_account_id); ?></td>
                                    <td><?php echo $Appointment->clinic->getClinicName($Appointment->clinic_id); ?></td>
                                    <td><?php echo $Appointment->appointment_date_time; ?></td>
                                    <td><?php echo $Appointment->notes; ?></td>
									<td><?php echo $Appointment->status->getStatusname($Appointment->status_id); ?></td>
									<?php 
		                            echo "<td>".CHtml::link('<i class="fas fa-trash"></i>', $this->createAbsoluteUrl('appointment/DeleteRecord/'.$Appointment->id),array('class'=>'btn btn-danger btn-circle btn-sm', 'onclick'=>'return confirm("Are you sure you want to delete this Appointment?")'))."</td>";
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


<div class = "row">
<div class="col-xl-12 col-lg-12">
	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	        <h6 class="m-0 font-weight-bold text-primary">Pending Appointments</h6>
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
							<th>Patient</th>
							<th>Doctor</th>
							<th>Clinic</th>
                            <th>Date of Appointment</th>
                            <th>Note</th>
							<th>Status</th>
							<th>Accept</th>
							<th>Delete</th>
	                    </tr>
	                </thead>
	                <tbody>
						<?php 
							foreach($listOfPendingAppointments as $Appointment)
							{
						?>
								<tr>
									<td><?php echo $Appointment->patientAccount->user->getFullname($Appointment->patient_account_id); ?></td>
									<td><?php echo $Appointment->doctorAccount->user->getFullname($Appointment->doctor_account_id); ?></td>
                                    <td><?php echo $Appointment->clinic->getClinicName($Appointment->clinic_id); ?></td>
                                    <td><?php echo $Appointment->appointment_date_time; ?></td>
                                    <td><?php echo $Appointment->notes; ?></td>
									<td><?php echo $Appointment->status->getStatusname($Appointment->status_id); ?></td>
									<?php 
		                            echo "<td>".CHtml::link('<i class="fas fa-edit"></i>', $this->createAbsoluteUrl('appointment/AcceptAppointment/'.$Appointment->id),array('class'=>'btn btn-success btn-circle btn-sm'))."</td>";
		                            echo "<td>".CHtml::link('<i class="fas fa-trash"></i>', $this->createAbsoluteUrl('appointment/DeleteRecord/'.$Appointment->id),array('class'=>'btn btn-danger btn-circle btn-sm', 'onclick'=>'return confirm("Are you sure you want to delete this Appointment?")'))."</td>";
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