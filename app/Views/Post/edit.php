<?= $this->include('includes/admin_header') ?>

<?= $this->include('includes/admin_nav') ?>

<div class="container-fluid">

	<h1 class="h3 mb-2 text-gray-800">Post</h1>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">

				<?= form_open(url_to('admin.posts.update', $item->id)) ?>

					<input type="hidden" name="_method" value="patch">
					<?= $this->include('Post/_form') ?>

				<?= form_close() ?>

			</div>
		</div>

	</div>

	<a href="<?= url_to('admin.posts') ?>" class="btn btn-sm btn-primary" title="Back">Back</a>

</div>
<!-- /.container-fluid -->

<?= $this->include('includes/admin_footer') ?>
