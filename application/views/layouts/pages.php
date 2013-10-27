<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<title>Main Page</title>

		<link rel="stylesheet" href="/assets/css/bootstrap/bootstrap.min.css" type="text/css" media="all" />

		<link rel="stylesheet" href="/assets/css/style.css" type="text/css" media="all" />
		<link rel="stylesheet" href="/assets/css/map.css" type="text/css" media="all" />

		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>

		<script src="http://maps.googleapis.com/maps/api/js?v=3&#038;sensor=true&#038;ver=3.6" type="text/javascript"></script>
		
		<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/assets/js/gmap3.min.js"></script>
	</head>
	<body>
	<div>
		<div id="main-content" class="clearfix">
			<div id="nav-bar" class="nbar">
				<div class="nbar-content">
					<!-- Static navbar -->
					<div class="navbar navbar-default">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#">BUP</a>
						</div>
						<div class="navbar-collapse collapse">
							<ul class="nav nav-pills navbar-nav">
								<li><a href="#" id="generate_random_crawl"><span class="btn btn-primary">Random Pub Crawl</span></a></li>
								<li><a href="#"><span class="btn">View Crawls</span></a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="btn">Information <b class="caret"></b></span></a>
									<ul class="dropdown-menu">
										<li><a href="#">Action</a></li>
										<li><a href="#">Another action</a></li>
										<li><a href="#">Something else here</a></li>
										<li class="divider"></li>
										<li class="dropdown-header">Nav header</li>
										<li><a href="#">Separated link</a></li>
										<li><a href="#">One more separated link</a></li>
									</ul>
								</li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><span>Hello, Mladen!</span></li>
								<li class="dropdown">
									<a href="#0.1_" class="dropdown-toggle" data-toggle="dropdown"><span class="btn">Profile <b class="caret"></b></span></a>
									<ul class="dropdown-menu">
										<li><a href="#">My Crawls</a></li>
										<li><a href="#">Change password</a></li>
									</ul>
								</li>
								<li><a href="../navbar-fixed-top/"><span class="btn">Sign Out</span></a></li>
							</ul>
						</div>
					</div>
				</div>


				<div class="pages-container">
					<div class="main-content">
						<div class="jumbotron">
							<div class="container">
								<h1>Hello, world!</h1>
								<p>...</p>
								<p><a class="btn btn-primary btn-lg">Learn more</a></p>

								<?php echo $content; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>

		<!--// start: map-wrapper //-->
		<div class="pages-map-wrapper">
			<div class="pages-map">
				<script type="text/javascript" src="/assets/js/maps/load.js"></script>
				<script type="text/javascript" src="/assets/js/maps/generate.js"></script>
				<div id="map" class="map-inner"></div>
			</div>
		</div>
		<!--// end: map-wrapper //-->
	</div>
	</body>
</html>
