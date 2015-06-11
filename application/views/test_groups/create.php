<?php $this->load->helper('form'); ?>
<h1>Create new test group</h1>
<form action="/index.php/create" autocomplete="off" method="POST">
		<fieldset>			
			<div class="input">
				<label>Name:</label>
				<?php echo form_input('data[name]'); ?>
			</div>
			<div class="input">
				<label>Tags:</label>
				<?php echo form_input('data[tags]'); ?>
			</div>
			<div class="input">
				<label>Priority:</label>
				<?php echo form_input('data[priority]'); ?>
			</div>                      
			<div class="input">
				<label>Description:</label>
				<?php echo form_input('data[desc]'); ?>
			</div>                        
			<div class="input">
				<button name="login" id="login" type="submit">Add</button>
			</div>
		</fieldset>
	</form>