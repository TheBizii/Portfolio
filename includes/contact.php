<div id="contact">
	<p class="blue_heading">Contact me</p>
	<p id="contact_mail">If you would like to send me an email directly, feel free to do so and send it to <a class="highlight_light_background" href="mailto:tomaz@bizjak.me" target="_blank" rel="noopener noreferrer">tomaz@bizjak.com</a>.</p>
	<form id="contactForm" action="<?php echo $rootFolder; ?>index.php" method="POST">
		<label class="form_group">
			<span class="form_label">First and last name</span>
			<input class="form_input" type="text" id="first_last_name" name="first_last_name" required><br>
		</label>
		<label class="form_group">
			<span class="form_label">Email address</span>
			<input class="form_input" type="text" id="email" name="email" required><br>
		</label>
		<label class="form_group">
			<span class="form_label">Subject</span>
			<input class="form_input" type="text" id="subject" name="subject" required><br>
		</label>
		<label class="form_group">
			<span class="form_label">Message</span>
			<textarea class="form_input" id="message" name="message" required></textarea><br>
		</label>
		<input id="submit" type="submit" class="button" style="margin: 0 0 100px 0">
	</form>
</div>