<html>
<head>
<style>
#search {
	background-color: lightyellow;
	outline: medium none;
	padding: 8px;
	width: 300px;
	border-radius: 2px;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
	border: 2px solid orange;
}

ul {
	width: 300px;
	margin: 0px;
	padding-left: 0px;
}

ul li {
	list-style: none;
	background-color: lightgray;
	margin: 1px;
	padding: 1px;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
}
</style>
<script type="text/javascript" language="javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.js"></script>
<script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/json2.js"></script>
<script>
	$(document).ready(function(){
	  $("#search").keyup(function(){
		if($("#search").val().length>3){
		$.ajax({
			type: "post",
			url: "http://localhost/index.php/employee",
			cache: false,				
			data:'search='+$("#search").val(),
			success: function(response){
				$('#finalResult').html("");
				var obj = JSON.parse(response);
				if(obj.length>0){
					try{
						var items=[]; 	
						$.each(obj, function(i,val){											
						    items.push($('<li/>').text(val.FIRST_NAME + " " + val.LAST_NAME));
						});	
						$('#finalResult').append.apply($('#finalResult'), items);
					}catch(e) {		
						alert('Exception while request..');
					}		
				}else{
					$('#finalResult').html($('<li/>').text("No Data Found"));		
				}		
				
			},
			error: function(){						
				alert('Error while request..');
			}
		});
		}
		return false;
	  });
	});
</script>
</head>
<body>
<div id="container">
<input type="text" name="search" id="search" />
<ul id="finalResult"></ul>
</div>
<?php $this->load->helper('array'); ?>
<h1>History</h1>
<a href="/">History</a>
<a href="/test_groups/add">Test Manager</a><br>
<h2>Most Recent:</h2>
Date/Time start:
<?php echo $most_recent_statistics[0]['date_start']; echo ' ' . $most_recent_statistics[0]['time_start'] ?>
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
            echo '<td><a href = "/test_cycles/extended/' . $most_recent_statistics[0]['test_cycle'] . '">' . $most_recent_statistics[0]['test_cycle'] . '</a></td>';
            echo '<td>' . $most_recent_statistics[0]['test_cycle_tags'] . '</td>';
            echo '<td>' . (intval($most_recent_statistics[0]['passes']) + intval($most_recent_statistics[0]['fails'])) . '</td>';
            echo '<td>' . $most_recent_statistics[0]['passes'] . '</td>';
            echo '<td>' . $most_recent_statistics[0]['fails'] . '</td>';
            echo '<td>' . $most_recent_statistics[0][0]. '</td>';
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
    for ($i = 0; $i < count($statistics); $i++) {
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
</body>
</html>