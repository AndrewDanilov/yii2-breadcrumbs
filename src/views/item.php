<?php

/* @var $this \yii\web\View */
/* @var $label string */
/* @var $url string|array */
/* @var $microdata bool */
/* @var $position int */

use yii\helpers\Url;

?>
<?php if ($microdata) { ?>
	<li class="item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemprop="item" href="<?= Url::to($url) ?>">
			<span itemprop="name"><?= $label ?></span>
		</a>
		<span>&gt;</span>
		<meta itemprop="position" content="<?= $position ?>" />
	</li>
<?php } else { ?>
	<li class="item">
		<a href="<?= Url::to($url) ?>">
			<span><?= $label ?></span>
		</a>
		<span>&gt;</span>
	</li>
<?php } ?>
