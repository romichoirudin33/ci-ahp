<html>
<head>
	<title>Admin | SPK AHP</title>
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
	<nav class="navbar navbar-expand-lg navbar-dark pl-5 pr-5 shadow-sm" style="background-color: #6c757d;">
		<a class="navbar-brand" href="<?= site_url('/') ?>">AHP</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?= site_url('/'); ?>">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Setting
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?= site_url('criteria'); ?>">Kriteria</a>
						<a class="dropdown-item" href="<?= site_url('alternative'); ?>">Alternatif</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('hitung_alternative') ?>">Hitung Alternatif</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('auth/destroy') ?>" onclick="return confirm('Anda yakin akan logout ?')">Logout</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container pt-3 pb-5">

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
				<?php isset($content) ? $this->load->view($content) : '';  ?>
			</div>
		</div>
	</div>
	


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="<?= base_url('assets/dist/js/bootstrap.min.js'); ?>"></script>
</body>
</html>