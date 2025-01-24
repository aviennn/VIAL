<?php
/* @var $this ClinicAssignmentController */
/* @var $model ClinicAssignment */

$this->breadcrumbs=array(
	'Clinic Assignments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClinicAssignment', 'url'=>array('index')),
	array('label'=>'Manage ClinicAssignment', 'url'=>array('admin')),
);
?>

<h1>Create ClinicAssignment</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>