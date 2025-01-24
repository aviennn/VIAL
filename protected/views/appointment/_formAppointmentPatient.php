<?php
/* @var $this AppointmentController */
/* @var $model Appointment */
/* @var $form CActiveForm */
?>

<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message){
        echo '<div class="alert alert-' . $key . '">' . $message . "</div>\n";
    }
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

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'appointment-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

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

        <?php
        echo $form->dropDownList(
            $model,
            'clinic_id',
            array(), // Keep it empty for now, it will be populated dynamically
            array('class' => 'form-control form-control-user', 'prompt' => 'Select Clinic', 'id' => 'clinicDropdown')
        );
        ?>

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
        <?php echo $form->labelEx($model, 'notes'); ?>
        <?php echo $form->textArea($model, 'notes', array('rows' => 6, 'cols' => 50, 'class' => 'form-control form-control-user')); ?>
        <?php echo $form->error($model, 'notes'); ?>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-12" style="text-align:right">
        <?php echo CHtml::link('<span class="icon text-white-50"><i class="fas fa-user-times"></i></span><span class="text">Cancel</span>', $this->createAbsoluteUrl('appointment/SeeAppointmentsPatient'), array('class' => 'btn btn-danger btn-icon-split', 'onclick' => 'return confirm("Are you sure you want to cancel creating an account?")')); ?>
        <?php echo CHtml::link('<span class="icon text-white-50"><i class="fas fa-user-check"></i></span><span class="text">Save</span>', 'javascript:void(0);', array('class' => 'btn btn-success btn-icon-split', 'onclick' => 'saveAppointment();')); ?>
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

    function saveAppointment() {
        if (confirm('The Appointment date has been requested. Do you want to proceed?')) {
            // You can add additional logic here to submit the form via AJAX or other methods
            document.getElementById("appointment-form").submit();
        }
    }
</script>
<script type="text/javascript">
    // Add an event listener to the doctor dropdown
   // Add an event listener to the doctor dropdown
$('#Appointment_doctor_account_id').change(function () {
    var doctorId = $(this).val();

    // Make an AJAX request to get the clinics for the selected doctor
    $.ajax({
        type: 'GET',
        url: '<?php echo $this->createUrl("getDoctorClinics"); ?>',
        data: { account_id: doctorId }, // Use 'account_id' to match the parameter in the PHP action
        dataType: 'json',
        success: function (data) {
            console.log('AJAX Response:', data); // Log the response to the console

            // Update the clinic dropdown with the fetched clinics
            var clinicDropdown = $('#clinicDropdown');
            clinicDropdown.empty();

            $.each(data, function (id, clinic) {
                clinicDropdown.append($('<option>', {
                    value: id,
                    text: clinic
                }));
            });
        },
        error: function (xhr, status, error) {
            console.error('Error fetching clinics:', status, error);
        }
    });
});

</script>