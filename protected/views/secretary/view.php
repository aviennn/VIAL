<?php
/* @var $this SecretaryController */
/* @var $model Secretary */

$this->breadcrumbs=array(
	'Secretaries'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Secretary', 'url'=>array('index')),
	array('label'=>'Create Secretary', 'url'=>array('create')),
	array('label'=>'Update Secretary', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Secretary', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Secretary', 'url'=>array('admin')),
);
?>

<h1>View Secretary #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'secretary_id',
		'doctor_id',
		'status_id',
	),
)); ?>
