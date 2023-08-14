<?php use Carbon\Carbon; ?>

<?= $this->include('includes/admin_header') ?>

<?= $this->include('includes/admin_nav') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">User</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?= esc($item->firstname) ?></h6>
		</div>
		<div class="card-body">

			<div class="container">							

				<p>Name: <?= esc($item->firstname) ?></p>
				<p>Email: <?= esc($item->email) ?></p>
				<p>Status: <?= $item->active ? 'Active' : 'Deactivated' ?></p>

				<p>
					Created: 
						<?= $item->created_at ? $item->created_at->humanize() : null ?>, 
						<?= $item->created_at ? date("d/m/Y - H:i:s", strtotime($item->created_at)) : null ?>
				</p>

				<p>
					Updated: 
						<?= $item->updated_at ? $item->updated_at->humanize() : null ?>, 
						<?= $item->updated_at ? date("d/m/Y - H:i:s", strtotime($item->updated_at)) : null ?>
				</p>
				
			</div>

		</div>

	</div>

	<a href="<?= url_to('admin.users') ?>" class="btn btn-sm btn-primary" title="Back">Back</a>

	<a href="<?= url_to('admin.users.edit', $item->id) ?>" class="btn btn-sm btn-primary" title="Edit">Edit</a>

</div>
<!-- /.container-fluid -->


<?= $this->include('includes/admin_footer') ?>
