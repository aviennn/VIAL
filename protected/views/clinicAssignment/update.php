<?php
/* @var $this ClinicAssignmentController */
/* @var $model ClinicAssignment */

$this->breadcrumbs=array(
	'Clinic Assignments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClinicAssignment', 'url'=>array('index')),
	array('label'=>'Create ClinicAssignment', 'url'=>array('create')),
	array('label'=>'View ClinicAssignment', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClinicAssignment', 'url'=>array('admin')),
);
?>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="m-0 font-weight-bold text-primary">Update Clinic Assignment <?php echo $model->id; ?></h1>
            </div>
            <div class="card-body">
				<?php $this->renderPartial('_form', array('model'=>$model, 'doctors' => $doctors, 'clinics' => $clinics)); ?>
            </div>
        </div>
    </div>
</div>