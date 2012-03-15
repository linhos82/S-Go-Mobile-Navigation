<?php
/**
 * Filters View for K2DynaMap Component Front-end
 * 
 * @package    	K2DynaMap
 * @subpackage 	Components
 * @link 		http://www.nicktexidor.com/
 * @license     GNU/GPL
 */

// No direct access
defined('_JEXEC') or die('Restricted access'); 

?>
<?php if ($this->mapparams->get('search', 0) == 1) : ?>
  <div id="dynamapsearchbox">
	<form action="<?php echo JRoute::_('index.php'); ?>" method="get">
		<label for="dynasearch" class="searchlabel"><?php echo $this->mapparams->get('searchheader'); ?>:</label>
		<input name="dynasearch" type="text" id="dynasearch" class="searchinput" value="<?php echo JRequest::getString('dynasearch',''); ?>" />
		<input name="go" type="submit" onclick="window.location=<?php echo JRoute::_('index.php?dynasearch=' . 'this.form.dynasearch.value'); ?>;" class="searchbutton" value="Go" />
		<input name="dmst" value="<?php echo $this->mapparams->get('searchtype', 1); ?>" type="hidden" />
		<input name="option" value="com_k2dynamap" type="hidden" />
		<input name="view" value="k2dynamap" type="hidden" />
		<input name="Itemid" value="<?php echo ($this->mapparams->get('searchmenu', 0) == 0 ? JRequest::getInt('Itemid') : $this->mapparams->get('searchmenu')); ?>" type="hidden" />
	</form>
  </div>
<?php endif; ?>
