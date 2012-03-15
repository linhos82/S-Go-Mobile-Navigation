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
<?php if ($this->mapparams->get('filtercats') == 1) : ?>
  <div id="dynamapfilter">
	<form action="<?php echo JRoute::_('index.php'); ?>" method="get">
		<label for="filtercat" class="filterlabel"><?php echo $this->mapparams->get('filtercatsheader'); ?>:</label>
		<select name="filtercat" id="filtercat" onchange="window.location=this.form.filtercat.value;" class="filterselect">
			<option value="<?php echo JRoute::_('index.php'); ?>"><?php echo JText::_("-- Show All --"); ?></option>
	<?php foreach ($this->cats as $cat) : ?>
<?php
		if (JRequest::getInt('filtercat') == $cat->id) {
			$selected = ' selected="selected"';
		} else {
			$selected = '';
		}
?>
			<option value="<?php echo JRoute::_('index.php?filtercat=' . $cat->id); ?>"<?php echo $selected; ?>><?php echo $cat->name; ?></option>
<?php endforeach; ?>
		</select>
		<input name="option" value="com_k2dynamap" type="hidden" />
		<input name="view" value="k2dynamap" type="hidden" />
		<input name="Itemid" value="<?php echo JRequest::getInt('Itemid'); ?>" type="hidden" />
	</form>
  </div>
<?php endif; ?>
<?php if ($this->mapparams->get('filtertags') == 1) : ?>
  <div id="dynamapfilter">
	<form action="<?php echo JRoute::_('index.php'); ?>" method="get">
		<label for="filtertag" class="filterlabel"><?php echo $this->mapparams->get('filtertagsheader'); ?>:</label>
		<select name="filtertag" id="filtertag" onchange="window.location=this.form.filtertag.value;" class="filterselect">
			<option value="<?php echo JRoute::_('index.php'); ?>"><?php echo JText::_("-- Show All --"); ?></option>
	<?php foreach ($this->tags as $tag=>$value) : ?>
<?php
		if (JRequest::getString('filtertag') == $tag) {
			$selected = ' selected="selected"';
		} else {
			$selected = '';
		}
?>
			<option value="<?php echo JRoute::_('index.php?filtertag=' . $tag); ?>"<?php echo $selected; ?>><?php echo $tag . ' (' . $value . ')' ; ?></option>
<?php endforeach; ?>
		</select>
		<input name="option" value="com_k2dynamap" type="hidden" />
		<input name="view" value="k2dynamap" type="hidden" />
		<input name="Itemid" value="<?php echo JRequest::getInt('Itemid'); ?>" type="hidden" />
	</form>
  </div>
<?php endif; ?>
<?php if ($this->mapparams->get('filterextras') == 1) : ?>
<?php
		$extrafieldstofilter 	= explode(',', $this->mapparams->get('filterextrasfield'));
		$extrafieldlabels 		= explode(',', $this->mapparams->get('filterextrasheader'));

		for ($i = 0; $i < count($extrafieldstofilter); $i++) {
			$extrafield = str_replace(" ", "", trim($extrafieldstofilter[$i]));
			$extralabel = trim($extrafieldlabels[$i]);
?>
  <div id="dynamapfilter">
	<form action="<?php echo JRoute::_('index.php'); ?>" method="get">
		<label for="fe_<?php echo $extrafield; ?>" class="filterlabel"><?php echo count($extrafieldlabels) == 1 ? $extrafieldlabels[0] : $extralabel; ?>:</label>
		<select name="fe_<?php echo $extrafield; ?>" id="fe_<?php echo $extrafield; ?>" onchange="window.location=this.form.fe_<?php echo $extrafield; ?>.value;" class="filterselect">
			<option value="<?php echo JRoute::_('index.php') ?>"><?php echo JText::_("-- Show All --"); ?></option>
	<?php foreach ($this->extra[$i] as $extra) : ?>
<?php
		if (JRequest::getString('fe_' . $extrafield) == $extra) {
			$selected = ' selected="selected"';
		} else {
			$selected = '';
		}
?>
			<option value="<?php echo JRoute::_('index.php?fe_' . $extrafield . '=' . $extra); ?>"<?php echo $selected; ?>><?php echo $extra; ?></option>
<?php endforeach; ?>
		</select>
		<input name="option" value="com_k2dynamap" type="hidden" />
		<input name="view" value="k2dynamap" type="hidden" />
		<input name="Itemid" value="<?php echo JRequest::getInt('Itemid'); ?>" type="hidden" />
	</form>
  </div>
<?php
		}
?>
<?php endif; ?>
