<?php

function codeGenerator() {

	$lines = array(
		array("/* Jason Fukura */", 0),
		array("A 'quizzle' is <b>bold</b>", 2),
		array("echo '<p class=\"code-line indent-'.\$line[1].'\">'.htmlentities(\$line[0]).'</p>';", 3)
	);
	
	$wrapped = array_map(
		function ($line) {
			echo '<p class="code-line indent-'.$line[1].'">'.htmlentities($line[0]).'</p>';
		},
		$lines
	);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Web Developer &amp; UX Architect | Jason Fukura</title>

	<link rel="stylesheet" href="style/code.min.css">
</head>
<body>
	<main class="code">
		<?php codeGenerator(); ?>
		<!-- Code goes in here -->
	</main>
</body>
</html>