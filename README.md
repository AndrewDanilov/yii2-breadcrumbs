Yii2 Breadcrumbs
===================
Widget let you create breadcrumbs in simialar way as the default yii breadcrumbs widget, but
with help of template files. You can define templates separetely for wrapper, link item and for
active (last) breadcrumb item.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require andrewdanilov/yii2-breadcrumbs "~1.0.0"
```

or add

```
"andrewdanilov/yii2-breadcrumbs": "~1.0.0"
```

to the `require` section of your `composer.json` file.


Usage
-----

```php
<?= andrewdanilov\breadcrumbs\Breadcrumbs::widget([
	'templateWrapper' => '@frontend/views/site/breadcrumbs/wrapper', // optional
	'templateItem' => '@frontend/views/site/breadcrumbs/item', // optional
	'templateActiveItem' => '@frontend/views/site/breadcrumbs/active-item', // optional
	'showHome' => false, // optional, default true
	'homeLabel' => 'Main', // optional, default 'Main'
	'homeUrl' => ['site/index'], // optional, default ['/']
	'showActiveItemUrl' => true, // optional, default false
	'hideIfSingleItem' => false, // optional, default true. Hides widget if the only element presents in items array. If showHome is true, then home page counts as first element.
	'microdata' => true, // optional, default false
	'items' => [
		['label' => 'Category', 'url' => ['site/category']],
		['label' => 'Subcategory', 'url' => ['site/subcategory']],
		'Product #1', // short form of ['label' => 'Product #1']
	],
]) ?>
```

You can use own templates for breadcrumbs __wrapper__ element, __list items__ and __active list item__. Just copy example templates from __/vendor/andrewdanilov/yii2-breadcrumbs/views__ to your prefered directory. Modify them as you need and define correspond paths to their location: `templateWrapper`, `templateItem`, `templateActiveItem`.

You can enable __schema.org__ microdata for breadcrumbs by setting `microdata` option to __true__.
