<?php

/*------------------------------------------------------------------------
# mod_bearstestimonials Extension
# ------------------------------------------------------------------------
# author    Troy Hall
# copyright Copyright (C) 2019 Troy Hall. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website: http://hallhome.us
-------------------------------------------------------------------------*/
// no direct access
defined('_JEXEC') or die;
if ( !defined('DS') )
{
	define('DS', DIRECTORY_SEPARATOR);
}
$slide              = $params->get('slides');
$cacheFolder        = JURI::base(true) . '/cache/';
$modID              = $module->id;
$modPath            = JURI::base(true) . '/modules/mod_bearstestimonials/';
$document           = JFactory::getDocument();
$moduleclass_sfx    = htmlspecialchars($params->get('moduleclass_sfx'));
$jqueryload         = $params->get('jqueryload');
$jpreload           = $params->get('jpreload');
$showarrows         = $params->get('showarrows');
$customone          = $params->get('customone');
$testimonials_items = $params->get('testimonials_items');
$title              = $params->get('title');
$img                = $params->get('img');
$info               = $params->get('info');
$name               = $params->get('name');

// Position background tab
$modulebackgroundImage  = $params->get('modulebackgroundImage', '');
$modulebackgroundRepeat = $params->get('modulebackgroundRepeat', "no-repeat");
$modulebackgroundColor  = $params->get('modulebackgroundColor', '');
$modulebackgroundSize   = $params->get('modulebackgroundSize', 'cover');

if ( $jqueryload ) $document->addScript($modPath . 'assets/js/jquery.min.js');
if ( $jqueryload ) $document->addScript($modPath . 'assets/js/jquery-noconflict.js');
$document->addScript($modPath . 'assets/js/jquery.owl.carousel.js');
$document->addScript($modPath . 'assets/js/theme.js');
if ( $jpreload ) $document->addStyleSheet($modPath . 'assets/css/jpreload.css');
$document->addStyleSheet($modPath . 'assets/css/style.css');
$document->addStyleSheet($modPath . 'assets/css/bear.carousel.css');
$document->addStyleSheet($modPath . 'assets/font-awesome.css');
$document->addStyleDeclaration('.set_testimon { margin:' . $params->get('container_fix', 6) . 'px; }');

// Get background params
$style = "div#testimonials, div#testimonials-wide{\n";
$style .= $modulebackgroundImage ? " background-image: url(\"" . $modulebackgroundImage . "\");\n" : '';
$style .= " background-repeat: " . $modulebackgroundRepeat . ";\n";
$style .= $modulebackgroundColor ? " background-color: " . $modulebackgroundColor . ";\n" : '';
$style .= " background-size: " . $modulebackgroundSize . ";\n";
$style .= "}\n";
$document->addStyleDeclaration($style);

?>

<?php if ( $params->get('jpreload') == '1' ) : ?>
	<script type = "text/javascript">
        function preload() {
            document.getElementById("loaded").style.display = "none";
            document.getElementById("bears-testimonial").style.display = "block";
        }//preloader
        window.onload = preload;
	</script>
	<div id = "loaded"></div>
<?php endif; ?>

<div class = "owl-carousel <?php echo $params->get('navStyle') ?> <?php echo $params->get('navPosit') ?> <?php echo $params->get('navRounded') ?>"
     data-dots = "false" data-autoplay = "<?php echo $params->get('autoplay') ?>"
     data-autoplay-hover-pause = "<?php echo $params->get('autoplay-hover-pause') ?>"
     data-autoplay-timeout = "<?php echo $params->get('autoplay-timeout') ?>"
     data-autoplay-speed = "<?php echo $params->get('autoplay-speed') ?>"
     data-loop = "<?php echo $params->get('dataLoop') ?>" data-nav = "<?php echo $params->get('dataNav') ?>"
     data-nav-speed = "<?php echo $params->get('autoplay-speed') ?>"
     data-items = "<?php echo $params->get('image_width') ?>"
     data-tablet-landscape = "<?php echo $params->get('image_width_tabl') ?>"
     data-tablet-portrait = "<?php echo $params->get('image_width_tabp') ?>"
     data-mobile-landscape = "<?php echo $params->get('image_width_mobl') ?>"
     data-mobile-portrait = "<?php echo $params->get('image_width_mobp') ?>">
	<?php foreach ( $testimonials_items as $item ) : ?>
		<div class = "set_testimon">
			<div class = "reviews-block__slide">
				<div class = "reviews-block__text"><?php echo $item->info; ?></div>
				<div class = "reviews-block__person">
					<div class = "reviews-block__person-image"><img src = "<?php echo $item->img; ?>"
					                                                alt = "<?php echo $item->name; ?>"></div>
					<div class = "reviews-block__person-data">
						<div class = "reviews-block__person-name"><?php echo $item->name; ?></div>
						<div class = "reviews-block__person-role"><?php echo $item->title; ?></div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
