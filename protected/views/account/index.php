<?php
/* @var $this AccountController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Accounts',
);

$this->menu=array(
	array('label'=>'Create Account', 'url'=>array('create'))
);
?>

<h1>Accounts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
