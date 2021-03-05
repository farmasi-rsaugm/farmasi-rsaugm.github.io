<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close float-right" data-dismiss="alert" aria-label="Close">X</button>
            <?= validation_errors() ?>
        </div>
    <?php endif; ?>

    <div class="card mb-3" style="max-width: 720px;">
        <div class="row g-0">
            <div class="col-md-4 mt-auto mb-auto">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
                <div class="card-img-overlay float-right">
                    <a class="btn btn-outline-primary btn-sm float-right" data-toggle="modal" data-target="#changeImg">
                        <i class="far fa-fw fa-edit"></i>
                    </a>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card-img-overlay">
                    <button class="float-right btn btn-primary" data-toggle="modal" data-target="#editProfile">
                        <i class="fas fa-fw fa-user-edit"></i> Profile
                    </button>
                </div>

                <div class="card-body">
                    <h5 class="card-title"><strong><?= $user['name']; ?> </strong></h5>
                    <p class="card-text">
                    <table style="width: 100%;">
                        <tr>
                            <th>Username</th>
                            <td> : <?= $user['username'] ?></td>
                            <td hidden><?= $user['id'] ?></td>
                        </tr>
                        <tr>
                            <th>Full Name</th>
                            <td> : <?= $user['name'] ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td> : <?= $user['email'] ?></td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td> : <?= $role['role'] ?></td>
                        </tr>
                    </table>
                    </p>
                    <p class="card-text">
                        <small class="text-muted">Member since <?= date('d M Y', $user['date_created']) ?></small>
                    </p>

                </div>
            </div>
        </div>
    </div>
    <div class="card" style="max-width: 720px;">
        <a class="btn btn-danger" href="<?= base_url('user/changePassword') ?>" onclick="return confirm('You are about to change password!')">
            <i class="fas fa-fw fa-key"></i></i> Change Password
        </a>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="modal fade  " id="changeImg" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="changeImgLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content mx-auto">
            <div class="modal-header">
                <h5 class="modal-title" id="changeImgLabel">Change Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" id="imgPreview" class="card-img img-thumbnail " style="max-width: 100%;">

                <?= form_open_multipart('user/editPP'); ?>
                <input type="text" id="id" name="id" value="<?= $user['id']; ?>" readonly style="display: none;">
                <div class="form-input mt-3 mb-3 text-center">
                    <input type="file" id="fileImg" name="fileImg" accept="image/*" onchange="showPreview(event);">
                </div>

                <div class="modal-footer">
                    <a href="<?= base_url('user'); ?>" type="button" class="btn btn-secondary">Close</a>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to edit photo profile?')">Upload</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade  " id="editProfile" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content mx-auto">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('user/editProfile') ?>" method="post">
                    <input type="text" id="id" name="id" value="<?= $user['id']; ?>" readonly style="display: none;">
                    <div class="form-group row">
                        <label for="username" class="col-sm-4 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Full Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="<?= base_url('user'); ?>" type="button" class="btn btn-secondary">Close</a>
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to edit profile? If you change your username, you will be SIGNED OUT')">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>