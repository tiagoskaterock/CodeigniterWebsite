<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800"><?php echo $title ?></h1>

	<a href="<?php echo url_to('admin.users.create') ?>" class="btn btn-sm btn-primary mb-3" title="Add New">Add New</a>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Users</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<?= $this->include('User/_table') ?>					
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>
