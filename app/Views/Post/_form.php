<label for="Title">Title</label>
<input type="text" name="title" title="Title" placeholder="Title" class="form-control mb-4" value="<?= old('title') ?>">

<label for="Content">Content</label>
<textarea name="content" class="form-control mb-4" placeholder="Content"><?= old('content') ?></textarea>

<button type="submit" class="btn btn-primary btn-sm">Save</button>
