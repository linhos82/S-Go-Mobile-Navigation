<?php
/**
 * @package		s-go consulting
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;


?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
	<head>
		
		<jdoc:include type="head" />

		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css">
		
		<?php /* Add2Home css and javascript created and authored by http://cubiq.org/ ! */ ?>
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/add2home.css">
		
<script type="application/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/add2home.js"></script>
		
		
		<meta name = "viewport" content = "width = device-width">
		<meta name = "viewport" content = "initial-scale = 1.0, user-scalable = no, maximum-scale=1">
		
		<link rel="apple-touch-icon" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/Icon-72.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/Icon-72.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/Icon-114.png" />
		<script type="application/javascript">
		window.addEvent('domready', function() {
			  /* var accordion = new Accordion($$('.toggler'),$$('.element'), { pre-MooTools More */
 			 var accordion = new Fx.Accordion($$('.toggler'),$$('.element'), {
   			 opacity: 0,
   			 display: -1,
   			 alwaysHide: true,
  			// onActive: function(toggler) { toggler.setStyle('color', '#f30'); },
  		  	 onBackground: function(toggler) { toggler.setStyle('color', '#000'); }
  		});
		});
		</script>
	</head>
	<body>
		<div class="container">
			<div class="header">
				<div class="logo">
					<a id="logo" href="index.php">
						<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/logo.png" />
						</a>
					</div>
				<div class="top">
					<h1>Seneca Lake Wine Trail</h1>
					<h2>A Tasteful Experience</h2>
					<h2><a href="tel:18775362717">Phone 877-536-2717</a></h2>
				</div>
			</div>
			<div class="clr"></div>
			<div class="padding" style="clear:left;">
			<?php
$menu = & JSite::getMenu();
if ($menu->getActive() == $menu->getDefault()) : ?>
		<div class="home-mobile">
				<jdoc:include type="modules" name="mobile-home" />
		</div>
<?php else: ?>


			<div id="accordion">
  				<h3 class="toggler">Menu - Tap to Show / Hide Menu</h3>
  				<div class="element">
    				<jdoc:include type="modules" name="mobile-home" />
				</div>
			</div>


			<div class="component">
				<jdoc:include type="message" />
				<jdoc:include type="component" />
			</div>
<?php endif; ?>	
			<div class="footer">
				<jdoc:include type="modules" name="navhelper1" />
			</div>
		</div>
		</div>
	</body>
</html>
