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
    require('library/include/functions.inc.php');
    require('library/include/head.inc.php');

    checkExpiry('gallery');

?>

<body itemscope itemtype="http://schema.org/Person">
    <section id="hero" class="hero hero--head">
        <header class="w-header container_12">
            <nav class="siteNav">
                <ul class="siteNav_list">
                    <li class="siteNav_item">
                        <a class="siteNav_target" href="#intro">
                            <i class="siteNav_target_icon btl bt-comment"></i>
                            <span class="siteNav_target_text">Intro</span>
                        </a>
                    </li>
                    <li class="siteNav_item">
                        <a class="siteNav_target" href="#portfolio">
                            <i class="siteNav_target_icon btl bt-briefcase"></i>
                            <span class="siteNav_target_text">Portfolio</span>
                        </a>
                    </li>
                    <li class="siteNav_item w-logo">
                        <a class="siteNav_target" href="#hero">
                            <img src="/image/LOGO-Fukura2016_LIN.png" alt="User Experience Designer, Jason Fukura's logo" class="logo">
                        </a>
                    </li>
                    <li class="siteNav_item">
                        <a class="siteNav_target" href="#services">
                            <i class="siteNav_target_icon btl bt-check-square"></i>
                            <span class="siteNav_target_text">Services</span>
                        </a>
                    </li>
                    <li class="siteNav_item">
                        <a class="siteNav_target" href="#contact">
                            <i class="siteNav_target_icon btl bt-envelope"></i>
                            <span class="siteNav_target_text">Contact</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="container_12">
            <div class="w-title grid_10 push_1">
                <h1 class="title">UX Designer, SEO Professional, Infographic Artist and Web Developer</h1>
            </div>  
        </div>
        <img src="/image/hero/hero-1600.jpg" class="hero_image" alt="">
    </section>

    <section id="intro">
        <article id="bio" class="container_12 section--overlapped--top">
            <div class="grid_5 alpha">
                <div class="rect-angledBottom">
                    <div class="gradientOverlay"></div>
                    <img src="/image/jason.jpg" alt="">
                </div>
                <h1 class="h3" style="padding-left:20px;padding-right:20px;">Hi, I’m Jason Fukura.  I like User-Centered Design.</h1>
            </div>
            <div class="grid_7 bio_body" itemprop="description">
                <p>Passionate, life-long student of art, design, psychology and philosophy.  Artist.  Father of three. Proficiency in the Adobe Creative Suite, Microsoft Office, and several wireframing and prototyping tools. I work in html5, css3, jQuery, javascript, php, xml, json, MySQL and have worked with .NET and SQL projects. I am also a professional in the Search Engine Optimization (SEO), infographics and data visualization field.</p>
                <p>Outside of the web space, I enjoy working with videography and photography as well as music and art. I’m a foodie, bourbon snob and marksman with a nerf gun.</p>
            </div>
        </article>
    </section>


                
    <section id="portfolio" class="container_12">
        <h1 class="h2 grid_8 push_2">Portfolio of stuff</h1>
        <div class="clear"></div>
        <div class="w-items">
            <?php echo $items; ?>
        </div>
    </section>
    
    <section id="services">
        <header class="container_12">
            <h1 class="h2 grid_8 push_2">Things I do</h1>
        </header>
        <article class="container_12 section--overlapped--top overlap--2">
            <div class="clear"></div>
            <div class="grid_4 rtb">
                <div class="rtb_inner">
                    <i class="rtb_icon btl bt-sitemap"></i>
                    <h2 class="h3">User Experience</h2>
                    <p>The greatest idea in the world is useless if users don't understand it.  User-flows, personas, wireframes and prototypes are my weapons.</p>
                </div>
            </div>
            <div class="grid_4 rtb">
                <div class="rtb_inner">
                    <i class="rtb_icon btl bt-mobile"></i>
                    <h2 class="h3">Web/App Design</h2>
                    <p>Wrapping user-centered design in a visual package that makes users hungry to interact with your app.  The aesthetics create the appetite.</p>
                </div>
            </div>
            <div class="grid_4 rtb">
                <div class="rtb_inner">
                    <i class="rtb_icon btl bt-code"></i>
                    <h2 class="h3">Development</h2>
                    <p>SEO friendly, clean, semantic HTML5 code that ties into a PHP structure and MySQL database.  I can do that.  APIs?  Check.</p>
                </div>
            </div>
            <div class="clear"></div>
            <ul class="services">
                <li class="grid_3 service_item">
                    <i class="service_icon btl bt-search bt-2x"></i>
                    <h3 class="h4">SEO</h3>
                    <div class="service_item_cover"></div>
                    <img src="/image/tile/seo.jpg" alt="" class="service_item_img">
                </li>
                <li class="grid_3 service_item">
                    <i class="service_icon btl bt-pie-chart bt-2x"></i>
                    <h3 class="h4">Infographics</h3>
                    <div class="service_item_cover"></div>
                    <img src="/image/tile/infographics.jpg" alt="" class="service_item_img">
                </li>
                <li class="grid_3 service_item">
                    <i class="service_icon btl bt-camera bt-2x"></i>
                    <h3 class="h4">Photography</h3>
                    <div class="service_item_cover"></div>
                    <img src="/image/tile/photography.jpg" alt="" class="service_item_img">
                </li>
                <li class="grid_3 service_item">
                    <i class="service_icon btl bt-play bt-2x"></i>
                    <h3 class="h4">Motion Graphics</h3>
                    <div class="service_item_cover"></div>
                    <img src="/image/tile/video.jpg" alt="" class="service_item_img">
                </li>
                <li class="grid_3 service_item">
                    <i class="service_icon btl bt-film bt-2x"></i>
                    <h3 class="h4">Video</h3>
                    <div class="service_item_cover"></div>
                    <img src="/image/tile/video.jpg" alt="" class="service_item_img">
                </li>
                <li class="grid_3 service_item">
                    <i class="service_icon btl bt-crown bt-2x"></i>
                    <h3 class="h4">Branding</h3>
                    <div class="service_item_cover"></div>
                    <img src="/image/tile/branding.jpg" alt="" class="service_item_img">
                </li>
                <li class="grid_3 service_item">
                    <i class="service_icon btl bt-light-bulb bt-2x"></i>
                    <h3 class="h4">Logo Design</h3>
                    <div class="service_item_cover"></div>
                    <img src="/image/tile/logo-design.jpg" alt="" class="service_item_img">
                </li>
                <li class="grid_3 service_item">
                    <i class="service_icon btl bt-notebook bt-2x"></i>
                    <h3 class="h4">Print Design</h3>
                    <div class="service_item_cover"></div>
                    <img src="/image/tile/print-design.jpg" alt="" class="service_item_img">
                </li>
            </ul>
        </article>
        
    </section>
    <section id="contact" class="w-hero--body">
        <div class="hero hero--body">
            <div class="container_12">
                <div class="grid_10 push_1">
                    <blockquote class="quote">
                        Jason has been an absolute pleasure to work with over the last 1 ½ years and we value his expertise and work ethic. He understands our business implicitly and works diligently to meet our global brand building needs. We consider Jason a valuable (extended) member of the apaiser global team and looking forward to working closely over the many years to come.
                        <footer><cite><span class="cite--name">Helen Williams</span></cite></footer>
                    </blockquote>
                </div>
                <div class="clear"></div>
            </div>
            <img src="/image/hero/hero-quote-1600.jpg" class="hero_image" alt="">
        </div>
    </section>
    <div class="clear"></div>
    <section class="container_12" style="padding-bottom:10em;">
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
    <script src="/library/script/jquery-1.7.2.min.js"></script>
    <script src="/library/script/scripts.js"></script>
    <script>
    $(function () {
        $(".siteNav_target").on('click', function() {
            var targ = $(this).attr('href');

            $('html, body').animate({
                scrollTop: $(targ).offset().top - 96
            }, 500);

            return false;
        });
    });
    </script>
</body>
</html>