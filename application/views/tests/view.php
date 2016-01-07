<div class="row">
    <div class="col-xs-12">
        <div class="page-header">
            <h1>Test Manager <small>Viewing Test</small></h1>
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
                    <dt>Id:</dt>
                    <dd><?php echo $test->test_id; ?></dd>
                    <dt>Name: </dt>
                    <dd><?php echo $test->test_name; ?></dd>
                    <dt>Description:</dt>
                    <dd><?php echo $test->test_description; ?></dd>
                    <dt>Location: </dt>
                    <dd><?php echo $test->file_location; ?></dd>
                    <dt>Test Group:</dt>
                    <dd><?php echo $test->test_group_id; ?></dd>
                    <dt>Active: </dt>
                    <dd><?php echo $test->active; ?></dd>
                    <dt>Priority:</dt>
                    <dd><?php echo $test->priority; ?></dd>
                </dl>
            </div>
        </div>
    </div>
</div>
