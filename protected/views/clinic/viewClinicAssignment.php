<?php
/* @var $this ClinicController */
/* @var $model ClinicAssignment */

$this->breadcrumbs=array(
	'Clinic Assignments'=>array('index'), // Adjust as needed
	$model->id,
);

$this->menu=array(
	array('label'=>'List Clinic Assignment', 'url'=>array('index')), // Adjust as needed
	array('label'=>'Create Clinic Assignment', 'url'=>array('create')), // Adjust as needed
	array('label'=>'Update Clinic Assignment', 'url'=>array('update', 'id'=>$model->id)), // Adjust as needed
	array('label'=>'Delete Clinic Assignment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Clinic Assignment', 'url'=>array('admin')), // Adjust as needed
);
?>

<h1>View Clinic Assignment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'account_id',
		'clinic_id',
		'status_id',
	),
)); ?>
