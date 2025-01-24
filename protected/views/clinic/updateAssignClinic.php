<?php
/* @var $this ClinicController */
/* @var $model ClinicAssignment */
/* @var $doctors array */
/* @var $clinics array */

$this->breadcrumbs=array(
	'Clinic Assignments'=>array('listClinicAssignment'),
	'Update Clinic Assignment',
);

$this->menu=array(
	array('label'=>'List Clinic Assignments', 'url'=>array('listClinicAssignment')),
	array('label'=>'Manage Clinic Assignments', 'url'=>array('admin')),
);
?>

<h1>Update Clinic Assignment <?php echo $model->id; ?></h1>

<?php $this->renderPartial('assignClinic', array('model'=>$model, 'doctors'=>$doctors, 'clinics'=>$clinics)); ?>
