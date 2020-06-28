<html>
<head>
	<title>Login | SPK AHP</title>
	<link rel="stylesheet" href="<?= base_url('assets/dist/css/bootstrap.min.css'); ?>">
	<style>
		body{
			background-color: #eee; 
		}
		.btn-xs {
			padding: .10rem .25rem;
			font-size: .65rem;
			line-height: 1.5;
			border-radius: .1rem;
		}
		.text-sm{
			font-size: 13;
		}
	</style>
</head>
<body>
	<div class="container pt-5 pb-5 mt-5">

		<div class="row">
			<div class="col-sm-4 offset-4">
				<?php if ($this->session->flashdata('info')): ?>
					<div class="alert alert-warning alert-dismissible fade show shadow-sm" role="alert">
						<strong>Info</strong> <?php echo $this->session->flashdata('info'); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif; ?>
				<div class="card shadow-sm">
					<div class="card-body">
						<h5>Login</h5>
						<hr>
						<form action="" method="post">
							<div class="form-group">
								<label for="name">Username</label>
								<input type="text" class="form-control" id="username" name="username" autocomplete="off" required>
							</div>
							<div class="form-group">
								<label for="name">Password</label>
								<input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
							</div>
							<br>
							<button type="submit" name="submit" value="sumbit" class="btn btn-primary">Login</button>
						</form>
					</div>
				</div>
				<div class="text-center mt-4">
					<small class="text-muted">
						SPK Kelayakan Pemberian Kredit Metode AHP
					</small>
				</div>
				
			</div>
		</div>
		
	</div>



	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="<?= base_url('assets/dist/js/bootstrap.min.js'); ?>"></script>
</body>
</html>