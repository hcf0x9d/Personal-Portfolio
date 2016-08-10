<?php

function codeGenerator() {

	$lines = array(
		"/* ========================================================================== */",
		"/*     __                        _____       _                                */",
		"/*  __|  | ___  ___  ___  ___   |   __| _ _ | |_  _ _  ___  ___               */",
		"/* |  |  || .'||_ -|| . ||   |  |   __|| | || '_|| | ||  _|| .'|              */",
		"/* |_____||__,||___||___||_|_|  |__|   |___||_,_||___||_|  |__,|              */",
		"/* Front-End Web Developer &amp; User Experience Designer                     */",
		"/*                                                                            */",
		"/* jfukura@gmail.com                                                          */",
		"/*                                                                            */",
		"/* ========================================================================== */",
		" ",
		"/* ========================================================================== */",
		"/* PROFESSIONAL EXPERIENCE                                                    */",
		"/* ========================================================================== */",
		" ",
		"var CapitalOneInvesting = new Employment(2014, 2016, 'Design Technologist');",
		"// As Design Technologist at Capital One Investing, I have created and",
		"// maintained several javascript based applications. These applications",
		"// are for internal, associate usage and incorporate tools like handlebars,",
		"// angular.js and custom javascript and jQuery functions. During my time at",
		"// Capital One, I have also developed several jQuery plugins, one of which",
		"// extends the jQuery UI library.",
		"// ",
		"// Along with this, I have been working to standardize development practices",
		"// based on the MVC design pattern, Object Oriented Javascript, and the OOCSS",
		"// patterns for CSS.",
		" ",
		"var MusicProdigy = new Employment(2016, 2015, 'Web Dev &amp; UX Designer');",
		"// Designing user experiences for a mobile application was my primary job",
		"// function at Music Prodigy. Along with this, I designed relational",
		"// databases and worked heavily in PHP for the web application. I was also",
		"// placed in charge of brand management, and maintaining the company website",
		" ",
		"var CapitalOneInvesting = new Employment(2014, 2015, 'Contract Front-End Dev');",
		"// My first run with Capital One Investing was as a contractor for the Brand",
		"// Creative team. I was hired to assist with building landing pages, HTML",
		"// emails, and designing web campaigns. By the end of my contract, I was also",
		"// given the opportunity to start prototyping solutions for internal web apps",
		" ",
		"var averetek = new Employment(2011, 2014, 'Creative Lead');",
		"// At averetek, I was the sole creative in a sea of developers. I managed",
		"// everything from company website design, wireframing and designing assets",
		"// for our clients, prototyping new tools and helping design the user",
		"// experience for enterprise level B2B applications.",
		" ",
		"/* ========================================================================== */",
		"/* EDUCATION                                                                  */",
		"/* ========================================================================== */",
		" ",
		"var CWU = new Edu(2000, 2005, 'BA', 'K-12 Instrumental &amp; General Music');",
		"// At Central Washington University, I studied music education as a saxophonist.",
		"// During my time as a student, I taught private lessons and also worked for the",
		"// Asia University America program as a computer technician. For this position",
		"// I was in charge of maintaining the CWU/AUAP page on the CWU website, as well",
		"// as assisting the AUAP students with setting up their computers on the school",
		"// network and troubleshooting computer issues with them.",
		" ",
		"// I anticipate completing my front-end web developer course with @udacity by",
		"// December 15, 2016",
		"if (Date.now() >= 1481788800000) {",
		"    var Udacity = new Edu(2016, 2016, 'nanodegree', 'Front-End Developer');",
		"} else {",
		"    studyCourse('udacity', 'nanodegree', 'Front-End Developer');",
		"}"
	);
	
	$wrapped = array_map(
		function ($line) {
			echo '<code class="code-line javascript">'.htmlentities($line).'</code>';
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
	<pre class="code">
		<?php codeGenerator(); ?>
		<!-- Code goes in here -->
	</pre>
	<script src="js/jquery-1.8.2.min.js"></script>
	<script src="js/highlight.pack.js"></script>
	<script>
		$(function () {
			$('code').each(function (i, block) {
				hljs.highlightBlock(block);
			});
		});
	</script>
</body>
</html>