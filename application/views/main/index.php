<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<title>BUP</title>

		<link rel="stylesheet" href="/assets/css/bootstrap/bootstrap.min.css" type="text/css" media="all" />

		<link rel="stylesheet" href="/assets/css/style.css" type="text/css" media="all" />
		<link rel="stylesheet" href="/assets/css/map.css" type="text/css" media="all" />
		<link rel="stylesheet" href="/assets/css/rating.css" type="text/css" media="all" />

	
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

		<script src="http://maps.googleapis.com/maps/api/js?v=3&#038;sensor=true&#038;ver=3.6" type="text/javascript"></script>
		
		<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/assets/js/gmap3.min.js"></script>
		
		<script type="text/javascript" src="/assets/js/pages/modal.js"></script>

		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

		<link rel="shortcut icon" href="/favicon.png" type="image/png">
	</head>
	<body>
		<div>
			<div id="main-content" class="clearfix">
				<div id="nav-bar" class="nbar">
					<div class="nbar-content">
						<div class="navbar navbar-default">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="#"><img src="<?php echo site_url('/assets/images/Bup.png'); ?>"/></a>
							</div>
							<div class="navbar-collapse collapse">
								<ul class="nav nav-pills navbar-nav">
									<li><a href="#" id="generate_random_crawl"><span class="btn btn-primary">Generate Pub Crawl</span></a></li>
									<li><a href="#"><span class="btn">View Crawls</span></a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="btn">Information <b class="caret"></b></span></a>
										<ul class="dropdown-menu">
											<li><a data-toggle="modal" href="<?php echo site_url('/pages/view/pubs'); ?>">View All Pubs</a></li>
											<li><a href="#">View All Offers</a></li>
											<li class="divider"></li>
										</ul>
									</li>
								</ul>
								<?php if (!empty($user)): ?>
								<ul class="nav navbar-nav navbar-right">
									<?php foreach ($user['attrs'] as $attr):
										if ($attr->user_attr_id == 3):
									?>
									<li><h4 class="navbar-welcome">Hello, <?php echo $attr->user_attr_value; ?>!</h4></li>
									<?php 
										endif;
										endforeach;
									?>
									<li class="dropdown">
										<a href="#0.1_" class="dropdown-toggle" data-toggle="dropdown"><span class="btn">Profile <b class="caret"></b></span></a>
										<ul class="dropdown-menu">
											<li><a data-toggle="modal" href="<?php echo site_url('/pages/settings/crawl'); ?>">Crawl Settings</a></li>
											<li><a href="#">Change password</a></li>
										</ul>
									</li>
									<li><a href="/signout"><span class="btn">Sign Out</span></a></li>
								</ul>
								<?php else: ?>
								<ul class="nav navbar-nav navbar-right">
									<li><a data-toggle="modal" href="<?php echo site_url('/pages/auth/signin'); ?>"><span class="btn">Sign in</span></a></li>
								</ul>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>

				<!--// start: map-wrapper //-->
				<div class="map-wrapper">
					<div class="map">
						<script type="text/javascript" src="/assets/js/maps/load.js"></script>
						<script type="text/javascript" src="/assets/js/maps/generate.js"></script>
						<div id="map" class="map-inner"></div>
					</div>
				</div>
				<!--// end: map-wrapper //-->

				<div class="navbar navbar-fixed-bottom">
					<div class="page-footer">
						<ol class="breadcrumb">
							<li class="active"><h5><span class="text-info"><b>Team 4</b> <span class="text-primary">@</span> <b>UCL Hackathon 2013</b></span></h5></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
