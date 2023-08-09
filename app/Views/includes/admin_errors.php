<?php if(session()->has('errors')): ?>
	<div 
		title="Click to close" 
		onclick="hide_error_message()" 
		id="error_message"
		style="position: fixed; top: 50px; right: 50px; z-index: 10; cursor: pointer;" 
		class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Oops!</strong> There are some errors in your form:
    <ul>
      <?php foreach (session('errors') as $error): ?>
      	<li><?= $error ?></li>
      <?php endforeach ?>
    </ul>
	</div>
<?php endif ?>

<script>
	function hide_error_message() {
    var element = document.getElementById("error_message");
    element.style.display = "none";
	}
</script>
