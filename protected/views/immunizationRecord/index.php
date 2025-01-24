<?php
/* @var $this ImmunizationRecordController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Immunization Records',
);

$this->menu=array(
	array('label'=>'Create Immunization Record', 'url'=>array('create'))
);
?>

<h1>Immunization Records</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?><br>
