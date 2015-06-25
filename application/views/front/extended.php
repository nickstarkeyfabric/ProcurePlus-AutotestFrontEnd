<a href ="/">History</a>
<a href="/test_groups/add">Test Manager</a><br>
<br>
<h1>Test Cycle <?php echo $id; ?></h1>
<h2><?php echo $test_group_statistics[0]['test_cycle_tags']; ?></h2>
Date/Time start: <?php echo $test_group_statistics[0]['date_start']; echo ' '; 
echo $test_group_statistics[0]['time_start']; ?>
<h2>Test Groups</h2>
<table border = 1>
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Test</td>
        <td>Pass</td>
        <td>Fail</td>
    </tr>
    
    <?php 
        foreach($test_group_statistics as $value) {
            echo '<tr>';
            echo '<td><a href = "/tests/view/' . $value['id'] . '">' . $value['id'] . '</a></td>';
            echo '<td>' . $value['group_name'] . '</td>';
            echo '<td>' . ($value['passes'] + $value['fails']) . '</td>';
            echo '<td>' . $value['passes'] . '</td>';
            echo '<td>' . $value['fails'] . '</td>';
            echo '</tr>';
        }
    ?>
</table>