<?php

// Page Variables
$metaTitle = 'Title';
$metaDescr = 'Description';
$metaImage = 'IMAGE';

include 'views/part.head.php';
include 'controllers/view.controller.php';

?>

<main class="main container entry">
    <?php ViewControl(); ?>
</main>

<?php

include 'views/part.foot.php';

?>