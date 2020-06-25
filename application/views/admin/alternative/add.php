<div>
	<h4>Alternatif</h4>

	<hr>

	<form action="" method="post">
		<div class="form-group">
			<label for="name">Nama Alternatif</label>
			<input type="text" class="form-control" id="name" name="name" required>
			<small class="form-text text-muted">Merupakan nama lengkap alternatif.</small>
		</div>
		<hr>
		<?php foreach ($criteria as $c): ?>
			<div class="form-group">
				<label><?= $c->name ?></label>

				<?php 
				$this->db->where('criteria_id', $c->id);
				$answer = $this->db->get('answer')->result_object(); 
				?>

				<?php foreach ($answer as $a): ?>
					<div class="custom-control custom-radio">
						<input type="radio" id="customRadio<?= $a->id ?>" name="value[<?= $c->id ?>]" value="<?= $a->value ?>" class="custom-control-input" checked>
						<label class="custom-control-label" for="customRadio<?= $a->id ?>"><?= $a->name ?></label>
					</div>
				<?php endforeach; ?>

				<small class="form-text text-muted">Pilihlah salah satu jawaban.</small>
			</div>
		<?php endforeach ?>
		
		<button type="submit" name="submit" value="sumbit" class="btn btn-primary">Submit</button>
	</form>
</div>
