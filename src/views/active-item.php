<?php

/* @var $this \yii\web\View */
/* @var $label string */
/* @var $url string|array */
/* @var $microdata bool */
/* @var $position int */

use yii\helpers\Url;

?>
<?php if ($microdata) { ?>
	<li class="item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <?php if ($url) { ?>
            <a itemprop="item" href="<?= Url::to($url) ?>">
                <span itemprop="name"><?= $label ?></span>
            </a>
            <meta itemprop="position" content="<?= $position ?>" />
        <?php } else { ?>
            <span itemprop="name"><?= $label ?></span>
            <link itemprop="item" href="<?= Yii::$app->request->url ?>" />
            <meta itemprop="position" content="<?= $position ?>" />
        <?php } ?>
	</li>
<?php } else { ?>
	<li class="item active">
        <?php if ($url) { ?>
            <a href="<?= Url::to($url) ?>">
                <span><?= $label ?></span>
            </a>
        <?php } else { ?>
		    <span><?= $label ?></span>
        <?php } ?>
	</li>
<?php } ?>