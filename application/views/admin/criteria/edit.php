<div>
	<h4>Kriteria</h4>

	<hr>

	<form action="" method="post">
		<div class="form-group">
			<label for="name">Nama Kriteria</label>
			<input type="text" class="form-control" id="name" name="name" value="<?= $data->name ?>" required>
			<small class="form-text text-muted">Usahakan nama kriteria berbeda.</small>
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Nilai Kriteria</label>
			<div class="custom-control custom-radio">
				<input type="radio" id="customRadio1" name="value" value="5" class="custom-control-input" <?= $data->value == 5 ? 'checked' : '' ?> >
				<label class="custom-control-label" for="customRadio1">Sangat Penting</label>
			</div>
			<div class="custom-control custom-radio">
				<input type="radio" id="customRadio2" name="value" value="4" class="custom-control-input" <?= $data->value == 4 ? 'checked' : '' ?> >
				<label class="custom-control-label" for="customRadio2">Penting</label>
			</div>
			<div class="custom-control custom-radio">
				<input type="radio" id="customRadio3" name="value" value="3" class="custom-control-input" <?= $data->value == 3 ? 'checked' : '' ?> >
				<label class="custom-control-label" for="customRadio3">Moderat</label>
			</div>
			<div class="custom-control custom-radio">
				<input type="radio" id="customRadio4" name="value" value="2" class="custom-control-input" <?= $data->value == 2 ? 'checked' : '' ?> >
				<label class="custom-control-label" for="customRadio4">Tidak Penting</label>
			</div>
			<div class="custom-control custom-radio">
				<input type="radio" id="customRadio5" name="value" value="1" class="custom-control-input" <?= $data->value == 1 ? 'checked' : '' ?> >
				<label class="custom-control-label" for="customRadio5">Sangat Tidak Penting</label>
			</div>
			
			<small class="form-text text-muted">Nilai kriteria berdasarkan tingkat kepentingan.</small>
		</div>
		
		<button type="submit" name="submit" value="sumbit" class="btn btn-primary">Submit</button>
	</form>
</div>
