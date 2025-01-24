<?php
/* @var $this ConsultationRecordController */
/* @var $data ConsultationRecord */
?><br>

<div class="view" style="color:#bfbfbf; background-color: #333333; border:2px solid #595959; border-radius: 30px; padding: 30px; margin-left:auto; margin-right:auto; width:550px;">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('patient_account_id')); ?>:</b>
	<?php echo CHtml::encode($data->patient_account_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doctor_account_id')); ?>:</b>
	<?php echo CHtml::encode($data->doctor_account_id); ?><br>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subjective')); ?>:</b>
	<?php echo CHtml::encode($data->subjective); ?><br>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('objective')); ?>:</b>
	<?php echo CHtml::encode($data->objective); ?><br>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('assessment')); ?>:</b>
	<?php echo CHtml::encode($data->assessment); ?><br>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plan')); ?>:</b>
	<?php echo CHtml::encode($data->plan); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
	<?php echo CHtml::encode($data->notes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_of_consultation')); ?>:</b>
	<?php echo CHtml::encode($data->date_of_consultation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_id')); ?>:</b>
	<?php echo CHtml::encode($data->status_id); ?>
	<br />

	*/ ?>

</div>