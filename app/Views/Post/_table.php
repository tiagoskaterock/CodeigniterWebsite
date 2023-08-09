<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>#</th>
			<th>Title</th>
			<th>Image</th>
			<th>View</th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($data as $item): ?>
			<tr>
				<td><?= $item['id'] ?></td>

				<td><?= esc($item['title']) ?></td>

				<td>
					<?php if ($item['image']): ?>
						<img src="<?= esc($item['image']) ?>" alt="<?= esc($item['title']) ?>" height="20">
					<?php endif ?>
				</td>

				<td>
					<a href="<?= esc(site_url('admin/posts/' . $item['id'])) ?>" class="btn btn-sm btn-info" title="View">
						View
					</a>
				</td>

			</tr>								
		<?php endforeach ?>
	</tbody>

</table>
