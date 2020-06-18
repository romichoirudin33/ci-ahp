<html>
<head>
	<title>Admin | SPK AHP</title>
	<link rel="stylesheet" href="<?= base_url('assets/dist/css/bootstrap.min.css'); ?>">
	<style>
		body{
			background-color: #eee; 
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark pl-5 pr-5 shadow-sm" style="background-color: #6c757d;">
		<a class="navbar-brand" href="#">AHP</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Setting
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Kriteria</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Alternatif</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Logout</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container pt-3">
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