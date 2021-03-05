<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="col-lg-4 ">
        <div class="card row mb-3" style="border: unset;background-color: unset;">
            <div class="card-body">
                <h1 class=" h3 text-grey-800"> <?= $title; ?></h1>
                <div class="card-img-overlay">
                    <a type="button" href="<?= base_url('menu/submenu') ?>" class="btn btn-primary float-right" data-dismiss="modal"><i class="fas fa-fw fa-hand-point-left"></i> Back</a>
                </div>
            </div>
        </div>

        <form action="<?= base_url('menu/changeSubMenu') ?>" method="post">
            <div class="row form-group" hidden>
                <input type="text" class="form-control" id="id" name="id" value="<?= $subMenu['id'] ?>" readonly>
            </div>
            <div class="row form-group">
                <label class="col-sm-2 form-label" for="title">Title</label>
                <input type="text" class="col-sm-10 form-control" id="title" name="title" value="<?= $subMenu['title'] ?>">
            </div>
            <div class="row form-group">
                <label class="col-sm-2 form-label" for="title">Menu</label>
                <select class="col-sm-10 form-control" id="menu_id" name="menu_id">
                    <?php foreach ($menu as $m) : ?>
                        <?php if ($subMenu['menu_id'] == $m['id']) : ?>
                            <option value="<?= $m['id'] ?>" selected><?= $m['menu'] ?></option>
                        <?php else : ?>
                            <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="row form-group">
                <label class="col-sm-2 form-label" for="title">Url</label>
                <input type="text" class="col-sm-10 form-control" id="url" name="url" value="<?= $subMenu['url'] ?>">


            </div>
            <div class="row form-group">
                <label class="col-sm-2 form-label" for="title">Icon</label>

                <input type="text" class="col-sm-9 form-control" id="iconinput" name="icon" value="<?= $subMenu['icon'] ?>">
                <span class="col-sm-1">
                    <i id="iconpreview" class="<?= $subMenu['icon'] ?>"></i>
                </span>

            </div>
            <div class="row form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                    <label class="form-check-label" for="is_active">
                        Is Active?
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-warning ">Change</button>

        </form>
        <div class="mt-3">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close float-right" data-dismiss="alert" aria-label="Close">X</button>
                    <?= validation_errors() ?>
                </div>
            <?php endif; ?>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->