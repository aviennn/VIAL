
<?php
/* @var $this AccountController */
/* @var $model Account */
/* @var $form CActiveForm */
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'account-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'class'=>'user',
    ),
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary(array($account,$user, $consultationRecord), null, null, array('class' => 'alert alert-danger')); ?>
    <div class="form-group row">
        <div class="col-sm-4 mb-4 mb-sm-0">
            <?php echo $form->labelEx($account,'username'); ?>
            <?php echo $form->textField($account,'username',array('size'=>60,'maxlength'=>128, 'class'=>'form-control form-control-user')); ?>
        </div>
        <div class="col-sm-4 mb-4 mb-sm-0">
            <?php echo $form->labelEx($account,'password'); ?>
            <?php echo $form->passwordField($account,'password',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
        </div>

        <div class="col-sm-4 mb-4 mb-sm-0">
            <?php echo $form->labelEx($account,'retypepassword'); ?>
            <?php echo $form->passwordField($account,'retypepassword',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-4 mb-sm-0">
            <?php echo $form->labelEx($account,'email_address'); ?>
            <?php echo $form->textField($account,'email_address',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
        </div>

        <div class="col-sm-4 mb-4 mb-sm-0">
            <?php echo $form->labelEx($user,'qualifier'); ?>
            <?php echo $form->textField($user,'qualifier',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
        </div>

        <div class="col-sm-4 mb-4 mb-sm-0">
            <?php echo $form->labelEx($user,'lastname'); ?>
            <?php echo $form->textField($user,'lastname',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-4 mb-sm-0">
            <?php echo $form->labelEx($user,'firstname'); ?>
            <?php echo $form->textField($user,'firstname',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
        </div>

        <div class="col-sm-4 mb-4 mb-sm-0">
            <?php echo $form->labelEx($user,'middlename'); ?>
            <?php echo $form->textField($user,'middlename',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
        </div>

        <div class="col-sm-4 mb-4 mb-sm-0">
            <?php echo $form->labelEx($user,'dob'); ?><br />
            <?php //echo $form->textField($model,'dob',array('size'=>60,'maxlength'=>128));
                $form->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $user,       
                //'attribute' => 'DOB',
                'name' => 'User[dob]',
                'value' => ($user->dob!=''&&$user->dob!='0000-00-00')?date('F d,Y', strtotime($user->dob)):null,
                // additional javascript options for the date picker plugin
                'options'=>array(
                    'showAnim'=>'fold',
                    'dateFormat'=> 'MM dd,yy',
                    'changeMonth'=>'true',
                    'changeYear'=>'true',
                    'yearRange'=>(date('Y')-80).':'.(date('Y')-18),
                ),
                'htmlOptions'=>array(
                    'class'=>'form-control form-control-user',
                    //'tabindex'=>'15',
                ),
                ));
            ?> 
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-4 mb-sm-0">
            <?php echo $form->labelEx($user,'gender'); ?>
            <?php echo $form->DropdownList($user, 'gender', array('' => 'Please select one', '1' => 'Male', '2' => 'Female'), array('class' => 'form-control form-control-user', 'value' => '')); ?>
        </div>
        <div class="col-sm-4 mb-4 mb-sm-0">
            <?php echo $form->labelEx($user,'address'); ?>
            <?php echo $form->textField($user,'address',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
        </div>
        <div class="col-sm-4 mb-4 mb-sm-0">
            <?php echo $form->labelEx($user,'name_of_father'); ?>
            <?php echo $form->textField($user,'name_of_father',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-4 mb-sm-0">
            <?php echo $form->labelEx($user,'father_dob'); ?>
            <?php //echo $form->textField($model,'dob',array('size'=>60,'maxlength'=>128));
                $form->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $user,       
                //'attribute' => 'DOB',
                'name' => 'User[father_dob]',
                'value' => ($user->dob!=''&&$user->dob!='0000-00-00')?date('F d,Y', strtotime($user->dob)):null,
                // additional javascript options for the date picker plugin
                'options'=>array(
                    'showAnim'=>'fold',
                    'dateFormat'=> 'MM dd,yy',
                    'changeMonth'=>'true',
                    'changeYear'=>'true',
                    'yearRange'=>(date('Y')-80).':'.(date('Y')-18),
                ),
                'htmlOptions'=>array(
                    'class'=>'form-control form-control-user',
                    //'tabindex'=>'15',
                ),
                ));
            ?> 
        </div>
        <div class="col-sm-4 mb-4 mb-sm-0">
            <?php echo $form->labelEx($user,'name_of_mother'); ?>
            <?php echo $form->textField($user,'name_of_mother',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
        </div>
        <div class="col-sm-4 mb-4 mb-sm-0">
            <?php echo $form->labelEx($user,'mother_dob'); ?>
            <?php //echo $form->textField($model,'dob',array('size'=>60,'maxlength'=>128));
                $form->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $user,       
                //'attribute' => 'DOB',
                'name' => 'User[mother_dob]',
                'value' => ($user->dob!=''&&$user->dob!='0000-00-00')?date('F d,Y', strtotime($user->dob)):null,
                // additional javascript options for the date picker plugin
                'options'=>array(
                    'showAnim'=>'fold',
                    'dateFormat'=> 'MM dd,yy',
                    'changeMonth'=>'true',
                    'changeYear'=>'true',
                    'yearRange'=>(date('Y')-80).':'.(date('Y')-18),
                ),
                'htmlOptions'=>array(
                    'class'=>'form-control form-control-user',
                    //'tabindex'=>'15',
                ),
                ));
            ?> 
        </div>
        </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-4 mb-sm-0">
            <?php echo $form->labelEx($user,'school'); ?>
            <?php echo $form->textField($user,'school',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
        </div>
        <div class="col-sm-4 mb-4 mb-sm-0">
            <?php echo $form->labelEx($user,'mother_contact_number'); ?>
            <?php echo $form->textField($user,'mother_contact_number',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
        </div>
        <div class="col-sm-4 mb-4 mb-sm-0">
            <?php echo $form->labelEx($user,'father_contact_number'); ?>
            <?php echo $form->textField($user,'father_contact_number',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
        </div>
        </div>

    <br>
    <p> Add Consultation </p>

<div class="form-group row">
    <div class="col-sm-4 mb-4 mb-sm-0">
        <?php echo $form->labelEx($consultationRecord,'subjective'); ?>
        <?php echo $form->textArea($consultationRecord,'subjective',array('rows'=>10, 'cols'=>50, 'class'=>'form-control form-control-user-2')); ?>
        <?php echo $form->error($consultationRecord,'subjective'); ?>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-4 mb-4 mb-sm-0">
        <?php echo $form->labelEx($consultationRecord,'objective'); ?>
        <?php echo $form->textArea($consultationRecord,'objective',array('rows'=>10, 'cols'=>50, 'class'=>'form-control form-control-user-2')); ?>
        <?php echo $form->error($consultationRecord,'objective'); ?>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-4 mb-4 mb-sm-0">
        <?php echo $form->labelEx($consultationRecord,'assessment'); ?>
        <?php echo $form->textArea($consultationRecord,'assessment',array('rows'=>10, 'cols'=>50, 'class'=>'form-control form-control-user-2')); ?>
        <?php echo $form->error($consultationRecord,'assessment'); ?>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-4 mb-4 mb-sm-0">
        <?php echo $form->labelEx($consultationRecord,'plan'); ?>
        <?php echo $form->textArea($consultationRecord,'plan',array('rows'=>10, 'cols'=>50, 'class'=>'form-control form-control-user-2')); ?>
        <?php echo $form->error($consultationRecord,'plan'); ?>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-4 mb-4 mb-sm-0">
        <?php echo $form->labelEx($consultationRecord,'notes'); ?>
        <?php echo $form->textArea($consultationRecord,'notes',array('rows'=>10, 'cols'=>50, 'class'=>'form-control form-control-user-2')); ?>
        <?php echo $form->error($consultationRecord,'notes'); ?>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-4 mb-4 mb-sm-0">
        <input type="checkbox" id="myCheckbox" name="myCheckbox" onclick="toggleForm()">
        <label for="myCheckbox">Check me</label>
    </div>
</div>

<div id="dynamicFormContainer" style="display:none;"></div>

    <div class="form-group row">
        <div class="col-sm-12" style="text-align:right">
            <?php echo CHtml::link('<span class="icon text-white-50"><i class="fas fa-user-times"></i></span><span class="text">Cancel</span>', $this->createAbsoluteUrl('account/listPatient'), array('class'=>'btn btn-danger btn-icon-split', 'onclick'=>'return confirm("Are you sure you want to cancel creating an account?")')); ?>
            <?php echo CHtml::link('<span class="icon text-white-50"><i class="fas fa-user-check"></i></span><span class="text">Save</span>', 'javascript:document.getElementById("account-form").submit();', array('class'=>'btn btn-success btn-icon-split')); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
    function toggleForm() {
        var checkbox = document.getElementById("myCheckbox");
        var dynamicFormContainer = document.getElementById("dynamicFormContainer");

        if (checkbox.checked) {
            // Perform AJAX request to fetch and load the form
            $.ajax({
				url: '<?php echo $this->createUrl("consultationRecord/addFormPrescription"); ?>',
				type: 'POST',
				data: {
					// Your data here
					'<?php echo Yii::app()->request->csrfTokenName; ?>': '<?php echo Yii::app()->request->csrfToken; ?>'
				},
				success: function (data) {
					console.log('AJAX Success!');
					console.log(data);

					dynamicFormContainer.innerHTML = data;
					dynamicFormContainer.style.display = 'block';
				},
				error: function (xhr, ajaxOptions, thrownError) {
					console.error(xhr.responseText);
					console.error(thrownError);
				}
			});
        } else {
            // Hide the form if checkbox is unchecked
            dynamicFormContainer.innerHTML = '';
            dynamicFormContainer.style.display = 'none';
        }
    }
</script>