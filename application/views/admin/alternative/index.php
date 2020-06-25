<div>
	<h4>List Alternatif</h4>

	<hr>

	<a class="btn btn-primary mb-3 " href="<?= site_url('alternative/add') ?>">Tambah</a>

	<?php if (count($data) > 0){ ?>
		<table class="table table-bordered shadow-sm">
			<thead>
				<tr>
					<th class="text-center">No</th>
					<th>Nama</th>
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
						</td>
						<td class="text-center">
							<?php if ($key->weight_alternative != 0){ ?>
								<?= $key->weight_alternative ?>
							<?php }else{ ?>
								<span class="text-muted" style="font-size: 12">
									Klik <a href="<?= site_url('') ?>">disini</a> untuk menghitung bobot
								</span>
							<?php } ?>
						</td>
						<td class="text-center">
							<a href="<?= site_url('alternative/detail')."/".$key->id; ?>" class="btn btn-info btn-sm">
								<span class="fa fa-edit"> Detail 
								</span>
							</a>
							<a href="<?= site_url('alternative/delete')."/".$key->id; ?>" class="btn btn-danger btn-sm"onclick="return confirm('Hapus Data Ini ?')">
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
