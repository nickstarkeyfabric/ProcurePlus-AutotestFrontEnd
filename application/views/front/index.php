<?php $this->load->helper('array'); ?>
<h1>History</h1>
<a href="/">History</a>
<a href="/test_groups/add">Test Manager</a><br>
<h2>Most Recent:</h2>
Date/Time start:
<?php echo $statistics[0]['date_start']; echo ' ' . $statistics[0]['time_start'] ?>
<table border = 1>
    <tr>
        <td>Id</td>
        <td>Tags</td>
        <td>Tests Run</td>
        <td>Passes</td>
        <td>Fails</td>
        <td>Time</td>
    </tr>
    
    <?php 
        //foreach($latest_test_cycle as $value) {
            echo '<tr>';
            echo '<td><a href = "/test_cycles/extended/' . $statistics[0]['test_cycle'] . '">' . $statistics[0]['test_cycle'] . '</a></td>';
            echo '<td>' . $statistics[0]['test_cycle_tags'] . '</td>';
            echo '<td>' . (intval($statistics[0]['passes']) + intval($statistics[0]['fails'])) . '</td>';
            echo '<td>' . $statistics[0]['passes'] . '</td>';
            echo '<td>' . $statistics[0]['fails'] . '</td>';            
            echo '<td>' . $statistics[0][0] . '</td>';
            echo '</tr>';
        //}
    ?>
    
</table>

<h2>History:</h2>
<table border = 1>
    <tr>
        <td>Id</td>
        <td>Tags</td>
        <td>Tests Run</td>
        <td>Passes</td>
        <td>Fails</td>
        <td>Time</td>
    </tr>
    <?php
    for ($i = 1; $i < count($statistics); $i++) {
            echo '<tr>';
            echo '<td><a href = "/test_cycles/extended/' . $statistics[$i]['test_cycle'] . '">' . $statistics[$i]['test_cycle'] . '</a></td>';
            echo '<td>' . $statistics[$i]['test_cycle_tags'] . '</td>';
            echo '<td>' . (intval($statistics[$i]['passes']) + intval($statistics[$i]['fails'])) . '</td>';
            echo '<td>' . $statistics[$i]['passes'] . '</td>';
            echo '<td>' . $statistics[$i]['fails'] . '</td>';
            echo '<td>' . $statistics[$i][0] . '</td>';
            echo '</tr>';     
    }
    ?>
</table>
<?php echo $links; ?>
