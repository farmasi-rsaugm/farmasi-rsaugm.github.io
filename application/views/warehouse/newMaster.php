<div class="container-fluid mt-3">

    <div class="col-md-7">

        <div class="card">
            <div class="card-header">
               <h3> FORM TAMBAH MASTER BARU </h3>
            </div>

            <div class="card-body">

                <form action="" method="post">
                    <div class="form-group mb-2">
                        <label for="itemName"><h5>Nama Barang</h5></label>
                        <input type="text" class="form-control" id="itemName" name="itemName" placeholder="ex : GAS O2 1 M3">
                        <small class="form-text"><?= form_error('itemName'); ?></small>
                    </div>

                    <div class="form-group mb-2">
                        <label for="itemDetail"><h5>Detail Barang</h5></label>
                        <input type="text" class="form-control" id="itemDetail" name="itemDetail" placeholder="ex : OXYGEN CYLINDER 1 M3">
                        <small class="form-text"><?= form_error('itemDetail'); ?></small>
                    </div>

                    <div class="form-group mb-2 row">
                        <label for="unitlg" class="col-sm-4 col-form-label"><h5>Satuan Terbesar</h5></label>
                        <div class="col-sm-8">
                            <select class="form-select" id="unitlg" name="unitlg">
                                <option selected disabled hidden>ex: CYLINDER</option>
                                <option value="CYLINDER"> CYLINDER </option>
                            </select>
                        </div>
                        <small class="form-text"><?= form_error('unitlg'); ?></small> 
  				    </div>

                    <div class="form-group mb-2 row">
                        <label for="unitsm" class="col-sm-4 col-form-label"><h5>Satuan Terkecil</h5></label>
                        <div class="col-sm-8">
                            <select class="form-select" id="unitsm" name="unitsm">
                                <option selected disabled hidden>ex: KG</option>
                                <option value="KG"> KG </option>
                                <option value="M3"> M3 </option>
                            </select>
                        </div>
                        <small class="form-text"><?= form_error('unitsm'); ?></small>	   
  				    </div>

                    <div class="form-group mb-2 row">
                        <label for="qtysm" class="col-sm-4 col-form-label"><h5>Jumlah Terkecil</h5></label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="qtysm" name="qtysm" placeholder="ex : 1 ">
                        </div>
                        <small class="form-text"><?= form_error('qtysm'); ?></small>   
  				    </div>
                    
                    <button type="submit" name="addNewMaster" class="btn btn-primary float-end">Submit Master Baru</button>
                </form>
            </div>
        </div>

    </div>
</div>