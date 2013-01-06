/**
 * @package Xpert Gallery
 * @version ##VERSION##
 * @author ThemeXpert http://www.themexpert.com
 * @copyright Copyright (C) 2009 - 2011 ThemeXpert
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 */

jQuery(document).ready(function()
{

    // Get the height of the content area if overview-hover selected
    if(jQuery('.overview-hover').length > 0)
    {
        var c = 0,
            a = jQuery('.tx-gallery-item'),
            b = jQuery('.tx-gallery-item-in');

        b.each(function () {
            c = Math.max(c, jQuery(this).outerHeight());
        });

        a.css("min-height", c + "px");
        b.css("min-height", c + "px");
        jQuery('.tx-gallery-info, .tx-gallery-image').css("min-height", c + "px");
    }
    
    // Get the container node
    var $container = jQuery('.tx-gallery-container');

    // Initialize Isotop
    $container.isotope({
        // options
        itemSelector : 'li',
        layoutMode : 'fitRows',
        getSortData : {
          date : function( $elem ) {
              return $elem.find('.tx-gallery-date').text();
          },
          title : function ( $elem ) {
            return $elem.find('.tx-gallery-title').text();
          }
        }
    });

    var $optionSet = jQuery('.tx-gallery-sort'),
      $optionLink = $optionSet.find('a');

  $optionLink.click(function(){

    var $this = jQuery(this);

    // don't proceed if already selected
    if ( $this.hasClass('selected') ) {
      return false;
    }

    $optionSet.find('.selected').removeClass('selected');
    $this.addClass('selected');

    // make option object dynamically, i.e. { filter: '.my-filter-class' }
    var options = {},
        key = $optionSet.attr('data-option-key'),
        value = $this.attr('data-option-value');
    // parse 'false' as false boolean
    value = value === 'false' ? false : value;
    options[ key ] = value;

    // apply new options
    $container.isotope( options );

    return false;
  });
});