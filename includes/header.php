<div class="header grid-three-col">
	<div class="stick-left">
		<ul class="nav">
			<li><a class="navlink scroll-link" data-id="home" href="#home">Home</a></li>
			<li><a class="navlink scroll-link" data-id="about" href="#about">About</a></li>
			<li><a class="navlink scroll-link" data-id="history" href="#history">History</a></li>
			<li><a class="navlink scroll-link" data-id="projects" href="#projects">Projects</a></li>
			<li><a class="navlink scroll-link" data-id="contact" href="#contact">Contact</a></li>
		</ul>
	</div>
	<div class="stick-vmiddle">
		<div class="mode-switch">

			<?php
				if(!isset($_COOKIE["theme"]) || $_COOKIE['theme'] === 'light') {
					echo '
						<div class="slider">
						</div>
						<p>LIGHT</p>';
				} else {
					echo '
						<p>DARK</p>
						<div class="slider">
						</div>';
				}
			?>
		</div>
	</div>
	<div class="stick-right">
		<ul class="social">
			<li>
				<a href="https://www.facebook.com/tomi.bizjak.5" target="_blank" rel="noopener noreferrer">
					<?php 
						if($_COOKIE['theme'] === 'light') {
							echo
							'<img align="center" src="' . $rootFolder . 'graphics/facebook.png" width="25px">';
						} else {
							echo
							'<img align="center" src="' . $rootFolder . 'graphics/facebook_dark.png" width="25px">';
						}
					?>
					
				</a>
			</li>
			<li>
				<a href="https://www.instagram.com/thebizii" target="_blank" rel="noopener noreferrer">
					<?php 
						if($_COOKIE['theme'] === 'light') {
							echo
							'<img align="center" src="' . $rootFolder . 'graphics/instagram.png" width="25px">';
						} else {
							echo
							'<img align="center" src="' . $rootFolder . 'graphics/instagram_dark.png" width="25px">';
						}
					?>
				</a>
			</li>
			<li>
				<a href="https://www.linkedin.com/in/tomaž-bizjak-100b44157/" target="_blank" rel="noopener noreferrer">
					<?php 
						if($_COOKIE['theme'] === 'light') {
							echo
							'<img align="center" src="' . $rootFolder . 'graphics/linkedin.png" width="25px">';
						} else {
							echo
							'<img align="center" src="' . $rootFolder . 'graphics/linkedin_dark.png" width="25px">';
						}
					?>
				</a>
			</li>
			<li>
				<a href="https://www.github.com/TheBizii" target="_blank" rel="noopener noreferrer">
					<?php 
						if($_COOKIE['theme'] === 'light') {
							echo
							'<img align="center" src="' . $rootFolder . 'graphics/github.png" width="25px">';
						} else {
							echo
							'<img align="center" src="' . $rootFolder . 'graphics/github_dark.png" width="25px">';
						}
					?>
				</a>
			</li>
		</ul>
	</div>
</div>