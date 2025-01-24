<?php
/* @var $this ClinicAssignmentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clinic Assignments',
);

$this->menu=array(
	array('label'=>'Create ClinicAssignment', 'url'=>array('create')),
	array('label'=>'Manage ClinicAssignment', 'url'=>array('admin')),
);
?>

<h1>Clinic Assignments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
