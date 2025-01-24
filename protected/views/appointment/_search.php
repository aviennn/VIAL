<?php
/* @var $this AppointmentController */
/* @var $model Appointment */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'doctor_account_id'); ?>
		<?php echo $form->textField($model,'doctor_account_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'patient_account_id'); ?>
		<?php echo $form->textField($model,'patient_account_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'appointment_date_time'); ?>
		<?php echo $form->textField($model,'appointment_date_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'clinic_id'); ?>
		<?php echo $form->textField($model,'clinic_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updated_at'); ?>
		<?php echo $form->textField($model,'updated_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_id'); ?>
		<?php echo $form->textField($model,'status_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'appointment_date'); ?>
		<?php echo $form->textField($model,'appointment_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'appointment_time'); ?>
		<?php echo $form->textField($model,'appointment_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->