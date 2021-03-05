<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="row">
		<div class="col-lg-6">
			<table class="table table-hover">
				<tr class="text-center">
					<th>ITEM NAME</th>
					<th>AMOUNT</th>
					<th>UNIT</th>
					<th>DETAIL</th>
					</th>
				</tr>
				<?php foreach ($inventory as $inv) : ?>
					<tr>
						<td style="text-align:left; padding-left:1%"><span><?= $inv['itemName']; ?></span></td>

						<td class="text-center"> <?= ($inv['qtysm'] * $inv['qtylg']); ?> </td>

						<td class="text-center"> <?= $inv['unitsm']; ?> </td>
						<td class="text-center">
							<button class="btn btn-primary badge" type="button" data-toggle="collapse" data-target="#targetToggleInv<?= $inv['id']; ?>" aria-expanded="false" aria-controls="collapseExample">
								Detail
							</button>
						</td>
					</tr>
					<tr class="collapse" id='targetToggleInv<?= $inv['id']; ?>'>
						<td colspan="4">
							<div>
								<table width="100%">

									<tr class="text-center bg-primary text-white">
										<th colspan="6"></i><?= $inv['itemDetail']; ?></th>
									</tr>

									<tr>
										<th scope="row" class="bg-info text-white" colspan="1">LARGEST UNIT</th>
										<td><?= $inv['unitlg'] ?></td>
										<th scope="row" class="bg-info text-white" colspan="1">AMOUNT</th>
										<td colspan="1"><?= ($inv['qtysm'] * $inv['qtylg']); ?> <?= $inv['unitsm']; ?> </td>
									</tr>

									<tr>
										<th scope="row" class="bg-info text-white" colspan="1"> SMALLEST UNIT</th>
										<td><?= $inv['unitsm']; ?></td>
										<th scope="row" class="bg-info text-white" colspan="1">AMOUNT UNIT CONVERSION</th>
										<td colspan="1"><?= $inv['qtysm']; ?> <?= $inv['unitsm']; ?></td>
									</tr>

									<tr class="text-center bg-info">
										<td colspan="2">
											<a class="btn btn-warning " href="<?= base_url(); ?>warehouse/inventory/editMaster/<?= $inv['id']; ?>" aria-expanded="false" onclick="return confirm('YOU ARE ABOUT TO EDIT')">EDIT</a>
										</td>

										<td colspan="2">
											<a class="btn btn-danger" href="<?= base_url(); ?>warehouse/delete/<?= $inv['id']; ?>" aria-expanded="false" onclick="return confirm('ARE YOU SURE TO DELETE?')">DELETE</a>
										</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				<?php endforeach ?>
			</table>

		</div>
	</div>

	<!-- Add New Menu Modal-->
	<!-- <div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newMenuLabel">Add New Menu</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('menu') ?>" method="post">
                    <div class="modal-body">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->