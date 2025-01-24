<?php
/* @var $this ClinicController */
/* @var $model Clinic */

$this->breadcrumbs=array(
	'Clinics'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Clinic', 'url'=>array('index')),
	array('label'=>'Create Clinic', 'url'=>array('create')),
	array('label'=>'Update Clinic', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Clinic', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Clinic', 'url'=>array('admin')),
);
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h1>View Clinic #<?php echo $model->id; ?></h1>
            <div class="card">
                <div class="card-header">
                    Clinic Details
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <td><?php echo $model->id; ?></td>
                        </tr>
                        <tr>
                            <th>Clinic</th>
                            <td><?php echo $model->clinic; ?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><?php echo $model->address; ?></td>
                        </tr>
                        <tr>
                            <th>Contact Number</th>
                            <td><?php echo $model->contact_number; ?></td>
                        </tr>
                        <tr>
                            <th>Status ID</th>
                            <td><?php echo $model->status_id; ?></td>
                        </tr>
						<tr>
							<th>
							<td>
						</tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
