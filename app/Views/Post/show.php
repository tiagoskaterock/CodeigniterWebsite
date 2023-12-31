<?= $this->include('includes/admin_header') ?>

<?= $this->include('includes/admin_nav') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Post</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?= esc($item->title) ?></h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">

				<?php echo site_url("/" .$item->image) ?>
				<hr>
				<?php echo base_url($item->image) ?>

					<div class="container">
							
						<?php if ($item->image): ?>
							<img src="<?= url_to($item->image) ?>" alt="<?= esc($item->title) ?>">
						<?php endif ?>

						<p><?= esc($item->content) ?></p>
					</div>

			</div>
		</div>


	</div>

	<a href="<?= url_to('admin.posts') ?>" class="btn btn-sm btn-primary" title="Back">Back</a>

	<a href="<?= url_to('admin.posts.edit', $item->id) ?>" class="btn btn-sm btn-primary" title="Edit">Edit</a>

</div>
<!-- /.container-fluid -->

<?= $this->include('includes/admin_footer') ?>
