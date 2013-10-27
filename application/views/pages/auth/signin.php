<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			&nbsp;
		</div>
		<div class="modal-body">
			<div class="well well-lg">
				<?php if (isset($error_message)): ?>
				<div class="alert alert-warning"><?php echo $error_message; ?></div>
				<?php endif; ?>
				<form class="form-signin" action="<?php echo site_url("signin/login"); ?>" method="POST">
					<div>
						<h2 class="form-signin-heading">Sign in</h2>
					</div>
					<input name="form_username" type="text" class="form-control" placeholder="Username" autofocus>
					<br/>
					<input name="form_password" type="password" class="form-control" placeholder="Password">
					<br/>
					<label class="checkbox">
						<input name="remember_me" type="checkbox" value="remember-me"> Remember me?
					</label>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
				</form>
			</div>
		</div>
	</div>
</div>
