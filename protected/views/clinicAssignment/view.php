<?php
/* @var $this ClinicAssignmentController */
/* @var $model ClinicAssignment */

$this->breadcrumbs=array(
	'Clinic Assignments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ClinicAssignment', 'url'=>array('index')),
	array('label'=>'Create ClinicAssignment', 'url'=>array('create')),
	array('label'=>'Update ClinicAssignment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClinicAssignment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClinicAssignment', 'url'=>array('admin')),
);
?>

<h1>View ClinicAssignment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'account_id',
		'clinic_id',
		'status_id',
	),
)); ?>
