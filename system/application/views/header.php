<?php
	$this->load->helper('url');
?>
<html>
<head>
	<title>Welcome to CU Nightlife</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<body bgcolor="#333333">
	<div class="site_top">
		<div id="buttons">
			<a href="<?php echo site_url()?>">Home</a>
			<a href="<?php echo site_url('drink')?>">Drinks</a>
			<a href="<?php echo site_url('sample')?>">Link</a>
			<a href="<?php echo site_url('sample')?>">Link2</a>
			<a href="usesiteurl.php">Link3</a>
		</div>
	</div>	
	<div class="content">