<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	$this->load->helper('url');
	$this->load->helper('form');
?>
<html>
<head>
	<title>Welcome to CU Nightlife</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/css/text.css" />
	<link rel="stylesheet" type="text/css" href="/css/forms.css" />
	<script type="text/javascript" src="/scripts/common.js"></script>
    <script type="text/javascript" src="/js/prototype.js"></script>
    <script type="text/javascript" src="/js/scriptaculous.js"></script>
	<script type="text/javascript" src="/js/function_search.js"></script>
    <?php
    if (isset($extraHeadContent)) {
	echo $extraHeadContent;
    }
    ?>
</head>
<body>
	<div class="site_top">
		<div id="searchbar">
			<?php
			echo form_open('search/search_all');
			echo '<input type="text" name="function_name" id="function_name" onClick="clickIntoSearchBox()" class="input_box"/>';
			echo '<input type="submit" value="search" id="search_button" class="searchbtn" />';
			echo '<div id="autocomplete_choices" class="autocomplete" style = "display: block;"></div>';
			echo form_close();
			?>
		</div>
		<div class="header_link_box"><a href="<?php echo site_url(); ?>"><img src="/images/headerTopLeft.png" border="0" /></a></div>
		<div id="buttons">
			<a href="<?php echo site_url()?>">Home</a>
			<a href="<?php echo site_url('drink')?>">Drinks</a>
			<a href="<?php echo site_url('bar')?>">Bars</a>
			<a href="<?php echo site_url('event')?>">Events</a>
			<a href="<?php echo site_url('event')?>">About</a>
			<?php if ($this->session->userdata('admin') == TRUE) {?>
			<a href="<?php echo site_url('admin')?>">Admin</a>
			<a href="<?php echo site_url('barspecial')?>">Specials</a>
            <a href="<?php echo site_url('user')?>">User</a>
			<?php } ?>
            <?php
			    if ($this->session->userdata('logged_in'))
                    echo '<a href="'.site_url('login/logout').'">Logout</a>';
            ?>
		</div>
	</div>	
	<div class="content">