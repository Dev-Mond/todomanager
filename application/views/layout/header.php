<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?=$pageTitle?> | Todo Manager</title>
	<script>
		var baseUrl = function(action) {
			return '<?=base_url()?>' + action;
		}
	</script>
	<link rel="icon" href="<?=base_url('assets/img/MY-BRAND-ICON.ico')?>">
	<script src="<?=base_url('assets/lib/node_modules/jquery/dist/jquery.js')?>"></script>
	<link rel="icon" href="<?=base_url('assets/lib/node_modules/@fortawesome/fontawesome-free/css/all.css')?>">
	<script src="<?=base_url('assets/lib/node_modules/@fortawesome/fontawesome-free/js/all.js')?>"></script>
	<link rel="icon" href="<?=base_url('assets/lib/node_modules/bootstrap/dist/css/bootstrap.css')?>">
	<script src="<?=base_url('assets/lib/node_modules/bootstrap/dist/js/bootstrap.js')?>"></script>
	<script src="<?=base_url('assets/lib/node_modules/bootstrap/dist/js/bootstrap.bundle.js')?>"></script>
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js" integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg==" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script> -->
	<link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
	<script src="<?=base_url('assets/js/script.js')?>"></script>
</head>
<body>
	<nav class="bg-dark shadow mb-5 mt-5">
		<div class="container">
			<nav class="navbar navbar-expand-sm navbar-dark bg-none">
				<a class="navbar-brand" href="<?=base_url()?>">Todo Manager</a>
					<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
						aria-expanded="false" aria-label="Toggle navigation"></button>
					<div class="collapse navbar-collapse" id="collapsibleNavId">
						<ul class="navbar-nav ml-auto text-dark">
							<?php if($this->session->has_userdata('user')):?>
								<li class="nav-item">
									<a class="nav-link" href="#"><?=$this->session->userdata('user')?></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?=base_url('logout')?>">Logout</a>
								</li>
							<?php else:?>
								<?php if($pageTitle !== "Home"):?>
									<li class="nav-item">
										<a class="nav-link" href="<?=base_url('home')?>">Home</a>
									</li>
								<?php endif?>
								<?php if($pageTitle !== "Register"):?>
									<li class="nav-item">
										<a class="nav-link" href="<?=base_url('register')?>">Register</a>
									</li>
								<?php endif?>
								<?php if($pageTitle !== "Login"):?>
									<li class="nav-item">
										<a class="nav-link" href="<?=base_url('login')?>">Login</a>
									</li>
								<?php endif?>
							<?php endif?>
						</ul>
					</div>
			</nav>	
		</div>
	</nav>

	<section class="container">
		<nav class="breadcrumb">
			<?php foreach ($breadcrumbs->links as $link):?> 
				<a class="breadcrumb-item" href="<?=$link->url?>"><?=$link->name?></a>
			<?php endforeach?>
			<span class="breadcrumb-item active"><?=$breadcrumbs->active?></span>
		</nav>
	</section>