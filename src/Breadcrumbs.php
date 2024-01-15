<?php
namespace andrewdanilov\breadcrumbs;

use yii\base\Widget;

/**
 * Breadcrumbs
 * @link https://github.com/AndrewDanilov Documentation
 */
class Breadcrumbs extends Widget
{
	public $templateWrapper = '@andrewdanilov/breadcrumbs/views/wrapper';
	public $templateItem = '@andrewdanilov/breadcrumbs/views/item';
	public $templateActiveItem = '@andrewdanilov/breadcrumbs/views/active-item';
	public $showHome = true;
	public $homeLabel = 'Main';
	public $homeUrl = ['/'];
	public $showActiveItemUrl = false;
	public $hideIfSingleItem = true;
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
		if ($this->hideIfSingleItem && count($this->items) < 2) {
			return '';
		}

		// convert last element short notation to normal
		// and remove url from it, if it has one.
		$lastItem = array_pop($this->items);
		if (is_string($lastItem)) {
			$lastItem = ['label' => $lastItem];
		}
        if (!$this->showActiveItemUrl) {
            unset($lastItem['url']);
        }
		array_push($this->items, $lastItem);

		$out = [];
        $last_index = count($this->items) - 1;
		foreach ($this->items as $index => $item) {
			if (is_array($item) && isset($item['label'])) {
				$item['microdata'] = $this->microdata;
				$item['position'] = $index + 1;
				if ($index === $last_index) {
					$out[] = $this->render($this->templateActiveItem, $item);
				} else {
					$out[] = $this->render($this->templateItem, $item);
				}
			}
		}

		return $this->render($this->templateWrapper, [
			'content' => implode('', $out),
			'microdata' => $this->microdata,
		]);
	}
}