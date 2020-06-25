<div>
	<h4>Kriteria</h4>

	<hr>

	<a class="btn btn-primary mb-3 " href="<?= site_url('criteria/add') ?>">Tambah</a>

	<?php if (count($data) > 0){ ?>
		<table class="table table-bordered shadow-sm">
			<thead>
				<tr>
					<th class="text-center">No</th>
					<th>Nama</th>
					<th class="text-center">Nilai</th>
					<th class="text-center">Bobot AHP</th>
					<th class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1 ?>
				<?php foreach ($data as $key): ?>
					<tr>
						<td class="text-center"><?= $no++; ?></td>
						<td>
							<?= $key->name ?>
							<a href="<?= site_url('criteria/detail')."/".$key->id; ?>" class="btn btn-info btn-sm">
								<span class="fa fa-edit"> Detail 
								</span>
							</a>
						</td>
						<td class="text-center"><?= $key->value ?></td>
						<td class="text-center"><?= $key->weight_value ?></td>
						<td class="text-center">
							<a href="<?= site_url('criteria/edit')."/".$key->id; ?>" class="btn btn-info btn-sm">
								<span class="fa fa-edit"> Edit 
								</span>
							</a>
							<a href="<?= site_url('criteria/delete')."/".$key->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus Data Ini ?')">
								<span class="fa fa-trash-o"> Hapus 
								</span>
							</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	<?php }else{ ?>
		<div class="alert alert-warning shadow" role="alert">
			Data masih kosong
		</div>
	<?php } ?>
</div>
