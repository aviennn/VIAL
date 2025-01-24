<?php
/* @var $this ImmunizationRecordController */
/* @var $model ImmunizationRecord */

$this->breadcrumbs=array(
	'Immunization Records'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Immunization Record', 'url'=>array('index')),
	array('label'=>'Create Immunization Record', 'url'=>array('create')),
	array('label'=>'Update Immunization Record', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Immunization Record', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Immunization Record', 'url'=>array('admin')),
);
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h1>View Immunization Record #<?php echo $model->id; ?></h1>
            <div class="card">
                <div class="card-header">
                    Immunization Record Details
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <td><?php echo $model->id; ?></td>
                        </tr>
                        <tr>
                            <th>Account ID</th>
                            <td><?php echo $model->account_id; ?></td>
                        </tr>
                        <tr>
                            <th>Immunization ID</th>
                            <td><?php echo $model->immunization_id; ?></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><?php echo $model->date; ?></td>
                        </tr>
                        <tr>
                            <th>Remarks</th>
                            <td><?php echo $model->remarks; ?></td>
                        </tr>
                        <tr>
                            <th>Status ID</th>
                            <td><?php echo $model->status_id; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
