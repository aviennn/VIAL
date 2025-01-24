<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'clinic-assignment-form',
    'enableAjaxValidation' => false,
    'action' => array('account/assignSecretary'),
));
?>

<div class="row">
    <div class="col-xl-8 col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Assign Secretary</h6>
            </div>
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <div class="form-group row">
                    <div class="col-sm-4 mb-4 mb-sm-0">
                        <?php echo $form->labelEx($model, 'secretary_id'); ?>
                        <?php echo $form->dropDownList($model, 'secretary_id', $secretaries, array('empty' => 'Select Secretary', 'class' => 'form-control form-control-user')); ?>
                        <?php echo $form->error($model, 'secretary_id'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4 mb-4 mb-sm-0">
                        <?php echo $form->labelEx($model, 'doctor_id'); ?>
                        <?php echo $form->dropDownList($model, 'doctor_id', $doctors, array('empty' => 'Select Doctor', 'class' => 'form-control form-control-user')); ?>
                        <?php echo $form->error($model, 'doctor_id'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4 mb-4 mb-sm-0">
                        <?php echo $form->labelEx($model, 'status_id'); ?>
                        <?php
                        echo $form->dropDownList(
                            $model,
                            'status_id',
                            array(
                                '1' => 'Active',
                                '2' => 'Inactive',
                            ),
                            array('empty' => 'Select Status', 'class' => 'form-control form-control-user')
                        );
                        ?>
                        <?php echo $form->error($model, 'status_id'); ?>
                    </div>
                </div>

                <div class="row buttons">
                    <div class="col-sm-4 mb-4 mb-sm-0">
                    <?php echo CHtml::submitButton('Save', array('class' => 'assign-clinic-button')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endWidget(); ?>
