<?php require_once '../partials/layout.php'; ?>


<?php function get_page_content() { ?>
<div class="container  bg-primary rounded p-3 mt-5">

	<h1 class="text-center">Register</h1>

		<div class="container">
			<form id="register_form" action="../controllers/register_endpoint.php" method="POST">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-group form-control">
					<span></span>
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control">
					<span></span>
				</div>

				<div class="form-group">
					<label for="password">Confirm Password</label>
					<input type="password" name="confirm_password" id="confirm_password" class="form-control">
					<span></span>
				</div>	

				<button id="registerBtn" class="btn btn-outline-dark btn-block-my-3" type="button">Register</button>
			</form> <!-- end of login form -->
		</div>

		<script>
				
			$('#registerBtn').click( () => {
				//put validation here
				let errorFlag = false;
				const username = $('#username').val();

				//username field is empty
				if(username == 0) {
					$('#username').next().css('color','red');
					$('#username').next().html('this fields is required');
					errorFlag = true;
				} else {
					//username already exist
					$.ajax({
						url: '../controllers/check_username.php',
						method: 'POST' ,
						data: {username: username},
						async: false //you need to complete this before proceeding
					}).done( data => {
						//if uname exist, send an eroor. else allow it
							console.log(data);
						if (data == "meron") {
							$('#username').next().css('color', 'red');
							$('#username').next().html('username is already taken');
							errorFlag = true;
						} else {
							//pag hindi meron, ano mangyayari? 
							$('#username').next().css('color', 'green');
							$('#username').next().html('username available');
						}
					});
				}

				const password = $('#password').val();
				const confirmPassword = $('#confirm_password').val();

				//password is empty

				if (password.length == 0) {
					$('#password').next().css('color', 'red');
					$('#password').next().html('this field is required');
					errorFlag = true;
				} else {
					$('#password').next().html('');
					//password do not match
					if(password !== confirmPassword) {
						$('#confirm_password').next().css('color', 'red');
						$('#confirm_password').next().html('password do not match');
						errorFlag = true;
					}
				}

				if (errorFlag == false) {
					$('#register_form').submit();
				}
			});



		</script>

</div>


<?php }; ?>