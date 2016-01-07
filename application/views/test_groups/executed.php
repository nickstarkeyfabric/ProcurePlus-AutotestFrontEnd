<div class="row">
    <div class="col-xs-12">
        <div class="page-header">
            <h1>Test History <small>Executed Tests</small></h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <h2>Test Cycle <?php echo $test_cycle->test_cycle_id; ?></h2>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Information</h3>
            </div>
            <div class="panel-body">

                <dl class="dl-horizontal">
                    <dt>Test Group:</dt>
                    <dd><?php echo $testgroup->group_name; ?></dd>
                    <dt>Started:</dt>
                    <dd><?php echo $test_cycle->date_start; ?> / <?php echo $test_cycle->time_start; ?></dd>
                    <dt>Duration:</dt>
                    <dd><?php echo timespan(strtotime($test_cycle->time_finish), strtotime($test_cycle->time_start)); ?></dd>
                </dl>
            </div>
        </div>

        <h3>Tests</h3>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Test Run Id</th>
                    <th>Test Name</th>
                    <th>Test Cases</th>
                    <th>Pass</th>
                    <th>Fail</th>
                    <th>Assertions</th>
                    <th>Time</th>
                    <th>Results</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($run_tests as $test): ?>
                <tr class="<?php echo ($test['fails'] == 0 ? 'bg-success' : 'bg-danger'); ?>">
                    <td><?php echo $test['test_run_id']; ?></td>
                    <td><?php echo $test['test_name']; ?></td>
                    <td><span class="label label-default"><?php echo $test['test_cases']; ?></span></td>
                    <td><span class="label label-success"><?php echo $test['passes']; ?></span></td>
                    <td><span class="label label-danger"><?php echo $test['fails']; ?></span></td>
                    <td><span class="label label-default"><?php echo $test['asserts']; ?></span></td>
                    <td><?php echo timespan(strtotime($test['time_finish']), strtotime($test['time_start'])); ?></td>
                    <td><a href="<?php echo $test['file_location']; ?>" class="btn btn-primary" role="button">Download</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
<?php //var_dump($run_tests); ?>
