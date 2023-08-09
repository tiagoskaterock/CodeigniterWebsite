<!-- Success -->
<?php if (session()->has('success')): ?>
	<div 
		title="Click to close" 
		onclick="hide_message_success()" 
		id="message_success"
		style="position: fixed; top: 50px; right: 50px; z-index: 10; cursor: pointer;" 
		class="alert alert-success">
	    <?= session('success') ?>
	</div>
<?php endif; ?>

<script>
	function hide_message_success() {
    var element = document.getElementById("message_success");
    element.style.display = "none";
	}
</script>


<!-- Danger -->
<?php if (session()->has('danger')): ?>
	<div 
		title="Click to close" 
		onclick="hide_message_danger()" 
		id="message_danger"
		style="position: fixed; top: 50px; right: 50px; z-index: 10; cursor: pointer;" 
		class="alert alert-danger">
	    <?= session('danger') ?>
	</div>
<?php endif; ?>

<script>
	function hide_message_danger() {
    var element = document.getElementById("message_danger");
    element.style.display = "none";
	}
</script>


<!-- warning -->
<?php if (session()->has('warning')): ?>
	<div 
		title="Click to close" 
		onclick="hide_message_warning()" 
		id="message_warning"
		style="position: fixed; top: 50px; right: 50px; z-index: 10; cursor: pointer;" 
		class="alert alert-warning">
	    <?= session('warning') ?>
	</div>
<?php endif; ?>

<script>
	function hide_message_warning() {
    var element = document.getElementById("message_warning");
    element.style.display = "none";
	}
</script>


<!-- info -->
<?php if (session()->has('info')): ?>
	<div 
		title="Click to close" 
		onclick="hide_message_info()" 
		id="message_info"
		style="position: fixed; top: 50px; right: 50px; z-index: 10; cursor: pointer;" 
		class="alert alert-info">
	    <?= session('info') ?>
	</div>
<?php endif; ?>

<script>
	function hide_message_info() {
    var element = document.getElementById("message_info");
    element.style.display = "none";
	}
</script>


<!-- primary -->
<?php if (session()->has('primary')): ?>
	<div 
		title="Click to close" 
		onclick="hide_message_primary()" 
		id="message_primary"
		style="position: fixed; top: 50px; right: 50px; z-index: 10; cursor: pointer;" 
		class="alert alert-primary">
	    <?= session('primary') ?>
	</div>
<?php endif; ?>

<script>
	function hide_message_primary() {
    var element = document.getElementById("message_primary");
    element.style.display = "none";
	}
</script>
