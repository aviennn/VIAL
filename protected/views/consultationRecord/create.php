<?php
/* @var $this ConsultationRecordController */
/* @var $model ConsultationRecord */

$this->breadcrumbs=array(
	'Consultation Records'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'View Consultation Record Data', 'url'=>array('index'))
);
?>

<div class = "row">
	<div class="col-xl-8 col-lg-8">
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Create Consultation Record</h6>
			</div>
			<div class="card-body">
				<?php $this->renderPartial('_form', array('model' => $model, 'patients' => $patients, 'doctors' => $doctors, 'prescription' => $prescription)); ?>
			</div>
		</div>
	</div>
</div>