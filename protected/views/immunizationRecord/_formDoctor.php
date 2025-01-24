<?php
/* @var $this ImmunizationRecordController */
/* @var $model ImmunizationRecord */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'immunization-record-form',
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
            <?php echo $form->dropDownList($model, 'account_id', $patients, array('class' => 'form-control form-control-user', 'prompt' => 'Select Patient')); ?>
            <?php echo $form->error($model, 'account_id'); ?>
        </div>
    </div>

	<div class="form-group row">
    <div class="col-sm-4 mb-4 mb-sm-0">
        <?php echo $form->labelEx($model, 'immunization_id'); ?>
        <?php echo $form->dropDownList($model, 'immunization_id', $immunizations, array('class' => 'form-control form-control-user', 'prompt' => 'Select Immunization')); ?>
        <?php echo $form->error($model, 'immunization_id'); ?>
    </div>
</div>

	<div class="form-group row">
    <div class="col-sm-4 mb-4 mb-sm-0">
        <?php echo $form->labelEx($model, 'date'); ?>
        <?php
        $form->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'date',
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'MM dd, yy',
                'changeMonth' => 'true',
                'changeYear' => 'true',
                'yearRange' => (date('Y') - 80) . ':' . (date('Y')),
            ),
            'htmlOptions' => array(
                'class' => 'form-control form-control-user',
            ),
        ));
        ?>
        <?php echo $form->error($model, 'date'); ?>
    </div>
</div>


	<div class="form-group row">
    <div class="col-sm-4 mb-4 mb-sm-0">
		<?php echo $form->labelEx($model,'remarks'); ?>
		<?php echo $form->textArea($model,'remarks',array('rows'=>10, 'cols'=>50, 'class' => 'form-control form-control-user-2')); ?><br>
		<?php echo $form->error($model,'remarks'); ?>
	</div>
	</div>

	
    <div class="form-group row">
		<div class="col-sm-12" style="text-align:right">
			<?php echo CHtml::link('<span class="icon text-white-50"><i class="fas fa-user-times"></i></span><span class="text">Cancel</span>', $this->createAbsoluteUrl('immunizationRecord/listImmunizationRecord'), array('class'=>'btn btn-danger btn-icon-split', 'onclick'=>'return confirm("Are you sure you want to cancel creating an account?")')); ?>
			<?php echo CHtml::link('<span class="icon text-white-50"><i class="fas fa-user-check"></i></span><span class="text">Save</span>', 'javascript:document.getElementById("immunization-record-form").submit();', array('class'=>'btn btn-success btn-icon-split')); ?>
		</div>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->