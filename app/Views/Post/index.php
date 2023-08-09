<?= $this->include('includes/admin_header') ?>

<?= $this->include('includes/admin_nav') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800"><?php echo $title ?></h1>

	<a href="<?php echo base_url('/admin/posts/create/') ?>" class="btn btn-sm btn-primary mb-3" title="Add New">Add New</a>

		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Title</th>
								<th>Image</th>
								<th>View</th>
							</tr>
						</thead>

						<tbody>
							<?php foreach ($data as $item): ?>
								<tr>
									<td><?= $item['title'] ?></td>
									<td><img src="<?= $item['image'] ?>" alt="<?= $item['title'] ?>" height="20"></td>
									<td>
										<a href="<?= site_url('admin/posts/' . $item['id']) ?>" class="btn btn-sm btn-info" title="View">
											View
										</a>
									</td>
								</tr>								
							<?php endforeach ?>
						</tbody>

					</table>
				</div>
			</div>
		</div>

	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?= $this->include('includes/admin_footer') ?>
