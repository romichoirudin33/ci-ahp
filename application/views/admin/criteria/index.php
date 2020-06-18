<div>
	<h4>Kriteria</h4>

	<hr>

	<a class="btn btn-primary mb-3 " href="<?= site_url('criteria/add') ?>">Tambah</a>

	<?php if (count($data) > 0){ ?>
		<table class="table table-bordered shadow-sm">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Nilai</th>
					<th>Bobot AHP</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1 ?>
				<?php foreach ($data as $key): ?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $key->name ?></td>
						<td><?= $key->value ?></td>
						<td><?= $key->weight_value ?></td>
						<td>
							<a href="<?= site_url('criteria/edit')."/".$key->id; ?>" class="btn btn-info btn-sm">
								<span class="fa fa-edit"> Edit 
								</span>
							</a>
							<a href="<?= site_url('criteria/delete')."/".$key->id; ?>" class="btn btn-warning btn-sm"onclick="return confirm('Hapus Data Ini ?')">
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
