<?php
//Load bootstrapper
#require realpath(dirname(__FILE__)) . '/../protected/bootstrap.php';
define('APP_ROOT', realpath(dirname(__FILE__)) . '/../app/');
define('PUBLIC_URL', 'http://det.digitaleselskab.org');

define('MEETUP_KEY', '<PUT YOUR MEETUP KEY HERE>');

require APP_ROOT . 'language/Norwegian.php';
require APP_ROOT . '/../vendor/autoload.php';

require APP_ROOT . 'Language.php';
Language::SetLanguage($language);

use DMS\Service\Meetup\MeetupKeyAuthClient;

$meetupClient = MeetupKeyAuthClient::factory(array('key' => MEETUP_KEY));
$events = $meetupClient->getEvents(array('group_urlname' => 'Det-Digitale-Selskab'));

$ddsEvent = array();

foreach($events as $event) {
	$ddsEvent = $event;
	$rsvps = $meetupClient->getRSVPs(array('event_id' => $event['id']));
}


#var_dump($ddsEvent);

require_once(APP_ROOT . '/Language.php');
Language::SetLanguage($language);

header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="UTF-8"> 

	<title><?php echo Language::Get('SITE-HEADER'); ?> &mdash; <?php echo Language::Get('SITE-STRAPLINE') . ' ' . Language::Get('SITE-TITLE-KEYWORDS'); ?></title>
	
	<link rel="icon" type="<?php echo PUBLIC_URL; ?>/image/png" href="/images/icon.png" />
	<link rel="apple-touch-icon" href="<?php echo PUBLIC_URL; ?>/images/app-icon.png" />
	
	<link rel='stylesheet' href='styles/reset.css' />
	<link rel='stylesheet' href='styles/main.css.php' />
</head>

<body>

	<div id='main-content'>
		<div id="social-share">
	
		<div class="fb-like" data-href="http://www.facebook.com/detdigitaleselskab" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false"></div>
		<div class="twitter-btn">
			<a href="https://twitter.com/digitaltselskab" class="twitter-follow-button" data-show-count="false" data-lang="no">Følg @digitaltselskab</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
		<div class="clear"></div>
	
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=180530028706535";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		</div>
		<h1><?php echo Language::Get('SITE-TITLE'); ?></h1>
		
		<h2><?php echo Language::Get('SITE-STRAPLINE');?></h2>
		
		<div id='main-body'>
		
			<h3><?php echo Language::Get('DESCRIPTION-TITLE'); ?></h3>
		
			<?php echo $ddsEvent['description']; ?>
		</div>
		

	
		
		<div id='attending'>
	


			<h3>Hvem kommer?</h3>
	
			
			<a href="<?php echo $ddsEvent['event_url']; ?>">Meld deg p&aring;</a>

			<?php if (empty($rsvps)): ?>
			
			<p><?php echo Language::Get('RSVP-NO-SIGNUPS-YET'); ?></p>
			
			<?php else: ?>
			<ol>
			
				<?php $i = 1; foreach($rsvps as $rsvp): ?>
					<li class="attending">
						<div style="float: right;">
						<?php if(isset($rsvp['member_photo'])): ?>
						<img src="<?php echo $rsvp['member_photo']['thumb_link'] ?>" title="Se på søte <?php echo $rsvp['member']['name']; ?>" />
						<?php endif; ?>
						</div>
						<div style="float: left;">
						<h4><?php echo $i . '. ' . $rsvp['member']['name']; ?></h4>
						</div>
						<div class="clear">
					</li>
					
				<?php $i++; endforeach;?>
			
				
			</ol>
			
			<?php endif; ?>
			
		</div>
		<h3>Ta Kontakt: </h3>
		 <p>Twitter: <a href="http://twitter.com/digitaltselskab" rel="external">@digitaltselskab</a>
			<br/>
			Facebook: <a href="https://www.facebook.com/detdigitaleselskab" rel="external">Det digitale selskab</a>
		</p>
		
		<div id='footer'>
			<p>
			<a rel='author' id='site-design' href='http://www.semibad.com' title='Making sites and taking names'>Site design av Andi Farr <sub>at</sub> semiBad.</a>
			<a rel='license' id='license' href='http://creativecommons.org/licenses/by-nc-sa/3.0/' title='Licensed under Creative Commons Attribution-Noncommercial-Share Alike 3.0'>Some rights reserved.</a>
			</p>
			<p>
				<a href="http://www.kardigan.no">Et Kardigan AS initiativ</a>
			</p>
			<p> I samarbeid med <a href="http://www.thegeekestdrink.com">The Geekest Drink</a>
			</p>
			<a id='back-to-top' href='#main-content' title='Back to the top'>En runde til</a>
		
		</div>
	
	</div>
	
	<div id='side-info'>

		<div id='pint'>
		
			<img id='foam' src='<?php echo PUBLIC_URL; ?>/images/pint-foam.png' width='220' height='340' />
			<img id='beer' src='<?php echo PUBLIC_URL; ?>/images/pint-beer.png' width='220' height='340' />
			<img id='overlay' src='<?php echo PUBLIC_URL; ?>/images/pint-overlay-new.png' width='220' height='340' />
		
		</div>
		
		<div id='next-event'>
				N&aring;r:
		<?php if(isset($ddsEvent['venue'])): ?>
			<span class='info'><?php $date = new \DateTime('now', new \DateTimeZone('Europe/Oslo'));
			$date->setTimestamp($ddsEvent['time'] / 1000);
				echo $date->format('j/n \k\l: H:i');
			?></span>
			
			Hvor:
			<span class="info"><?php echo $ddsEvent['venue']['name']; ?></span>
		
			
		<?php endif; ?>
			<span class='info'>
			<?php echo $ddsEvent['venue']['address_1']; ?>
			<br/>
			<?php echo $ddsEvent['venue']['city']; ?>
			<?php /** if(isset($event['venue_street'])): ?>
				<?php if ($event['map']) { echo "<a href='" . $event['map'] . "'>"; } ?>
				<?php echo $event['venue']; echo ', ' . $event['venue_street']; ?>
				<?php if ($event['map']) { echo "</a>"; } ?>
			<?php else: ?>
				Kommer snart
			<?php endif; **/?>
			</span>
		
		</div>
	
	</div>
	<script src='<?php echo PUBLIC_URL; ?>/scripts/jquery-1.4.2.min.js'></script>
	<script src='<?php echo PUBLIC_URL; ?>/scripts/pint.js'></script>
	<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-4464167-7']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
