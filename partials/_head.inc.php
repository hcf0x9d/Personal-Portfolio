<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script>
		// if (window.location.protocol != "https:") {
		// 	window.location = "https://" + 
		// 		window.location.hostname + 
		// 		window.location.pathname +
		// 		 window.location.search;
		// }
	</script>

	<title><?php echo $pageTitle; ?></title>
	<meta property="description" content="<?php echo $pageDescription;?>">
	<meta property="og:title" content="<?php echo $OGTitle;?>">
    <meta property="og:url" content="<?php echo $OGUrl;?>">
    <meta property="og:image" content="<?php echo $OGImage;?>">
    <meta property="og:description" content="<?php echo $OGDescription;?>">

	<link rel="stylesheet" href="style/style.min.css">
	
</head>
<body>