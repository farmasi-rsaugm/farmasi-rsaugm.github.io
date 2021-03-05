<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <a href="<?= base_url('admin/userRole/'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-hand-point-left"></i> BACK</a>
    <h1 class="h3 mb-4 mt-3 text-gray-800"> ROLE : <?= $userRole['role'];  ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>

            <table class="container-fluid ml-1 mt-3 table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Menu</th>
                        <th scope="col">Access</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <td> <?= $i; ?></td>
                            <td> <?= $m['menu']; ?></td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" style="margin-left: auto;" type="checkbox" id="menuAccessCheck" <?= check_access($userRole['id'], $m['id']); ?> data-userroleid="<?= $userRole['id']; ?>" data-menu="<?= $m['id']; ?>">

                                </div>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>