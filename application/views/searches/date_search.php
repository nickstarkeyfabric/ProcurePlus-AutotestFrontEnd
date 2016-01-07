<div class="row">
    <div class="col-xs-12">
        <div class="page-header">
            <h1>Date Search <small>results for: <?php echo $search_date; ?></small></h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <h3>Test Cycles:</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tags</th>
                    <th>Tests Run</th>
                    <th>Passes</th>
                    <th>Fails</th>
                    <th>Started</th>
                    <th>Time</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($statistics as $stat): ?>
                <tr<?php echo ($stat['mode'] == 'DEBUG' ? ' class="bg-warning"' : ''); ?>>
                    <td><?php echo $stat['test_cycle']; ?></td>
                    <td><?php echo $stat['test_cycle_tags']; ?></td>
                    <td><span class="label label-default"><?php echo (intval($stat['passes']) + intval($stat['fails'])); ?></span></td>
                    <td><span class="label label-success"><?php echo $stat['passes']; ?></span></td>
                    <td><span class="label label-danger"><?php echo $stat['fails']; ?></span></td>
                    <td>
                        <?php echo $stat['date_start']; ?><br />
                        <small><?php echo $stat['time_start']; ?></small>
                    </td>
                    <td><?php echo $stat[0]; ?></td>
                    <td><a href="/test_cycles/view/<?php echo $stat['test_cycle']; ?>" class="btn btn-primary" role="button">View</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php echo $links; ?>
