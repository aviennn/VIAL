<?php
/* @var $this PrescriptionController */
/* @var $data Prescription */
?><br>

<div class="view" style="color:#bfbfbf; background-color: #333333; border:2px solid #595959; border-radius: 30px; padding: 30px; margin-left:auto; margin-right:auto; width:550px;">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('patient_account_id')); ?>:</b>
	<?php echo CHtml::encode($data->patient_account_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doctor_account_id')); ?>:</b>
	<?php echo CHtml::encode($data->doctor_account_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('consultation_id')); ?>:</b>
	<?php echo CHtml::encode($data->consultation_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prescription')); ?>:</b>
	<?php echo CHtml::encode($data->prescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_of_prescription')); ?>:</b>
	<?php echo CHtml::encode($data->date_of_prescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_id')); ?>:</b>
	<?php echo CHtml::encode($data->status_id); ?>
	<br />


</div>