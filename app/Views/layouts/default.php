<?= $this->include('includes/header') ?>

<?php if(session()->has('error')): ?>
	<div 
		title="Click to close" 
		onclick="this.style.display = 'none'" 
		style="font-size: 1.1rem; cursor: pointer; padding: 10px; position: fixed; top: 50px; right: 50px; background: red; border-radius: 5px; color: #fff;"><?php echo session('error') ?></div>
<?php endif ?>

<?= $this->renderSection('content') ?>

<?= $this->include('includes/footer')  ?>
