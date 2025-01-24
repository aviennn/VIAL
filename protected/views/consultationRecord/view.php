<?php
/* @var $this ConsultationRecordController */
/* @var $model ConsultationRecord */

$this->breadcrumbs=array(
	'Consultation Records'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ConsultationRecord', 'url'=>array('index')),
	array('label'=>'Create ConsultationRecord', 'url'=>array('create')),
	array('label'=>'Update ConsultationRecord', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConsultationRecord', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConsultationRecord', 'url'=>array('admin')),
);
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h1>View ConsultationRecord #<?php echo $model->id; ?></h1>
            <div class="card">
                <div class="card-header">
                    Consultation Record Details
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <td><?php echo $model->id; ?></td>
                        </tr>
                        <tr>
                            <th>Patient Account ID</th>
                            <td><?php echo $model->patient_account_id; ?></td>
                        </tr>
                        <tr>
                            <th>Doctor Account ID</th>
                            <td><?php echo $model->doctor_account_id; ?></td>
                        </tr>
                        <tr>
                            <th>Subjective</th>
                            <td><?php echo $model->subjective; ?></td>
                        </tr>
                        <tr>
                            <th>Objective</th>
                            <td><?php echo $model->objective; ?></td>
                        </tr>
                        <tr>
                            <th>Assessment</th>
                            <td><?php echo $model->assessment; ?></td>
                        </tr>
                        <tr>
                            <th>Plan</th>
                            <td><?php echo $model->plan; ?></td>
                        </tr>
                        <tr>
                            <th>Notes</th>
                            <td><?php echo $model->notes; ?></td>
                        </tr>
                        <tr>
                            <th>Date of Consultation</th>
                            <td><?php echo $model->date_of_consultation; ?></td>
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

