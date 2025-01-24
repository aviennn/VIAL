<?php
/* @var $this AppointmentController */
/* @var $data Appointment */
?><br>

<div class="view" style="color:#bfbfbf; background-color: #333333; border:2px solid #595959; border-radius: 30px; padding: 30px; margin-left:auto; margin-right:auto; width:550px;">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doctor_account_id')); ?>:</b>
	<?php echo CHtml::encode($data->doctor_account_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('patient_account_id')); ?>:</b>
	<?php echo CHtml::encode($data->patient_account_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('appointment_date_time')); ?>:</b>
	<?php echo CHtml::encode($data->appointment_date_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clinic_id')); ?>:</b>
	<?php echo CHtml::encode($data->clinic_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
	<?php echo CHtml::encode($data->notes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_id')); ?>:</b>
	<?php echo CHtml::encode($data->status_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('appointment_date')); ?>:</b>
	<?php echo CHtml::encode($data->appointment_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('appointment_time')); ?>:</b>
	<?php echo CHtml::encode($data->appointment_time); ?>
	<br />

	*/ ?>

</div>