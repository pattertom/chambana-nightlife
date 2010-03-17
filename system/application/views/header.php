<?php
	$this->load->helper('url');
?>
<html>
<head>
	<title>Welcome to CU Nightlife</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css" />
	<script type="text/javascript" src="/scripts/common.js"></script>
</head>
<body bgcolor="#333333">
	<div class="site_top">
		<div id="buttons">
			<a href="<?php echo site_url()?>">Home</a>
			<a href="<?php echo site_url('drink')?>">Drinks</a>
			<a href="<?php echo site_url('user')?>">User</a>
			<?php if (!$this->session->userdata('logged_in'))
    			echo '<a href="'.site_url('login').'">Login</a>';
    		    else
                echo '<a href="'.site_url('login/logout').'">Logout</a>';
            ?>
		</div>
	</div>	
	<div class="content">