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

abstract class XEFXpertGalleryHelper
{

    public static function getCatFilterList($items, $params)
    {
        $html = '';

        // echo "<pre>";
        // var_dump($items); die;
        // echo "</pre>";

        // Set the var name based on content source
        switch ( $params->get('content_source', 'joomla') ) {
            case 'k2':
                $cat_alias = 'categoryalias';
                $cat_name = 'categoryname';
                break;

            // Default Joomla
            default:
                $cat_alias = 'category_route';
                $cat_name = 'category_title';
                break;
        }
        $i = 1;

        

        foreach( $items as $item )
        {
        //     echo "<pre>";
        // var_dump($item[0]->$cat_name); 
        // echo "</pre>";

            if( !$params->get('show_all') AND ($i == 1) )
            {
                $class = 'class="active"';
            }else{
                $class = '';
            }
            
            $html .= '<li data-filter=".'. str_replace('/', '-', $item[0]->$cat_alias) .'"'. $class .'>' . $item[0]->$cat_name . '</li>' . "\n";
            $i++;
        }

        return $html ;
    }

    public static function getCatNameAsClass( $item, $params )
    {
        switch ( $params->get('content_source', 'joomla') )
        {
            case 'k2':
                $class = $item->categoryalias;
                break;
            
            default:
                $class = str_replace('/', '-', $item->category_route);
                break;
        }
        return $class;
    }

    public static function loadScript($module, $params)
    {
        if( !defined('XPERT_GALLERY') )
        {
            $doc = JFactory::getDocument();
            $js_path = JURI::root(true).'/modules/mod_xpertgallery/assets/js';
            $css_path = JURI::root(true).'/modules/mod_xpertgallery/assets/css';

            if( $params->get('sort_enabled') OR
                $params->get('cat_sort_enabled') AND
                ($params->get('content_source') !== 'flickr') )
            {
                $doc->addScript($js_path . '/jquery.isotope.min.js');
            }

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