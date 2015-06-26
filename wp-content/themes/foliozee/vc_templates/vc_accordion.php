<?php
wp_enqueue_script('jquery-ui-accordion');
?>
	<script type="text/javascript">
	function folio_accordionBehaviour() {
    jQuery('.folio-accordion').each(function (index) {
      var $tabs,
        interval = jQuery(this).attr("data-interval"),
        active_tab = !isNaN(jQuery(this).data('active-tab')) && parseInt(jQuery(this).data('active-tab')) > 0 ? parseInt(jQuery(this).data('active-tab')) - 1 : false,
        collapsible = active_tab === false || jQuery(this).data('collapsible') === 'yes';
      //
      $tabs = jQuery(this).find('.folio-accordion-wrapper').accordion({
        header:"> div > span.folio-accordion-title",
        autoHeight:false,
        heightStyle:"content",
        active:active_tab,
        collapsible:collapsible,
        navigation:true,
        activate: function(event, ui) {
          if (jQuery.fn.isotope != undefined) {
            ui.newPanel.find('.isotope').isotope("reLayout");
          }
          vc_carouselBehaviour(ui.newPanel);
          vc_plugin_flexslider(ui.newPanel);
        },
        change:function (event, ui) {
          if (jQuery.fn.isotope != undefined) {
            ui.newContent.find('.isotope').isotope("reLayout");
          }
          vc_carouselBehaviour(ui.newPanel);
        }
      });
      //.tabs().tabs('rotate', interval*1000, true);
    });
  }
        jQuery(document).ready(function($){
        "use strict";
			folio_accordionBehaviour();
			/* Tabs */
/*			$( ".folio-accordion" ).accordion({
					 header:"> div > h3"
				});*/
		});
	</script>
<?php
$output = $title = $interval = $el_class = $collapsible = $active_tab = '';
//
extract(shortcode_atts(array(
    'title' => '',
    'interval' => 0,
    'el_class' => '',
    'collapsible' => 'no',
    'active_tab' => '1'
), $atts));

$el_class = $this->getExtraClass($el_class);
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'folio-accordion ' . $el_class . ' not-column-inherit', $this->settings['base'], $atts );

$output .= "\n\t".'<div class="'.$css_class.'" data-collapsible='.$collapsible.' data-active-tab="'.$active_tab.'">'; //data-interval="'.$interval.'"
$output .= "\n\t\t".'<div class="folio-accordion-wrapper ui-accordion">';
$output .= wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_accordion_heading'));

$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
$output .= "\n\t\t".'</div> '.$this->endBlockComment('.folio-accordion-wrapper');
$output .= "\n\t".'</div> '.$this->endBlockComment('.folio-accordion');

echo $output;
