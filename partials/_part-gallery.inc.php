<?php

function checkExpiry($id) {
    $file = 'cache/'.$id.'.json';
    if (file_exists($file)) {
        $now = $_SERVER['REQUEST_TIME'];
        $time = filemtime($file);
        $offset = 7*24*60*60;

        if ($now < $time + $offset) {
            buildApi('cache', $id);
            return true;
        } else {
            buildApi('api', $id);

            return false;
        }
    } else {
        buildApi('api', $id);
        return false;
    }
}

function buildApi($opt, $id) {
    global $items;
    if ($opt === 'cache') {
        $api = 'cache/gallery.json';
    } else {
        $api_url = 'http://api.behance.net/v2/users/jasonfukura/projects';
        $api_key = '?client_id=3lOxMOuCb2tEBPrCAftxoVxv4WS4zchh';

        $api = $api_url.$api_key;
        
        $response = file_get_contents($api);

        // echo 'the response is '.$response;
        
        file_put_contents('cache/'.$id.'.json', $response);
    }
    
    $json = json_decode(file_get_contents($api));
            
    foreach($json->projects as $project) {
        $id = $project->id;
        $title = $project->name;
        $subtitle = '';
        $image = reset($project->covers);
                                
        $items .= '<div class="grid">
    <figure class="effect-roxy">
        <img src="'.$image.'" alt="'.$title.'">
        <figcaption>
            <h2>'.$title.'</h2>
            <p></p>
            <a href="/project/'.$id.'/'.str_replace(" ", "-", $title).'"
                data-id="'.$id.'"
                data-title="'.str_replace(" ", "-", $title).'"
                onclick="gaTag(\'Project\', \'View\', \''.$title.'\');">View more</a>
        </figcaption>           
    </figure>
</div>';
   }
}

checkExpiry('gallery');
?>
<section id="gallery" class="gallery container section">
	<h2 class="section-marker mod-right shadowMe">Selected Projects</h2>
	<div class="row">
		<div class="w-items">
            <?php echo $items; ?>
        </div>
	</div>
</section>