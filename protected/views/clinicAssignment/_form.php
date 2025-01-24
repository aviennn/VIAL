<?php
/* @var $this ClinicAssignmentController */
/* @var $model ClinicAssignment */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'clinic-assignment-form',
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
			<?php echo $form->labelEx($model, 'account_id'); ?>
			<?php echo $form->dropDownList($model, 'account_id', $doctors, array('empty' => 'Select Doctor', 'class'=>'form-control form-control-user')); ?>
			<?php echo $form->error($model, 'account_id'); ?>
		</div>
	</div>

	<div class="form-group row">
		<div class="col-sm-4 mb-4 mb-sm-0">
			<?php echo $form->labelEx($model, 'clinic_id'); ?>
			<?php echo $form->dropDownList($model, 'clinic_id', $clinics, array('empty' => 'Select Clinic', 'class'=>'form-control form-control-user')); ?>
			<?php echo $form->error($model, 'clinic_id'); ?>
		</div>
	</div>

	<div class="form-group row">
		<div class="col-sm-4 mb-4 mb-sm-0">
			<?php echo $form->labelEx($model,'status_id'); ?>
			<?php
			echo $form->dropDownList(
				$model,
				'status_id',
				array(
					'1' => 'Active',
					'2' => 'Inactive',
				),
				array('empty' => 'Select Status', 'class' => 'form-control form-control-user')
			);
			?>
			<?php echo $form->error($model,'status_id'); ?>
		</div>
	</div>

	<div class="form-group row">
		<div class="col-sm-12" style="text-align:right">
			<?php echo CHtml::link('<span class="icon text-white-50"><i class="fas fa-user-times"></i></span><span class="text">Cancel</span>', $this->createAbsoluteUrl('clinic/listClinicAssignment'), array('class'=>'btn btn-danger btn-icon-split', 'onclick'=>'return confirm("Are you sure you want to cancel creating an account?")')); ?>
			<?php echo CHtml::link('<span class="icon text-white-50"><i class="fas fa-user-check"></i></span><span class="text">Save</span>', 'javascript:document.getElementById("clinicAssignment-form").submit();', array('class'=>'btn btn-success btn-icon-split')); ?>
		</div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->