<?php

/* @var $this \yii\web\View */
/* @var $label string */
/* @var $microdata bool */
/* @var $position int */

?>
<?php if ($microdata) { ?>
	<li class="item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<span itemprop="name"><?= $label ?></span>
		<link itemprop="item" href="<?= Yii::$app->request->url ?>" />
		<meta itemprop="position" content="<?= $position ?>" />
	</li>
<?php } else { ?>
	<li class="item active">
		<span><?= $label ?></span>
	</li>
<?php } ?>