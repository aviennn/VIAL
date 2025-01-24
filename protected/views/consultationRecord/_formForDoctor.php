<?php
/* @var $this ConsultationRecordController */
/* @var $model ConsultationRecord */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'consultation-record-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
		
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model, $prescription); ?>
	<div class="form-group row">
        <div class="col-sm-4 mb-4 mb-sm-0">
            <?php echo $form->labelEx($model, 'patient_account_id'); ?>
            <?php echo $form->dropDownList($model, 'patient_account_id', $patients, array('class' => 'form-control form-control-user', 'prompt' => 'Select Patient')); ?>
            <?php echo $form->error($model, 'patient_account_id'); ?>
        </div>
    </div>

<div class="form-group row">
    <div class="col mb-4 mb-sm-0">
        <?php echo $form->labelEx($model, 'subjective'); ?>
        <?php echo $form->textArea($model, 'subjective', array('rows' => 6, 'cols' => 80, 'style' => 'width: 60%;', 'class' => 'form-control form-control-user')); ?>
        <?php echo $form->error($model, 'subjective'); ?>
    </div>
</div>


<div class="form-group row">
	<div class="col mb-4 mb-sm-0">
		<?php echo $form->labelEx($model,'objective'); ?>
		<?php echo $form->textArea($model,'objective',array('rows'=>6, 'cols'=>50, 'style' => 'width: 60%;', 'class'=>'form-control form-control-user')); ?>
		<?php echo $form->error($model,'objective'); ?>
	</div>
</div>

<div class="form-group row">
	<div class="col mb-4 mb-sm-0">
		<?php echo $form->labelEx($model,'assessment'); ?>
		<?php echo $form->textArea($model,'assessment',array('rows'=>6, 'cols'=>50, 'style' => 'width: 60%;', 'class'=>'form-control form-control-user')); ?>
		<?php echo $form->error($model,'assessment'); ?>
	</div>
</div>

<div class="form-group row">
	<div class="col mb-4 mb-sm-0">
		<?php echo $form->labelEx($model,'plan'); ?>
		<?php echo $form->textArea($model,'plan',array('rows'=>6, 'cols'=>50, 'style' => 'width: 60%;', 'class'=>'form-control form-control-user')); ?>
		<?php echo $form->error($model,'plan'); ?>
	</div>
</div>

<div class="form-group row">
	<div class="col mb-4 mb-sm-0">
		<?php echo $form->labelEx($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50, 'style' => 'width: 60%;', 'class'=>'form-control form-control-user')); ?>
		<?php echo $form->error($model,'notes'); ?>
	</div>
</div>


<div class="form-group row">
    <div class="col-sm-4 mb-4 mb-sm-0">
        <input type="checkbox" id="myCheckbox" name="myCheckbox" onclick="toggleForm()">
        <label for="myCheckbox">Check me</label>
    </div>
</div>

<div id="dynamicFormContainer" style="display:none;"></div>

<div class="form-group row">
		<div class="col-sm-12" style="text-align:right">
			<?php echo CHtml::link('<span class="icon text-white-50"><i class="fas fa-user-times"></i></span><span class="text">Cancel</span>', $this->createAbsoluteUrl('consultationrecord/listConsultationRecord'), array('class'=>'btn btn-danger btn-icon-split', 'onclick'=>'return confirm("Are you sure you want to cancel creating an account?")')); ?>
			<?php echo CHtml::link('<span class="icon text-white-50"><i class="fas fa-user-check"></i></span><span class="text">Save</span>', 'javascript:document.getElementById("consultation-record-form").submit();', array('class'=>'btn btn-success btn-icon-split')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
    function toggleForm() {
        var checkbox = document.getElementById("myCheckbox");
        var dynamicFormContainer = document.getElementById("dynamicFormContainer");

        if (checkbox.checked) {
            // Perform AJAX request to fetch and load the form
            $.ajax({
				url: '<?php echo $this->createUrl("consultationRecord/addFormPrescription"); ?>',
				type: 'POST',
				data: {
					// Your data here
					'<?php echo Yii::app()->request->csrfTokenName; ?>': '<?php echo Yii::app()->request->csrfToken; ?>'
				},
				success: function (data) {
					console.log('AJAX Success!');
					console.log(data);

					dynamicFormContainer.innerHTML = data;
					dynamicFormContainer.style.display = 'block';
				},
				error: function (xhr, ajaxOptions, thrownError) {
					console.error(xhr.responseText);
					console.error(thrownError);
				}
			});
        } else {
            // Hide the form if checkbox is unchecked
            dynamicFormContainer.innerHTML = '';
            dynamicFormContainer.style.display = 'none';
        }
    }
</script>