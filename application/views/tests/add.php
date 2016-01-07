<div class="row">
	<div class="col-xs-12">
		<div class="page-header">
			<h1>Test Manager <small>Create new test</small></h1>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">

		<?php echo validation_errors(); ?>

		<form action="/tests/add" class="form-horizontal" autocomplete="off" method="POST">

		<div class="form-group">
			<label for="input-name" class="col-sm-2 control-label">Name</label>
			<div class="col-sm-10">
				<?php echo form_input(array(
					'name' => 'data[name]',
					'placeholder' => 'Name',
					'class' => 'form-control',
					'id' => 'input-name',
					'value' => set_value('username')
				)); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="input-desc" class="col-sm-2 control-label">Description</label>
			<div class="col-sm-10">
				<?php echo form_input(array(
					'name' => 'data[desc]',
					'placeholder' => 'Description',
					'class' => 'form-control',
					'id' => 'input-desc',
				)); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="input-location" class="col-sm-2 control-label">Location</label>
			<div class="col-sm-10">
				<?php echo form_input(array(
					'name' => 'data[location]',
					'placeholder' => 'Location',
					'class' => 'form-control',
					'id' => 'input-location',
				)); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="input-test-group" class="col-sm-2 control-label">Test Group</label>
			<div class="col-sm-10">
				<?php echo form_dropdown('data[testgroups]', array(''=>'') + $testgroups, null, 'class="form-control" id="input-test-group"'); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="input-priority" class="col-sm-2 control-label">Priority</label>
			<div class="col-sm-10">
				<?php echo form_input(array(
					'name' => 'data[priority]',
					'placeholder' => 'Priority',
					'class' => 'form-control',
					'id' => 'input-priority',
				)); ?>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary">Add</button>
			</div>
		</div>

	</div>
</div>
