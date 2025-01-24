<?php
/* @var $this ClinicController */
/* @var $model Clinic */

$this->breadcrumbs=array(
	'Clinics'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'View Created Clinic Data', 'url'=>array('index'))
);
?>

<h1>Create Clinic</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<div class = "row">
<div class="col-xl-12 col-lg-12">
	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	        <h6 class="m-0 font-weight-bold text-primary">List of Clinics</h6>
	    </div>
	    <div class="card-body">
	    	 <div class="table-responsive">
	    	 	<?php if(Yii::app()->user->hasFlash('success')):?>
			    <div class="border-bottom-success ">
			        <?php echo Yii::app()->user->getFlash('success'); ?>
			    </div>
			    <?php endif; ?>
			    <?php if(Yii::app()->user->hasFlash('error')):?>
			        <div class="border-bottom-danger ">
			            <?php echo Yii::app()->user->getFlash('error'); ?>
			        </div>
			    <?php endif; ?>
	    	 	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	    	 		<thead>
	                    <tr>
							<th>Clinic</th>
							<th>Address</th>
							<th>Contact No.</th>
							<th>View</th>
							<th>Edit</th>
							<th>Delete</th>
	                    </tr>
	                </thead>
	                <tbody>
						<?php 
							foreach($listOfClinic as $modelValue)
							{
						?>
								<tr>
									<td><?php echo $modelValue->clinic; ?></td>
									<td><?php echo $modelValue->address; ?></td>
									<td><?php echo $modelValue->contact_number; ?></td>
									<?php 
									echo "<td>".CHtml::link('<i class="fas fa-info-circle"></i>', $this->createAbsoluteUrl('clinic/view/'.$modelValue->id), array('class'=>'btn btn-info btn-circle btn-sm'))."</td>";
		                            echo "<td>".CHtml::link('<i class="fas fa-edit"></i>', $this->createAbsoluteUrl('clinic/updateClinic/'.$modelValue->id),array('class'=>'btn btn-success btn-circle btn-sm'))."</td>";
		                            echo "<td>".CHtml::link('<i class="fas fa-trash"></i>', $this->createAbsoluteUrl('clinic/deleteClinic/'.$modelValue->id),array('class'=>'btn btn-danger btn-circle btn-sm', 'onclick'=>'return confirm("Are you sure you want to delete this account? Deleting this account will delete all data associated with it including unpaid obligations.")'))."</td>";
		                            ?>
								</tr>
						<?php		
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
