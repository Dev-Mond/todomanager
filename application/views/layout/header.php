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
	<script src="<?=base_url('assets/lib/jquery/dist/jquery.js')?>"></script>
	<link rel="stylesheet" href="<?=base_url('assets/lib/fontawesome-free/css/all.css')?>"/>
	<script src="<?=base_url('assets/lib/fontawesome-free/js/all.js')?>"></script>
	<link rel="stylesheet" href="<?=base_url('assets/lib/bootstrap/dist/css/bootstrap.min.css')?>"/>
	<script src="<?=base_url('assets/lib/popper/dist/umd/popper.js')?>"></script>
	<script src="<?=base_url('assets/lib/bootstrap/dist/js/bootstrap.min.js')?>"></script>
	<script src="<?=base_url('assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js')?>"></script>
	<link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>"/>
	<script src="<?=base_url('assets/js/script.js')?>"></script>
</head>
<body>
	<nav class="darktheme">
		<nav class="navbar navbar-expand-sm navbar-dark bg-none">
			<a class="navbar-brand ml-3" href="<?=base_url()?>">
				<i class="fa fa-list text-teal mr-2"></i>
				<span><b>Todo <span class="text-teal">Manager<span></b></span>	
			</a>
			<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
				aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-list"></i></button>
			<div class="collapse navbar-collapse" id="collapsibleNavId">
				<ul class="navbar-nav ml-auto mr-5">
					<?php if($this->session->has_userdata('user')):?>
						<li class="nav-item">
							<a class="text-teal-alive nav-link align-middle" href="#"><?=$this->session->userdata('user')?></a>
						</li>
						<li class="nav-item">
							<a class="btn btn-sm rounded mr-2 btn-teal border" href="<?=base_url('logout')?>">Logout</a>
						</li>
					<?php else:?>
						<?php if($pageTitle !== "Home"):?>
							<li class="nav-item">
								<a class="btn btn-sm rounded mr-2 btn-teal border" href="<?=base_url('home')?>">Home</a>
							</li>
						<?php endif?>
						<?php if($pageTitle !== "Register"):?>
							<li class="nav-item">
								<a class="btn btn-sm rounded mr-2 btn-teal border" href="<?=base_url('register')?>">Register</a>
							</li>
						<?php endif?>
						<?php if($pageTitle !== "Login"):?>
							<li class="nav-item">
								<a class="btn btn-sm rounded mr-2 btn-teal border" href="<?=base_url('login')?>">Login</a>
							</li>
						<?php endif?>
					<?php endif?>
				</ul>
			</div>
		</nav>	
	</nav>
	<?php if($this->session->has_userdata('user')):?>
	<aside>
		<ul style="width:250px; height: 93.9%; margin-bottom: 0px" class="nabar-nav overflow-hidden position-absolute bg-dark text-left list-unstyled dashboard">
			<li class="nav-item pt-5 pb-3 text-center">
				<img src="<?=base_url('assets/img/profile.jpg')?>" width="100" height="100" class="rounded-circle border-light border" alt="profile.jpg">
			</li>
			<li class="nav-item pb-5 text-center">
				<span class="h6 text-light font-weight-bold"><b>Mond Angue</b></span>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link link-teal pl-3 pt-3 pb-3 m-2 align-middle <?=$pageTitle=='Dashboard'?'selected':'';?>">
					<i class="fa fa-home"></i>
					<span class="m-3">Dashboard</span>
				</a>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link link-teal pl-3 pt-3 pb-3 m-2 align-middle  <?=$pageTitle=='Todo List'?'selected':'';?>">
					<i class="fa fa-tasks"></i>
					<span class="m-3">Todo List</span>
				</a>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link link-teal pl-3 pt-3 pb-3 m-2 align-middle  <?=$pageTitle=='Projects'?'selected':'';?>">
					<i class="fa fa-project-diagram"></i>
					<span class="m-3">Projects</span>
				</a>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link link-teal pl-3 pt-3 pb-3 m-2 align-middle  <?=$pageTitle=='Chat Room'?'selected':'';?>">
					<i class="fa fa-comments"></i>
					<span class="m-3">Chat Room</span>
				</a>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link link-teal pl-3 pt-3 pb-3 m-2 align-middle  <?=$pageTitle=='Profile'?'selected':'';?>">
					<i class="fa fa-user"></i>
					<span class="m-3">Profile</span>
				</a>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link link-teal pl-3 pt-3 pb-3 m-2 align-middle  <?=$pageTitle=='Settings'?'selected':'';?>">
					<i class="fa fa-cogs"></i>
					<span class="m-3">Settings</span>
				</a>
			</li>
		</ul>
	</aside>
	<?php endif?>
	<section class="content mt-3">
		<nav class="breadcrumb">
			<?php foreach ($breadcrumbs->links as $link):?> 
				<a class="breadcrumb-item text-teal-alive" href="<?=$link->url?>"><?=$link->name?></a>
			<?php endforeach?>
			<span class="breadcrumb-item active"><?=$breadcrumbs->active?></span>
		</nav>
	</section>