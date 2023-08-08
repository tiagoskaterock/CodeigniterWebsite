<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<section>

	<?php foreach ($data as $item): ?>

		<article class="post">		
			<img src="<?= $item['image'] ?>" alt="<?= $item['title'] ?>">	
			<h2><?= $item['title'] ?></h2>
			<p><?= $item['content'] ?></p>						
		</article>		

	<?php endforeach ?>

</section>

<?= $this->include('includes/blog_sidebar')  ?>

<?= $this->endSection() ?>
