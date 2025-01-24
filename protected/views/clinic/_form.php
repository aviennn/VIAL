<?php
/* @var $this ClinicController */
/* @var $model Clinic */
/* @var $form CActiveForm */
?>

<div class="form">
<br>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'clinic-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<div align="center"><p class="note">Fields with * are required.</p></div>

	<!--<?php echo $form->errorSummary($model); ?>-->

	<div style="background-color: #333333; border:3px solid #595959; border-radius: 30px; border-radius: 30px; padding: 40px; width: 450px; margin-left:auto; margin-right:auto; margin-bottom:0px;">
		<div>Clinic: *</div>
		<div class="row">
			<div style="padding-left:12px;"><?php echo $form->textField($model,'clinic',array('size'=>40,'maxlength'=>255,'style'=>'border-radius: 8px;')); ?></div>
			<div style="padding-left:12px;"><?php echo $form->error($model,'clinic',array('style'=>'color: #e74a3b; font-weight: bold;')); ?></div>
		</div><br>

		<div>Address: *</div>
		<div class="row">
			<div style="padding-left:12px;"><?php echo $form->textField($model,'address',array('size'=>40,'maxlength'=>255,'style'=>'border-radius: 8px;')); ?></div>
			<div style="padding-left:12px;"><?php echo $form->error($model,'address',array('style'=>'color: #e74a3b; font-weight: bold;')); ?></div>
		</div><br>

		<div>Contact No.: *</div>
		<div class="row">
			<div style="padding-left:12px;"><?php echo $form->textField($model,'contact_number',array('size'=>40,'maxlength'=>255,'style'=>'border-radius: 8px;')); ?></div>
			<div style="padding-left:12px;"><?php echo $form->error($model,'contact_number',array('style'=>'color: #e74a3b; font-weight: bold;')); ?></div>
		</div><br>

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
            array('empty' => 'Select Status','style'=>'border-radius: 8px;')
        );
        ?>
        <?php echo $form->error($model,'status_id'); ?>
    </div>
</div>

		<div class="row buttons">
			<div style="margin-left:auto; margin-right:auto; padding-left:12px;"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('style'=>'background:#3766cc; border:solid 1px #2e55ab; font-weight:bold; color:#fff; padding:8px 8px; border-radius:0.35rem;')); ?></div>
		</div>
	</div><br>

<?php $this->endWidget(); ?>

</div><!-- form -->