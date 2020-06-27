<div>
	<h5>Bobot Criteria</h5>

	<table class="table table-bordered text-center text-sm">
		<tr>
			<th>Criteria</th>
			<?php foreach ($criteria as $key): ?>
				<td><?= $key->name ?></td>
			<?php endforeach ?>
		</tr>
		<tr>
			<th>Bobot</th>
			<?php foreach ($criteria as $key): ?>
				<td><b><?= $key->weight_value ?></b></td>
			<?php endforeach ?>
		</tr>
	</table>
	<hr>

	<h5>Bobot Detail Alternative Berdasarkan Criteria</h5>
	<table class="table table-bordered text-center text-sm">
		<tr>
			<th></th>
			<?php $i = 1; ?>
			<?php foreach ($criteria as $key): ?>
				<td><?= 'C'.$i++; ?></td>
			<?php endforeach; ?>
		</tr>
		<?php $i = 1; ?>
		<?php foreach ($alternative as $a): ?>
			<tr>
				<td><?= 'A'.$i++; ?></td>
				<?php foreach ($criteria as $k): ?>
					<?php 
					$this->db->where('alternative_id', $a->id);
					$this->db->where('criteria_id', $k->id);
					$detail = $this->db->get('detail_alternative')->row();
					?>
					<td>
						<b><?= $detail->weight_value ?></b>
					</td>
				<?php endforeach ?>
			</tr>
		<?php endforeach ?>
	</table>

	<h5>Hitung Bobot Alternative</h5>

	<table class="table table-bordered text-center text-sm">
		<tr>
			<th>#</th>
			<th>Nama Alternatif</th>
			<th>Bobot</th>
			<th>Status</th>
		</tr>
		<?php $i = 1; ?>
		<?php foreach ($alternative as $a): ?>
			<tr>
				<td><?= $i++; ?></td>
				<td><?= $a->name ?></td>
				<td><?= $a->weight_value ?></td>
				<td>
					<?php if ($a->status == 0){ ?>
						<a href="<?= site_url('hitung_alternative/edit/'.$a->id) ?>" class="btn btn-xs btn-danger">
							Ditolak
						</a>
					<?php }else{ ?>
						<a href="<?= site_url('hitung_alternative/edit/'.$a->id) ?>" class="btn btn-xs btn-success">
							Diterima
						</a>
					<?php } ?>
				</td>
			</tr>
		<?php endforeach ?>
	</table>


</div>