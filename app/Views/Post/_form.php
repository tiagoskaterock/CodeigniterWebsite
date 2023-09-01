<label for="image">Image</label>
<input type="file" name="image" title="Image" class="form-control mb-4" value="<?= old('image', esc($item->image)) ?>" accept="image/png, image/gif, image/jpeg">

<label for="Title">Title</label>
<input type="text" name="title" title="Title" placeholder="Title" class="form-control mb-4" value="<?= old('title', esc($item->title)) ?>">

<label for="Content">Content</label>
<textarea name="content" class="form-control mb-4" placeholder="Content"><?= old('content', esc($item->content)) ?></textarea>

<button type="submit" class="btn btn-primary btn-sm">Save</button>
