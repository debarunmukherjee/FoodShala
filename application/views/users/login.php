<h2 class="text-center"><?php echo($title); ?></h2>
<?php if(validation_errors()): ?>
<div class="alert alert-danger text-center mt-5 alert-dismissible fade show" role="alert">
    <?php echo (validation_errors()); ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif; ?>

<div class="container mt-5 cred-card">

	<?php echo(form_open('users/login')); ?>
		<div class="form-group">
			<label for="email">Email Address</label>
			<input type="email" class="form-control" id="email" aria-describedby="Email id for registraion"
				placeholder="Enter email" required name="email">
		</div>
		<div class="form-group">
			<label for="password">Enter Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
		</div>
		<button type="submit" class="btn btn-primary btn-block">Log in</button>
	<?php echo(form_close()); ?>

</div>
