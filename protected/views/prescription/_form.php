<?php
/* @var $this PrescriptionController */
/* @var $model Prescription */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prescription-form',
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
		<?php echo $form->labelEx($model,'prescription'); ?>
		<?php echo $form->textArea($model,'prescription',array('rows'=>6, 'cols'=>50, 'class' => 'form-control form-control-user-2')); ?>
		<?php echo $form->error($model,'prescription'); ?>
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
			<?php echo CHtml::link('<span class="icon text-white-50"><i class="fas fa-user-times"></i></span><span class="text">Cancel</span>', $this->createAbsoluteUrl('prescription/listPrescriptions'), array('class'=>'btn btn-danger btn-icon-split', 'onclick'=>'return confirm("Are you sure you want to cancel creating an account?")')); ?>
			<?php echo CHtml::link('<span class="icon text-white-50"><i class="fas fa-user-check"></i></span><span class="text">Save</span>', 'javascript:document.getElementById("prescription-form").submit();', array('class'=>'btn btn-success btn-icon-split')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->