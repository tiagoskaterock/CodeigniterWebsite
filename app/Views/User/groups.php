<?php use Carbon\Carbon; ?>

<?= $this->include('includes/admin_header') ?>

<?= $this->include('includes/admin_nav') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">User Groups</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?= esc($user->firstname) ?></h6>
		</div>
		<div class="card-body">

			<div class="container">							

				<?= form_open('admin/users/' . $user->id . '/groups') ?>

					<input type="hidden" name="_method" value="patch">

					<label>
						<input 
							type="checkbox" 
							name="groups[]" 
							value="user"
							<?= $user->inGroup('user') ? 'checked' : '' ?>> 
						 user						
					</label>

					<?php if ($user->id === auth()->user()->id): ?>
						<input type="checkbox" checked disabled> admin
						<input type="hidden" name="groups[]" value="admin">
					<?php else: ?>
						<label>
							<input 
								type="checkbox" 
								name="groups[]" 
								value="admin"
								<?= $user->inGroup('admin') ? 'checked' : '' ?>> 
							 admin						
						</label>
					<?php endif ?>


					<br>

					<button class="btn btn-primary btn-sm" type="submit">Save</button>

				<?= form_close() ?>
				
			</div>

		</div>

	</div>

	<a href="<?= url_to('admin.users.show', $user->id) ?>" class="btn btn-sm btn-primary" title="Back">Back</a>

	<a href="<?= url_to('admin.users.edit', $user->id) ?>" class="btn btn-sm btn-primary" title="Edit">Edit</a>

</div>
<!-- /.container-fluid -->


<?= $this->include('includes/admin_footer') ?>
