<div class="container-fluid mt-3">

    <div class="col-md-7">

        <div class="card">
            <div class="card-header">
               <h3> FORM EDIT MASTER </h3>
            </div>

            <div class="card-body">

                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $invid['id']?>">
                    <div class="form-group mb-2">
                        <label for="itemName"><h5>Nama Barang</h5></label>
                        <input type="text" class="form-control" id="itemName" name="itemName" value="<?= $invid['itemName'] ?>">
                        <small class="form-text"><?= form_error('itemName'); ?></small>
                    </div>

                    <div class="form-group mb-2">
                        <label for="itemDetail"><h5>Detail Barang</h5></label>
                        <input type="text" class="form-control" id="itemDetail" name="itemDetail" value="<?= $invid['itemDetail'] ?>">
                        <small class="form-text"><?= form_error('itemDetail'); ?></small>
                    </div>

                    <div class="form-group mb-2 row">
                        <label for="unitlg" class="col-sm-4 col-form-label"><h5>Satuan Terbesar</h5></label>
                        <div class="col-sm-8">
                            <select class="form-select" id="unitlg" name="unitlg">
                                <?php foreach ($unitlg as $ulg) :?>
                                    <?php if($ulg == $invid['unitlg']) : ?>
                                        <option value="<?= $ulg?>" selected> <?= $ulg?> </option>
                                    <?php else : ?>
                                        <option value="<?= $ulg?>"> <?= $ulg?> </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <small class="form-text"><?= form_error('unitlg'); ?></small> 
  				    </div>

                    <div class="form-group mb-2 row">
                        <label for="unitsm" class="col-sm-4 col-form-label"><h5>Satuan Terkecil</h5></label>
                        <div class="col-sm-8">
                            <select class="form-select" id="unitsm" name="unitsm">
                                <?php foreach ($unitsm as $usm) :?>
                                    <?php if($usm == $invid['unitsm']) : ?>
                                        <option value="<?= $usm?>" selected> <?= $usm?> </option>
                                    <?php else : ?>
                                        <option value="<?= $usm?>"> <?= $usm?> </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <small class="form-text"><?= form_error('unitsm'); ?></small>	   
  				    </div>

                    <div class="form-group mb-2 row">
                        <label for="qtysm" class="col-sm-4 col-form-label"><h5>Jumlah Terkecil</h5></label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="qtysm" name="qtysm" value="<?= $invid['qtysm'] ?>">
                        </div>
                        <small class="form-text"><?= form_error('qtysm'); ?></small>   
  				    </div>
                    
                    <button type="submit" name="editMaster" class="btn btn-primary float-end">Submit Master Baru</button>
                </form>
            </div>
        </div>

    </div>
</div>