<?php

/**
 * Home
 *
 */

// VARIABLES
$urlBase			= '';


// META
$pageTitle			= '';
$pageDescription	= '';

// OPEN GRAPH
$OGTitle			= '';
$OGDescription		= '';
$OGUrl				= $urlBase;
$OGImage			= $urlBase.'';

// PHP FUNCTIONS
// include('includes/functions.inc.php');

// HTML CONTENTS
include('partials/_head.inc.php');

// PAGE COMPONENTS
include('partials/_part-exposition.inc.php');
include('partials/_part-gallery.inc.php');
include('partials/_part-resume.inc.php');

// SCRIPT BUCKET
include('partials/_foot.inc.php');

?>