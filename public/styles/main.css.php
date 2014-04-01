<?php
header("Content-type: text/css"); 
define('PUBLIC_URL', 'http://det.digitaleselskab.org');
?>


body {
	background: url(<?php echo PUBLIC_URL; ?>/images/background2.jpg) top center fixed;
	color: #fff;
	font-size: 18px;
	line-height: 1.3;
	text-shadow: 0px 1px 1px #222;
	font-family: "Gill Sans", "Gill Sans MT", "Museo Sans", Calibri, Tahoma, sans-serif;
}

#social-share {
	margin-top: 10px;
	margin-bottom: 10px;
}

.twitter-btn {
	float: right;
	margin-top: 2px;
	margin-right: 10px;
}

.fb-like {
	margin: 0px;
	float: right;
}

.clear {
	clear: both;
}

/* main content */

#main-content {
	width: 450px;
	padding: 0px 0px 30px 270px;
	margin: 0px auto;
}

h1 {
	font-size: 80px;
	text-transform: uppercase;
	line-height: 1;
}

h1 span {
	display: block;
}

h2 {
	margin-top: 20px;
	font-size: 40px;
	font-family: georgia, serif;
	font-style: italic;
}

h3 {
	text-transform: uppercase;
	margin-top: 30px;
	font-size: 24px;
}

a {
	color: #fff;
	text-decoration: none;
}

a:hover {
	text-decoration: underline;
}

sub {
	font-family: georgia, serif;
	font-style: italic;
	text-transform: lowercase;
}

/* main body */

#main-body p {
	margin-top: 20px;
}

#main-body a {
	text-decoration: underline;
}

#main-body a:hover {
	text-decoration: none;
}

/* forms */

form {
	padding-top: 40px;
	margin-top: 30px;
	background: url(<?php echo PUBLIC_URL; ?>/images/divider.png) center top no-repeat;
}

form h3 {
	margin: 0px 0px 20px;
}

form label, form input, form textarea {
	display: block;
}

form label {
	margin-bottom: 10px;
	text-transform: uppercase;
}

form input, form textarea {
	font-size: 16px;
	font-family: "Gill Sans", "Gill Sans MT", Calibri, sans-serif;
	color: #333;
	text-shadow: 0px 1px 1px #fff;
	margin-bottom: 20px;
	width: 434px;
	padding: 8px;
	border: none;
	border-top: #222 1px solid;
	background: #fff;
	background: rgba(255, 255, 255, 0.70);
}

form textarea {
	height: 120px;
}

form input.button {
	width: 100%;
	color: #fff;
	background: #222;
	background: rgba(34, 34, 34, 0.75);
	text-shadow: 0px 1px 1px #222;
	border: none;
	border-bottom: #222 1px solid;
	text-transform: uppercase;
}

form input.button:hover {
	background: #111;
	background: rgba(34, 34, 34, 0.85);
}

form input.problem, form textarea.problem {
	background: #fff;
	background: rgba(255, 220, 230, 0.70);
}

/* rsvp */

#rsvp p {
	margin: 20px 0px;	
}

#rsvp a {
	text-decoration: underline;
}

#rsvp a:hover {
	text-decoration: none;
}

/* attending list */

#attending {
	padding-top: 40px;
	margin-top: 30px;
	background: url(<?php echo PUBLIC_URL; ?>/images/divider.png) center top no-repeat;	
}

#attending h3 {
	margin: 0px 0px 20px;
}

#attending li {
	font-size: 14px;
	margin-top: 20px;
}

#attending h4 {
	font-size: 16px;
	text-transform: uppercase;
}

#attending h4 sub {
	margin-left: 5px;
	font-size: 14px;
}

#attending blockquote {
	margin-top: 5px;
	font-family: georgia, serif;
	font-style: italic;
}

/* footer */

#footer {
	padding-top: 40px;
	margin-top: 30px;
	background: url(<?php echo PUBLIC_URL; ?>/images/divider.png) center top no-repeat;
	text-transform: uppercase;
	font-size: 12px;
	text-align: center;
}

#footer a#license {
	margin-left: 15px;
}

#footer a#back-to-top {
	display: block;
	margin-top: 15px;
}

/* side info bar */

#side-info {
	width: 220px;
	height: 1000px;
	position: fixed;
	top: 50px;
	right: 50%;
	margin-right: 140px;
}

/* pint */

#pint {
	width: 220px;
	height: 340px;
	overflow: hidden;
	position: relative;
	background: url(<?php echo PUBLIC_URL; ?>/images/pint-bg.jpg) top;
}

#pint img {
	position: absolute;
	top: 0px;
	left: 0px;
	display: block;
}

/* next event */

#next-event {
	width: 220px;
	position: relative;
	z-index: 2;
	padding: 20px 0px 10px;
	text-align: center;
	text-transform: uppercase;
}

#next-event .info {
	display: block;
	margin: 15px 0px;
	font-family: georgia, serif;
	font-style: italic;
	text-transform: lowercase;
}

#next-event sup {
	font-size: 12px;
	vertical-align: text-top;
	margin-left: 1px;
}

#contact-details {
	background: url(<?php echo PUBLIC_URL; ?>/images/divider.png) center top no-repeat;
	z-index: 3;
	position: relative;
	text-align: center;
	height: 500px;
	padding-top: 30px;
}

#contact-details li {
	margin-bottom: 10px;
	text-transform: uppercase;
}

/* sn icons */

div#social-wrapper {
	margin-top: 25px;
	background: url(<?php echo PUBLIC_URL; ?>/images/divider.png) center top no-repeat;
	padding-top: 5px;
}

ul#social {
	height: 48px;
	overflow: hidden;
	margin: 0px 0px 30px;
	margin-left: 170px;
}

ul#social li {
width: 48px;
height: 48px;
	float: left;
	margin-right: 30px;
}


ul#social li a {
	text-indent: -9999px;
	font-size: 0px;
	line-height: 0;
	display: block;
	width: 100%;
	height: 100%;
}

ul#social li#twitter a {
	background-image: url(/images/twitter.png);
}

ul#social li#facebook a {
	background-image: url(/images/facebook.png);
}

li.attending {
	border-bottom: 1px solid #717B61;
	margin: 4px;
	padding-bottom: 15px;
}

li.attending h4 {
	padding-top: 25px;
}

li.attending img {
	max-height: 75px;
	max-width: 75px;
}
