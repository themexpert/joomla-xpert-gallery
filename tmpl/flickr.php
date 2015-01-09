<?php
// no direct access
defined('_JEXEC') or die('Restricted accessd');
?>

<!--ThemeXpert: Xpert Gallery module ##VERSION## Start here-->
<div class="tx-gallery <?php echo $module_id;?> overview-<?php echo $params->get('overview_position');?> clearfix">
    <ul class="tx-gallery-container tx-gallery-columns-<?php echo $params->get('column',3);?>">
        <?php foreach($items as $i):?>
            <li>
                <div class="tx-gallery-item">
                    <div class="tx-gallery-item-in">

                        <div class="tx-gallery-image">
                            <a href="<?php echo $i->image; ?>">
                                <img src="<?php echo $i->image;?>" alt="<?php echo $i->title?>">
                                <span class="tx-gallery-image-overlay"></span>
                            </a>
                            <a class="tx-gallery-image-preview" href="<?php echo $i->image;?>"></a>
                        </div>

                    </div>
                </div>
            </li>
        <?php endforeach; ?>
        </ul>
</div>