<!DOCTYPE html>
<html lang="en">

<body style="background-image: linear-gradient(to right, #00bd67, #1c47a3);">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5" style="top: 18%; border-radius: 50px;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6"><br><br><br>
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 style="color: #fff;">Welcome to VIAL!</h1><br>
                                    </div>
                                    <?php $form=$this->beginWidget('CActiveForm', array(
										'id'=>'login-form',
										'enableClientValidation'=>true,
										'clientOptions'=>array(
											'validateOnSubmit'=>true,
										),
									)); ?>
                                        <div class="form-group">
											<?php echo $form->labelEx($model,'username'); ?>
											<?php echo $form->textField($model,'username', array('class'=>"form-control form-control-user")); ?>
											<?php echo $form->error($model,'username'); ?>
                                        </div>
                                        <div class="form-group">
											<?php echo $form->labelEx($model,'password'); ?>
											<?php echo $form->passwordField($model,'password', array('class'=>"form-control form-control-user")); ?>
											<?php echo $form->error($model,'password'); ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
												<?php echo $form->checkBox($model,'rememberMe', array('class'=>"custom-control-input")); ?>
												<?php echo $form->label($model,'rememberMe', array('class'=>"custom-control-label")); ?>
												<?php echo $form->error($model,'rememberMe'); ?>
                                            </div>
                                        </div>
                                        <?php echo CHtml::submitButton('Login', array('class'=>"btn btn-primary btn-user btn-block")); ?>
                                        <br><br><br><br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php $this->endWidget(); ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>