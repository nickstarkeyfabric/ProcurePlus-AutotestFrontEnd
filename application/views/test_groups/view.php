<div class="row">
    <div class="col-xs-12">
        <div class="page-header">
            <h1>Test Manager <small>Viewing Test Group</small></h1>
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
                    <dt>Test Group:</dt>
                    <dd><?php echo $testgroups->group_name; ?></dd>
                    <dt>Group ID:</dt>
                    <dd><?php echo $testgroups->id; ?></dd>
                    <dt>Tags:</dt>
                    <dd><?php echo $testgroups->group_tags; ?></dd>
                    <dt>Description:</dt>
                    <dd><?php echo $testgroups->group_desc; ?></dd>
                </dl>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Test Name</th>
                    <th>Active</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tests as $value): ?>
                <tr>
                    <td><?php echo $value['test_id']; ?></td>
                    <td><?php echo $value['test_name']; ?></td>
                    <td><?php echo ($value['active'] == 1 ? '<span class="label label-success">YES</span>' : '<span class="label label-danger">NO</span>'); ?></td>
                    <td>
                        <a href="/tests/view/<?php echo $value['test_id']; ?>" class="btn btn-primary" role="button">View</a>
                        <a href="/tests/edit/<?php echo $value['test_id']; ?>" class="btn btn-primary" role="button">Edit</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
