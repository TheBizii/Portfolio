<div id="projects">
	<p class="light_heading">Projects</p>
	<div class="table">
		<table>
			<tr>
				<th>Title</th>
				<th>Description</th>
				<th>Technologies</th>
				<th>Status</th>
				<th>More information</th>
			</tr>

			<?php 
				$xml = NULL;
				$numPages = 0;
				$numEntries = 0;
				$projectsFile = $rootFolder . "includes/xml/projects.xml";
				if(file_exists($projectsFile) && trim(file_get_contents($projectsFile)) == true) {
					$xml=simplexml_load_file($rootFolder . "includes/xml/projects.xml") or die("Error: Cannot create object");
					if($numEntries > 0) {
						if($numEntries <= 4) {
							foreach($xml->project as $project) {
								echo 
								'<tr>
									<td>' . $project->title . '</td>
									<td>' . $project->description . '</td>
									<td>Java</td>
									<td>' . $project->status . '</td>
									<td><a class="highlight_blue_background" href="' . $project->moreinfo . '" target="_blank" rel="noopener noreferrer">' . $project->moreinfo["pagetitle"] . '</a></td>
								</tr>';
							}
						} else {
							for($i = 0; $i < 4; $i++) {
								echo 
								'<tr>
									<td>' . $project->title . '</td>
									<td>' . $project->description . '</td>
									<td>Java</td>
									<td>' . $project->status . '</td>
									<td><a class="highlight_blue_background" href="' . $project->moreinfo . '" target="_blank" rel="noopener noreferrer">' . $project->moreinfo["pagetitle"] . '</a></td>
								</tr>';
							}
						}
					}
				}

				if($xml) {
					$numEntries = sizeof($xml->project);
					$numPages = ceil($numEntries / 4);
				}
			?>
		</table>
		<div class=table-footer>
			<div class="controls">
				<img src="<?php echo $rootFolder . 'graphics/last.png'; ?>" width="20px" style="transform: rotate(180deg);" onclick="firstPage()">
				<img src="<?php echo $rootFolder . 'graphics/next.png'; ?>" width="20px" style="transform: rotate(180deg);" onclick="previousPage()">
				<input id="table_page" type="number" min="1" max="$numPages" disabled><pre> / <?php echo $numPages; ?></pre>
				<img src="<?php echo $rootFolder . 'graphics/next.png'; ?>" width="20px" onclick="nextPage()">
				<img src="<?php echo $rootFolder . 'graphics/last.png'; ?>" width="20px" onclick="lastPage()">
			</div>
			<div class="status">
				Showing 
				<?php 
					if($numEntries < 4) echo $numEntries;
					else echo '4';
				?>
				 results out of 
				<?php 
					echo $numEntries;
				?>.
			</div>
		</div>

	<a class="button_blue" style="margin: 0 0 100px 0" class="scroll-link" data-id="contact" href="#contact">Contact me</a>
	</div>
</div>