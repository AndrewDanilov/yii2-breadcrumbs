<?php

/* @var $this \yii\web\View */
/* @var $content string */
/* @var $microdata bool */

?>
<ul class="breadcrumbs" <?php if ($microdata) { ?>itemscope itemtype="https://schema.org/BreadcrumbList"<?php } ?>>
	<?= $content ?>
</ul>