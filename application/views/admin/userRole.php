<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newUserRoleModal">
                <i class="fas fa-user-plus"></i> Add New User Role
            </button>
            <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($userRole as $ur) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $ur['role']; ?></td>
                            <td class="btn-group">
                                <a href="<?= base_url('admin/roleAccsess/') . $ur['id'] ?>" class="btn btn-warning badge"><i class="fas fa-fw fa-user-edit"></i> Edit</a>
                                <a href="<?= base_url('admin/deleteUserRole/') . $ur['id']; ?>" class="btn btn-danger badge" onclick="return confirm('ARE YOU SURE TO DELETE?')"><i class="fas fa-fw fa-user-minus"></i> Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add New User Role Modal-->
    <div class="modal fade" id="newUserRoleModal" tabindex="-1" role="dialog" aria-labelledby="newUserRoleLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newUserRoleLabel">Add New User Role</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/UserRole') ?>" method="post">
                    <div class="modal-body">
                        <input type="text" class="form-control" id="role" name="role" placeholder="User Role Name">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->