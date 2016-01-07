<div class="row">
	<div class="col-xs-12">
		<div class="page-header">
			<h1>Test Manager <small>Edit test group</small></h1>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">

		<?php echo validation_errors(); ?>

		<form action="/test_groups/edit/<?php echo $testgroup->id; ?>" class="form-horizontal" autocomplete="off" method="POST">

		<?php echo form_hidden('data[id]', $testgroup->id); ?>

		<div class="form-group">
			<label for="input-name" class="col-sm-2 control-label">Name</label>
			<div class="col-sm-10">
				<?php echo form_input(array(
					'name' => 'data[group_name]',
					'placeholder' => 'Name',
					'class' => 'form-control',
					'id' => 'input-name',
					'value' => set_value('name', $testgroup->group_name)
				)); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="input-tags" class="col-sm-2 control-label">Tags</label>
			<div class="col-sm-10">
				<?php echo form_input(array(
					'name' => 'data[group_tags]',
					'placeholder' => 'Tags',
					'class' => 'form-control',
					'id' => 'input-tags',
					'value' => set_value('name', $testgroup->group_tags)
				)); ?>
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
					'value' => set_value('name', $testgroup->priority)
				)); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="input-desc" class="col-sm-2 control-label">Description</label>
			<div class="col-sm-10">
				<?php echo form_input(array(
					'name' => 'data[group_desc]',
					'placeholder' => 'Description',
					'class' => 'form-control',
					'id' => 'input-desc',
					'value' => set_value('name', $testgroup->group_desc)
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
