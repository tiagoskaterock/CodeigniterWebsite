<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Image</th>
            <th>User</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($data as $item): ?>
        <tr>
            <td><?= $item->id ?></td>

            <td><?= esc($item->title) ?></td>

            <td>
                <?php if ($item->image): ?>
                <img src="<?= esc($item->image) ?>" alt="<?= esc($item->title) ?>" height="20">
                <?php endif ?>
            </td>


            <td>
				<?php print_r(esc($item->firstname)) ?>	
			</td>

            <td>
                <a href="<?= esc(url_to('admin.posts.show', $item->id)) ?>" class="btn btn-sm btn-info" title="View">
                    <i class="fas fa-eye"></i>
                </a>
            </td>

            <td>
                <a href="<?= esc(url_to('admin.posts.edit', $item->id)) ?>" class="btn btn-sm btn-primary" title="Edit">
                    <i class="fas fa-edit"></i>
                </a>
            </td>

            <td>
                <?= form_open(url_to('admin.posts.delete', $item->id)) ?>
                <input type="hidden" name="_method" value="delete">
                <button type="submit" onclick="return confirm('Deseja mesmo excluir?');" title="Delete"
                    class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
                </button>

                <?= form_close() ?>
            </td>

        </tr>
        <?php endforeach ?>
    </tbody>

</table>