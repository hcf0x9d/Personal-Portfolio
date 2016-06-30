<?php
    /*
      _____     _______ __              ___ ___ __ _____ _______ 
     | _   |   |       |__.--------.   |   Y   |__| _   |   _   |
     |.|   |   |.|   | |  |        |   |   |   |__|.|   |.  |   |
     `-|.  |   `-|.  |-|__|__|__|__|   |____   |__`-|.  |.  |   |
       |:  |     |:  |                     |:  |    |:  |:  1   |
       |::.|     |::.|                     |::.|    |::.|::.. . |
       `---'     `---'                     `---'    `---`-------'

    Jason Fukura 2015 - 2016
    */

    //api //api.behance.net/v2/users/jasonfukura/projects?client_id=3lOxMOuCb2tEBPrCAftxoVxv4WS4zchh

	$url = $_SERVER['REQUEST_URI'];
    $tokens = explode('/', $url);
    $urlId = $tokens[sizeof($tokens)-2];
    $urlName = $tokens[sizeof($tokens)-1];

    checkGalleryExpiry('gallery');

    function checkGalleryExpiry($id) {
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
        global $gallery;
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
                                    
            $gallery .= '<div class="grid">
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


    checkExpiry($urlId);

    function checkExpiry($id) {
        $file = 'library/'.$id.'.json';
        if (file_exists($file)) {
            $now = $_SERVER['REQUEST_TIME'];
            $time = filemtime($file);
            $offset = 7*24*60*60;

            if ($now < $time + $offset) {
                buildProject('cache', $id);
                return true;
            } else {
                buildProject('api', $id);

                return false;
            }
        } else {
            buildProject('api', $id);
            return false;            
        }
    }
    
    function buildProject($opt, $id) {
        global $title, $subtitle, $description, $views, $appreciations, $items;
        
        $api = '';
        
        if ($opt === 'cache') {
            $api = 'library/'.$id.'.json';
        } else {
            $api_url = 'https://api.behance.net/v2/projects/'.$id;
            $api_key = '?client_id=3lOxMOuCb2tEBPrCAftxoVxv4WS4zchh';

            $api = $api_url.$api_key;
            file_put_contents('library/'.$id.'.json', file_get_contents($api));
        }
        
        $json = json_decode(file_get_contents($api));
        $items = '';

        $title = $json->project->name;
        $description = $json->project->description;
        $subtitle = '';
        $src = '';
        $caption = '';
        $views = $json->project->stats->views;
        $appreciations = $json->project->stats->appreciations;

        foreach($json->project->fields as $field) {
            $subtitle .= $field.' ';
        }

        foreach($json->project->modules as $module) {
            $src = $module->src;

            if (isset($module->caption_plain)) {
                $caption = $module->caption_plain;
            }

            $items .= '<li class="project_item">
                    <img src="'.$src.'" class="project_item_img" />
                    <span class="project_item_caption">'.$caption.'</span>
                </li>';
        }

    
    
    }
    $api_url = 'https://api.behance.net/v2/users/jasonfukura/projects';
    $api_key = '?client_id=3lOxMOuCb2tEBPrCAftxoVxv4WS4zchh';

    $api = $api_url.$api_key;
        
    $api = 'library/23421321.json';

//    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title><?php echo $subtitle; ?> | Jason Fukura</title>
    <meta name="description" content="<?php echo $title; ?> - <?php echo $description; ?>">
    <?php include('library/include/head.inc.php'); ?>
    <style>
        .nav{
            display: block;
            border-bottom: 1px solid;
            margin-bottom: 2em;
            padding-bottom: 1em;
        }
            .nav_target{
                color: #fff;
                text-decoration: none;
            }
    </style>
</head>
<body itemscope itemtype="http://schema.org/Person">

    <header class="w-header container_12">
        <a href="/" class="grid_2" style="text-align: center;padding-top: 10px;">
            <img src="/image/LOGO-Fukura2016_LIN.png" alt="User Experience Designer, Jason Fukura's logo" class="logo">
        </a>
        <div class="grid_8">
            <div class="header">
                <nav class="nav">
                    <a href="/" class="nav_target"><i class="btl bt-home"></i></a>
                </nav>
                <h1 class="title" itemprop="jobtitle"><?php echo $title; ?></h1>
                <h2 class="subtitle" itemprop="name"><?php echo $subtitle; ?></h2>
            </div>
        </div>
    </header>
    
    <article class="container_12" style="padding-top:4em;">
        <div class="grid_8 push_2">
            <div class="grid_6 alpha" itemprop="description">
                <p><?php echo $description; ?></p>
            </div>
            <aside class="grid_2 omega">
                <ul class="social">
                    <li class="social_item"><i class="btr bt-eye social_item_icon"></i> <b><?php echo $views; ?></b> views</li>
                    <li class="social_item"><i class="btr bt-thumbs-up social_item_icon"></i> <b><?php echo $appreciations; ?></b> likes</li>
                </ul>
            </aside>
        </div>
    </article>
    
    <section class="container_12">
        <div class="clear"></div>
        <ul class="project grid_8 push_2">
            <?php echo $items; ?>
        </ul>
    </section>
    
    <section id="gallery" class="container_12">
        <h1 class="h2 grid_8 push_2">Portfolio of stuff</h1>
        <div class="clear"></div>
        <div class="w-items">
            <?php echo $gallery; ?>
        </div>
    </section>
    
    <div class="clear"></div>
    <section class="container_12" style="padding-bottom:10em;padding-top: 4em;">
        <div class="grid_7">
            <h1 class="h3">Contact me to talk about User Experience, development or nerf guns</h1>
        </div>
        <div class="grid_5">
            <p>I love to talk about design, great interfaces, typefaces, coffee, bourbon and nerf modifications.  Get in touch and let's start the dialogue.</p>
            <ul class="grid_5 alpha omega social">
                <li class="social_item"><a href="https://www.behance.net/jasonfukura" rel="me" itemprop="url" class="social_item_target hexagon behance" target="_blank" onclick="gaTag('Social Media Link', 'Click', 'Behance');"><i class="fab fab-behance social_item_icon"></i> <span class="text-hidden">Jason Fukura on Behance</span></a></li>
                <li class="social_item"><a href="https://www.twitter.com/jasonfukura" rel="me" itemprop="url" class="social_item_target hexagon twitter" target="_blank" onclick="gaTag('Social Media Link', 'Click', 'Twitter');"><i class="fab fab-twitter social_item_icon"></i> <span class="text-hidden">Jason Fukura on Twitter</span></a></li>
                <li class="social_item"><a href="https://www.linkedin.com/in/jfukura" rel="me" itemprop="url" class="social_item_target hexagon linkedin" target="_blank" onclick="gaTag('Social Media Link', 'Click', 'LinkedIn');"><i class="fab fab-linkedin-alt social_item_icon"></i> <span class="text-hidden">Jason Fukura on LinkedIn</span></a></li>
                <li class="social_item"><a href="#" rel="me" itemprop="url" class="social_item_target hexagon email" target="_blank" onclick="emailMe(); return false;"><i class="btb bt-envelope social_item_icon email"></i> <span class="text-hidden"></span></a></li>
            </ul>
        </div>
    </section>
    <footer class="container_12">
        <div class="grid_12 w-footer">
            <div class="footer">
                <p class="secondary footer--bottom">made with &hearts; in Kingston, WA | &copy; <?php echo Date('Y'); ?> Jason Fukura</p>
            </div>            
        </div>
    </footer>
    
</body>
</html>