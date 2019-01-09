<?php require_once '../partials/layout.php'; ?>


<?php function get_page_content() { ?>
		
	<div class="container bg-primary rounded p-3 mt-5">

		<?php 
			if(isset($_SESSION['logged_in_user'])) {
				echo "<h2> Hello , " . $_SESSION['logged_in_user'];
			} else { ?>
		
		<h1 class="text-center"> Login </h1>

		<?php 
			if(isset($_SESSION['error_message'])) {
				echo "<span class='error_message'>" . $_SESSION['error_message'] . "</span>";
				unset($_SESSION['error_message']);
			}

		 ?>

		<!-- login form -->
		<form action="../controllers/authenicate.php" method="POST">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" id="username" class="form-control">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="form-control">
			</div>
			<button class="btn btn-outline-dark btn-block my-3">Login</button>
		</form> <!-- end login form -->

	<?php } ?>
		
	</div> <!-- end container -->


<?php }; ?>


