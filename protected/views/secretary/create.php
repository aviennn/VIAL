<?php
/* @var $this SecretaryController */
/* @var $model Secretary */

$this->breadcrumbs=array(
	'Secretaries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Secretary', 'url'=>array('index')),
	array('label'=>'Manage Secretary', 'url'=>array('admin')),
);
?>

<h1>Create Secretary</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>