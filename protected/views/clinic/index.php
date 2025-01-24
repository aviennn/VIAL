<?php
/* @var $this ClinicController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clinics',
);

$this->menu=array(
	array('label'=>'Create Clinic', 'url'=>array('create'))
);
?>

<h1>Clinics</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?><br>
