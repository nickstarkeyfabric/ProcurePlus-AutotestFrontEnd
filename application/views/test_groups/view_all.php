<?php $this->load->helper('form'); ?>
<h1>Test Manager</h1>
<a href="/tests/add">Add New Test</a>
<a href="/test_groups/add">Add New Test Group</a>
<table border = 1>
    <tr>
        <td>Test Group ID</td>
        <td>Group Name</td>
        <td>Tags</td>
        <td>Active</td>
    </tr>
    
    <?php 
        foreach($testgroups as $value) {
            echo '<tr>';
            echo '<td><a href = "/test_groups/view/' . $value['id'] . '">' . $value['id'] . '</a></td>';
            echo '<td>' . $value['group_name'] . '</td>';
            echo '<td>' . $value['group_tags'] . '</td>';
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
<!--
<form action="/test_groups/add" autocomplete="off" method="POST">

</form>
-->