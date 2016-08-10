/**
 * Jason Fukura
 * Front-End Web Developer &amp; User Experience Designer
 * 
 * 206 617 0650
 * jfukura@gmail.com
 */


var skillSet = {'javascript': 10, 'html' : 5};

/* ========================================================================== */
/* PROFESSIONAL EXPERIENCE													  */
/* ========================================================================== */

var CapitalOneInvesting = new Employment(2014, 2016, 'Design Technologist');
// In this role, I blah blah blah

var MusicProdigy = new Employment(2014, 2016, 'UX &amp; Web Dev');
// In this role, I blah blah blah

var CapitalOneInvesting = new Employment(2014, 2016, 'Web Developer');
// In this role, I blah blah blah

var averetek = new Employment(2014, 2016, 'Lead Creative');
// In this role, I blah blah blah

/* ========================================================================== */
/* EDUCATION																  */
/* ========================================================================== */

var CWU = new Edu(2000, 2005, 'BA', 'K-12 Instrumental &amp; General Music');

// I anticipate completing my front-end web developer course with @udacity by
// December 15, 2016.
if (Date.now() >= 1481788800000) {
	var Udacity = new Edu(2016, 2016, 'Cert', 'Front-End Developer');
} else {
	takeCourse('udacity', 'Front-End Developer');
}