<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="card" style="max-width: 540px;">
        <div class="container-fluid">
            <form action="<?= base_url('user/changePassword') ?>" method="post" style="margin-top: 3% ;">
                <div class="form-group">
                    <label for="currentPassword">Current Password</label>
                    <input type="password" class="form-control" id="currentPassword" name="currentPassword">
                    <?= form_error('currentPassword', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="newPassword1">New Password</label>
                    <input type="password" class="form-control" id="newPassword1" name="newPassword1">
                    <?= form_error('newPassword1', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="newPassword2">Confirm New Password</label>
                    <input type="password" class="form-control" id="newPassword2" name="newPassword2">
                    <?= form_error('newPassword2', '<small class="text-danger ">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to change PASSWORD?')">Change</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->