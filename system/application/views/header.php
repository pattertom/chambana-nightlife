<?php
	$this->load->helper('url');
?>
<html>
<head>
	<title>Welcome to CU Nightlife</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/css/text.css" />
	<link rel="stylesheet" type="text/css" href="/css/forms.css" />
	<script type="text/javascript" src="/scripts/common.js"></script>
</head>
<body>
	<div class="site_top">
		<div id="buttons">
			<a href="<?php echo site_url()?>">Home</a>
			<a href="<?php echo site_url('drink')?>">Drinks</a>
			<a href="<?php echo site_url('bar')?>">Bars</a>
			<a href="<?php echo site_url('barreview')?>">Bar Reviews</a>
			<a href="<?php echo site_url('event')?>">Events</a>
			<a href="<?php echo site_url('eventreview')?>">Event Reviews</a>
			<a href="<?php echo site_url('user')?>">User</a>
			<a href="<?php echo site_url('barspecial')?>">Specials</a>
			<?php if (!$this->session->userdata('logged_in'))
    			echo '<a href="'.site_url('login').'">Login</a>';
    		    else
                echo '<a href="'.site_url('login/logout').'">Logout</a>';
            ?>
		</div>
	</div>	
	<div class="content">