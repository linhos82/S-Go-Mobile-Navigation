<?php
/**
 * Default View for K2DynaMap Component Front-end
 * 
 * @package    	K2DynaMap
 * @subpackage 	Components
 * @link 		http://www.nicktexidor.com/
 * @license     GNU/GPL
 */

// No direct access
defined('_JEXEC') or die('Restricted access'); 

$save_keyref 	= "";
$introtop 		= false;
$introbot 		= false;
$filtertop 		= false;
$filterbot 		= false;
$searchtop	 	= false;
$searchbot 		= false;

?>
<h4>
Mobile
</h4>
<?php if ($this->mapparams->get('showheading', 1) == 1) : ?>
<div class="catItemHeader">
<h3 class = "catItemTitle">
	<?php echo ($this->mapparams->get('page_title')); ?>
</h3>
</div>
<?php endif; ?>
<div id="dynamapcontainer">
	<div id="dyna-left-mega">
	<?php if (($this->mapparams->get('intropos', 1) == 1) && (trim($this->mapparams->get('intro', '')) != '')) : ?>
	<?php 		$introtop = true; ?>
	<div id="dynamapintro">
	<p><?php 	echo $this->mapparams->get('intro'); ?></p>
	</div>
	<div id="dynamapseparator"></div>
	<?php endif; ?>

	<?php if ($this->mapparams->get('filterpos', 1) == 1) : ?>
	<?php 	if (($this->mapparams->get('filtercats') == 1) || ($this->mapparams->get('filtertags') == 1) || ($this->mapparams->get('filterextras') == 1)): ?>
	<?php 		$filtertop = true; ?>
	<div id="dynamapfilters">
	<?php 		echo $this->loadTemplate('filters'); ?>
	</div>
	<div id="dynamapseparator"></div>
	<?php 	endif; ?>
	<?php endif; ?>

	<?php if ($this->mapparams->get('searchpos', 1) == 1): ?>
	<?php 	if ($this->mapparams->get('search', 0) == 1): ?>
	<?php 		$searchtop = true; ?>
	<div id="dynamapsearch">
	<?php 		echo $this->loadTemplate('search'); ?>
	</div>
	<div id="dynamapseparator"></div>
	<?php 	endif; ?>
	<?php endif; ?>

	<div class="clear"></div>

	<?php 	echo $this->loadTemplate('map'); ?>

	<?php if (($this->mapparams->get('intropos', 1) == 2) && (trim($this->mapparams->get('intro', '')) != '')) : ?>
	<div id="dynamapseparator"></div>
	<?php elseif ($this->mapparams->get('filterpos', 1) == 2) : ?>
	<?php 	if (($this->mapparams->get('filtercats') == 1) || ($this->mapparams->get('filtertags') == 1) || ($this->mapparams->get('filterextras') == 1)): ?>
	<div id="dynamapseparator"></div>
	<?php 	endif; ?>
	<?php elseif ($this->mapparams->get('searchpos', 1) == 2): ?>
	<?php 	if ($this->mapparams->get('search', 0) == 1): ?>
	<div id="dynamapseparator"></div>
	<?php 	endif; ?>
	<?php elseif ($this->mapparams->get('showlist', 0) == 1) : ?>

	<?php endif; ?>

	<?php if ($this->mapparams->get('filterpos', 1) == 2) : ?>
	<?php 	if (($this->mapparams->get('filtercats') == 1) || ($this->mapparams->get('filtertags') == 1) || ($this->mapparams->get('filterextras') == 1)): ?>
	<div id="dynamapfilters">
	<?php 		echo $this->loadTemplate('filters'); ?>
	</div>
	<div id="dynamapseparator"></div>
	<?php 	endif; ?>
	<?php endif; ?>

	<?php if ($this->mapparams->get('searchpos', 1) == 2): ?>
	<?php 	if ($this->mapparams->get('search', 0) == 1): ?>
	<div id="dynamapsearch">
	<?php 		echo $this->loadTemplate('search'); ?>
	</div>
	<div id="dynamapseparator"></div>
	<?php 	endif; ?>
	<?php endif; ?>

	<?php if (($this->mapparams->get('intropos', 1) == 2) && (trim($this->mapparams->get('intro', '')) != '')) : ?>
	<div id="dynamapintro">
	<p><?php 	echo $this->mapparams->get('intro'); ?></p>
	</div>
	<div id="dynamapseparatorblank"></div>
	<?php endif; ?>
</div>
<div id="dyna-right-mega">
	<?php if ($this->mapparams->get('showlist', 0) == 1) : ?>
		<div class="clear"></div>
	<div id="dynamaplistings">
	<?php 	 echo $this->loadTemplate('listings'); ?>
	</div>

	<?php endif; ?>
</div>
</div>

