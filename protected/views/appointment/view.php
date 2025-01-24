<?php
/* @var $this AppointmentController */
/* @var $model Appointment */

$this->breadcrumbs=array(
	'Appointments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Appointment', 'url'=>array('index')),
	array('label'=>'Create Appointment', 'url'=>array('create')),
	array('label'=>'Update Appointment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Appointment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Appointment', 'url'=>array('admin')),
);
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h1>View Appointment #<?php echo $model->id; ?></h1>
            <div class="card">
                <div class="card-header">
                    Appointment Details
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <td><?php echo $model->id; ?></td>
                        </tr>
                        <tr>
                            <th>Doctor Account ID</th>
                            <td><?php echo $model->doctor_account_id; ?></td>
                        </tr>
                        <tr>
                            <th>Patient Account ID</th>
                            <td><?php echo $model->patient_account_id; ?></td>
                        </tr>
                        <tr>
                            <th>Appointment Date Time</th>
                            <td><?php echo $model->appointment_date_time; ?></td>
                        </tr>
                        <tr>
                            <th>Clinic ID</th>
                            <td><?php echo $model->clinic_id; ?></td>
                        </tr>
                        <tr>
                            <th>Notes</th>
                            <td><?php echo $model->notes; ?></td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td><?php echo $model->created_at; ?></td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td><?php echo $model->updated_at; ?></td>
                        </tr>
                        <tr>
                            <th>Status ID</th>
                            <td><?php echo $model->status_id; ?></td>
                        </tr>
                        <tr>
                            <th>Appointment Date</th>
                            <td><?php echo $model->appointment_date; ?></td>
                        </tr>
                        <tr>
                            <th>Appointment Time</th>
                            <td><?php echo $model->appointment_time; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
