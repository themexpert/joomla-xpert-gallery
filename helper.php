<?php
/**
 * @package Xpert Gallery
 * @version ##VERSION##
 * @author ThemeXpert http://www.themexpert.com
 * @copyright Copyright (C) 2009 - 2011 ThemeXpert
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 */

// no direct access
defined('_JEXEC') or die;

abstract class XEFXpertGalleryHelper{

    public static function loadScript($module, $params)
    {
        if( !defined('XPERT_GALLERY') )
        {
            $doc = JFactory::getDocument();
            $js_path = JURI::root(true).'/modules/mod_xpertgallery/assets/js';
            $css_path = JURI::root(true).'/modules/mod_xpertgallery/assets/css';

            $doc->addScript($js_path . '/jquery.isotope.min.js');

            if( !defined('XPERT_POPUP') )
            {
                $doc->addScript($js_path . '/magnific.min.js');
                $doc->addStyleSheet($css_path . '/magnific.css');
                define('XPERT_POPUP',1);
            }

            // Load module script last
            $doc->addScript($js_path . '/script.min.js');

            define('XPERT_GALLERY',1);
        }
    }
}