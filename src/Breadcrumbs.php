<?php
namespace andrewdanilov\breadcrumbs;

use yii\base\Widget;

/**
 * Breadcrumbs
 *
 * Use:
 *  <?= andrewdanilov\menu\Breadcrumbs::widget([
 *		'templateWrapper' => '@frontend/views/site/breadcrumbs/wrapper',
 *		'templateItem' => '@frontend/views/site/breadcrumbs/item',
 *		'templateActiveItem' => '@frontend/views/site/breadcrumbs/active-item',
 *		'showHome' => false, // default true
 *		'homeLabel' => 'Main',
 *		'homeUrl' => ['site/index'],
 *      'microdata' => true,
 *		'items' => [
 *          ['label' => 'Category', 'url' => ['site/category']],
 *          ['label' => 'Subcategory', 'url' => ['site/subcategory']],
 *          ['label' => 'Product #1'], // or short ['Product #1']
 *      ],
 *  ]) ?>
 *
 * All parameters are optional.
 */

class Breadcrumbs extends Widget
{
	public $templateWrapper = '@andrewdanilov/breadcrumbs/views/wrapper';
	public $templateItem = '@andrewdanilov/breadcrumbs/views/item';
	public $templateActiveItem = '@andrewdanilov/breadcrumbs/views/active-item';
	public $showHome = true;
	public $homeLabel = 'Главная';
	public $homeUrl = ['/'];
	public $microdata = false;
	public $items = [];

	/**
	 * @inheritDoc
	 */
	public function init()
	{
		parent::init();
		if (!is_array($this->items)) {
			$this->items = [];
		}
	}

	/**
	 * @inheritdoc
	 */
	public function run()
	{
		if ($this->showHome) {
			array_unshift($this->items, ['label' => $this->homeLabel, 'url' => $this->homeUrl]);
		}
		if (count($this->items) < 2) {
			return '';
		}

		// convert last element short notation to normal
		// and remove url from it, if it has one.
		$lastItem = array_pop($this->items);
		if (is_string($lastItem)) {
			$lastItem = ['label' => $lastItem];
		}
		unset($lastItem['url']);
		array_push($this->items, $lastItem);

		$out = [];
		foreach ($this->items as $index => $item) {
			if (is_array($item) && isset($item['label'])) {
				$item['microdata'] = $this->microdata;
				$item['position'] = $index + 1;
				if (isset($item['url'])) {
					$out[] = $this->render($this->templateItem, $item);
				} else {
					$out[] = $this->render($this->templateActiveItem, $item);
				}
			}
		}

		return $this->render($this->templateWrapper, [
			'content' => implode('', $out),
			'microdata' => $this->microdata,
		]);
	}
}