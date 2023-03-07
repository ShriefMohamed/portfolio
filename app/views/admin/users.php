<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= HOST_NAME ?>admin">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Users</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="display: inline">Manage All Users</h5>
                    <a href="<?= HOST_NAME ?>admin/user_add" class="btn btn-info" style="float: right">Create User</a>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Created</th>
                                <th>Last Update</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($data) && $data !== false) : ?>
                            <?php foreach ($data as $item) : ?>
                            <tr>
                                <td><?= $item->id ?></td>
                                <td><?= $item->firstName . ' ' . $item->lastName ?></td>
                                <td><?= $item->username ?></td>
                                <td><?= $item->email ?></td>
                                <td><?= $item->phone ?></td>
                                <td><?= ucfirst($item->role) ?></td>
                                <td><?= \Framework\lib\Helper::ConvertDateFormat($item->created, false) ?></td>
                                <td><?= \Framework\lib\Helper::ConvertDateFormat($item->lastUpdate, true) ?></td>

                                <td><a href="<?= HOST_NAME . 'admin/user_edit/' . $item->id ?>"><i class="fa fa-edit"></i></a></td>
                                <td><a href="<?= HOST_NAME . 'admin/user_delete/' . $item->id ?>"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<link href="<?= ASSETS_DIR ?>libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<script src="<?= ASSETS_DIR ?>extra-libs/DataTables/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            "aaSorting": [],
            "aoColumns":[
                {"bSortable": false},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": false},
                {"bSortable": false}
            ]
        });
    });
</script>