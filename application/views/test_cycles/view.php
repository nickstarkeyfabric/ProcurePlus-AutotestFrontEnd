<?php
$totals = getTestCycleTestStats($test_group_statistics);
?>
<div class="row">
    <div class="col-xs-12">
        <div class="page-header">
            <h1>Test History <small>Test Cycle <?php echo $id; ?></small></h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Information</h3>
            </div>
            <div class="panel-body">

                <dl class="dl-horizontal">
                    <dt>Tags:</dt>
                    <dd><?php echo $test_group_statistics[0]['test_cycle_tags']; ?></dd>
                    <dt>Date/Time start:</dt>
                    <dd><?php echo $test_group_statistics[0]['date_start'] . ' ' . $test_group_statistics[0]['time_start']; ?></dd>
                    <dt>Time Taken:</dt>
                    <dd><?php echo timespan(strtotime($test_group_statistics[0]['time_finish']), strtotime($test_group_statistics[0]['time_start'])); ?></dd>
                    <dt>Breakdown:</dt>
                    <dd>Passes: <span class="label label-success"><?php echo $totals['passes']; ?></span> Fails: <span class="label label-danger"><?php echo $totals['fails']; ?></span></dd>
                </dl>

            </div>
        </div>

        <h3>Test Groups</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Tests</th>
                    <th>Pass</th>
                    <th>Fail</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($test_group_statistics as $value): ?>
                <tr class="<?php echo ($value['fails'] == 0 ? 'bg-success' : 'bg-danger'); ?>">
                    <td><?php echo $value['id']; ?></td>
                    <td><?php echo $value['group_name']; ?></td>
                    <td><span class="label label-default"><?php echo ($value['passes'] + $value['fails']); ?></span></td>
                    <td><span class="label label-success"><?php echo $value['passes']; ?></span></td>
                    <td><span class="label label-danger"><?php echo $value['fails']; ?></span></td>
                    <td><a href="/test_groups/executed/<?php echo $id; ?>/<?php echo $value['id']; ?>" class="btn btn-primary" role="button">View</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
