<div class="row">
	<div class="col-xs-12">
		<div class="page-header">
			<h1>Test Manager <small>Edit test</small></h1>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">

		<?php echo validation_errors(); ?>

		<form action="/tests/edit/<?php echo $test->test_id; ?>" class="form-horizontal" autocomplete="off" method="POST">

		<?php echo form_hidden('data[test_id]', $test->test_id); ?>

		<div class="form-group">
			<label for="input-name" class="col-sm-2 control-label">Name</label>
			<div class="col-sm-10">
				<?php echo form_input(array(
					'name' => 'data[name]',
					'placeholder' => 'Name',
					'class' => 'form-control',
					'id' => 'input-name',
					'value' => set_value('name', $test->test_name)
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
					'value' => set_value('name', $test->test_description)
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
					'value' => set_value('name', $test->file_location)
				)); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="input-test-group" class="col-sm-2 control-label">Test Group</label>
			<div class="col-sm-10">
				<?php echo form_dropdown('data[testgroups]', array(''=>'') + $testgroups, $test->test_group_id, 'class="form-control" id="input-test-group"'); ?>
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
					'value' => set_value('name', $test->priority)
				)); ?>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</div>

	</div>
</div>
