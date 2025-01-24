<?php
/* @var $this PrescriptionController */
/* @var $model Prescription */

$this->breadcrumbs=array(
	'Prescriptions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Prescription', 'url'=>array('index')),
	array('label'=>'Create Prescription', 'url'=>array('create')),
	array('label'=>'View Prescription', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Prescription', 'url'=>array('admin')),
);
?>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="m-0 font-weight-bold text-primary">Update Prescription <?php echo $model->id; ?></h1>
            </div>
            <div class="card-body">
				<?php $this->renderPartial('_form', array('model'=>$model, 'patients' => $patients, 'doctors' => $doctors)); ?>
            </div>
        </div>
    </div>
</div>