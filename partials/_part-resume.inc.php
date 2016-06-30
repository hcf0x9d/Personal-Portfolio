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
				<div class="col-sm-3 col-xs-4 employment-year">
					<h2 class="subheadline mod-help">'.$yearStart.' - '.$yearEnd.'</h2>
				</div>
				<div class="col-sm-9 col-xs-8 employment-info">
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
		<ul class="employment col-md-8">
			<?php resumeBuilder(); ?>			
		</ul>

		<div class="col-md-3">
			<ul class="skills js-skills">
				<li class="skills-item" data-percent="0.95"><span class="mod-small-caps">html5/css3</span><span class="skills-item-chart"></span></li>
				<li class="skills-item" data-percent="0.87"><span class="mod-small-caps">php</span><span class="skills-item-chart"></span></li>
				<li class="skills-item" data-percent="0.92">User Experience<span class="skills-item-chart"></span></li>
				<li class="skills-item" data-percent="0.9">javascript<span class="skills-item-chart"></span></li>
				<li class="skills-item" data-percent="0.82">Branding<span class="skills-item-chart"></span></li>
				<li class="skills-item" data-percent="0.86">Infographics<span class="skills-item-chart"></span></li>
				<li class="skills-item" data-percent="0.95">Photography<span class="skills-item-chart"></span></li>
				<li class="skills-item" data-percent="0.98">Nerf Marksmanship<span class="skills-item-chart"></span></li>
				
			</ul>
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
</section>