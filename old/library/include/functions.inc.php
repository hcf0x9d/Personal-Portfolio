<?php

function checkExpiry($id) {
    $file = 'library/'.$id.'.json';
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
        $api = 'library/gallery.json';
    } else {
        $api_url = 'https://api.behance.net/v2/users/jasonfukura/projects';
        $api_key = '?client_id=3lOxMOuCb2tEBPrCAftxoVxv4WS4zchh';

        $api = $api_url.$api_key;
        file_put_contents('library/'.$id.'.json', file_get_contents($api));
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

function gallerySize($ua){
        
    $iphone = strstr(strtolower($ua), 'iphone'); //Search for 'mobile' in user-agent (iPhone have that)
    $android = strstr(strtolower($ua), 'android'); //Search for 'android' in user-agent
    $windowsPhone = strstr(strtolower($ua), 'phone'); //Search for 'phone' in user-agent (Windows Phone uses that)

    if($iphone || $android || $windowsPhone){ //If it's a phone and NOT a tablet
        return '200';
    } else {
        return '400';
    }    
}

?>