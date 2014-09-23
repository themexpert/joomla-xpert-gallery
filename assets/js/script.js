/**
 * @package Xpert Gallery
 * @version ##VERSION##
 * @author ThemeXpert http://www.themexpert.com
 * @copyright Copyright (C) 2009 - 2011 ThemeXpert
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 */

jQuery(window).load(function() {

    //Magnific popup options
     jQuery('.tx-gallery-image a, .tx-gallery-image-preview').magnificPopup({type:'image'});
     jQuery('.tx-gallery-image-link').magnificPopup({
        type: 'ajax',
        alignTop: true,
        overflowY: 'scroll',
        closeOnBgClick : false
    });
});