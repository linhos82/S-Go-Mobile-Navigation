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


$accordion_js = '

var j = jQuery.noConflict();

j(document).ready(function(){
        //just some regular style sheets. change them as you see fit
        var styling =".question{font-size:14px; font-weight:bold; cursor:pointer;}" +
                      ".answer{display:block;}" +
                      ".opened{color:#4b1934;}" +
                      ".closed{color:#660000;}";
        //attach style to the page
        var style = document.createElement("style");
        style.type = "text/css";
        try {
            style.appendChild( document.createTextNode(styling) );
        } catch (e) {
            if ( style.styleSheet ) {
                style.styleSheet.cssText = styling;
            }
        }
        document.body.appendChild( style );
        //style all questions as closed
        j(".question").addClass("closed");
        //make sure first question is styled as open
            j(".question:first").removeClass("opened").addClass("closed");
        j(".answer").hide(); //hide answers
        //j(".answer:first").show(); //show first answer
        //question click
        j(".question").click(function() {
            j(".answer").slideUp("fast");
            j(".question").removeClass("opened").addClass("closed");
 
            if (j(this).next(".answer").is(":hidden")) {
                j(this).next(".answer").slideDown("fast");
                j(this).removeClass("closed").addClass("opened");
            }
        });
});';


$document = JFactory::getDocument();


$document->addScriptDeclaration($accordion_js);

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
<div class="top-tip">
<p style="font-style: italic;">Click the category names below to view full list</p>
</div>
<div class="question"><h3 style="border-bottom: 1px solid #4B1934">Wineries</h3></div>

<div class="answer">
	<?php if (count($this->maplist)) :?> 
		<?php $count = 1; ?>
		<?php   foreach ($this->maplist as $mapkey=>$mapitem) : ?>
			<?php if ($mapitem->catid == "73") : ?>
			<div class="dynamaplisting">
			<?php if ($this->mapparams->get('showlistmarker', 1) == 1) :?>
	
			<div class="listingicon">

				<img src="<?php echo JURI::root(true) . '/components/com_k2dynamap/assets/images/default/number_'.$count.'.png'; ?>">
	
			</div>
		<?php endif; ?>
      		<div class="listingtitle"><a href="<?php echo $mapitem->link; ?>"><?php echo $mapitem->text; ?></a></div>
		<?php if ($this->mapparams->get('itemintro') == 1) :?> 
	  		<div class="listingintro"><?php echo $mapitem->introtext; ?></div>
		<?php endif; ?>
	</div>
<?php
 
$count++;
		endif; 
	endforeach; ?>
	<?php else: ?>
		<div class="listingtitle">No matching records found</div>
	<?php endif; ?>
</div>


<div class="question"><h3 style="border-bottom: 1px solid #4B1934">Dining</h3></div>
<div class="answer">
<?php // for dining, id 75 

 if (count($this->maplist)) :?> 
<?php $count = 1; ?>
<?php   foreach ($this->maplist as $mapkey=>$mapitem) : ?>
<?php if ($mapitem->catid == "75") : ?>
<div class="dynamaplisting">
	<?php if ($this->mapparams->get('showlistmarker', 1) == 1) :?>
	
	<div class="listingicon">

		<img src="<?php echo JURI::root(true) . '/components/com_k2dynamap/assets/images/default/dining/number_'.$count.'.png'; ?>">

	</div>
	<?php endif; ?>
      <div class="listingtitle"><a href="<?php echo $mapitem->link; ?>"><?php echo $mapitem->text; ?></a></div>
	<?php if ($this->mapparams->get('itemintro') == 1) :?> 
	  <div class="listingintro"><?php echo $mapitem->introtext; ?></div>
	<?php endif; ?>
</div>
<?php 
$count++;
endif; 
  endforeach; 
endif; ?>
</div>

<div class="question"><h3 style="border-bottom: 1px solid #4B1934">Lodging</h3></div>
<div class="answer">
<?php // for lodging, id 74 

 if (count($this->maplist)) :?> 
<?php $count = 1; ?>
<?php   foreach ($this->maplist as $mapkey=>$mapitem) : ?>
<?php if ($mapitem->catid == "74") : ?>
<div class="dynamaplisting">
	<?php if ($this->mapparams->get('showlistmarker', 1) == 1) :?>
	
	<div class="listingicon">

		<img src="<?php echo JURI::root(true) . '/components/com_k2dynamap/assets/images/default/lodging/number_'.$count.'.png'; ?>">

	</div>
	<?php endif; ?>
      <div class="listingtitle"><a href="<?php echo $mapitem->link; ?>"><?php echo $mapitem->text; ?></a></div>
	<?php if ($this->mapparams->get('itemintro') == 1) :?> 
	  <div class="listingintro"><?php echo $mapitem->introtext; ?></div>
	<?php endif; ?>
</div>
<?php 
$count++;
endif; 
  endforeach; 
endif; ?>
</div>

<div class="question"><h3 style="border-bottom: 1px solid #4B1934">Breweries & Distilleries</h3></div>
<div class="answer">
<?php // for breweries, id 69 

 if (count($this->maplist)) :?> 
<?php $count = 1; ?>
<?php   foreach ($this->maplist as $mapkey=>$mapitem) : ?>
<?php if ($mapitem->catid == "69") : ?>
<div class="dynamaplisting">
	<?php if ($this->mapparams->get('showlistmarker', 1) == 1) :?>
	
	<div class="listingicon">

		<img src="<?php echo JURI::root(true) . '/components/com_k2dynamap/assets/images/default/breweries/number_'.$count.'.png'; ?>">

	</div>
	<?php endif; ?>
      <div class="listingtitle"><a href="<?php echo $mapitem->link; ?>"><?php echo $mapitem->text; ?></a></div>
	<?php if ($this->mapparams->get('itemintro') == 1) :?> 
	  <div class="listingintro"><?php echo $mapitem->introtext; ?></div>
	<?php endif; ?>
</div>
<?php 
$count++;
endif; 
  endforeach; 
endif; ?>
</div>

<div class="question"><h3 style="border-bottom: 1px solid #4B1934">Activities & Attractions</h3></div>
<div class="answer">
<?php // for activities, id 68 

 if (count($this->maplist)) :?> 
<?php $count = 1; ?>
<?php   foreach ($this->maplist as $mapkey=>$mapitem) : ?>
<?php if ($mapitem->catid == "68") : ?>
<div class="dynamaplisting">
	<?php if ($this->mapparams->get('showlistmarker', 1) == 1) :?>
	
	<div class="listingicon">

		<img src="<?php echo JURI::root(true) . '/components/com_k2dynamap/assets/images/default/activities/number_'.$count.'.png'; ?>">

	</div>
	<?php endif; ?>
      <div class="listingtitle"><a href="<?php echo $mapitem->link; ?>"><?php echo $mapitem->text; ?></a></div>
	<?php if ($this->mapparams->get('itemintro') == 1) :?> 
	  <div class="listingintro"><?php echo $mapitem->introtext; ?></div>
	<?php endif; ?>
</div>
<?php 
$count++;
endif; 
  endforeach; 
endif; ?>
</div>