<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800"><?php echo $title ?></h1>

	<h4>Welcome <?php echo ucfirst(esc(auth()->user()->firstname)) ?>!</h4>

</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>
