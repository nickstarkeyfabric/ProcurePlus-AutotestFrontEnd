<a href ="/test_groups/view">Test Manager</a>
<br>
Viewing test group: <?php echo $testgroups->group_name; ?><br>
Group ID: <?php echo $testgroups->id; ?><br>
Tags: <?php echo $testgroups->group_tags; ?><br>
Description: <?php echo $testgroups->group_desc; ?><br>

<table border = 1>
    <tr>
        <td>ID</td>
        <td>Test Name</td>
        <td>Active</td>
    </tr>
    
    <?php 
        foreach($tests as $value) {
            echo '<tr>';
            echo '<td><a href = "/tests/view/' . $value['test_id'] . '">' . $value['test_id'] . '</a></td>';
            echo '<td>' . $value['test_name'] . '</td>';
            if ($value['active'] == 1) {
                echo '<td>YES</td>';            
            }
            else {
                echo '<td>NO</td>'; 
            }
            echo '</tr></a>';
        }
    ?>
</table>