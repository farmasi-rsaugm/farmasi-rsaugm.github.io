<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3 addNewMenuModal" data-toggle="modal" data-target="#menuModal">
                Add New Menu
            </button>

            <?= form_error('menu', '<small class="text-danger pl-3">', '</small>'); ?>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $m['menu']; ?></td>
                            <td>
                                <button class="btn btn-info badge" data-toggle="collapse" data-target="#editmenu<?= $m['id']; ?>" aria-expanded="false">
                                    More
                                </button>
                            </td>
                        </tr>
                        <tr id="editmenu<?= $m['id']; ?>" class="collapse">
                            <td colspan="3">
                                <div>
                                    <table width="100%">
                                        <tr class="text-center bg-primary text-white">
                                            <th colspan="3"> Menu Name : <h5><?= $m['menu'] ?> </h5>
                                            </th>
                                        </tr>

                                        <tr class="text-center bg-info">
                                            <td>
                                                <button id="editMenuBut" class="btn btn-warning editMenuModal" aria-expanded="false" data-menuid="<?= $m['id'] ?>" data-menuname="<?= $m['menu'] ?>" data-toggle="modal" data-target="#menuModal">
                                                    EDIT
                                                </button>
                                            </td>

                                            <td id=" deletemenuModalBut">
                                                <a class="btn btn-danger" href="<?= base_url(); ?>menu/deleteMenu/<?= $m['id']; ?>" aria-expanded="false" onclick="return confirm('ARE YOU SURE TO DELETE?')">DELETE</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>

                            <!-- <td colspan="2">
                                Menu Name : <input type="text" value="<?= $m['menu'] ?>" disabled>
                            </td>
                            <td class="btn-group">
                                <a href="<?= base_url(); ?>menu/deleteMenu/<?= $m['id']; ?>" class="btn btn-primary badge" onclick="return confirm('ARE YOU SURE TO DELETE?')">Submit</a>
                                <a href="<?= base_url(); ?>menu/deleteMenu/<?= $m['id']; ?>" class="btn btn-danger badge" onclick="return confirm('ARE YOU SURE TO DELETE?')">Delete</a>
                            </td> -->
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add New Menu Modal-->
    <div class="modal fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel"></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input class="menuid" name="id" id="id" hidden>
                        <input type="text" class="form-control menuname" id="menu" name="menu" placeholder="Menu Name">
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('menu') ?>"><button type="button" class="btn btn-secondary">Close</button></a>
                    <button type="submit" class="btn btn-primary"></button>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->