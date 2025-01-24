<?php
/* @var $this AppointmentController */
/* @var $model Appointment */
/* @var $form CActiveForm */
?>

<!-- Load Timepicker script after jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.3.5/jquery.timepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.3.5/jquery.timepicker.min.js"></script>

<?php
// Assuming you want the maximum date to be the end of next month
$nextMonthsEnd = new DateTime('first day of next month');
$nextMonthsEnd->modify('last day of this month');
?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'appointment-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<div class="form-group row">
	<div class="col-sm-4 mb-4 mb-sm-0">
		<?php echo $form->labelEx($model, 'patient_account_id'); ?>
		<?php echo $form->dropDownList($model, 'patient_account_id', $patients, array('class' => 'form-control form-control-user', 'prompt' => 'Select Patient')); ?>
		<?php echo $form->error($model, 'patient_account_id'); ?>
	</div>
</div>

<div class="form-group row">
	<div class="col-sm-4 mb-4 mb-sm-0">
		<?php echo $form->labelEx($model, 'doctor_account_id'); ?>
		<?php echo $form->dropDownList($model, 'doctor_account_id', $doctors, array('class' => 'form-control form-control-user', 'prompt' => 'Select Doctor')); ?>
		<?php echo $form->error($model, 'doctor_account_id'); ?>
	</div>
</div>

<div class="form-group row">
	<div class="col-sm-4 mb-4 mb-sm-0">
		<?php echo $form->labelEx($model, 'clinic_id'); ?>
		<?php echo $form->dropDownList($model, 'clinic_id', $clinics, array('class' => 'form-control form-control-user', 'prompt' => 'Select Clinic')); ?>
		<?php echo $form->error($model, 'clinic_id'); ?>
	</div>
</div>

<div class="form-group row">
    <div class="col-sm-4 mb-4 mb-sm-0">
        <?php echo $form->labelEx($model, 'appointment_date'); ?>

        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'appointment_date',
            'options' => array(
                'dateFormat' => 'yy-mm-dd',
                'showAnim' => 'fold',
                'changeYear' => true,
                'changeMonth' => true,
                'yearRange' => '1900:' . date('Y'),
                'minDate' => 0,
                'maxDate' => $nextMonthsEnd->format('Y-m-d'),
            ),
            'htmlOptions' => array(
                'class' => 'form-control form-control-user',
            ),
        ));
        ?>

        <?php echo $form->error($model, 'appointment_date'); ?>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-4 mb-4 mb-sm-0">
        <?php echo $form->labelEx($model, 'appointment_time'); ?>

        <?php
        echo CHtml::textField(
            'Appointment[appointment_time]', 
            '', 
            array('class' => 'form-control form-control-user timepicker')
        );
        ?>

        <?php echo $form->error($model, 'appointment_time'); ?>
    </div>
</div>

<div class="form-group row">
	<div class="col-sm-4 mb-4 mb-sm-0">
		<?php echo $form->labelEx($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50, 'class'=>'form-control form-control-user')); ?>
		<?php echo $form->error($model,'notes'); ?>
	</div>
</div>

<div class="form-group row">
	<div class="col-sm-12" style="text-align:right">
		<?php echo CHtml::link('<span class="icon text-white-50"><i class="fas fa-user-times"></i></span><span class="text">Cancel</span>', $this->createAbsoluteUrl('appointment/listAppointments'), array('class'=>'btn btn-danger btn-icon-split', 'onclick'=>'return confirm("Are you sure you want to cancel creating an account?")')); ?>
		<?php echo CHtml::link('<span class="icon text-white-50"><i class="fas fa-user-check"></i></span><span class="text">Save</span>', 'javascript:document.getElementById("appointment-form").submit();', array('class'=>'btn btn-success btn-icon-split')); ?>
	</div>
</div>


<?php $this->endWidget(); ?>

<!-- Load Timepicker script after jQuery -->
<script>
    $.noConflict();
    jQuery(document).ready(function ($) {
        // Your code using $ as an alias for jQuery
        $('.timepicker').timepicker({
            'timeFormat': 'h:i A', // 12-hour format with AM/PM
            'step': 60, // Set the time interval to 1 hour
            'minTime': '7:00 AM', // Set your start time
            'maxTime': '5:00 PM', // Set your end time
            'startTime': '8:00 AM', // Set the initial time
            'dynamic': false,
            'dropdown': true,
            'scrollbar': true,
            'disableTimeRanges': [['12:00pm', '1:00pm']] // Exclude lunch break
        });
    });
</script>

