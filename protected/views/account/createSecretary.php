<div class = "row">
	<div class="col-xl-8 col-lg-8">
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		        <h6 class="m-0 font-weight-bold text-primary">Create Secretary</h6>
		    </div>
		    <div class="card-body">
			<?php echo $this->renderPartial('_formSecretary', array('account' => $account, 'user' => $user)); ?>
			</div>
		</div>
	</div>
</div>
