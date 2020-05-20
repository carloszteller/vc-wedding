<?php
	ini_set("display_errors", true);
	ob_start();
	
	require 'config.php';
	
	$d = new Database();
	$db = $d->dbConnect();
	
	if($_POST) {
		$name = strip_tags(mysqli_real_escape_string($db, $_POST['name']));
		$email = strip_tags(mysqli_real_escape_string($db, $_POST['email']));
		$guestName = strip_tags(mysqli_real_escape_string($db, $_POST['guestName']));
		$event = strip_tags(mysqli_real_escape_string($db, $_POST['event']));
		
		$rsvpMessage = '<html><body>';
		$rsvpMessage .= '<h1 style="text-align: center; border-bottom: 1px solid #e7e7e7;">' . $name . ' has RSVPed!</h1>';
		
		$rsvpMessage .= '<table cellpadding="10" rules="all" style="margin: 0 auto;">';
		$rsvpMessage .= '<tr><td style="font-weight: bold;">Guest Name</td><td>' . $guestName . '</td></tr>';
		$rsvpMessage .= '<tr><td style="font-weight: bold;">Event</td><td>' . ucfirst($event) . '</td></tr>';
		$rsvpMessage .= '</table>';
		
		$rsvpMessage .= '</body></html>';
		
		$rsvpHeaders = "From: " . $name . "<" . $email . ">\r\n";
		$rsvpHeaders .= "MIME-Version: 1.0\r\n";
		$rsvpHeaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
		mail("rsvp@velvetcarlos2017.com", $name . " has RSVPed.", $rsvpMessage, $rsvpHeaders) or die();
		
		mysqli_query($db, 'insert into guest_list(name, email, guestName, event) values("' . $name . '", "' . $email . '", "' . $guestName . '", "' . $event . '");') or die(mysqli_error($db));
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-99576068-1', 'auto');
		ga('send', 'pageview');

	</script>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Carlos Teller">
	<meta name="description" content="We're getting married, and you're invited! Nos vamos a casar, y estan invitados! We put this site together to keep you in the loop with all the wedding happenings.">
	<meta name="keywords" content="velvet, carlos, wedding, september, boda, septiembre, married, casar">
	<meta name="google-site-verification" content="yBlw5ZJd819ggBIH-qEC-PBFDc1t1fwbgx6ripwkDSo" />
	
	<meta property="og:title" content="Velvet y Carlos" />
	<meta property="og:description" content="We're getting married, and you're invited! Nos vamos a casar, y estan invitados! We put this site together to keep you in the loop with all the wedding happenings." />
	<meta property="og:url" content="http://www.velvetcarlos2017.com" />
	<meta property="og:image" content="http://www.velvetcarlos2017.com/img/velvet-carlos.jpg" />
	<meta property="og:type" content="website" />
	
	<title>Velvet y Carlos</title>
	
	<!-- Stylesheets -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/vc-wedding.css" rel="stylesheet">

	<!-- Shortcut Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="img/vc-favicon.ico">
	
	<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<header class="jumbotron">
		<img src="img/vc-pp-banner.png" class="img-responsive" alt="Papel picado banner that spells out 'Velvet Carlos'">
		<div class="container">
			<div class="velvet-carlos-img" title="Picture of Velvet kissing Carlos"></div>
			<div class="fancy"><i class="fa fa-heart-o" aria-hidden="true"></i></div>
			<h1>September 2, 2017</h1>
		</div>
		<p class="scroll-down">Scroll <i class="fa fa-hand-o-down" aria-hidden="true" aria-label="Scroll Down"></i> Down</p>
	</header> <!-- end header -->
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
					MENU <i class="fa fa-bars" aria-hidden="true"></i>
				</button>
				<div class="navbar-brand"><img src="img/vc-logo.png" alt="Velvet y Carlos - Home" title="Velvet y Carlos - Home"></div>
			</div>
			<div class="collapse navbar-collapse" id="nav">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#story">Our Story</a></li>
					<li><a href="#day">The Day</a></li>
					<li><a href="#registry">Gift Registry</a></li>
					<li><a href="#rsvp">RSVP</a></li>
				</ul>
			</div>
		</div>
	</nav> <!-- end navigation -->
	<section id="story">
		<div class="container">
			<h1>Our Story</h1>
			<div class="row">
				<div class="col-md-6">
					<div class="velvet clearfix">
						<img src="img/velvet.png" class="story-img img-circle img-responsive pull-right" alt="Picture of Velvet" title="Picture of Velvet">
						<div class="story">
							<h3>Velvet</h3>
							<p>Around October 2011, I met Carlos at Baker Street Pub; my friend, Gaby, introduced me to him she said, "Es Carlitos. El es Argentino y judio. Todos les dicimos 'Carlos the Jew'." Even though, he doesn't remember that he met me around this time, I do.</p>
							<p>When things started going bad with my ex, Carlos was my crying shoulder and one of my best friends, but we were just that: friends. He never hit on me, or said anything to make me think that he liked me. So, we continued as friends.</p>
							<p>Then in 2015, my roommate at the time, Yarely, started telling me that Carlitos liked me. I said, "No way, he doesn't like. We're just really good friends." Then she said, "He's always aware of what you're doing." I said, "So, he's my friend."</p>
							<p>Then, Yarely said, "Well, what if he's your prince on a white horse coming to save you." Then, I said, "No, he's my friend. He's never said or done anything to make me think otherwise." Until one day...</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="carlos clearfix">
						<img src="img/carlos.png" class="story-img img-circle img-responsive pull-left" alt="Picture of Carlos" title="Picture of Carlos">
						<div class="story">
							<h3>Carlos</h3>
							<p>For years, every Saturday, I would meet up with a group of friends at Baker Street Pub. One night, a few of us were out in the patio; talking and smoking a cigarette. Right in front of me sat, what I thought then and still think now, the most beautiful girl in the world.</p>
							<p>At one point in the night she went in to get another drink, and I felt this was the best opportunity to ask a mutual friend if she was single. She wasn't... In fact, the guy she was with was a few tables away from us. So, I just let it be.</p>
							<p>Years later, our friendship grew and always had one thought, "One day, she will be mine." Many opportunites came and went -- my fault. Until one day...</p>
						</div>
					</div>
				</div>
			</div>
			<div class="together">
				<h3 class="text-center">Together</h3>
				<p>Until one day, Velvet asked Carlos if he wanted to take a shot. Carlos said, "Yeah, let's go inside." While waiting for the shots to come, Carlos put his arm around Velvet -- Carlos thought is was her upper-middle back, Velvet later confirmed it was her lower back.</p>
				<p>That's when Velvet got a suspision that Yarely was right and thought, "Carlos does liked me." After taking the shots, Velvet then asked Carlos, "Do you like me?" He replied, "Yes." She then said, "No. I mean, do you like me like me." He again said, "Yes."</p>
				<p>Suprised, but still unsure, she said, "Well, if you really like me, you'll take me out on a date." Carlos replied, "Ok. How about next Friday?" Once again suprised, she said, "Oh. OK."</p>
				<p>The first date was June 26, 2015. A month later, while in Austin, Carlos asked Velvet if she wanted to be his girlfriend. After a year and a half of dating, on January 1, 2017, Carlos asked Velvet to marry him. She said yes!</p>
			</div>
		</div>
	</section> <!-- end our story section -->
	<section id="day">
		<div class="container">
			<h1>The Day</h1>
			<div class="row">
				<div class="col-md-4 col-md-offset-2">
					<div class="where">
						<h3><i class="fa fa-map-marker text-center" aria-hidden="true"></i>Venue</h3>
						<div class="content">
							<p>Both the ceremony and the reception will be at:</p>
							<p><span class="bold">The Oaks at Heavenly</span><br>18826 Bandera Rd.<br>Helotes, TX 78023</p>
							<p>For directions, view the map below.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="when">
						<h3><i class="fa fa-clock-o text-center" aria-hidden="true"></i>Schedule</h3>
						<div class="content">
							<p><i class="fa fa-calendar" aria-hidden="true"></i> <span class="bold">Date: </span>Saturday, September 2, 2017</p>
							<p>
								<i class="fa fa-bell-o" aria-hidden="true"></i> <span class="bold">Ceremony: </span>6:00pm<br>
								<i class="fa fa-glass" aria-hidden="true"></i> <span class="bold">Cocktail Hour: </span>6:30pm<br>
								<i class="fa fa-cutlery" aria-hidden="true"></i> <span class="bold">Reception: </span>7:30pm
							</p>
							<p>We hope to see all our family and friends there!</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="map-canvas"></div>
	</section> <!-- end the day section -->
	<section id="registry">
		<div class="container">
			<h1>Gift Registry</h1>
			<p style="text-align: center;">All we really want is for you to be at our wedding to celebrate with us, but if you'd like to give us a gift, we are registered at Bed Bath & Beyond and Dillard's, or you can contribute to our honeymoon fund through PayPal.</p>
			<div class="row">
				<div class="col-md-4">
					<a href="https://www.bedbathandbeyond.com:443/store/giftregistry/view_registry_guest.jsp?registryId=544143476&eventType=Wedding&pwsurl=" class="bed-bath-beyond" target="_blank" title="Bed Bath & Beyond">
						<img src="img/bed-bath-beyond.png" class="img-responsive" alt="Bed Bath & Beyond" title="Bed Bath & Beyond">
					</a>
				</div>
				<div class="col-md-4">
					<a href="http://www.dillards.com/registry/VelvetSauceda-CarlosTeller/130888597" class="dillards" target="_blank" title="PayPal">
						<img src="img/dillards.png" class="img-responsive" alt="Dillard's" title="Dillard's">
					</a>
				</div>
				<div class="col-md-4">
					<a href="https://www.paypal.me/velvetcarlos2017" class="paypal" target="_blank" title="PayPal">
						<img src="img/paypal.png" class="img-responsive" alt="PayPal" title="PayPal">
					</a>
				</div>
			</div>
		</div>
	</section> <!-- end gift registry section -->
	<section id="rsvp">
		<div class="container">
			<h1>RSVP</h1>
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="submit-message fade" role="alert"></div>
					<form method="post" id="rsvp-form">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" placeholder="Your First and Last Name" required>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email" placeholder="Email" required>
						</div>
						<div class="form-group">
							<label for="guestName">Guest</label>
							<input type="text" class="form-control" name="guestName" placeholder="Your Guest's First and Last Name">
						</div>
						<div class="form-group">
							<label for="event">Event</label>
							<select class="form-control" name="event" required>
								<option value="all">All Events</option>
								<option value="ceremony">Ceremony</option>
								<option value="reception">Reception</option>
							</select>
						</div>
						<button type="submit" class="attending btn btn-default btn-lg btn-block" name="attending">I'm Attending</button>
					</form>
				</div>
			</div>
		</div>
	</section> <!-- end rsvp section -->
	<section id="questions">
		<div class="container text-center">
			<p>While we love kids, with respect, we would like our special day to be an adult only occasion.</p>
			<p>If you have any questions, please don't hesitate to email us at: <a href="mailto:info@velvetcarlos2017.com" title="Email Velvet and Carlos">info@velvetcarlos2017.com</a>.</p>
		</div>
	</section> <!-- end questions section -->
	<div class="top" title="Click to return to top the of the page"><i class="fa fa-chevron-circle-up fa-3x" aria-hidden="true"></i></div>
	<footer>
		<div class="container">
			<p class="text-center">&copy 2017. All Rights Reserved. Designed & Developed by <a href="mailto:carlos.z.teller@gmail.com"><img src="img/ct-favicon.png" alt="Carlos Teller"></a></p>
		</div>
	</footer> <!-- end footer -->

	<!-- Scripts -->
	<script src="js/jquery-3.2.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=GOOGLE_API_KEY"></script>
	<script src="js/vc-wedding.js"></script>
</body>
</html>