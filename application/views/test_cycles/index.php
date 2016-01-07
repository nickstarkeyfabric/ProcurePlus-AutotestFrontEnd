<?php $this->load->helper('array'); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="page-header">
            <h1>Test History</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 text-right">
        <form action="/searches/date_search" class="form-inline" autocomplete="off" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail2">Find Cycles by Date</label>
                <input name="search_date" class="form-control datepicker" id="exampleInputEmail2" placeholder="Date">
            </div>
            <button type="submit" class="btn btn-primary">Go</button>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <h3>Most Recent Cycle:</h3>
        <!-- <p>Date/Time start: <?php echo $most_recent_statistics[0]['date_start']; echo ' ' . $most_recent_statistics[0]['time_start'] ?></p> -->
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
                <tr<?php echo ($most_recent_statistics[0]['mode'] == 'DEBUG' ? ' class="bg-warning"' : ''); ?>>
                    <td><?php echo $most_recent_statistics[0]['test_cycle']; ?></td>
                    <td><?php echo $most_recent_statistics[0]['test_cycle_tags']; ?></td>
                    <td><span class="label label-default"><?php echo (intval($most_recent_statistics[0]['passes']) + intval($most_recent_statistics[0]['fails'])); ?></span></td>
                    <td><span class="label label-success"><?php echo $most_recent_statistics[0]['passes']; ?></span></td>
                    <td><span class="label label-danger"><?php echo $most_recent_statistics[0]['fails']; ?></span></td>
                    <td>
                        <?php echo $most_recent_statistics[0]['date_start']; ?><br />
                        <small><?php echo $most_recent_statistics[0]['time_start']; ?></small>
                    </td>
                    <td><?php echo $most_recent_statistics[0][0]; ?></td>
                    <td><a href="/test_cycles/view/<?php echo $most_recent_statistics[0]['test_cycle']; ?>" class="btn btn-primary" role="button">View</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <h3>Past Cycles:</h3>
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
