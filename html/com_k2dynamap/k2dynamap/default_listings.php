<?php
/**
 * Listings View for K2DynaMap Component Front-end
 * 
 * @package    	K2DynaMap
 * @subpackage 	Components
 * @link 		http://www.nicktexidor.com/
 * @license     GNU/GPL
 */

// No direct access
defined('_JEXEC') or die('Restricted access'); 

/*
if ($this->mapparams->get('listsort', 0)) {
	if (count($this->maplist) > 0) {
		$tmp = array();

		// Sort the array by co-ordinates. We do this to allow for multiple locations at the same point //
		foreach($this->maplist as &$ma) {
			if ($this->mapparams->get('listsort', 1) == 1) {
				$tmp[] = &$ma->text; 
			} elseif ($this->mapparams->get('listsort', 1) == 2) {
				$tmp[] = &$ma->itemdate; 
			}
		}

		array_multisort($tmp, $this->maplist);
	}
}*/

function sort_by_text_list( $a, $b )
{ 
  if(  $a->customorder ==  $b->customorder ){ return 0 ; } 
  return ($a->customorder < $b->customorder) ? -1 : 1;
} 

usort($this->maplist,'sort_by_text_list'); 

?>
<?php if (count($this->maplist)) :?> 
<?php $winery_count = 1; ?>
<?php $attraction_count = 71; ?>
<?php $breweries_count = 1; ?>
<?php $dining_count = 57; ?>
<?php $lodging_count = 6; ?>
<?php $transportation_count = 1; ?>

<?php   foreach ($this->maplist as $mapkey=>$mapitem) : ?>
<div class="dynamaplisting">
	<?php if ($this->mapparams->get('showlistmarker', 1) == 1) :?>
	<div class="listingicon">
	<?php
	
	//checks though selected params and loads images based on selection
	
	if ($this->mapparams->get('marker') == "wineries") { ?>
		<img src="<?php echo JURI::root(true) . '/components/com_k2dynamap/assets/images/default/number_'.$winery_count.'.png'; ?>">
	<?php
		$winery_count++;
	} 
	elseif ($this->mapparams->get('marker') == "activities") { ?>
		<img src="<?php echo JURI::root(true) . '/components/com_k2dynamap/assets/images/default/activities/number_'.$attraction_count.'.png'; ?>">
	<?php
		$attraction_count++;
	}
	else if ($this->mapparams->get('marker') == "lodging") { ?>
		<img src="<?php echo JURI::root(true) . '/components/com_k2dynamap/assets/images/default/lodging/number_'.$lodging_count.'.png'; ?>">
	<?php
		$lodging_count++;
	}
	else if ($this->mapparams->get('marker') == "breweries") { ?>
		<img src="<?php echo JURI::root(true) . '/components/com_k2dynamap/assets/images/default/breweries/number_'.$breweries_count.'.png'; ?>">
	<?php
		$breweries_count++;
	}
	else if ($this->mapparams->get('marker') == "dining") { ?>
		<img src="<?php echo JURI::root(true) . '/components/com_k2dynamap/assets/images/default/dining/number_'.$dining_count.'.png'; ?>">
	<?php
		$dining_count++;
	}
	else if ($this->mapparams->get('marker') == "transportation") { ?>
		<img src="<?php echo JURI::root(true) . '/components/com_k2dynamap/assets/images/default/transportation/number_'.$transportation_count.'.png'; ?>">
	<?php 
		$transportation_count++;
	} 
	?>
	</div>
	<?php endif; ?>
      <div class="listingtitle"><a href="<?php echo $mapitem->link; ?>"><?php echo $mapitem->text; ?></a></div>
	<?php if ($this->mapparams->get('itemintro') == 1) :?> 
	  <div class="listingintro"><?php echo $mapitem->introtext; ?></div>
	<?php endif; ?>
</div>
<?php 
  endforeach; ?>
<?php else: ?>
	<div class="listingtitle">No matching records found</div>
<?php endif; ?>
