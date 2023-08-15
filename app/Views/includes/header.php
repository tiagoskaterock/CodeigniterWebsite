<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CodeIgniter Website <?= isset($title) ? ' | ' . $title : null ?></title>
</head>
<body>

	<header>
		<nav>
			<ul>
				<li><a href="<?= site_url('/') ?>">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="<?= site_url('/posts') ?>">Blog</a></li>
				<li><a href="#">Contact</a></li>
				<li><a href="<?php echo url_to('admin.dashboard') ?>">Admin</a></li>
			</ul>
		</nav>
	</header>
