<?php
	echo file_get_contents('generalLoginPage.php');
		session_start();

?>

		<div class="rightBlock">
			<?php
			if(isset($_SESSION['messages'])){
				$sentiment=$_SESSION['sentiment'];
				foreach($_SESSION['messages'] as $message){
					echo "<div class='message $sentiment'>$message</div>";
				}
			}
	
			$presets = array();
			if(isset($_SESSION['presets'])){
				$presets=array_shift($_SESSION['presets']);
			}
			unset($_SESSION['presets']);
			unset($_SESSION['messages']);
			unset($_SESSION['messages']);

		?>
			<h2>Login/Sign Up</h2>
			<form action="loginHandler.php" method="POST">
				<h5>Enter Username:
				<input value="<?php echo isset($presets['username']) ? $presets['username'] : ''; ?>" placeholder="username here" type="text" id="username" name="username"></h5>
				<h5>Enter Password
				<input value="<?php echo isset($presets['password']) ? $presets['password'] : ''; ?>" placeholder="password" type="password" id="password" name="password"></h5>
				<div><input type="submit" value="Login">    </div>
			</form>
			<form action="createAccount.php" method="POST">
				<div><input type="submit" value="Create Account"></div>
			</form>

		</div>
		<div id="footer">
			<li class ="namefooter">©2018 Anne Brinegar</li>
		</div>
	</body>
</html>