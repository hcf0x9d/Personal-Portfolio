<?php

function resumeBuilder() {

	$xml = simplexml_load_file('resume.xml');

	foreach($xml->experience as $job) {
		$company = $job->company;
		$title = $job->title;
		$yearStart = $job->years->start;
		$yearEnd = $job->years->end;
		$tags = explode(", ", $job->tags);
		$description = $job->description;
		$tagHTML = '';

		foreach($tags as $tag) {
			$tagHTML .= '<li class="employment-tags-item">'.$tag.'</li>';
		}

		$html = '<li class="employment-item">
				<div class="col-sm-3 col-xs-3 employment-year">
					<h2 class="subheadline mod-help">'.$yearStart.' - '.$yearEnd.'</h2>
				</div>
				<div class="col-sm-9 col-xs-9 employment-info">
					<h2 class="subheadline">'.$company.' <span class="employment-info-title">'.$title.'</span></h2>
					<ul class="employment-tags">
						'.$tagHTML.'
					</ul>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae modi molestias alias, voluptates vitae corporis in aspernatur dolorem eaque repellat?</p>
				</div>
			</li>';

		echo $html;
	}

}

?>

<section id="resume" class="resume container section">
	<div class="section-marker mod-left shadowMe">Resume</div>
	<div class="row">
		<div class="col-md-4 col-md-push-8">
			<canvas id="myChart" width="300" height="300"></canvas>
			<div id="js-legend" class="chart-legend"></div>
		</div>

		<ul class="employment col-md-8 col-md-pull-4">
			<?php resumeBuilder(); ?>			
		</ul>

		
	</div>
	<div class="row">
		<ul class="col-md-8 col-md-push-2 contact">
			<li class="contact-item mod-block mod-smaller">Find me:</li>
			<li class="contact-item"><a href="https://twitter.com/jasonfukura" target="_blank" class="contact-item-target mod-twitter">Twitter</a></li>
			<li class="contact-item"><a href="https://plus.google.com/+JasonFukura" target="_blank" class="contact-item-target mod-google">Google+</a></li>
			<li class="contact-item"><a href="https://www.instagram.com/jfukura/" target="_blank" class="contact-item-target mod-instagram">Instagram</a></li>
			<li class="contact-item"><a href="http://vsco.co/jfukura" target="_blank" class="contact-item-target mod-vsco">VSCO</a></li>
			<li class="contact-item"><a href="https://www.behance.net/jasonfukura" target="_blank" class="contact-item-target mod-behance">Behance</a></li>
			<li class="contact-item"><a href="https://linkedin.com/in/jfukura" target="_blank" class="contact-item-target mod-linkedin">LinkedIn</a></li>
			<li class="contact-item"><a href="https://github.com/jfukura" target="_blank" class="contact-item-target mod-github">GitHub</a></li>
			<li class="contact-item mod-block"><a href="mailto:jason@jasonfukura.com" class="contact-item-target mod-email">jason@jasonfukura.com</a></li>

		</ul>
	</div>
</section>

<footer class="footer container">
	<div class="row">
		<div class="col-md-12">
			<p class="footer-type">&copy; <?php echo date('Y'); ?> Jason Fukura</p>
		</div>
	</div>
</footer>