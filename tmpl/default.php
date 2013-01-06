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
defined('_JEXEC') or die('Restricted accessd');

?>

<!--ThemeXpert: Xpert Gallery module ##VERSION## Start here-->
<div class="tx-gallery <?php echo $module_id;?> <?php echo $params->get('moduleclass_sfx');?> overview-<?php echo $params->get('overview_position');?> clearfix">

    <?php if($params->get('sort_enabled', 1)): ?>
    <ul class="tx-gallery-sort clearfix" data-option-key="sortBy">

        <li><?php echo JText::_('SORT')?></li>

        <?php foreach($params->get('sort_elements') as $sitem):?>

            <?php $selected = ($sitem == 'default') ? 'selected' : ''; ?>

            <li>
                <a href="#sortBy=<?php echo $sitem; ?>" data-option-value="<?php echo $sitem; ?>" class="<?php echo $selected?>">
                    <?php echo ucfirst($sitem);?>
                </a>
            </li>
        <?php endforeach;?>

    </ul>
    <?php endif;?>

    <ul class="tx-gallery-container tx-gallery-columns-<?php echo $params->get('column',3);?> style-<?php echo $params->get('overview_hover_style');?>"><?php foreach($items as $item) : ?><li>

        <div class="tx-gallery-item">
            <div class="tx-gallery-item-in">

                <?php if($params->get('overview_position') == 'hover'):?>
                    <div class="tx-gallery-image" style="background-image: url('<?php echo $item->image?>')">
                <?php else :?>
                    <div class="tx-gallery-image">
                    <img src="<?php echo $item->image; ?>" alt="<?php echo $item->title; ?>" />
                <?php endif;?>
                </div>

                <?php if( $params->get('overview', 1) ):?>

                <div class="tx-gallery-info">

                    <?php if( in_array('title', $overview_elements) ): ?>
                    <h2 class="tx-gallery-title">
                        <a href="<?php echo $item->link; ?>"> <?php echo $item->title; ?> </a>
                    </h2>
                    <?php endif;?>

                    <?php if( in_array('date', $overview_elements)
                           OR in_array('intro', $overview_elements)
                           OR in_array('readmore', $overview_elements) ): ?>
                        <div class="tx-gallery-content clearfix">

                            <?php if( in_array('date', $overview_elements) ) :?>
                                <div class="tx-gallery-date">
                                    <span><?php echo $item->date;?></span>
                                </div>
                            <?php endif; ?>

                            <?php if( in_array('intro', $overview_elements) ) :?>
                                <div class="tx-gallery-intro">
                                    <?php echo $item->introtext; ?>
                                </div>
                            <?php endif; ?>

                            <?php if( in_array('readmore', $overview_elements) ) :?>
                                <div class="tx-gallery-readmore">
                                    <a class="btn" href="<?php echo $item->link; ?>">Read More</a>
                                </div>
                            <?php endif; ?>

                        </div>
                    <?php endif;?>
                </div>
                <?php endif;?>

            </div>
        </div>
    </li><?php endforeach;?></ul>

</div>
<!--ThemeXpert: Xpert Gallery module ##VERSION## End Here-->