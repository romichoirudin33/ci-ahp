<div>
	<h4>Detail Kriteria</h4>

	<hr>

	<table style="width: 50%">
		<tr>
			<td>Nama Kriteria</td>
			<td>:</td>
			<td><?= $data->name ?></td>
		</tr>
		<tr>
			<td>Nilai / Bobot Kriteria</td>
			<td>:</td>
			<td><?= $data->value ?></td>
		</tr>
	</table>
	<h6 class="mt-4"><b>Jawaban</b></h6>

	<?php 
	$this->db->where('criteria_id', $data->id);
	$answer = $this->db->get('answer')->result_object(); 
	?>

	<ol type="A" >
		<?php foreach ($answer as $key): ?>
			<li style="padding-left: 20">
				<?= $key->name ?> (<?= $key->value ?>)
				<a class="btn btn-xs btn-danger" href="<?= site_url('criteria/delete_answer/'.$key->id) ?>">Hapus</a>
			</li>
		<?php endforeach; ?>
	</ol>


	<button type="button" class="btn btn-primary btn-sm mt-3" data-toggle="modal" data-target="#exampleModal">
		Tambah
	</button>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Jawaban</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post">
					<div class="modal-body">
						<input type="hidden" name="criteria_id" value="<?= $data->id ?>">
						<div class="form-group">
							<label for="name">Keterangan Jawaban</label>
							<input type="text" class="form-control" id="name" name="name" required>
							<small class="form-text text-muted">Keterangan untuk jabawan dari kriteria.</small>
						</div>
						<div class="form-group">
							<label for="value">Bobot / Value (Jawaban)</label>
							<input type="number" class="form-control" id="value" name="value" required>
							<small class="form-text text-muted">Bobot untuk jawaban ini.</small>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" name="submit" value="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>


</div>