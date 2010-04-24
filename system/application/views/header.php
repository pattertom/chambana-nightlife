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
</head>
<body>
	<div class="site_top">
		<div id="buttons">
			<a href="<?php echo site_url()?>">Home</a>
			<a href="<?php echo site_url('drink')?>">Drinks</a>
			<a href="<?php echo site_url('bar')?>">Bars</a>
			<a href="<?php echo site_url('event')?>">Events</a>
			<a href="<?php echo site_url('barspecial')?>">Specials</a>
            <a href="<?php echo site_url('search')?>">Search</a>
			<?php if (!$this->session->userdata('logged_in'))
    			echo '<a href="'.site_url('login').'">Login</a>';
    		    else
                echo '<a href="'.site_url('login/logout').'">Logout</a>';
            ?>
			
			<div id="searchbar">
				<?php
				echo form_open_multipart('search/searcher');
				$js = 'onClick="clickIntoSearchBox()"';
				echo 'Search: ' . form_input('drink', 'Search Here', $js);
				echo form_submit('main_search', 'Search');
				echo form_close();
				?>
			</div>
		</div>
	</div>	
	<div class="content">