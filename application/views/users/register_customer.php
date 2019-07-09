<h2 class="text-center"><?php echo($title); ?></h2>

<!-- Show all the validation errors, if any -->
<?php if(validation_errors()): ?>
<div class="alert alert-danger text-center mt-5 alert-dismissible fade show" role="alert">
    <?php echo (validation_errors()); ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif; ?>

<div class="container mt-5 cred-card">

	<?php echo(form_open('users/register')); ?>
		<div class="form-group">
			<label for="email">Email Address</label>
			<input type="email" class="form-control" id="email" aria-describedby="Email id for registraion"
				placeholder="Enter email" required name="email">
			<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		</div>
		<div class="form-group">
			<label for="name">Enter Name</label>
			<input type="text" class="form-control" id="name" aria-describedby="Name for registraion"
				placeholder="Enter name" required name="name">
		</div>
        <div class="form-group">
            <label for="role">Enter Preference (Veg / Non-Veg / Both)</label>
            <select class="form-control" id="preference" name="preference" required>
                <option value="Veg">Veg</option>
                <option value="Non-Veg">Non-veg</option>
                <option value="Both">Both</option>
            </select>
        </div>
		<div class="form-group">
			<label for="password">Enter Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
			<small>Password length must be greater than or equal to 8</small>
		</div>
		<div class="form-group">
			<label for="password_c">Confirm Password</label>
			<input type="password" class="form-control" id="password_c" name="password_c" placeholder="Password">
		</div>

		<!-- Hidden input for setting the role to customer -->
		<input type="text" hidden value="User" name="role">
		
		<button type="submit" class="btn btn-primary btn-block">Register</button>
	<?php echo(form_close()); ?>

</div>
