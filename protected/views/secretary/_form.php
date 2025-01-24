<?php
/* @var $this SecretaryController */
/* @var $model Secretary */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'secretary-form',
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
                    <?php echo $form->labelEx($model, 'secretary_id'); ?>
                    <?php echo $form->dropDownList($model, 'secretary_id', $secretaries, array('empty' => 'Select Secretary', 'class'=>'form-control form-control-user')); ?>
                    <?php echo $form->error($model, 'secretary_id'); ?>
                </div>
                </div>

                <div class="form-group row">
                <div class="col-sm-4 mb-4 mb-sm-0">
                    <?php echo $form->labelEx($model, 'doctor_id'); ?>
                    <?php echo $form->dropDownList($model, 'doctor_id', $doctors, array('empty' => 'Select Doctor', 'class'=>'form-control form-control-user')); ?>
                    <?php echo $form->error($model, 'doctor_id'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->