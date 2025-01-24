<?php
/* @var $this ImmunizationRecordController */
/* @var $model ImmunizationRecord */

$this->breadcrumbs=array(
	'Immunization Records'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Create Immunization Record', 'url'=>array('index'))
);
?>

<div class = "row">
	<div class="col-xl-8 col-lg-8">
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Create Immunization Record</h6>
			</div>
			<div class="card-body">
				<?php $this->renderPartial('_form', array('model'=>$model, 'patients' => $patients, 'immunizations' => $immunizations)); ?>
			</div>
		</div>
	</div>
</div>