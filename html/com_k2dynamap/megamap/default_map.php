<?php
/**
 * Map View for K2DynaMap Component Front-end
 * 
 * @package    	K2DynaMap
 * @subpackage 	Components
 * @link 		http://www.nicktexidor.com/
 * @license     GNU/GPL
 */

// No direct access
defined('_JEXEC') or die('Restricted access'); 

$option	= JRequest::getCmd('option', '');
$view 	= JRequest::getCmd('view', '');
$id 	= JRequest::getInt('id', 0);

if ((isset($modload)) && ($modload)) {
	$mapid = "_mod";
} elseif ((isset($plgload)) && ($plgload)) {
	$mapid = "_plg";
} else {
	$mapid = "";
}

$k2dynamap		= new K2DynamapMap($mapid);
$k2dynamap->map_api();

$tab 			= 1;
$tabheader		= '';
$popup			= '';
$currentItem	= '';
$currentZoom	= 12;
$setToBounds	= true;

//order object before output in alpha
// chad windnagle dec 21 2011



function sort_by_text( $a, $b )
{ 

  if(  $a->customorder ==  $b->customorder ){ return 0 ; } 
  return ($a->customorder < $b->customorder) ? -1 : 1;
} 

usort($this->maplist,'sort_by_text'); 


	foreach ($this->maplist as $mapkey=>$mapitem) {

		if ($option == "com_k2" && $view == "item" && $id == $this->maplist[$mapkey]->id) {
			$currentItem = $mapitem->keyref;
			$currentZoom = $mapitem->zoom;
		} elseif (count($this->maplist) == 1) {
			$currentItem = $mapitem->keyref;
			$currentZoom = $mapitem->zoom;
		}

		if ($this->mapparams->get('loadpopups', 1) == 1) {

			$popup	 			= '<div class="dynamappopuptitle"><a href="' . $mapitem->link . '">' . $k2dynamap->strip_string($mapitem->text, true) . '</a></div>';

			if ($this->mapparams->get('itemdate') == 1) {
				$popup	 		.= '<div class="dynamappopupdate">' . $mapitem->itemdate . '</div>';
			}

			if ($this->mapparams->get('itemintro') == 1) { 
				$popup	 		.= '<div class="dynamappopupintro">';

				if (($this->mapparams->get('itemimage') == 1) && ($mapitem->image != "")) { 
					$popup	 	.= '<a href="' . $mapitem->link . '"><img src="' . $mapitem->image . '" alt="' . $k2dynamap->strip_string($mapitem->text, true) . '" align="right"/></a>';
				}

				$popup	 		.= $k2dynamap->strip_string($mapitem->introtext, true);
    	  		$popup	 		.= '</div>';
			}

			if ($this->mapparams->get('itemextra') == 1) {
				if (count($mapitem->extrafields)) {
					$popup	 	.= '<div class="dynamappopupextra">';

					foreach ($mapitem->extrafields as $mapkey=>$extraField) {
						$popup 	.= '<span class="dynamappopupextraname">' . $extraField->name . ':</span> <span class="dynamappopupextravalue">' . $k2dynamap->strip_string($extraField->value, true) . '</span><br class="clr" />';
					}

		    	  	$popup	 	.= '</div>';
				}
			}

			if (trim($mapitem->popuptext) != "") {
    		  	$popup	 		.= '<div class="dynamappopuptext">' . $k2dynamap->strip_string($mapitem->popuptext, true) . '</div>';
			}
		} else {
			$popup	 			= '';
		}
		
		$mapitem->marker_text	= $popup;
	

}
?>
<div id="dynamap" align="left">
	<div id="k2dynamap_canvas<?php echo $mapid; ?>" style="width: <?php echo $this->mapparams->get('mapwidth', 600); ?>px; height: <?php echo $this->mapparams->get('mapheight', 480); ?>px;">
<?php
	echo $k2dynamap->map_header(); 

	if ($option == "com_k2" && $view == "item" && $currentItem != '') {
		echo $k2dynamap->map_center($currentItem); 
	} elseif (count($this->maplist) == 1) {
		echo $k2dynamap->map_center($currentItem); 
	} else {
		echo $k2dynamap->map_center($this->mapparams->get('defaultcenter', '1,1')); 
	}

	echo $k2dynamap->map_options(); 
	echo $k2dynamap->map_option_scroll($this->mapparams->get('mapscroll', 1)); 
	echo $k2dynamap->map_option_maptype($this->mapparams->get('maptype', 1), $this->mapparams->get('maptypectl', 1), $this->mapparams->get('maptypepos', 0), $this->mapparams->get('maptypestyle', 0)); 
	echo $k2dynamap->map_option_pan($this->mapparams->get('mappan', 0), $this->mapparams->get('mappanpos', 0)); 
	echo $k2dynamap->map_option_zoom($this->mapparams->get('mapzoom', 1), $this->mapparams->get('mapzoompos', 0), $this->mapparams->get('mapzoomstyle', 0)); 
	echo $k2dynamap->map_option_street($this->mapparams->get('mapstreet', 1), $this->mapparams->get('mapstreetpos', 0)); 
	echo $k2dynamap->map_options_end(8); 
	
	//print_r($this->maplist);
	
	echo $k2dynamap->map_addmarkers($this->maplist, $this->mapparams->get('loadpopups', 1), $currentItem, $this->mapparams->get('marker', ''), $this->mapparams->get('tabmarker', ''));
	
	

	//	If viewing an item, set the zoom to zoom level from item
	if ($option == "com_k2" && $view == "item" && $currentItem != '') {
		echo $k2dynamap->map_change_zoom($currentZoom); 

	//	If only one item is being displayed, use the items' zoom level
	} elseif (count($this->maplist) == 1) {
		echo $k2dynamap->map_change_zoom($currentZoom); 

	//	If Default Center is specified, use Default Zoom (Default 8) to set the zoom level
	} elseif ($this->mapparams->get('defaultcenter', '') != '') {
		echo $k2dynamap->map_change_zoom($this->mapparams->get('defaultzoom', 0)); 

	// and if we still get here, automatically calculate the map center zoom level from markers.
	} else {
		echo $k2dynamap->map_change_zoom(0);
	}

	echo $k2dynamap->map_footer(); 

?>
	</div>
</div>