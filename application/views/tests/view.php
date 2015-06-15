<a href ="/test_groups/view">Test Manager</a>
<br>
Viewing test: <?php echo $test->test_name; ?><br>

Id: <?php echo $test->test_id; ?><br>
Description: <?php echo $test->test_description; ?><br>

<?php echo readfile($test->file_location); ?>
