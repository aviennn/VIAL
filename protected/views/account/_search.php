<?php
/* @var $this AccountController */
/* @var $model Account */
/* @var $form CActiveForm */
?>

<div class="wide form" style="background-color: #333333; border:3px solid #595959; border-radius: 30px; border-radius: 30px; padding: 40px; width: 460px; margin-left:auto; margin-right:auto; margin-bottom:0px;">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<div>ID:</div>
	<div class="row">
		<div style="padding-left:12px;"><?php echo $form->textField($model,'id',array('size'=>3,'style'=>'border-radius: 8px;')); ?></div>
	</div><br>

	<div>Username:</div>
	<div class="row">
		<div style="padding-left:12px;"><?php echo $form->textField($model,'username',array('size'=>40,'maxlength'=>128,'style'=>'border-radius: 8px;')); ?></div>
	</div><br>

	<div>Email Address:</div>
	<div class="row">
		<div style="padding-left:12px;"><?php echo $form->textField($model,'email_address',array('size'=>40,'maxlength'=>255,'style'=>'border-radius: 8px;')); ?></div>
	</div><br>

	<div>Salt:</div>
	<div class="row">
		<div style="padding-left:12px;"><?php echo $form->textField($model,'salt',array('size'=>40,'maxlength'=>128,'style'=>'border-radius: 8px;')); ?></div>
	</div><br>

	<div>Account Type:</div>
	<div class="row">
		<div style="padding-left:12px;"><?php echo $form->textField($model,'account_type_id',array('size'=>3,'style'=>'border-radius: 8px;')); ?></div>
	</div><br>

	<!--<div>Status:</div>
	<div class="row">
		<div style="padding-left:12px;"><?php echo $form->textField($model,'status_id',array('size'=>3,'style'=>'border-radius: 8px;')); ?></div>
	</div><br>

	<div>Date Created:</div>
	<div class="row">
		<div style="padding-left:12px;"><?php echo $form->textField($model,'date_created',array('size'=>20,'style'=>'border-radius: 8px;')); ?></div>
	</div><br>

	<div>Date Updated:</div>
	<div class="row">
		<div style="padding-left:12px;"><?php echo $form->textField($model,'date_updated',array('size'=>20,'style'=>'border-radius: 8px;')); ?></div>
	</div><br>-->

	<div class="row buttons">
		<div style="margin-left:auto; margin-right:auto; padding-left:12px;"><?php echo CHtml::submitButton('Search',array('style'=>'background:#3766cc; border:solid 1px #2e55ab; font-weight:bold; color:#fff; padding:8px 8px; border-radius:0.35rem;')); ?></div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->