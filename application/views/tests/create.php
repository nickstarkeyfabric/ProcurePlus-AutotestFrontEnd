<?php $this->load->helper('form'); ?>
<h1>Create new test</h1>
<form action="/tests/create" autocomplete="off" method="POST">
		<fieldset>			
			<div class="input">
				<label>Name:</label>
				<?php echo form_input('data[name]'); ?>
			</div>
			<div class="input">
				<label>Description:</label>
				<?php echo form_input('data[desc]'); ?>
			</div>
			<div class="input">
				<label>Location:</label>
				<?php echo form_input('data[location]'); ?>
			</div>                      
			<div class="input">
				<label>Test Group Id:</label>
				<?php echo form_input('data[test_group_id]'); ?>
			</div>                        
			<div class="input">
				<label>Priority:</label>
				<?php echo form_input('data[priority]'); ?>
			</div>      
                        <div class="input">
				<button name="login" id="login" type="submit">Add</button>
			</div>
		</fieldset>
	</form>