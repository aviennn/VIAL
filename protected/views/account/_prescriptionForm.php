<div class="form-group row">
	<div class="col-sm-4 mb-4 mb-sm-0">
		<?php echo $form->labelEx($prescription,'prescription'); ?>
		<?php echo $form->textArea($prescription,'prescription',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($prescription,'prescription'); ?>
	</div>
</div>