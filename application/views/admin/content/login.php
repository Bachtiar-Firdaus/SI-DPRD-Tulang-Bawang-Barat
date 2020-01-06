<div class="wrapper" style="background: url(<?php echo base_url('assets/img/bglogin.jpg');?>);">
	<div class="row" style="margin-top: 90px">
		<div class="login-box bulet">
			<div class="login-logo">
				<!-- 
					<a style="color: rgb(0, 129, 250)" href="../../../index2.html"><b style="color: rgb(32, 129, 255)">
							Panel</b>Login</a> -->
			</div>
			<!-- /.login-logo -->
			<div class="login-box-body bulet sadow">
				<p class="login-box-msg">Silahkan Login Terlebih Dahulu </p>

				<form action="login/auth" method="post">
					<?php echo form_open_multipart('login/auth', array('role'=>'form'));
						if(isset($message)): 
						echo "<div class='alert alert-success action='post'>".$message."</div>";
						endif; ?>
					<div class="form-group has-feedback">
						<input type="text" name="username" class="form-control" placeholder="Email">
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" name="password" class="form-control" placeholder="Password">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<!-- /.col -->
						<div class="col-xs-4">
							<input type="submit" value="Masuk" class="btn btn-primary btn-block btn-flat" />
						</div>
						<!-- /.col -->
					</div>
					<?php form_close();
			if(isset($errors)):
				echo "<div class='alert alert-danger'>".$errors."</div>";
			endif; ?>
				</form>

			</div>
			<!-- /.login-box-body -->
		</div>
	</div>
</div>
