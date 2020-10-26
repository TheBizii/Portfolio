<html>
	<head>
		<title>Tomaž Bizjak | Software Engineer</title>
		<link rel="icon" href="./graphics/Icon2.png" type="image/png">
		<link rel="stylesheet" type="text/css" href="./style/style.css">
		<?php 
			if(isset($_COOKIE["theme"]) && $_COOKIE['theme'] === 'dark') {
				echo '<link rel="stylesheet" type="text/css" href="./style/dark.css">';
			}
		?>
		<script src="http://code.jquery.com/jquery-2.1.4.min.js" data-semver="2.1.4" data-require="jquery@2.1.4"></script>
		<script data-require="jquery-cookie@1.3.1" data-semver="1.3.1" src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.3.1/jquery.cookie.js"></script>
		<script src="./script/script.js"></script>
		<meta charset="utf-8">
	</head>
	<body>

		<?php
			$rootFolder = "./";
			include($rootFolder . 'includes/header.php');

			if(!isset($_COOKIE["theme"])) {
				setcookie("theme", "light", time() + 604800, "/"); // One week cookie
			}
		?>

		<div class="page-content">
			<?php
				include($rootFolder . 'includes/home.php');
			?>
		</div>

		<?php
				include($rootFolder . 'includes/about.php');
		?>

		<?php
			include($rootFolder . 'includes/footer.php')
		?>

		<?php 
			include($rootFolder . 'includes/history.php');
		?>

		<?php 
			include($rootFolder . 'includes/projects.php');
		?>

		<?php 
			include($rootFolder . 'includes/contact.php');
		?>
	</body>
</html>