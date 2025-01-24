<?php
/* @var $this ImmunizationRecordController */
/* @var $model ImmunizationRecord */

$this->breadcrumbs=array(
    'Immunization Records'=>array('index'),
    $model->id=>array('view','id'=>$model->id),
    'Update',
);

$this->menu=array(
    array('label'=>'List Immunization Record', 'url'=>array('index')),
    array('label'=>'Create Immunization Record', 'url'=>array('create')),
    array('label'=>'View Immunization Record', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Manage Immunization Record', 'url'=>array('admin')),
);
?>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="m-0 font-weight-bold text-primary">Update Immunization Record <?php echo $model->id; ?></h1>
            </div>
            <div class="card-body">
                <?php $this->renderPartial('_form', array('model'=>$model, 'patients' => $patients, 'immunizations' => $immunizations)); ?>
            </div>
        </div>
    </div>
</div>
