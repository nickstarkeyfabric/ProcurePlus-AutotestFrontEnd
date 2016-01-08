<div class="row">
    <div class="col-xs-12">
        <div class="page-header">
            <h1>Test Manager <small>Viewing All Test Groups</small></h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">

        <p><ul class="nav nav-pills">
            <li role="presentation"><a href="/tests/add">Add New Test</a></li>
            <li role="presentation"><a href="/test_groups/add">Add New Test Group</a></li>
        </ul></p>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Test Group ID</th>
                    <th>Group Name</th>
                    <th>Tags</th>
                    <th>Active</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($testgroups as $value): ?>
                <tr>
                    <td><?php echo $value['id']; ?></td>
                    <td><?php echo $value['group_name']; ?></td>
                    <td><?php echo $value['group_tags']; ?></td>
                    <td><?php echo ($value['active'] == 1 ? '<button data-test-group-id="'.$value['id'].'" class="active-toggle btn btn-success btn-block">YES</button>' : '<button data-test-group-id="'.$value['id'].'" class="active-toggle btn btn-danger btn-block">NO</button>'); ?></td>
                    <td>
                        <a href="/test_groups/view/<?php echo $value['id']; ?>" class="btn btn-primary" role="button">View</a>
                        <a href="/test_groups/edit/<?php echo $value['id']; ?>" class="btn btn-primary" role="button">Edit</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
