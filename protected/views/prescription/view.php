<?php
/* @var $this PrescriptionController */
/* @var $model Prescription */

$this->breadcrumbs=array(
	'Prescriptions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Prescription', 'url'=>array('index')),
	array('label'=>'Create Prescription', 'url'=>array('create')),
	array('label'=>'Update Prescription', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Prescription', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Prescription', 'url'=>array('admin')),
);
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h1>View Prescription #<?php echo $model->id; ?></h1>
            <div class="card">
                <div class="card-header">
                    Prescription Details
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
                            <th>Consultation ID</th>
                            <td><?php echo $model->consultation_id; ?></td>
                        </tr>
                        <tr>
                            <th>Prescription</th>
                            <td><?php echo $model->prescription; ?></td>
                        </tr>
                        <tr>
                            <th>Date of Prescription</th>
                            <td><?php echo $model->date_of_prescription; ?></td>
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
