<div>
	<h4>Detail Alternative</h4>

	<hr>

	<table style="width: 50%">
		<tr>
			<td>Nama Alternative</td>
			<td>:</td>
			<td><?= $data->name ?></td>
		</tr>
		<tr>
			<td>Nilai / Bobot Alternative</td>
			<td>:</td>
			<td><?= $data->weight_value ?></td>
		</tr>
	</table>
	<hr>

	<table style="width: 50%">
		<tr>
			<th>Kriteria</th>
			<th colspan="2">Nilai / Bobot</th>
		</tr>
		<?php 
		$this->db->where('alternative_id', $data->id);
		$detail = $this->db->get('detail_alternative')->result_object(); 
		?>

		<?php foreach ($detail as $d): ?>

			<?php 
			$criteria = $this->Criteria_model->getId($d->criteria_id); 
			?>

			<tr>
				<td>
					<?= $d->criteria_id ?> - <?= $criteria->name ?>
				</td>
				<td>:</td>
				<td><?= $d->value ?></td>
			</tr>
		<?php endforeach ?>
	</table>
	<br>
	<a href="<?= site_url('alternative'); ?>" class="btn btn-info btn-sm">
		<span class="fa fa-edit"> Kembali 
		</span>
	</a>
	<a href="<?= site_url('alternative/delete')."/".$data->id; ?>" class="btn btn-danger btn-sm"onclick="return confirm('Hapus Data Ini ?')">
		<span class="fa fa-trash-o"> Hapus 
		</span>
	</a>
</div>