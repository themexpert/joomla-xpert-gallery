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

            $doc->addScript(JURI::root(true).'/modules/mod_xpertgallery/assets/js/jquery.isotope.min.js');
            $doc->addScript(JURI::root(true).'/modules/mod_xpertgallery/assets/js/script.js');

            define('XPERT_GALLERY',1);
        }
    }
}